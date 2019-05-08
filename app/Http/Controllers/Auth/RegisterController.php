<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/validate';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'lName' => 'required|string|max:255',
            'rut' => 'required|string|max:255|unique:users|regex:/^\d{1,2}\.\d{3}\.\d{3}[-][0-9kK]{1}$/',            
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:255|regex:/^\+56?[0-9]+$/',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $email = $data['email'];
        $dest = $data['name'];
        $codigo =  str_random();
        //dd($email);

        \Mail::send('emails.welcome',array('destinatario' => $dest, 'codigo' => $codigo), function($message) use ($email, $dest) {
            $message->to($email,$dest)
                ->subject('Confirma tu cuenta CIP');
        });

        return User::create([
            'name' => $data['name'],
            'lName' => $data['lName'],
            'type' => 'user',
            'department' => $data['department'],
            'rut' => $data['rut'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'confirmed_code' => $codigo,
            'password' => bcrypt($data['password']),
        ]);

    }

    public function getValidate()
    {
       return view('auth.validate');
    }

    //this override the autologin feature
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    public function confirm($codigo)
    {
        $user = User::whereConfirmedCode($codigo)->first();

        $dest = $user->name;
        $email = $user->email;

        \Mail::send('emails.validated',  array('destinatario' => $dest, 'email' => $email), function($message) use($email, $dest) {
            $message->to($email,$dest)
                ->subject('Validación');

        });

        $user->confirmed = 'yes';
        $user->confirmed_code = null;
        $user->save();

        return view('auth.validated');
    }

}
