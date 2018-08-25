<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class CalendarController extends Controller
{
    public function getCalendar()
    {
        return view('/calendar/index');
    }

}
