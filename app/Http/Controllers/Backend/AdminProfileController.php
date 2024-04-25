<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//Agregamos la libreria
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminProfileController extends Controller
{
    public function index(){
        return view('admin.profile.index');
    }

    public function updateProfile(Request $request){
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back();
    }

    public function updatePassword(Request $request){

        $user = auth()->user();
        $repeatPassword = '';
        $notification ='';

        $request->validate([
            'current_password' => ['required','current_password'],
            'password'=> ['required','confirmed','min:8'],
        ]);


        if(Hash::check($request->password, $user->password)){
            $repeatPassword ='La nueva contraseña no puede ser igual a la contraseña actual';
        }else{
            $notification ='La contraseña se ha actulizado correctamente.';
        }

        $request->user()->update([
            'password' => bcrypt($request->password)
        ]);

        return redirect()->back()->with(compact('repeatPassword','notification'));

    }

}
