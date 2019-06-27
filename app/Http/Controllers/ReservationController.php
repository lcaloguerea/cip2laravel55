<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\PassengerGroup;
use App\Room;
use App\Activity;

class ReservationController extends Controller
{
    public function getList()
    {
    	$reservs = Reservation::all();
    	$pGroups = PassengerGroup::all();

    	return view('/admin/reservations/reservation_list', compact('reservs','pGroups'));
    }

    public function getReservationDetail($id)
    {
    	$reserv = Reservation::where('id_res', $id)->first();
    	$pGroups = PassengerGroup::all();
        $rooms = Room::where('type', $reserv->roomType)->where('status', 'free')->get();
    	return view('/admin/reservations/reservation_detail', compact('reserv','pGroups','rooms'));
    }

    public function putReservationCheckin(Request $request)
    {
        //to obtain id and quantity of passengers involved in reserv
        $gCount = PassengerGroup::where('reservation_id', $request->id)->select('passenger_id')->get();
        //dd($gCount[0]->passenger_id);
    	
        //update room assigned in reservation
        $reserv = Reservation::where('id_res', $request->id)->first();
        $reserv->room_id = $request->room;
    	$reserv->status = "started";
    	$reserv->save();

        //change status of room and place id from active reservation
        $r = Room::where('id_room',$request->room)->first();
        $r->status = "occupied";
        $r->active_reservation_id = $reserv->id_res;
        $r->save();


        //create activity checkin for guest 1
        $activity = Activity::create([
            'event' => 'checkin',
            'responsible_id' => \Auth::id(),
            'involved_id' => $gCount[0]->passenger_id,
            'rsrv_id' => $reserv->id_res,
        ]);

        //if reserv has 2 guest
        if($gCount->count() == 2){
             //create activity checkin for guest 2
            $activity = Activity::create([
                'event' => 'checkin',
                'responsible_id' => \Auth::id(),
                'involved_id' => $gCount[1]->passenger_id,
                'rsrv_id' => $reserv->id_res,
            ]);           
        }

 		$message = ' La reserva fue actualizada exitosamente.';
            return response()->json(['message'=> $message]);
    }

    public function putReservationCheckout(Request $request)
    {
        //to obtain id and quantity of passengers involved in reserv
        $gCount = PassengerGroup::where('reservation_id', $request->id)->select('passenger_id')->get();

    	$reserv = Reservation::where('id_res', $request->id)->first();
    	$reserv->status = "finished";
    	$reserv->save();

        $r = Room::where('active_reservation_id' ,$request->id)->first();
        $r->status = "free";
        $r->active_reservation_id = null;
        $r->sanitization = "required";
        $r->save();

        //create activity checkout for guest 1
        $activity = Activity::create([
            'event' => 'checkout',
            'responsible_id' => \Auth::id(),
            'involved_id' => $gCount[0]->passenger_id,
            'rsrv_id' => $reserv->id_res,
        ]);

        //if reserv has 2 guest
        if($gCount->count() == 2){
             //create activity checkout for guest 2
            $activity = Activity::create([
                'event' => 'checkout',
                'responsible_id' => \Auth::id(),
                'involved_id' => $gCount[1]->passenger_id,
                'rsrv_id' => $reserv->id_res,
            ]);           
        }


 		$message = ' La reserva fue actualizada exitosamente.';
            return response()->json(['message'=> $message]);
    }

    public function putReservationCancel(Request $request)
    {
    	$reserv = Reservation::where('id_res', $request->id)->first();
    	$reserv->status = "cancelled";
    	$reserv->save();

    	$room = Room::where('active_reservation_id', $reserv->id_res);
    	$room->sanitization = 'required';
    	$room->status = 'free';
    	$room->save();
 		$message = ' La reserva fue cancelada.';
            return response()->json(['message'=> $message]);

        //add activity
    }

    public function putReservationInvoice(Request $request)
    {
        $reserv = Reservation::where('id_res', $request->id)->first();
        $message = ' Seras redireccionado(a) al previsualizador de comprobantes.';
            return response()->json(['message'=> $message]);
    }
}