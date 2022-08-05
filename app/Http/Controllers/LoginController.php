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
            $request->session()->regenerate();
            return redirect()->intended("/main");
        }
        return back()->with("LoginError", "Login Failed");


        $test2 = [
            "nama" => "admin",
            "password" => "admin",
            "email" => "admin@email.com",
            "modul1" => "Manageman Pegawai",
            "level1" => "Administrator",
            "modul2" => "Managemen Presensi",
            "level2" => "Administrator",
        ];

        
    }


    public function logout(Request $request)
    {   
        $request->session()->flush();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function tampil_session(Request $request){
        dd(session()->get('name'));
    }
}
