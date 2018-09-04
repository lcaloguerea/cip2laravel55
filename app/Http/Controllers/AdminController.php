<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
        return view('/admin/mail/mailbox');
    }

    public function getPayment_b()
    {
        return view('/admin/payments/b_invoice');
    }

    public function postUpdateAvatar(Request $request)
    {
        /*if($request->hasFile('files'))
        {
           dd($request);  
        }
        else
        {
           dd($request);
        } */
    }

    public function getCards()
    {
        $users = User::all();
        return view('/admin/users/index', compact('users'));
    }

    public function getList()
    {
        $users = User::all();
        return view('/admin/users/user_list', compact('users'));
    }

    public function getProfile($id)
    {
        $user = User::where('id', $id) -> first();
        return view('/admin/users/user_profile', compact('user'));
    }

}
