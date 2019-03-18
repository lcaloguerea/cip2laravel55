<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
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
        return view('/emails/reservDetail');
    }  

}