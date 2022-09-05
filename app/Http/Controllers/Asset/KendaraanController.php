<?php
namespace App\Http\Controllers\Asset;
use App\Http\Controllers\Controller;
use App\Models\ManagemenKendaraan\JenisKendaraan;
use App\Models\ManagemenKendaraan\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function daftar_kendaraan(Request $request){
       
        return view("asset.kendaraan",[
            'title' => "Kendaraan",
            'sub_title' => "Kendaraan - PT Sumber Segara Primadaya",
        ]);
    }
    
    public function index(){
        return view('asset.index', [
            'title' => "Managemen Mobil",
            'sub_title' => "Managemen Kendaraan - PT Sumber Segara Primadaya",
            'jenis' => JenisKendaraan::all(),
        ]);
    }
}
