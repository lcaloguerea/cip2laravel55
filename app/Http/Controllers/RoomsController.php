<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;

class RoomsController extends Controller
{
    public function getCards()
    {
    	$rooms = Room::all();
    	return view('/rooms/rooms_cards', compact('rooms'));
    }

    public function getList()
    {
    	$rooms = Room::all();
    	return view('/rooms/rooms_list', compact('rooms'));
    }

    public function getProfile($id)
    {
    	$user = User::where('id_user',$id) -> first();
    	return view('users.user_profile', compact('user'));
    }
}
