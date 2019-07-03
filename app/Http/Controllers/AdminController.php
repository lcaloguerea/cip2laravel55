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
use Jenssegers\Date\Date;
use Image;
use Auth;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::where('type', 'user')->count();
        $passengers = Passenger::all()->count();
        $roomOc = Room::where('status', 'occupied')->get();

        $pActive = 0;
        foreach($roomOc as $r){
            $pActive += PassengerGroup::where('reservation_id', $r->active_reservation_id)->count();
        }

        //count income by room
        $rFinish = Reservation::where('status', 'finished')->get();
        $income = 0;
        foreach($rFinish as $rf){
            if($rf->roomType == "single"){
                $income += 30000;
            }elseif($rf->roomType == "shared"){
                $income += 35000;
            }elseif($rf->roomType == "matrimonial"){
                $income += 40000;
            }
        }
 
        return view('/admin/index', compact('users', 'passengers', 'pActive', 'income'));
    }

    public function getMailbox()
    {
        return view('/admin/mail/mailbox');
    }

    public function getPayment_b()
    {
        return view('/admin/payments/b_invoice');
    }

    public function postUpdateAvatar(Request $request)
    {
            if($request->hasFile('updAvatar'))
            {
                $avatar = $request->file('updAvatar');
                $filename = time() . '.' . $avatar->getClientOriginalExtension();
                Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
                $user = User::find($request->id);
                $user->uAvatar = '/uploads/avatars/' . $filename;
                $user->save();
                return \Redirect::back();
            }



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
            'rut' => 'required',         
            'confirmed' => 'required',         
            'department' => 'required',         
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:255',
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
}
