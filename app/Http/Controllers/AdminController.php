<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('/admin/index');
    }

    public function getMailbox()
    {
        return view('/mail/mailbox');
    }

    public function getCalendar()
    {
        return view('/calendar/index');
    }

    public function getPayment_b()
    {
        return view('/payments/b_invoice');
    }
}
