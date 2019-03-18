<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use Carbon\Carbon;
use App\Reservation;
use App\PassengerGroup;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class RoomsController extends Controller
{
    public function getCards()
    {
    	$rooms = Room::all();
        $pGroups = PassengerGroup::all();
    	return view('/admin/rooms/rooms_cards', compact('rooms','pGroups'));
    }

    public function getList()
    {
    	$rooms = Room::all();
        $pGroups = PassengerGroup::all();

    	return view('/admin/rooms/rooms_list', compact('rooms','pGroups'));
    }

    public function getRoomDetail($id)
    {
        $pGroups = PassengerGroup::all();
    	$room = Room::where('id_room',$id) -> first();
        $Reservations = Reservation::all();
        $upCmngRsrvs = [];

        foreach($Reservations as $r)

            if($r->roomR->type == $room->type and $r->check_in >= Carbon::today()){
                $upCmngRsrvs[] = $r;
            }

    	return view('/admin/rooms/room_detail', compact('room', 'upCmngRsrvs', 'pGroups'));
    }
}
