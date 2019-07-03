<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use Carbon\Carbon;
use App\Reservation;
use App\PassengerGroup;
use App\Activity;
use Jenssegers\Date\Date;
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

    public function getRoomDetail($id)
    {
        Date::setLocale('es');

        $pGroups = PassengerGroup::all();
    	$room = Room::where('id_room',$id) -> first();
        $Reservations = Reservation::all();
        $upCmngRsrvs = [];
        $Rsrvs = [];

        $rAct = Activity::where('room_id',$id)
                    ->orderBy('created_at')
                    ->get();

        foreach($Reservations as $r)

            if($r->roomType == $room->type and $r->room_id == $room->id_room){
                $Rsrvs[] = $r;
            }

        /*foreach($Reservations as $r)

            if($r->roomR->type == $room->type and $r->check_in >= Carbon::today()){
                $upCmngRsrvs[] = $r;
            }*/
        if($rAct->count() == 0){
            return view('/admin/rooms/room_detail',compact('room', 'Rsrvs', 'pGroups','rAct'));
        }
        else{
            foreach ($rAct as $a){
                $aux = new Date($a->created_at);
                $aux = $aux->format('d/m/Y');
                $dates[] = $aux;
            }

            $dates = array_unique($dates);
           //dd($dates);

            return view('/admin/rooms/room_detail', compact('room', 'Rsrvs', 'pGroups','rAct', 'dates'));
        }
    }

    public function postRoomSanitization(Request $request)
    {
        $room = Room::where('id_room', $request->id)->first();
        $room->sanitization = "done";
        $room->save();

        $ra = Activity::create([
            'group' => 'room',
            'motive' => "",
            'event' => 'room_cleaned',
            'room_id' => $request->id,
            'responsible_id' => \Auth::user()->id
        ]);

        $message = 'La limpieza de la habitación '.$room->id_room.' ha sido registrada y realizada por '.\Auth::user()->name.' '.\Auth::user()->lName;
        return response()->json(['message'=> $message]);
    }

    public function postRoomLocked(Request $request)
    {
        $room = Room::where('id_room', $request->id)->first();
        $room->status = 'locked';
        $room->save();

        $ra = Activity::create([
            'group' => 'room',
            'motive' => $request->motive,
            'event' => 'room_locked',
            'room_id' => $request->id,
            'responsible_id' => \Auth::user()->id
        ]);

        $message = 'La habitación '.$room->id_room.' ha sido bloqueada  por '.\Auth::user()->name.' '.\Auth::user()->lName;
        return response()->json(['message'=> $message]);
    }

    public function postRoomUnlocked(Request $request)
    {
        $room = Room::where('id_room', $request->id)->first();
        $room->status = 'free';
        $room->save();

        $ra = Activity::create([
            'group' => 'room',
            'motive' => $request->motive,
            'event' => 'room_unlocked',
            'room_id' => $request->id,
            'responsible_id' => \Auth::user()->id
        ]);

        $message = 'La habitación '.$room->id_room.' ha sido desbloqueada  por '.\Auth::user()->name.' '.\Auth::user()->lName;
        return response()->json(['message'=> $message]);
    }
}
