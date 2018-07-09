<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Passenger;

class PassengersController extends Controller
{
    public function getCards()
    {
    	$passengers = Passenger::all();
    	return view('/passengers/passengers_cards', compact('passengers'));
    }

    public function getList()
    {
    	$passengers = Passenger::all();
    	return view('/passengers/passengers_list', compact('passengers'));
    }

    public function getProfile($id)
    {
    	$passenger = Passenger::where('id_passenger',$id) -> first();
    	return view('passengers.passenger_profile', compact('passenger'));
    }
}
