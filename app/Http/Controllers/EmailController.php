<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Room;
use App\Activity;
use App\Passenger;
use App\Reservation;
use App\Testimonial;
use App\Country;
use App\Supply;
use Carbon\Carbon;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\Validator;

class EmailController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getWelcome()
    {
        $t = Testimonial::where('id',23)->first();
        $r = Room::where('type', 'single', '')->where('status', 'free')->firstOrFail();
        $Reserv = Reservation::where('id_res',1)->first();
        //dd($Reserv->pgR->count());
        //dd($Reserv->pgR[0]->passengersR[0]->name_1);
        $p1 = Passenger::where('id_passenger', 1)->first();
        $user = User::where('id',$Reserv->user_id)->first();
        $p2 = Passenger::where('id_passenger', null)->first();
        $act = Activity::where([['rsrv_id', 1],['event','rsrv_confirmed']])->first();
        return view('/emails/contact_us', compact('t', 'user','Reserv', 'p1', 'p2','r' ,'sp', 'act'));
        $uid = \Auth::id();
        $u_dest = $p1->name;
        $u_email = 'l.caloguerea@gmail.com';
        $Reserv = Reservation::where('id_res',1)->first();



   	/*\Mail::send('emails.ban',array('destinatario'), function($message) {
            $message->to('hellthrash@gmail.com','developer')
                ->subject('Testing mails views');
        });*/
        $sp = Supply::where('stock','no')->get();
    }  

}