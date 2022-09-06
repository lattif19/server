<?php
namespace App\Http\Controllers\Asset;

use App\Http\Controllers\Controller;
use App\Models\ManagemenKendaraan\AJenisKendaraan;
use App\Models\ManagemenKendaraan\AKendaraan;
use App\Models\ManagemenKendaraan\AAsuransi;
use App\Models\ManagemenKendaraan\AServicePerbaikan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{

    public function service(){

        return view('asset.service',[
            'title' => 'Service',
            'sub_title' => 'service - PT Sumber Segara Primadaya',
            'service' => AServicePerbaikan::join("pegawai", "a_service_perbaikan.driver_id","=","pegawai.user_id")->paginate(10),
        ]);
    }

    public function asuransi(){

        return view('asset.asuransi',[
            'title' => 'Asuransi',
            'sub_title' => 'asuransi - PT Sumber Segara Primadaya',
            'asuransi' => AAsuransi::get(),
        ]);
    }

    public function setting(Request $request){
        return view('asset.pengaturan',[
            'title' => 'Pengaturan',
            'sub_title' => 'pengaturan - PT Sumber Segara Primadaya',
        ]);
    }

    public function daftar_kendaraan(){
        return view("asset.kendaraan",[
            'title' => "Kendaraan",
            'sub_title' => "Kendaraan - PT Sumber Segara Primadaya",
            'mobil' => AKendaraan::whereHas("a_jenis_kendaraan", function ($q){ $q->where("nama","like", "%".request()->jenis."%");})
                                    ->orWhere("a_kendaraan.nama", "like", "%".request()->jenis."%")
                                    ->orWhere("no_polisi", "like", "%".request()->jenis."%")
                                    ->paginate(10),
        ]);
    }
    
    public function index(){
        return view('asset.index', [
            'title' => "Managemen Mobil",
            'sub_title' => "Managemen Kendaraan - PT Sumber Segara Primadaya",
            'jenis' => AJenisKendaraan::get(),
        ]);
    }
}
