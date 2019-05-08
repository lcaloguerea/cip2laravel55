<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\PassengerGroup;
use App\Room;

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
    	$reserv = Reservation::where('id_res', $request->id)->first();
        $reserv->status = "started";
    	$reserv->room_id = $request->room;
    	$reserv->save();

        $r = Room::where('id_room',$request->room)->first();
        $r->status = "occupied";
        $r->active_reservation_id = $reserv->id_res;
        $r->save();

 		$message = ' La reserva fue actualizada exitosamente.';
            return response()->json(['message'=> $message]);
    }

    public function putReservationCheckout(Request $request)
    {
    	$reserv = Reservation::where('id_res', $request->id)->first();
    	$reserv->status = "finished";
    	$reserv->save();

        $r = Room::where('active_reservation_id' ,$request->id)->first();
        $r->status = "free";
        $r->active_reservation_id = null;
        $r->sanitization = "required";
        $r->save();


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