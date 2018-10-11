<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Passenger;
use App\Country;
use CountryFlag;

class PassengersController extends Controller
{
    public function getCards()
    {
    	$passengers = Passenger::all();
    	return view('/admin/passengers/passengers_cards', compact('passengers'));
    }

    public function getList()
    {
    	$passengers = Passenger::all();
    	return view('/admin/passengers/passengers_list', compact('passengers'));
    }

    public function getProfile($id)
    {
    	$passenger = Passenger::where('id_passenger',$id) -> first();
    	return view('/admin/passengers.passenger_profile', compact('passenger'));
    }
}
