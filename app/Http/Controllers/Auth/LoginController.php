<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function authenticated($request , $user){
        if($user->confirmed == 'yes'){
            if($user->type=='admin'){
                return redirect()->route('admin');
                $this->middleware('auth','Admin')->except('logout');
                }
            elseif($user->type=='user'){
                return redirect()->route('user');
                $this->middleware('auth','User')->except('logout');
                }
            elseif($user->type=='maid'){
                return redirect()->route('maid');
                $this->middleware('auth')->except('logout');
                }
            }
        else{
            \Session::flash('message', 'La cuenta <strong>'.$user->email.'</strong> no ha sido confirmada');
            return redirect()->route('login');
            }    
    }

}
