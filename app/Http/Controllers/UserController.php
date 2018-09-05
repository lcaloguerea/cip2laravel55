<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Reservation;

class UserController extends Controller
{
    public function index()
    {
        $Reservations = Reservation::all();

        $events = [];
        foreach($Reservations as $r)

            if($r->roomR->type == 'single'){
                $events[] = \Calendar::event(
                    $r->roomR->type.' '.$r->roomR->id_room, //event title
                    true, //full day event?
                    new \DateTime($r->check_in),
                    new \DateTime($r->check_out.' +1 day'),
                    $r->id_res,
                    [
                    'color' => '#d81b60',
                ]);
            }
            elseif($r->roomR->type == 'shared'){
                $events[] = \Calendar::event(
                    $r->roomR->type.' '.$r->roomR->id_room, //event title
                    true, //full day event?
                    new \DateTime($r->check_in),
                    new \DateTime($r->check_out.' +1 day'),
                    $r->id_res,
                    [
                    'color' => '#605ca8',
                ]);
            }
            elseif($r->roomR->type == 'matrimonial'){
                $events[] = \Calendar::event(
                    $r->roomR->type.' '.$r->roomR->id_room, //event title
                    true, //full day event?
                    new \DateTime($r->check_in),
                    new \DateTime($r->check_out.' +1 day'),
                    $r->id_res,
                    [
                    'color' => 'orange',
                ]);
            }



        $calendar = \Calendar::addEvents($events); //add an array with addEvents


        return view('/user/index', compact('calendar', 'events'));
    }

    public function postMakeReserv(Request $request)
    {
        dd('asd');
        return view('/user/make_reservation');
    }
}