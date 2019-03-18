<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    
    public function getMyProfile()
    {
        $user = user::find(\Auth::user()->id);
        return view('profile/my_profile', compact('user'));
    }

    public function postValidateEditForm(Request $request)
    {
    	dd('yeah');
    }

    public function putUpdate(Request $request)
    {
    	$validator = \Validator::make($request->all(), [
            'name' => 'required|string|max:255',        
            'lName' => 'required|string|max:255',        
            'rut' => 'required',         
            'confirmed' => 'required',         
            'department' => 'required',         
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:255',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all(),
                'message'=>""]);
        }
        else{
            //update
            $user = User::where('email',$request->email)->first();
            $user->name = $request->name;
            $user->lName = $request->lName;
            $user->rut = $request->rut;
            $user->confirmed = $request->confirmed;
            $user->department = $request->department;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->save();

            $message = ' El registro '.$user->name.' '.$user->lName.' fue actualizado(a) exitosamente.';
            return response()->json(['errors'=> "",
                'message'=> $message
                ]);
        }

    }
}
