<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\PassengerGroup;
use App\User;
use App\Maintenance;
use App\Supply;
use App\Activity;
use Carbon\Carbon;

class MaidController extends Controller
{

    public function __construct()
    {
        $this->middleware('Maid');
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

    public function getMaintenance()
    {
        $maint = Maintenance::all();
        return view('/maid/maintenance', compact('maint'));
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
            $activity = Activity::create([
                'event' => 'alert_some_supplies',
                'group' => 'maid',
                'responsible_id' => \Auth::id(),
            ]);
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

        $admins = User::where('type', 'admin')
                    ->orWhere('type', 'maid')
                    ->orderBy('email')
                    ->get();

        $sp = Supply::where('stock','no')->get();

        foreach($admins as $a){
            $gaemail[] = $a->email;
        }

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

                /*$ma = Activity::create([
                    'group' => 'maid',
                    'motive' => ''.$sup->supply.'',
                    'event' => 'resupply_some',
                    'responsible_id' => \Auth::user()->id
                ]);*/
            }
            $user = \Auth::id();
            $admin = 'Leo';
            $aemail = 'l.caloguerea@gmail.com';

      /*  //mail to CIP staff
        //use $gaemail instead of aemail to masive send
        \Mail::send('emails.resuplyAll',array('user' => $user, 'sp' => $sp), function($message) use ($gaemail, $admin) {
            $message->to($gaemail,$admin)
                ->subject('Reabastecimiento completo');
                
           });*/



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

    public function postAlertM(Request $request)
    {
        $m = Maintenance::where('id',$request->m_id)->first();

        if($m->periodicity == "monthly"){
            $m->status = "expired";
            $m->save();
        }else{
            $m->status = "expired";
            $m->save();
        }

        
        $message = 'Alerta enviada y registrado por '.\Auth::user()->name.' '.\Auth::user()->lName;
            return response()->json(['message'=> $message]);
    }

    public function postValidateM(Request $request)
    {
        $m = Maintenance::where('id',$request->m_id)->first();

        if($m->periodicity == "monthly"){
            $m->status = "done";
            $m->deadline = Carbon::now()->addMonths(1);
            $m->save();
        }else{
            $m->status = "done";
            $m->deadline = Carbon::now()->addYear();
            $m->save();
        }

        
        $message = 'Mantenimiento validado por '.\Auth::user()->name.' '.\Auth::user()->lName;
            return response()->json(['message'=> $message]);
    }

}
