<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use Carbon\Carbon;
use App\Reservation;
use App\User;
use App\Testimonial;
use App\PassengerGroup;
use Illuminate\Support\Facades\Input;
use App\Passenger;
use App\Activity;
use Jenssegers\Date\Date;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    public function getTestimonial($code){

        $guest = Passenger::where('tCode', $code)->first();
        if($guest){
            $p = PassengerGroup::where('passenger_id', $guest->id_passenger)->orderBy('id_pgroup', 'desc')->first();
            $r = Reservation::where('id_res', $p->reservation_id)->first();
            $user = User::where('id',$r->user_id)->first();
            
            return view('testimonial',compact('guest','user'));
        }else{
            return view('testimonial',compact('guest'));
        }


        return view('testimonial',compact('guest','user'));
    }

    public function postTestimonialSave(Request $request){
        
        $validator = \Validator::make($request->all(), [         
            'email' => 'required|string|email|max:255|exists:passengers',
            'testimonial' => 'required',
        ]);

        if ($validator->fails())
        {
            return redirect()->back()
                    ->withInput($request->only('email','testimonial'))
                    ->withErrors(['email' => 'Email incorrecto, debe ser el suyo']);  
        }else{
            $guest = Passenger::where('email', $request->email)->first();
            $r = PassengerGroup::where('passenger_id', $guest->id_passenger)->orderBy('id_pgroup', 'desc')->first();
            if($guest->tCode == null){
                return redirect()->back()
                            ->with('status', 'Error, el código no existe o ya ha sido utilizado por esta cuenta. (Si no ha ingresado su testimonio y le figura este mensaje, favor comunicarse con nosotros)');
            }

            //handle testimonial
            $t = Testimonial::create([
                'rate'              => $request->score,
                'comment'           => $request->testimonial,
                'name'              => $guest->name_1.' '.$guest->lName_1,
                'department'        => $guest->university,
                'pAvatar'           => $guest->pAvatar,
                'reservation_id'    => $r->reservation_id,
                'passenger_id'      => $guest->id_passenger
            ]);
            
            //testimonial activity
            $activity = Activity::create([
                'event' => 'testimonial_created',
                'responsible_id' => $guest->id_passenger,
                'involved_id' => $guest->id_passenger,
                'rsrv_id' => $r->reservation_id,
            ]);

            //reset code;
            $guest->tCode = null;
            $guest->save();

            $admins = User::where('type', 'admin')->orderBy('email')->get();

            foreach($admins as $a){
                $gaemail[] = $a->email;    
            }

            $a = "Administradores";
            $Reserv = Reservation::where('id_res', $r->reservation_id)->first();



            return redirect()->back()
                            ->with('statusOk', 'Su testimonio ha sido ingresado con éxito, agradecemos su tiempo y gestión.');
        }

    }
}
