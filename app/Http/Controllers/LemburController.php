<?php

namespace App\Http\Controllers;

use App\Models\Lembur;
use Illuminate\Http\Request;

class LemburController extends Controller
{
    
    public function index()
    {
        return view('lembur.index');
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(Lembur $lembur)
    {
        //
    }

    
    public function edit(Lembur $lembur)
    {
        //
    }

    
    public function update(Request $request, Lembur $lembur)
    {
        
    }

    
    public function destroy(Lembur $lembur)
    {
        //
    }
}
