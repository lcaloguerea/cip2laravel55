<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
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

    public function getProfile($id)
    {
    	$user = User::where('id',$id) -> first();
    	return view('/admin/users/user_profile', compact('user'));
    }
}
