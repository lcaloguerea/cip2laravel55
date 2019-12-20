<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Room;
use App\Reservation;
use App\Testimonial;
use App\Passenger;
use Carbon\Carbon;

class WelcomeUserController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        $p = Passenger::all();
        //return view('updating');
    	return view('welcome', compact('testimonials','p'));
    }

    public function postDisp(Request $request)
    {

        $in =  Carbon::parse($request->checkIn)->addDay(-1)->format('Y-m-d');
    	$out =  Carbon::parse($request->checkOut)->addDay()->format('Y-m-d');
    	//$out = date_parse_from_format("d-m-Y", $request->checkOut);



    	//filtering by rooms that overlaps with the dates selected by user
    	//in order to remove them from the availables
    	$disp =  DB::table('reservations')
    			->select('check_in', 'check_out', 'roomType as room', 'id_res')
    			->where([
                    ['status', '!=', 'cancelled'],
                    ['status', '!=', 'finished'],
                    ['check_out', '>=', $in],
                    ['check_out', '<=', $out]
                	])
                ->orWhere([
                	['status', '!=', 'cancelled'],
                    ['status', '!=', 'finished'],
                	['check_in', '>=', $in],
                	['check_in', '<=', $out]
                	])
                ->orWhere([
                	['status', '!=', 'cancelled'],
                    ['status', '!=', 'finished'],
                	['check_in', '<=', $in],
                	['check_out', '>=', $out]
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

        if($single < 0){$single = 0;}
        if($shared < 0){$shared = 0;}
        if($matrimonial < 0){$matrimonial = 0;}
    		
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
