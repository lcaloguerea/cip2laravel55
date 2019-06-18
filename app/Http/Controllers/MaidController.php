<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\PassengerGroup;
use App\User;
use App\Maintenance;

class MaidController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $maintenances = Maintenance::all();
        $rooms = Room::all();
        $pGroups = PassengerGroup::all();
        return view('/maid/index', compact('rooms','pGroups','maintenances'));
    }

    public function getSupplies()
    {
        return view('/maid/supplies');
    }

}
