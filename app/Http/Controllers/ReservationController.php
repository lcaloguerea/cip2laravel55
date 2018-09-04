<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\PassengerGroup;

class ReservationController extends Controller
{
    public function getList()
    {
    	$reservs = Reservation::all();
    	$pGroups = PassengerGroup::all();

    	return view('/admin/reservations/reservation_list', compact('reservs','pGroups'));
    }

}