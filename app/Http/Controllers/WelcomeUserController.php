<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Room;
use App\Reservation;

class WelcomeUserController extends Controller
{
    public function index()
    {
    	return view('welcome');
    }

    public function postDisp(Request $request)
    {
    	$in = date_parse_from_format("d-m-Y", $request->checkIn);
    	$out = date_parse_from_format("d-m-Y", $request->checkOut);


    	//filtering by rooms that overlaps with the dates selected by user
    	//in order to remove them from the availables
    	$disp =  DB::table('reservations')
    			->select('check_in', 'check_out', 'room_id as room')
    			->where([
                    ['status', '!=', 'cancelled'],
                    ['status', '!=', 'finished'],
                    ['check_out', '>', $request->checkIn],
                    ['check_out', '<', $request->checkOut]
                	])
                ->orWhere([
                	['status', '!=', 'cancelled'],
                    ['status', '!=', 'finished'],
                	['check_in', '>', $request->checkIn],
                	['check_in', '<', $request->checkOut]
                	])
                ->orWhere([
                	['status', '!=', 'cancelled'],
                    ['status', '!=', 'finished'],
                	['check_in', '<=', $request->checkIn],
                	['check_out', '>=', $request->checkOut]
                	])
    			->get();

    	$aux = [];

    	foreach($disp as $d)
    		$aux[] = $d->room;

    	//collect every room available between dates selected by user
    	$dRooms = DB::table('rooms')
    			->select('id_room', 'type')
    			->whereNotIn('id_room', $aux)
    			->get();

    	//Amount of room by type available
    	$arta = [
    		'single' => $dRooms->where('type', 'single')->count(),
    		'compartida' => $dRooms->where('type', 'shared')->count(),
    		'matrimonial' => $dRooms->where('type', 'matrimonial')->count()];



		if($request->ajax()){
			return  $arta;

		}
		else
		{

			return "no ajax";
		}

    }
}
