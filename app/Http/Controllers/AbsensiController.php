<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AbsensiImport;

class AbsensiController extends Controller
{

    public function import_absensi(Request $request){
        Excel::import(new AbsensiImport, $request->file('absensi'));
        
        return redirect("/absen");
    }

    public function index()
    {
        return view('absen.index', [
            "title" => "Data Absensi",
        ]);
    }






    public function pengaturan(){
        return view("absen.pengaturan");
    }

    public function statistik(){
        return view("absen.statistik");
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show(Absensi $absensi)
    {
        //
    }

    public function edit(Absensi $absensi)
    {
        //
    }

    public function update(Request $request, Absensi $absensi)
    {
        //
    }


    public function destroy(Absensi $absensi)
    {
        //
    }
}
