<?php
namespace App\Http\Controllers\Asset;

use App\Http\Controllers\Controller;
use App\Models\ManagemenKendaraan\AJenisKendaraan;
use App\Models\ManagemenKendaraan\AKendaraan;
use App\Models\ManagemenKendaraan\AAsuransi;
use App\Models\ManagemenKendaraan\AJenisAsuransi;
use App\Models\ManagemenKendaraan\AServicePerbaikan;
use App\Models\ManagemenKendaraan\AJenisPremi;
use App\Models\ManagemenKendaraan\AJenisService;
use App\Models\ManagemenKendaraan\AStatusPerbaikan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    //setting_status_perbaikan
    public function setting_status_perbaikan(Request $request){
        $id['id']   = $request->id;
        $data['nama']   = $request->nama;
        $data['keterangan'] = $request->keterangan;

        if($request->aksi == "edit"){
            AStatusPerbaikan::where($id)->update($data); 
            return back()->with("success", "Proses Berhasil");
        }
        if($request->aksi == "hapus"){
            AStatusPerbaikan::destroy($id);
            return back()->with("success", "Proses Berhasil");
        }
        if($request->aksi == "tambah"){
            AStatusPerbaikan::create($data);
            return back()->with("success", "Proses Berhasil");
        }

        return back()->with("error", "Proses Gagal");
    }


    public function setting_jenis_service(Request $request){
        $id['id']   = $request->id;
        $data['nama']   = $request->nama;
        $data['keterangan'] = $request->keterangan;

        if($request->aksi == "edit"){
            AJenisService::where($id)->update($data); 
            return back()->with("success", "Proses Berhasil");
        }
        if($request->aksi == "hapus"){
            AJenisService::destroy($id);
            return back()->with("success", "Proses Berhasil");
        }
        if($request->aksi == "tambah"){
            AJenisService::create($data);
            return back()->with("success", "Proses Berhasil");
        }

        return back()->with("error", "Proses Gagal");
    }

    public function setting_jenis_kendaraan(Request $request){
        $id['id']   = $request->id;
        $data['nama']   = $request->nama;
        $data['keterangan'] = $request->keterangan;

        if($request->aksi == "edit"){
            AJenisKendaraan::where($id)->update($data); 
            return back()->with("success", "Proses Berhasil");
        }
        if($request->aksi == "hapus"){
            AJenisKendaraan::destroy($id);
            return back()->with("success", "Proses Berhasil");
        }
        if($request->aksi == "tambah"){
            AJenisKendaraan::create($data);
            return back()->with("success", "Proses Berhasil");
        }

        return back()->with("error", "Proses Gagal");
    }


    public function setting_jenis_asuransi(Request $request){
        $id['id']   = $request->id;
        $data['nama']   = $request->nama;
        $data['keterangan'] = $request->keterangan;

        if($request->aksi == "edit"){
            AJenisAsuransi::where($id)->update($data); 
            return back()->with("success", "Proses Berhasil");
        }
        if($request->aksi == "hapus"){
            AJenisAsuransi::destroy($id);
            return back()->with("success", "Proses Berhasil");
        }
        if($request->aksi == "tambah"){
            AJenisAsuransi::create($data);
            return back()->with("success", "Proses Berhasil");
        }

        return back()->with("error", "Proses Gagal");
    }


    public function setting_premi(Request $request){
        $id['id']   = $request->id;
        $data['nama']   = $request->nama;
        $data['keterangan'] = $request->keterangan;

        if($request->aksi == "edit"){
            AJenisPremi::where($id)->update($data); 
            return back()->with("success", "Proses Berhasil");
        }
        if($request->aksi == "hapus"){
            AJenisPremi::destroy($id);
            return back()->with("success", "Proses Berhasil");
        }
        if($request->aksi == "tambah"){
            AJenisPremi::create($data);
            return back()->with("success", "Proses Berhasil");
        }

        return back()->with("error", "Proses Gagal");
    }

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
            'jenis_permi' => AJenisPremi::get(),
            'jenis_asuransi' => AJenisAsuransi::get(),
            'jenis_kendaraan' => AJenisKendaraan::get(),
            'jenis_service' => AJenisService::get(),
            'status_perbaikan' => AStatusPerbaikan::get(),
        ]);
    }

    public function daftar_kendaraan(){
        return view("asset.kendaraan",[
            'title' => "Kendaraan",
            'sub_title' => "Kendaraan - PT Sumber Segara Primadaya",
            'mobil' => AKendaraan::   whereHas("a_jenis_kendaraan", function ($q){ $q->where("nama","like", "%".request()->jenis."%");})
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
