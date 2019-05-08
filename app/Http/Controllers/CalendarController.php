<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Reservation;

class CalendarController extends Controller
{
    public function getCalendar()
    {
        $Reservations = Reservation::all()->where('status', '!=', 'cancelled');

        $events = [];
        foreach($Reservations as $r)

            if($r->roomType == 'single'){
                $events[] = \Calendar::event(
                    $r->roomType.' '.$r->room_id, //event title
                    true, //full day event?
                    new \DateTime($r->check_in),
                    new \DateTime($r->check_out.' +1 day'),
                    $r->id_res,
                    [
                    'color' => '#d81b60',
                ]);
            }
            elseif($r->roomType == 'shared'){
                $events[] = \Calendar::event(
                    $r->roomType.' '.$r->room_id, //event title
                    true, //full day event?
                    new \DateTime($r->check_in),
                    new \DateTime($r->check_out.' +1 day'),
                    $r->id_res,
                    [
                    'color' => '#605ca8',
                ]);
            }
            elseif($r->roomType == 'matrimonial'){
                $events[] = \Calendar::event(
                    $r->roomType.' '.$r->room_id, //event title
                    true, //full day event?
                    new \DateTime($r->check_in),
                    new \DateTime($r->check_out.' +1 day'),
                    $r->id_res,
                    [
                    'color' => 'orange',
                ]);
            }



        $calendar = \Calendar::addEvents($events); //add an array with addEvents


        return view('/calendar/index', compact('calendar', 'events'));
    }

}
