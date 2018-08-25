<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    
    public function getMyProfile($id)
    {
        $user = User::where('id', $id) -> first();
        return view('users.user_profile', compact('user'));
    }
}
