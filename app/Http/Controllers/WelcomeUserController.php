<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Room;
use App\Reservation;
use App\Testimonial;
use App\Passenger;

class WelcomeUserController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        $p = Passenger::all();
    	return view('welcome', compact('testimonials','p'));
    }

    public function postDisp(Request $request)
    {
    	$in = date_parse_from_format("d-m-Y", $request->checkIn);
    	$out = date_parse_from_format("d-m-Y", $request->checkOut);


    	//filtering by rooms that overlaps with the dates selected by user
    	//in order to remove them from the availables
    	$disp =  DB::table('reservations')
    			->select('check_in', 'check_out', 'roomType as room')
    			->where([
                    ['status', '!=', 'cancelled'],
                    ['status', '!=', 'finished'],
                    ['check_out', '>=', $request->checkIn],
                    ['check_out', '<=', $request->checkOut]
                	])
                ->orWhere([
                	['status', '!=', 'cancelled'],
                    ['status', '!=', 'finished'],
                	['check_in', '>=', $request->checkIn],
                	['check_in', '<=', $request->checkOut]
                	])
                ->orWhere([
                	['status', '!=', 'cancelled'],
                    ['status', '!=', 'finished'],
                	['check_in', '<=', $request->checkIn],
                	['check_out', '>=', $request->checkOut]
                	])
    			->get();

    	$aux = [];
        $single = 3;
        $shared = 1;
        $matrimonial = 4;

    	foreach($disp as $d)
            if($d->room == 'single'){
                $single -= 1;
            }elseif($d->room == 'shared'){
                $shared -= 1;
            }elseif($d->room == 'matrimonial'){
                $matrimonial -= 1;
            }
    		
        $aux[] = $single;
        $aux[] = $shared;
        $aux[] = $matrimonial;


    	//collect every room available between dates selected by user
    	/*$dRooms = DB::table('rooms')
    			->select('id_room', 'type')
    			->whereNotIn('id_room', $aux)
    			->get();*/ //method change because of change of table and freedom of room assignment

    	//Amount of room by type available
    	$arta = [
    		'single' => $single,//$dRooms->where('type', 'single')->count(),
    		'compartida' => $shared,//$dRooms->where('type', 'shared')->count(),
    		'matrimonial' => $matrimonial];//$dRooms->where('type', 'matrimonial')->count()];



		if($request->ajax()){
			return  $arta;

		}
		else
		{

			return "no ajax";
		}

    }
}
