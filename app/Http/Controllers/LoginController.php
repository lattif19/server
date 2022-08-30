<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{



    public function autenticate(Request $request){
        $data = [
            "email" => $request->email,
            "password" => $request->password,
        ];

        if(Auth::attempt($data)){
            //Cara Manual
            // $id["nomor_id"] = Auth::user()->id;
            //$request->session()->put($id);
            // session("nomor_id");


            $request->session()->regenerate();
            return redirect()->intended("/main");
        }
        return back()->with("LoginError", "Login Failed");
    }


    public function logout(Request $request)
    {   
        $request->session()->flush();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
