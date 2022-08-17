<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Pegawai
{
    public function handle(Request $request, Closure $next)
    {
        $hak_akses = DB::table("pegawai_hak_akses")->where("user_id", auth()->user()->id)->where("modul_id", "1")->get()[0]->pegawai_level_user_id;
        
        if($hak_akses == 3 || $hak_akses == 4){
            abort(404);
        }

        return $next($request);
    }
}
