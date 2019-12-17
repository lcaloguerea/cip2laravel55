<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Activity;
use App\Room;
use App\Passenger;
use App\PassengerGroup;
use App\Reservation;
use App\Country;
use Carbon\Carbon;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Image;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('User');
    }
    public function index()
    {
        //user cannot see cancelled or finished
        $Reservations = Reservation::all()->where('status', '!=', 'cancelled')->where('status', '!=', 'finished');

        //handle fullcalendar not been able to display last day in use
        foreach($Reservations as $r){
            $r->check_out = Carbon::parse($r->check_out)->addDay()->format('Y-m-d');
        }


        return view('/user/index', compact('Reservations'));
    }

    public function postMakeReserv(Request $request)
    {
        $passengers = Passenger::all();
        $chin = $request->chIn_submit;
        $chout = $request->chOut_submit;

        Date::setLocale('es');
        if($request->chIn_submit != null){
            $check_in = new Date($request->chIn_submit);
            $check_in = $check_in->format('l j \d\e F \d\e Y');
        }else{$check_in = '';}
        if($request->chOut_submit != null){
            $check_out = new Date($request->chOut_submit);
            $check_out = $check_out->format('l j \d\e F \d\e Y');
        }else{$check_out = '';}

        $country = Country::all();

        //dd(compact('passengers', 'country','check_in','check_out','chin','chout'));

        return view('/user/make_reservation', compact('passengers', 'country','chin','chout'));
    }

    public function postLoadGuest(Request $request)
    {
        $passenger = Passenger::where('id_passenger', $request->idP)->first();
        $data = [
            'name_1' => $passenger->name_1,
            'lName_1' => $passenger->lName_1,
            'lName_2' => $passenger->lName_2,
            'nationality' => $passenger->nationality,
            'email' => $passenger->email,
            'phone' => $passenger->phone,
            'university' => $passenger->university,
            'country_o' => $passenger->country_o,
            'country_r' => $passenger->country_r,
        ];



        if($request->ajax()){
            return  $data;

        }
        else
        {

            return "no ajax";
        }
    }
    // verificar si este era necesario
    public function postLoadGuest2(Request $request)
    {

        //dd('entre en el 2');
        $passenger = Passenger::where('id_passenger', $request->idP)->first();
        $data = [
            'name_1' => $passenger->name_1,
            'lName_1' => $passenger->lName_1,
            'lName_2' => $passenger->lName_2,
            'nationality' => $passenger->nationality,
            'email' => $passenger->email,
            'phone' => $passenger->phone,
            'university' => $passenger->university,
            'country_o' => $passenger->country_o,
            'country_r' => $passenger->country_r,
        ];



        if($request->ajax()){
            return  $data;

        }
        else
        {

            return "no ajax";
        }
    }

    public function postValidateGuest(Request $request)
    {

        $validator = \Validator::make($request->all(), [
            'name_1' => 'required|string|max:255',
            'lName_1' => 'required|string|max:255',
            'lName_2' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'country_r' => 'required',
            'country_o' => 'required',
            'nationality' => 'required|string|max:100',
            'phone' => 'required|string|max:255|regex:/^\+56?[0-9]+$/',
            'email' => 'required|string|email|max:255|unique:users',
        ]);
        
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all(),
            'passenger'=> "",
            'passengerNew' => ""]);
        }

        $passenger = Passenger::where('email', '=', $request->email)->first();
        if ($passenger === null) 
        {
            $co = Country::where('iso', '=', $request->country_o)->first();
            $cr = Country::where('iso', '=', $request->country_r)->first();

            $passengerNew = Passenger::create([
            'name_1' => $request->name_1,
            'lName_1' => $request->lName_1,
            'lName_2' => $request->lName_2,
            'university' => $request->university,
            'pAvatar' => '/img/icons/icon-user.png',
            'country_r' => $cr->id_country,
            'country_o' => $co->id_country,
            'nationality' => $request->nationality,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

            return response()->json(['passenger'=>"",
                                    'errors'=>"",
                                    'passengerNew'=>$passengerNew]);
        }
        else
        {
            //check if guest is in other reservation
            $in =  Carbon::parse($request->checkin)->addDay(-1)->format('Y-m-d');
            $out =  Carbon::parse($request->checkout)->addDay()->format('Y-m-d');
            //$out = date_parse_from_format("d-m-Y", $request->checkOut);



            //filtering by rooms that overlaps with the dates selected by user
            //in order to remove them from the availables
            $disp =  DB::table('reservations')
                    ->select('id_res')
                    ->where([
                        ['status', '!=', 'cancelled'],
                        ['status', '!=', 'finished'],
                        ['check_out', '>=', $in],
                        ['check_out', '<=', $out]
                        ])
                    ->orWhere([
                        ['status', '!=', 'cancelled'],
                        ['status', '!=', 'finished'],
                        ['check_in', '>=', $in],
                        ['check_in', '<=', $out]
                        ])
                    ->orWhere([
                        ['status', '!=', 'cancelled'],
                        ['status', '!=', 'finished'],
                        ['check_in', '<=', $in],
                        ['check_out', '>=', $out]
                        ])
                    ->get();
            $dispArray = [];
            foreach($disp as $d){
                $dispArray[] =+ $d->id_res;
            }
            $bussy = PassengerGroup::whereIn('reservation_id', $dispArray)->select('passenger_id')->get();
            $guest = Passenger::whereIn('id_passenger',$bussy)->get();
            if($guest->contains('email', $request->email)){
                return response()->json(['errors'=>['El huésped '.$request->name_1.' '.$request->lName_1.' no puede ser agregado a esta reserva debido a que ya se encuentra asignado a otra entre las fechas seleccionadas'],
                    'passenger'=> "",
                    'passengerNew' => ""]);
            }else{
                return response()->json(['passenger'=>$passenger,
                    'errors'=> "",
                    'passengerNew'=>""]);
            }
        }
    }

    public function postCreateReservation(Request $request)
    {
        $null = "null";

        $validator = \Validator::make($request->all(), [
            'motive' => 'required',
            'program' => 'required',
            'payment_m' => 'required|not_in:'.$null,
        ]);


        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all(),
            'passenger'=> "",
            'passengerNew' => ""]);
        }else{
            $admins = User::where('type', 'admin')
                    ->orWhere('type', 'maid')
                    ->orderBy('email')
                    ->get();


        foreach($admins as $a){
            $gaemail[] = $a->email;
        }


        $p1 = Passenger::where('id_passenger', $request->passenger1)->first();
        $p2 = Passenger::where('id_passenger', $request->passenger2)->first();

        $r = Room::where('type', $request->roomType, '')->where('status', 'free')->firstOrFail();
        $uid = \Auth::id();
        $user = User::where('id',$uid)->first();
        $u_dest = $user->name;
        $u_email = $user->email;
        $p1name = $p1->name_1;
        $p1email = $p1->email;
       
        
        //create reservation first
        $Reserv = Reservation::create([
            'motive' => $request->motive,
            'program' => $request->program,
            'status' => 'waiting',
            'check_in' => $request->checkin,
            'check_out' => $request->checkout,
            'payment_m' => $request->payment_m,
            'roomType' => $r->type,
            'user_obs' => $request->user_obs,
            'user_id' => $uid,
            'confirmed' => 'tbc'
        ]);


        $pGrp = PassengerGroup::create([
            'reservation_id' => $Reserv->id_res,
            'passenger_id' => $request->passenger1,
        ]);

        //mail to guest1
         \Mail::send('emails.reservation_guest',array('user' => $user, 'Reserv' => $Reserv, 'p1' => $p1, 'r' => $r), function($message) use ($p1email, $p1name) {
            $message->to($p1email, $p1name)
                ->subject('Reserva registrada');
        });

        //create activity p1
        $activity = Activity::create([
            'event' => 'rsrv_created',
            'responsible_id' => $user->id,
            'involved_id' => $p1->id_passenger,
            'rsrv_id' => $Reserv->id_res,
        ]);


        if($p2 != null){
            $p2name = $p2->name_1;
            $p2email = $p2->email; 
            $pGrp = PassengerGroup::create([
                'reservation_id' => $Reserv->id_res,
                'passenger_id' => $request->passenger2,
            ]);

            //mail to guest2
             \Mail::send('emails.reservation_guest',array('user' => $user, 'Reserv' => $Reserv, 'p1' => $p2, 'r' => $r), function($message) use ($p2email, $p2name) {
                $message->to($p2email, $p2name)
                    ->subject('Reserva registrada');
            });

            //create activity p2
            $activity = Activity::create([
                'event' => 'rsrv_created',
                'responsible_id' => $user->id,
                'involved_id' => $p2->id_passenger,
                'rsrv_id' => $Reserv->id_res,
            ]);             

        }

        //mail to user
        \Mail::send('emails.reservation_user',array('user' => $user, 'Reserv' => $Reserv, 'p1' => $p1, 'p2' => $p2, 'r' => $r), function($message) use ($u_email, $u_dest) {
            $message->to($u_email,$u_dest)
                ->subject('Reserva registrada');
        });

        $admin = 'Leo';
        $aemail = 'l.caloguerea@gmail.com';

        //mail to CIP staff
        //use $gaemail instead of aemail to masive send
        \Mail::send('emails.reservation_staff',array('user' => $user, 'Reserv' => $Reserv, 'p1' => $p1, 'r' => $r), function($message) use ($gaemail, $admin) {
            $message->to($gaemail,$gaemail)
                ->subject('Reserva registrada');
        });


        return response()->json(['success'=>"Reserva registrada, le enviaremos un correo con mayor información"]);
        }

        
    }

    public function getMyPassengers()
    {
        $passengers = Passenger::all();
        return view('user/my_passengers', compact('passengers'));
    }

    public function getPassengerProfile($id)
    {
        $passenger = Passenger::where('id_passenger',$id) -> first();
        return view('/user/passenger_profile', compact('passenger'));      
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

        //add log
    }

    public function getMyReservations()
    {
        $reservs = Reservation::where('user_id', \Auth::id())->get();
        //dd($reservs == null);
        $pGroups = PassengerGroup::all();
        return view('/user/my_reservations', compact('reservs', 'pGroups'));
    }

}