<?php
namespace App\Http\Controllers\Asset;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index(){
        return view('asset.index');
    }
}
