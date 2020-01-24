<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\PassengerGroup;
use App\Passenger;
use App\Room;
use App\HRes;
use App\User;
use App\Testimonial;
use App\Activity;
use App\Invoice;
use Illuminate\Support\Facades\Storage;
use Jenssegers\Date\Date;
use PDF;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getList()
    {
    	$reservs = Reservation::all();
    	$pGroups = PassengerGroup::all();

    	return view('/admin/reservations/reservation_list', compact('reservs','pGroups'));
    }

    public function getHRes()
    {
        $hres = HRes::all();

        return view('/admin/reservations/hres_index', compact('hres'));
    }

    public function getReservationDetail($id)
    {

        Date::setLocale('es');

        $tst = Testimonial::all();

        $act = Activity::where('rsrv_id',$id)
                    ->orderBy('created_at')
                    ->get();

        //dd($act->count());

        if($act->count() == 0){
            $passenger = Passenger::where('id_passenger',$id) -> first();
            $reserv = Reservation::where('id_res', $id)->first();
            $pGroups = PassengerGroup::all();
            $rooms = Room::where('type', $reserv->roomType)->where('status', 'free')->get();
            return view('/admin/reservations/reservation_detail', compact('reserv','pGroups','rooms','passenger','act'));

            //return view('/admin/passengers.passenger_profile', compact('passenger','act'));
        }
        else{
            foreach ($act as $a){
                $aux = new Date($a->created_at);
                $aux = $aux->format('d/m/Y');
                $dates[] = $aux;
            }

            $dates = array_unique($dates);


            $passenger = Passenger::where('id_passenger',$id) -> first();

            $reserv = Reservation::where('id_res', $id)->first();
            $pGroups = PassengerGroup::all();
            $rooms = Room::where('type', $reserv->roomType)->where('status', 'free')->get();
            return view('/admin/reservations/reservation_detail', compact('reserv','pGroups','rooms','passenger','act', 'dates','tst'));

            //return view('/admin/passengers.passenger_profile', compact('passenger','act', 'dates','tst'));
        }

    	$reserv = Reservation::where('id_res', $id)->first();
    	$pGroups = PassengerGroup::all();
        $rooms = Room::where('type', $reserv->roomType)->where('status', 'free')->get();
    	return view('/admin/reservations/reservation_detail', compact('reserv','pGroups','rooms'));
    }

    public function putReservationCheckin(Request $request)
    {

        $admins = User::where([
                    ['type', 'admin'],
                    ['canR', 'yes'],
                    ])
                    ->orWhere([
                    ['type', 'maid'],
                    ['canR', 'yes'],
                    ])
                    ->orderBy('email')
                    ->get();

        foreach($admins as $a){
            $gaemail[] = $a->email;
        }
        //to obtain id and quantity of passengers involved in reserv
        $gCount = PassengerGroup::where('reservation_id', $request->id)->select('passenger_id')->get();
        //dd($gCount[0]->passenger_id);

        $p1 = Passenger::where('id_passenger', $gCount[0]->passenger_id)->first();
        $p1name = $p1->name_1;
        $p1email = $p1->email;


        if($gCount->count() == 2){
            $p2 = Passenger::where('id_passenger', $gCount[1]->passenger_id)->first();
                    $p2name = $p2->name_1;
                    $p2email = $p2->email;
        }else{
            $p2 = null;
        }
    	
        //update room assigned in reservation
        $reserv = Reservation::where('id_res', $request->id)->first();
        $reserv->room_id = $request->room;
    	$reserv->status = "started";
    	$reserv->save();

        //change status of room and place id from active reservation
        $r = Room::where('id_room',$request->room)->first();
        $r->status = "occupied";
        $r->active_reservation_id = $reserv->id_res;
        $r->save();


        //create activity checkin for guest 1
        $activity = Activity::create([
            'event' => 'checkin',
            'responsible_id' => \Auth::id(),
            'involved_id' => $gCount[0]->passenger_id,
            'rsrv_id' => $reserv->id_res,
            'room_id' => $request->room,
        ]);

        //serialize data needed to mailing
        $act = $activity;
        $user = User::where('id',$reserv->user_id)->first();
        $u_dest = $user->name;
        $u_email = $user->email;

        //mail to user     
         \Mail::send('emails.reservation_checkin_user',array('user' => $user, 'Reserv' => $reserv, 'p1' => $p1, 'p2'=> $p2, 'act' => $act), function($message) use ($u_email, $u_dest) {
            $message->to($u_email, $u_dest)
                ->subject('Check In');
        });

        //mail to guest1     
         \Mail::send('emails.reservation_checkin_guest',array('user' => $user, 'Reserv' => $reserv, 'p1' => $p1, 'p2'=> $p2, 'act' => $act), function($message) use ($p1email, $p1name) {
            $message->to($p1email, $p1name)
                ->subject('Check In');
        }); 

        //if reserv has 2 guest
        if($gCount->count() == 2){
             //create activity checkin for guest 2

            //to avoid creating other template for every guest in reservation
            $aux = $p1;
            $p1 = $p2;
            $p2 = $aux;
            
            $activity = Activity::create([
                'event' => 'checkin',
                'responsible_id' => \Auth::id(),
                'involved_id' => $gCount[1]->passenger_id,
                'rsrv_id' => $reserv->id_res,
            ]);

            //mail to guest2     
             \Mail::send('emails.reservation_checkin_guest',array('user' => $user, 'Reserv' => $reserv, 'p1' => $p1, 'p2'=> $p2, 'act' => $act), function($message) use ($p2email, $p2name) {
                $message->to($p2email, $p2name)
                    ->subject('Check In');    
            });           
        }

        $admin = "CIP Staff";
        //mail to CIP staff
        //use $gaemail instead of aemail to masive send
        \Mail::send('emails.reservation_checkin_admin',array('user' => $user, 'Reserv' => $reserv, 'p1' => $p1,'p2'=> $p2, 'act' => $act), function($message) use ($gaemail, $admin) {
            $message->to($gaemail)
                ->subject('Check In');
        });

 		$message = ' La reserva fue actualizada exitosamente.';
            return response()->json(['message'=> $message]);
    }

    public function putReservationCheckout(Request $request)
    {
        $admins = User::where([
                    ['type', 'admin'],
                    ['canR', 'yes'],
                    ])
                    ->orWhere([
                    ['type', 'maid'],
                    ['canR', 'yes'],
                    ])
                    ->orderBy('email')
                    ->get();

        foreach($admins as $a){
            $gaemail[] = $a->email;
        }

        //to obtain id and quantity of passengers involved in reserv
        $gCount = PassengerGroup::where('reservation_id', $request->id)->select('passenger_id')->get();

        $p1 = Passenger::where('id_passenger', $gCount[0]->passenger_id)->first();
        $p1->tCode = $code =  str_random(); //generate code for testimonial action
        $p1->save();
        $p1name = $p1->name_1;
        $p1email = $p1->email;

        if($gCount->count() == 2){
            $p2 = Passenger::where('id_passenger', $gCount[1]->passenger_id)->first();
                    $p2name = $p2->name_1;
                    $p2email = $p2->email;
        }else{
            $p2 = null;
        }

    	$reserv = Reservation::where('id_res', $request->id)->first();
    	$reserv->status = "finished";
    	$reserv->save();

        $r = Room::where('active_reservation_id' ,$request->id)->first();
        $r->status = "free";
        $r->active_reservation_id = null;
        $r->sanitization = "required";
        $r->save();


        //create activity checkout for guest 1
        $activity = Activity::create([
            'event' => 'checkout',
            'responsible_id' => \Auth::id(),
            'involved_id' => $gCount[0]->passenger_id,
            'rsrv_id' => $reserv->id_res,
            'room_id' => $r->id_room,
        ]);

        //serialize data needed to mailing
        $act = $activity;
        $user = User::where('id',$reserv->user_id)->first();
        $u_dest = $user->name;
        $u_email = $user->email;

        //mail to guest1     
        \Mail::send('emails.checkout.guest',array('code' => $code, 'user' => $user, 'Reserv' => $reserv, 'p1' => $p1, 'p2'=> $p2, 'act' => $act), function($message) use ($p1email, $p1name) {
                $message->to($p1email, $p1name)
                    ->subject('Check Out');    
            });

        //if reserv has 2 guest
        if($gCount->count() == 2){
             //create activity checkout for guest 2
            $p2 = Passenger::where('id_passenger', $gCount[1]->passenger_id)->first();
            $p2->tCode = $code2 =  str_random(); //generate code for testimonial action
            $p2->save();

            $aux = $p1; //pivote for email addresse
            $p1 = $p2;
            $p2 = $aux;

            $activity = Activity::create([
                'event' => 'checkout',
                'responsible_id' => \Auth::id(),
                'involved_id' => $gCount[1]->passenger_id,
                'rsrv_id' => $reserv->id_res,
                'room_id' => $r->id_room,

            ]);

            //mail to guest2     
             \Mail::send('emails.checkout.guest',array('code' => $code2, 'user' => $user, 'Reserv' => $reserv, 'p1' => $p1, 'p2'=> $p2, 'act' => $act), function($message) use ($p2email, $p2name) {
                $message->to($p2email, $p2name)
                    ->subject('Check Out');    
            });           

        }

        $admin = "CIP Staff";
        //mail to CIP staff
        //use $gaemail instead of aemail to masive send
        \Mail::send('emails.checkout.admin',array('user' => $user, 'Reserv' => $reserv, 'p1' => $p1,'p2'=> $p2, 'act' => $act), function($message) use ($gaemail, $admin) {
            $message->to($gaemail)
                ->subject('Check Out');
        });

 		$message = ' La reserva fue actualizada exitosamente.';
            return response()->json(['message'=> $message]);
    }

    public function putReservationCancel(Request $request)
    {
        //to obtain id and quantity of passengers involved in reserv
        $gCount = PassengerGroup::where('reservation_id', $request->id)->select('passenger_id')->get();

    	$reserv = Reservation::where('id_res', $request->id)->first();
        $reserv->status = "cancelled";
    	$reserv->confirmed = "cancellByUser";
    	$reserv->save();

        //handle if has room assigned
        if($reserv->room_id){
            $room = Room::where('active_reservation_id', $reserv->id_res)->first();
            $room->sanitization = 'required';
            $room->status = 'free';
            $room->active_reservation_id = null;
            $room->save();
        }

        //create activity cancel for guest 1
        $activity = Activity::create([
            'event' => 'rsrv_cancelled',
            'responsible_id' => \Auth::id(),
            'involved_id' => $gCount[0]->passenger_id,
            'rsrv_id' => $reserv->id_res,
        ]);

        //if reserv has 2 guest
        if($gCount->count() == 2){
             //create activity cancel for guest 2
            $activity = Activity::create([
                'event' => 'rsrv_cancelled',
                'responsible_id' => \Auth::id(),
                'involved_id' => $gCount[1]->passenger_id,
                'rsrv_id' => $reserv->id_res,
            ]);           
        }

 		$message = ' La reserva fue cancelada.';
            return response()->json(['message'=> $message]);

        //add activity
    }

    public function putReservationInvoice(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'discount' => 'nullable|integer',        
            'IC' => 'nullable|integer',               
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all(),
                'message'=>""]);
        }

        $reserv = Reservation::where('id_res', $request->id)->first();
        $pGroup = PassengerGroup::where('reservation_id', $request->id)->get();

        //gather data
        $in = new Date($reserv->check_in);
        $out = new Date($reserv->check_out);
        $days = $out->diff($in);
        $days = $days->format('%a');
        $Nro = Invoice::where('type','NCI')->count();
        $Nro2 = Invoice::where('type','BCIP')->count();
        $rValue = Room::where('type', $reserv->roomType)->first();
        $rValue = $rValue->price;
        $charge = $rValue * $days;
        if($request->iva == "yes"){
            $total = $charge*1.19;
        }else{
            $total = $charge;
        }
        if($request->discount != null){
            $total = $total - $request->discount;
        }
        //dd($total);

        $data = [
            'iva'           =>  $request->iva,
            'discount'      =>  $request->discount,
            'IC'            =>  $request->IC,
            'Nro'           =>  $Nro+1,
            'Nro2'           =>  $Nro2+1,
            'uName'         =>  $reserv->userR->name,
            'uLName'        =>  $reserv->userR->lName,
            'department'    =>  $reserv->userR->department,
            'phone'         =>  $reserv->userR->phone,
            'email'         =>  $reserv->userR->email,
            'roomType'      =>  $reserv->roomType,
            'roomPrice'     =>  $rValue,
            'days'          =>  $days,
            'charge'        =>  $charge,
            'total'         =>  $total,
            'check_in'      =>  date('d-m-Y', strtotime($reserv->check_in)),
            'check_out'     =>  date('d-m-Y', strtotime($reserv->check_out)),
            'pgroup'        =>  $pGroup,
            'payment'       =>  $reserv->payment_m,
            'status'        =>  'pending',
            'send'          =>  date('d-m-Y'),
            'payed'         =>  'Pendiente',
            ];

        if($reserv->payment_m == "p_code"){
         
            $pdf = PDF::loadView('pdf/NCI', $data);
            $content = $pdf->download('NCI'.($Nro+1).'.pdf')->getOriginalContent();
            //Storage::put('public/invoice/NCI'.($Nro+1).'.pdf',$content) ;
            file_put_contents('invoices/NCI'.($Nro+1).'.pdf', $content);
            $message = 'NCI generada y emitida con éxito.';

            $invoice = Invoice::create([
                'type'      => 'NCI',
                'charge'    => $charge,
                'IVA'       => $request->iva,
                'IC'        => $request->IC,
                'discount'  => $request->discount,
                'total'     => $total,
                'r_type'    => $reserv->roomType,
                'status'    => 'pending',
                'pdf'       => 'invoices/NCI'.($Nro+1).'.pdf',
                'rsrv_id'   => $reserv->id_res,
            ]);
            $idr = Invoice::orderBy('id', 'desc')->first();
            $reserv->invoice_id = $idr->id;
            $reserv->save();

            $activity = Activity::create([
                'event' => 'rsrv_invoice',
                'responsible_id' => \Auth::id(),
                'rsrv_id' => $reserv->id_res,
            ]);            

            //send by email to admins and user.

            return response()->json(['success'=> $message]);

        }else{
            $pdf = PDF::loadView('pdf/BCIP', $data);
            $content = $pdf->download('BCIP'.($Nro2+1).'.pdf')->getOriginalContent();
            file_put_contents('invoices/BCIP'.($Nro2+1).'.pdf', $content);
            $message = 'Boleta generada y emitida con éxito.';

            $invoice = Invoice::create([
                'type'      => 'BCIP',
                'charge'    => $charge,
                'IVA'       => $request->iva,
                'IC'        => $request->IC,
                'discount'  => $request->discount,
                'total'     => $total,
                'r_type'    => $reserv->roomType,
                'status'    => 'pending',
                'pdf'       => 'invoices/BCIP'.($Nro2+1).'.pdf',
                'rsrv_id'   => $reserv->id_res,
            ]);
            $idr = Invoice::orderBy('id', 'desc')->first();
            $reserv->invoice_id = $idr->id;
            $reserv->save();

            $activity = Activity::create([
                'event' => 'rsrv_invoice',
                'responsible_id' => \Auth::id(),
                'rsrv_id' => $reserv->id_res,
            ]);

            //send by email to admins and user.

            return response()->json(['success'=> $message]);
        }           
    }

    public function putReservationConfirm(Request $request)
    {
            $admins = User::where([
                    ['type', 'admin'],
                    ['canR', 'yes'],
                    ])
                    ->orWhere([
                    ['type', 'maid'],
                    ['canR', 'yes'],
                    ])
                    ->orderBy('email')
                    ->get();

        foreach($admins as $a){
            $gaemail[] = $a->email;
        }


        //to obtain id and quantity of passengers involved in reserv
        $gCount = PassengerGroup::where('reservation_id', $request->id)->select('passenger_id')->get();

        $p1 = Passenger::where('id_passenger', $gCount[0]->passenger_id)->first();
        $p1name = $p1->name_1;
        $p1email = $p1->email;


        if($gCount->count() == 2){
            $p2 = Passenger::where('id_passenger', $gCount[1]->passenger_id)->first();
                    $p2name = $p2->name_1;
                    $p2email = $p2->email;
        }else{
            $p2 = null;
        }
        

        $reserv = Reservation::where('id_res', $request->id)->first();
        $reserv->confirmed = "confirmed";
        $reserv->save();

        //create activity checkin for guest 1
        $activity = Activity::create([
            'event' => 'rsrv_confirmed',
            'responsible_id' => \Auth::id(),
            'involved_id' => $gCount[0]->passenger_id,
            'rsrv_id' => $reserv->id_res,
        ]);

        //serialize data needed to mailing
        $act = $activity;
        $user = User::where('id',$reserv->user_id)->first();
        $u_dest = $user->name;
        $u_email = $user->email;

        //mail to user     
         \Mail::send('emails.reservation_confirmed_to_user',array('user' => $user, 'Reserv' => $reserv, 'p1' => $p1, 'p2'=> $p2, 'act' => $act), function($message) use ($u_email, $u_dest) {
            $message->to($u_email, $u_dest)
                ->subject('Reserva Confirmada');
        });

        //mail to guest1     
         \Mail::send('emails.reservation_confirmed_to_guest',array('user' => $user, 'Reserv' => $reserv, 'p1' => $p1, 'p2'=> $p2, 'act' => $act), function($message) use ($p1email, $p1name) {
            $message->to($p1email, $p1name)
                ->subject('Reserva Confirmada');
        }); 

        //if reserv has 2 guest
        if($gCount->count() == 2){
 
             //create activity checkin for guest 2
            $activity = Activity::create([
                'event' => 'rsrv_confirmed',
                'responsible_id' => \Auth::id(),
                'involved_id' => $gCount[1]->passenger_id,
                'rsrv_id' => $reserv->id_res,
            ]);  

            //mail to guest2     
             \Mail::send('emails.reservation_confirmed_to_guest',array('user' => $user, 'Reserv' => $reserv, 'p1' => $p1, 'p2'=> $p2, 'act' => $act), function($message) use ($p2email, $p2name) {
                $message->to($p2email, $p2name)
                    ->subject('Reserva Confirmada');    
            });
        }

        
        $admin = "CIP Staff";
        //mail to CIP staff
        //use $gaemail instead of aemail to masive send
        \Mail::send('emails.reservation_confirmed_to_admin',array('user' => $user, 'Reserv' => $reserv, 'p1' => $p1,'p2'=> $p2, 'act' => $act), function($message) use ($gaemail, $admin) {
            $message->to($gaemail)
                ->subject('Reserva Confirmada');
        });

        $message = ' La reserva fue confirmada exitosamente.';
        return response()->json(['message'=> $message]);
    }
}