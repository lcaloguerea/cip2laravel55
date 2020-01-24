<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Jenssegers\Date\Date;
use App\Activity;
use Image;
use Auth;

class ProfileController extends Controller
{
    
    public function getMyProfile()
    {
        Date::setLocale('es');
        $act = Activity::where('responsible_id',\Auth::user()->id)
                    ->orderBy('created_at')
                    ->get();

        if($act->count() == 0){
            $user = user::find(\Auth::user()->id);
            return view('profile/my_profile', compact('user','act'));
        }else{
            foreach ($act as $a){
                    $aux = new Date($a->created_at);
                    $aux = $aux->format('d/m/Y');
                    $datesAux[] = $aux;
                }
            $dates = array_unique($datesAux);
            $user = user::find(\Auth::user()->id);
            return view('profile/my_profile', compact('user','act','dates'));
        }

    }

    public function postValidateEditForm(Request $request)
    {
    	dd('yeah');
    }

    public function postUpdateAvatar(Request $request)
    {
            if($request->hasFile('updAvatar'))
            {
                $avatar = $request->file('updAvatar');
                $filename = time() . '.' . $avatar->getClientOriginalExtension();
                Image::make($avatar)->resize(300, 300)->save( './uploads/avatars/' . $filename  );
                $user = User::find($request->id);
                $user->uAvatar = '/uploads/avatars/' . $filename;
                $user->save();
                return \Redirect::back();
            }



    }

    public function putUpdate(Request $request)
    {
    	$validator = \Validator::make($request->all(), [
            'name' => 'required|string|max:255',        
            'lName' => 'required|string|max:255',        
            'rut' => 'required|string|max:255|regex:/^\d{1,2}\.\d{3}\.\d{3}[-][0-9kK]{1}$/',         
            'confirmed' => 'required',         
            'department' => 'required',         
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:255|regex:/^\+56?[0-9]+$/',
            'type' => 'required',
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
            $user->type = $request->type;
            $user->save();

            $message = ' El registro '.$user->name.' '.$user->lName.' fue actualizado(a) exitosamente.';
            return response()->json(['errors'=> "",
                'message'=> $message
                ]);
        }

    }

    public function putUpdatePsw (Request $request){

        $validator = \Validator::make($request->all(), [
            'pswA' => 'required|string|min:6',
            'pswN' => 'required|string|min:6|confirmed',        
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all(),
                'message'=>""]);
        }else{
            $user = user::find(\Auth::user()->id);
            
            if(\Hash::check($request->pswA,$user->password)){
                $user->password = bcrypt($request->pswN);
                $user->save();
                $message = 'Su contraseña se ha actualizado exitosamente.';
                
                return response()->json(['errors'=> "",
                                        'message'=> $message
                                    ]);
            }else{
                return response()->json(['errors'=>['La contraseña actual no coincide con la registrada en nuestro sistema'],
                'message'=>""]);
            }
        }

    }
}
