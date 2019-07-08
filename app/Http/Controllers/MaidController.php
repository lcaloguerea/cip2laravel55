<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\PassengerGroup;
use App\User;
use App\Maintenance;
use App\Supply;

class MaidController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bread = Supply::where('id',46)->first();
        $sup = Supply::all();
        $cont = 0;
        foreach($sup as $s){
            if($s->stock == "no"){
                $cont =+ 1;
            }
        }
        $maintenances = Maintenance::all();
        $cont2 = 0;
        foreach($maintenances as $m){
            if($m->status == "expired"){
                $cont2 =+ 1;
            }
        }
        $rooms = Room::all();
        $pGroups = PassengerGroup::all();
        return view('/maid/index', compact('rooms','pGroups','maintenances','bread','cont','cont2'));
    }

    public function getSupplies()
    {
        $supp = Supply::all();
        return view('/maid/supplies', compact('supp'));
    }


    public function postSuppliesAlert(Request $request)
    {
        $outcome="";
        $aux =  array_slice($request->selectedIds, 1);
        foreach($aux as $a){
            $sup = Supply::where('id', $a)->first();
            if($sup->stock == "no"){
                $outcome="fail";
                break;
            }else{
                $outcome="ok";
            }
            //$sup->save();
        }
        if($outcome == "ok"){
            foreach($aux as $b){
                $sup = Supply::where('id', $b)->first();
                $sup->stock = "no";
                $sup->save();
            }
            $message = 'La selección de insumos ha sido alertada y realizada por '.\Auth::user()->name.' '.\Auth::user()->lName;
            return response()->json(['message'=> $message,
                                    'outcome' => $outcome]);
        }else if($outcome == "fail"){
            $message = 'No se han realizado los cambios debido a que ha marcado insumos que ya se encuentran sin stock, verifique su selección antes de alertar.';
            return response()->json(['message'=> $message,
                                    'outcome' => $outcome]);
        }
    }

    public function postSuppliesRes(Request $request)
    {
        $outcome="";
        $aux =  array_slice($request->selectedIds, 1);
        foreach($aux as $a){
            $sup = Supply::where('id', $a)->first();
            if($sup->stock == "yes"){
                $outcome="fail";
                break;
            }else{
                $outcome="ok";
            }
            //$sup->save();
        }
        if($outcome == "ok"){
            foreach($aux as $b){
                $sup = Supply::where('id', $b)->first();
                $sup->stock = "yes";
                $sup->save();
            }
            $message = 'La selección de insumos ha sido reabastecida y realizada por '.\Auth::user()->name.' '.\Auth::user()->lName;
            return response()->json(['message'=> $message,
                                    'outcome' => $outcome]);
        }else if($outcome == "fail"){
            $message = 'No se han realizado los cambios debido a que ha marcado insumos que ya se encuentran con stock, verifique su selección antes de alertar.';
            return response()->json(['message'=> $message,
                                    'outcome' => $outcome]);
        }
    }


    public function postSuppliesAlertAll(Request $request)
    {
        $sup = Supply::all();
        foreach($sup as $s){
            $s->stock = "no";
            $s->save();
        }
        $message = 'Se ha alertado a los administradores de la falta de todo stock validada y registrado por '.\Auth::user()->name.' '.\Auth::user()->lName;
            return response()->json(['message'=> $message]);
    }

    public function postSuppliesResAll(Request $request)
    {
        $sup = Supply::all();
        foreach($sup as $s){
            $s->stock = "yes";
            $s->save();
        }
        $message = 'Se ha alertado a los administradores de la reposición de todo stock validada y registrado por '.\Auth::user()->name.' '.\Auth::user()->lName;
            return response()->json(['message'=> $message]);
    }

}
