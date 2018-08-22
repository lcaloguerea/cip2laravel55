<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function getCards()
    {
    	$users = User::all();
    	return view('/users/index', compact('users'));
    }

    public function getList()
    {
    	$users = User::all();
    	return view('/users/user_list', compact('users'));
    }

    public function getProfile($id)
    {
    	$user = User::where($id) -> first();
    	return view('users.user_profile', compact('user'));
    }
}
