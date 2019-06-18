<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Room;
use App\Passenger;
use App\Reservation;
use App\Country;
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
        $p1 = Passenger::where('id_passenger', 1)->first();
        $p2 = Passenger::where('id_passenger', null)->first();
        $r = Room::where('type', 'single', '')->where('status', 'free')->firstOrFail();
        $uid = \Auth::id();
        $user = User::where('id',$uid)->first();
        $u_dest = $p1->name;
        $u_email = 'l.caloguerea@gmail.com';
        $Reserv = Reservation::where('id_res',1)->first();



   	/*\Mail::send('emails.ban',array('destinatario'), function($message) {
            $message->to('hellthrash@gmail.com','developer')
                ->subject('Testing mails views');
        });*/
        return view('/emails/reservation_staff', compact('user','Reserv', 'p1', 'r'));
    }  

}