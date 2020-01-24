<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Reservation;
use App\Passenger;
use App\PassengerGroup;
use App\Room;
use App\Activity;
use App\Testimonial;
use App\Question;
use App\ARE;
use App\HRes;
use Jenssegers\Date\Date;
use App\Invoice;
use PDF;
use Image;
use Auth;
use App\Supply;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','Admin']);
    }

    public function index()
    {
        $users = User::where('type', 'user')->count();
        $passengers = Passenger::all()->count();
        $roomOc = Room::where('status', 'occupied')->get();

        $lUsers = User::orderBy('id', 'desc')->take(5)->get();

        $pActive = 0;
        foreach($roomOc as $r){
            $pActive += PassengerGroup::where('reservation_id', $r->active_reservation_id)->count();
        }

        //count income by room
        $rFinish = Invoice::where('status', 'payed')->get();
        $income = 0;
        foreach($rFinish as $rf){
            $income += $rf->total;
        }

        //add here testimonial data to graphic

        //income by room by month
        $hres = HRes::all(); //historical data
        $hr[] =+ $hres->where('rprice','30000')->sum('rtotal');
        $hr[] =+ $hres->where('rprice','35000')->sum('rtotal');
        $hr[] =+ $hres->where('rprice','40000')->sum('rtotal');

 
        return view('/admin/index', compact('users', 'passengers', 'pActive', 'income', 'lUsers', 'hr'));
    }

    public function getMailbox()
    {
        return view('/admin/mail/mailbox');
    }

    public function getPayment_b()
    {
        return view('/admin/payments/b_invoice');
    }

    public function postUpdatePassengerAvatar(Request $request)
    {
        if($request->hasFile('updAvatar'))
        {
            $avatar = $request->file('updAvatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
            $passenger = Passenger::where('id_passenger', $request->id)->first();
            $passenger->pAvatar = '/uploads/avatars/' . $filename;
            $passenger->save();
            return \Redirect::back();
        }
    }

    public function getCards()
    {
        $users = User::all();
        return view('/admin/users/index', compact('users'));
    }

    public function getList()
    {
        $users = User::all();
        return view('/admin/users/user_list', compact('users'));
    }

    public function getProfile($id)
    {
        Date::setLocale('es');

        $tst = Testimonial::all();

        $act = Activity::where('responsible_id',$id)
                    ->orderBy('created_at')
                    ->get();

        //dd($act->count());

        if($act->count() == 0){
            $user = User::where('id', $id) -> first();
            return view('/admin/users/user_profile', compact('user','act'));
        }
        else{
            foreach ($act as $a){
                $aux = new Date($a->created_at);
                $aux = $aux->format('d/m/Y');
                $dates[] = $aux;
            }

            $dates = array_unique($dates);


            $user = User::where('id', $id) -> first();
            return view('/admin/users/user_profile', compact('user','act', 'dates','tst'));
        }

    }

    public function postUserDestroy(Request $request)
    {
        //Validate user is not active in any current, past, future, or even cancelled reservations
        $ReservByUser = Reservation::where('user_id', $request->id)->count();

        if ($ReservByUser > 0)
        {
            $user = User::findOrFail($request->get('id'));
            return response()->json(['error'=>'<strong>'.$user->name.' '.$user->lName.'</strong> No puede ser eliminado(a) debido a que se encuentra vinculado(a) a '.$ReservByUser.' registro(s) de reservas.<br><br><div class="alert alert-warning fade in">Nota: Si un usuario figura en algun registro de una reserva (inclusive cancelada), por motivos estadísticos, no se podrá eliminar</div>',
                'message'=>""]);
        }
        if ($ReservByUser == 0)
        {
            $user = User::findOrFail($request->get('id'));
            $user->delete();

            return response()->json(['error'=>"",
                'message'=>"El usuario ".$user->name. " ".$user->lName." ha sido removid@ de los registros CIP"]);           
        }
    }

    public function putUserUpdate(Request $request){

        $validator = \Validator::make($request->all(), [
            'name' => 'required|string|max:255',        
            'lName' => 'required|string|max:255',        
            'rut' => 'required|string|max:255|regex:/^\d{1,2}\.\d{3}\.\d{3}[-][0-9kK]{1}$/',         
            'confirmed' => 'required',         
            'department' => 'required',         
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:255|regex:/^\+56?[0-9]+$/',
            'type' => 'required',
        ]);

        $extra=""; //in case we need to notify admin for type change

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all(),
                'message'=>""]);
        }
        else{
            //update
            $user = User::where('email',$request->email)->first();
            //check change of type
            if($user->type != $request->type){
                $extra = '<br><br><div class="alert alert-warning fade in">Nota: Ha cambiado el tipo de usuario para esta cuenta, esto quedará vinculado al registro de actividad de su cuenta.</div>';

                //add activity feed
            }
            $user->name = $request->name;
            $user->lName = $request->lName;
            $user->rut = $request->rut;
            $user->confirmed = $request->confirmed;
            $user->department = $request->department;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->type = $request->type;
            $user->save();

            $message = ' El registro '.$user->name.' '.$user->lName.' fue actualizado(a) exitosamente.'.$extra;
            return response()->json(['errors'=> "",
                'message'=> $message
                ]);
        }
    }

    public function generatePDF()

    {

        $data = ['title' => 'Welcome to HDTuto.com'];

        $pdf = PDF::loadView('pdf/BCIP', $data);

        return $pdf->stream('itsolutionstuff.pdf');

    }

    public function getInvoicesList()

    {
        $invoices = Invoice::all();
        return view('admin/payments/payments_list', compact('invoices'));
    }

    public function getInvoiceDetail($id)

    {
        $invoice = Invoice::where('id', $id) -> first();
        return view('admin/payments/invoice_detail', compact('invoice'));
    }

    public function putUpdateInvoice(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'discount' => 'nullable|integer',        
            'IC' => 'nullable|integer',                   
        ]);
        $extra=""; //in case we need to notify admin for type change

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all(),
                'message'=>""]);
        }
        else{
            if($request->IC == "" and $request->status == "payed" and $request->type == "NCI"){
                return response()->json(['errors'=>['No puede cambiar el estado a "pagado" sin ingresar el código interno'],
                'message'=>""]);
            }

            $reserv = Reservation::where('id_res', $request->id)->first();
            $pGroup = PassengerGroup::where('reservation_id', $request->id)->get();
            $inv = Invoice::where('id',$reserv->invoice_id)->first();


            //gather data
            $Nro ="";
            $Nro2 = "";
            $payed = "Pendiente";
            $in = new Date($reserv->check_in);
            $out = new Date($reserv->check_out);
            $days = $out->diff($in);
            $days = $days->format('%a');
            if($inv->type == "NCI"){$Nro = str_replace('.pdf', '', substr($inv->pdf, 12));}
            elseif($inv->type == "BCIP"){$Nro2 = str_replace('.pdf', '', substr($inv->pdf, 13));}
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
            if($request->status == "payed"){$payed = date('d-m-Y');}
            //dd($total);

            $data = [
                'iva'           =>  $request->iva,
                'discount'      =>  $request->discount,
                'IC'            =>  $request->IC,
                'Nro'           =>  $Nro,
                'Nro2'          =>  $Nro2,
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
                'status'        =>  $request->status,
                'send'          =>  date('d-m-Y',strtotime($inv->created_at)),
                'payed'         =>  $payed,
            ];
            if($inv->type == "NCI"){ //This type generates a new pdf with updated data
         
                $pdf = PDF::loadView('pdf/NCI', $data);
                $content = $pdf->download('NCI'.($Nro).'.pdf')->getOriginalContent();
                //name and number calculated to replace the existing file
                file_put_contents('invoices/NCI'.($Nro).'.pdf', $content); 

                $inv->IVA = $request->iva;
                $inv->IC = $request->IC;
                $inv->status = $request->status;
                $inv->discount = $request->discount;
                $inv->save();

                //send by email to admins and user only when status change to payed.
                if($request->stats == "payed"){
                    $message = 'NCI actualizada y emitida con éxito.';
                    $activity = Activity::create([
                        'event' => 'rsrv_pay',
                        'responsible_id' => \Auth::id(),
                        'involved_id' => null,
                        'rsrv_id' => $reserv->id_res,
                    ]);
                    //send mail
                }else{
                    $message = 'NCI actualizada con éxito.';
                }
                return response()->json(['success'=> $message]);

            }elseif($inv->type == "BCIP"){ //This type generates a new pdf with updated data
                $pdf = PDF::loadView('pdf/BCIP', $data);
                $content = $pdf->download('BCIP'.($Nro2).'.pdf')->getOriginalContent();
                //name and number calculated to replace the existing file
                file_put_contents('invoices/BCIP'.($Nro2).'.pdf', $content);
                
                $inv->IVA = $request->iva;
                $inv->IC = $request->IC;
                $inv->status = $request->status;
                $inv->discount = $request->discount;
                $inv->save();

                //send by email to admins and user.
                if($request->status == "payed"){
                    $message = 'BCIP actualizada y emitida con éxito.';
                    $activity = Activity::create([
                        'event' => 'rsrv_pay',
                        'responsible_id' => \Auth::id(),
                        'involved_id' => null,
                        'rsrv_id' => $reserv->id_res,
                    ]);                    
                    //send mail
                }else{
                    $message = 'BCIP actializada con éxito.';
                }
                return response()->json(['success'=> $message]);
            }
        }
    }

    public function postUploadInvoice(Request $request){
        if($request->hasFile('invoice'))
        {
            $r = Reservation::where('id_res', $request->rsrv)->first();
            $Nro = Invoice::where('type', $request->type)->count();
            $invoice = Invoice::create([
                'type'      => $request->type,
                'pdf'       => 'invoices/'.$request->type.($Nro+1).'.pdf',
                'rsrv_id'   => $request->rsrv,
                'r_type'    => $r->roomType,
                'status'    => 'other',
                'IVA'       => 'N/A',
            ]);
            
            $request->file('invoice')->storeAs('', 'invoices/'.$request->type.($Nro+1).'.pdf', 'invoice');

            return redirect('/admin/payments/invoices-list')->with('status', 'Documento '.$request->type.($Nro+1).' subido exitosamente');
        }else{
            dd('no tengo doc');
        }
    }

    public function getUploadInvoice(){
        $rsrvs = Reservation::all();
        return view('admin/payments/upload_invoice', compact('rsrvs'));
    }

    public function getSupplies()
    {
        $supp = Supply::all();
        return view('/maid/supplies', compact('supp'));
    }

    public function getTestimonials(){
        $tstm = Testimonial::all();
        $t = Testimonial::where('id', 1)->first();
        //dd($t->psngrR->name_1);
        return view('admin/testimonials/index', compact('tstm'));
    }

    public function postUpdateTestimonialV(Request $request){
        $t = Testimonial::where('id',$request->t_id)->first();
        $t->visibility = $request->visibility;
        $t->save();

        if($t->visibility == "yes"){
            $status = "visible";
        }else{
            $status = "oculto";
        }

        $message = 'El testimonio N°'.$t->id.' ha cambiado a '.$status;
        return response()->json(['message'=> $message]);      
    }

    public function getQuestions(){
        $questions = Question::all();
        return view('admin/questions/index', compact('questions'));
    }

    public function postQuestionAnswer(Request $request){
        $question = Question::where('id', $request->q_id)->first();
        $question->status = "answered";
        $question->ansBy = Auth::id();
        $question->save();
        $message = 'La pregunta N°'.$question->id.' ha cambiado a respondida';
        return response()->json(['message'=> $message]);
    }

    public function postQuestionDelete(Request $request){
        $question = Question::where('id', $request->q_id)->first();
        $question->delete();
        $message = 'La pregunta N°'.$question->id.' ha sido eliminada';
        return response()->json(['message'=> $message]);
    }

    public function getAdmins(){
        $admins = User::where('type', 'admin')
                    ->orWhere('type', 'maid')
                    ->orderBy('email')
                    ->get();

        return view('admin/admins/index', compact('admins'));
    }

    public function postARE(Request $request){
        $admin = User::where('id', $request->ida)->first();
        $admin->canR = $request->canR;
        $admin->save();
        if($admin->canR == "yes"){
            $canRE = "Se ha habilitado la recepción de correos para administrador(a)";
        }else{
            $canRE = "Se ha bloqueado la recepción de correos para administrador(a)";
        }
        $message = $canRE.' '.$admin->name.' ';
        return response()->json(['message'=> $message]);
    }

    public function getHResDetail($id){
        $hres = HRes::where('id', $id)->first();
        return view('admin/reservations/hres_detail', compact('hres'));
    }

    public function putHResUpdate(Request $request){
        $validator = \Validator::make($request->all(), [
            'guests' => 'required|string|max:255',        
            'sponsor' => 'required|string|max:255',        
            'code' => 'required',               
            'department' => 'required',         
            'email' => 'required|string|email|max:255',
            'payment_m' => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all(),
                'message'=>""]);
        }
        else{
            $hres = HRes::where('id', $request->id)->first();
            $hres->guests = $request->guests;
            $hres->sponsor = $request->sponsor;
            $hres->code = $request->code;
            $hres->department = $request->department;
            $hres->email = $request->email;
            $hres->payment_m = $request->payment_m;
            $hres->save();

            $message = ' El registro histórico N°'.$hres->id.' ha sido actualizado exitosamente.';
            return response()->json(['errors'=> "",
                'message'=> $message
                ]);
        }
    }
}
