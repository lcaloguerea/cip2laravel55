<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Passenger;
use App\Users;
use Jenssegers\Date\Date;
use App\Country;
use App\Activity;
use App\Testimonial;
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
        Date::setLocale('es');

        $tst = Testimonial::all();

        $act = Activity::where('involved_id',$id)
                    ->orderBy('created_at')
                    ->get();

        //dd($act->count());

        if($act->count() == 0){
            $passenger = Passenger::where('id_passenger',$id) -> first();
            return view('/admin/passengers.passenger_profile', compact('passenger','act'));
        }
        else{
            foreach ($act as $a){
                $aux = new Date($a->created_at);
                $aux = $aux->format('d/m/Y');
                $dates[] = $aux;
            }

            $dates = array_unique($dates);


            $passenger = Passenger::where('id_passenger',$id) -> first();
            return view('/admin/passengers.passenger_profile', compact('passenger','act', 'dates','tst'));
        }


    }
}
