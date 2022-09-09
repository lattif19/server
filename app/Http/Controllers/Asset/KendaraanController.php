<?php
namespace App\Http\Controllers\Asset;

use App\Models\Pegawai;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ManagemenKendaraan\AKendaraanDokumen;
use App\Models\ManagemenKendaraan\AAsuransi;
use App\Models\ManagemenKendaraan\AKendaraan;
use App\Models\ManagemenKendaraan\AJenisPremi;
use App\Models\ManagemenKendaraan\AJenisService;
use App\Models\ManagemenKendaraan\AJenisAsuransi;
use App\Models\ManagemenKendaraan\AJenisKendaraan;
use App\Models\ManagemenKendaraan\AStatusPerbaikan;
use App\Models\ManagemenKendaraan\AServicePerbaikan;

class KendaraanController extends Controller
{
    public function validasi_no_polisi($data){
        $ada = AKendaraan::where("no_polisi", "like", "%".$data."%")->count();
        if($ada > 0){
            return $data." (".$ada.")";
        }else{
            return $data;
        }
    }

    public function simpan_detail_mobil(Request $request){
        $data['nama'] = $request->nama;
        $data['no_polisi'] = $request->no_polisi;
        $data['a_jenis_kendaraan_id'] = $request->a_jenis_kendaraan_id;
        $data['no_rangka'] = $request->no_rangka;
        $data['no_mesin'] = $request->no_mesin;
        $data['tanggal_pembelian'] = $request->tanggal_pembelian;
        $data['user_id'] = $request->user_id;
        $data['keterangan'] = $request->keterangan;
        $data['updated_at'] = date("Y-m-d H:i:s");

        $datafile['mobil_stnk'] = $request->mobil_stnk;
        $datafile['mobil_bpkb'] = $request->mobil_bpkb;
        $datafile['mobil_foto'] = $request->mobil_foto;
        
        $id = $request->kendaraan_id;

        if($id == "tambah"){
            $data['no_polisi'] = $this->validasi_no_polisi($request->no_polisi);
            $id = AKendaraan::create($data)->id;
            if($id > 0) {$validate = true; }else{$validate = false;}
        }else{
            $validate = AKendaraan::where("id", $id)->update($data) == 1;
        }

        $res['success'] = "";
        $res['error']="";

        if($datafile['mobil_stnk'] != null){
            if($this->simpan_dokumen($datafile['mobil_stnk'], $id, "mobil_stnk", "kendaraan"))
            { $res['success'] = "berhasil"; } else { $res['error'] = "upload data mobil_stnk gagal"; }
             
        }
        if($datafile['mobil_bpkb'] != null){
            if($this->simpan_dokumen($datafile['mobil_bpkb'], $id, "mobil_bpkb", "kendaraan"))
            { $res['success'] = "berhasil"; } else { $res['error'] = "upload data mobil_bpkb gagal"; }
             
        }
        if($datafile['mobil_foto'] != null){
            if($this->simpan_dokumen($datafile['mobil_foto'], $id, "mobil_foto", "kendaraan"))
            { $res['success'] = "berhasil"; } else { $res['error'] = "upload data mobil_foto gagal"; }
             
        }

         if($validate)
            { return redirect('/kendaraan/mobil')->with("success", "Proses Berhasil"); }
              return redirect('/kendaraan/mobil')->with("error", $res);
        
    }

    public function simpan_dokumen($file, $a_kendaraan_id="", $jenis="", $sub_folder){      
        //move file
        $filename = $a_kendaraan_id."_".str_replace(" ", "_", date("YmdHis")."_".$file->getClientOriginalName());
        $file-> move(public_path("/dokumen/".$sub_folder."/".$a_kendaraan_id.'/'), $filename);

        $data['a_kendaraan_id'] = $a_kendaraan_id;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['nama'] = $jenis;
        $data['path'] = "/dokumen/".$sub_folder."/".$a_kendaraan_id."/".$filename;

        return AKendaraanDokumen::create($data);
    }

    public function tambah_data_mobil(){
        return view('asset.kendaraan_tambah',[
            'title' => 'Mobil',
            'sub_title' => 'PT Sumber Segara Primadaya',
            'pegawai' => Pegawai::get(),
            'a_jenis_kendaraan' => AJenisKendaraan::get(),
        ]);
    }


    public function service_tambah_pengajuan(Request $request){
        $data['user_id'] = auth()->user()->id;
        $data['a_status_perbaikan_id'] = 1;

        $data['created_at'] = date("Y-m-d H:i:s");
        $data['updated_at'] = date("Y-m-d H:i:s");
        $data['a_kendaraan_id'] = $request->a_kendaraan_id;
        $data['a_jenis_service_id'] = $request->a_jenis_service_id;
        $data['nama_bengkel'] = $request->nama_bengkel;
        $data['keterangan'] = $request->keterangan;
        $data['tanggal_booking'] = $request->tanggal_booking;
        $data['tanggal_masuk'] = $request->tanggal_masuk;
        $data['estimasi'] = $request->estimasi;

        if($request->aksi == "tambah"){
            AServicePerbaikan::create($data); 
            return back()->with("success", "Proses Berhasil");
        }
        return back()->with("error", "Proses Gagal");
    }

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
            'service' => AServicePerbaikan::paginate(10),
            'kendaraan' => AKendaraan::get(),
            'jenis_service' => AJenisService::get(),
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

    public function detail_kendaraan(Request $request){
        $data = AKendaraan::where('no_polisi', $request->no_polisi)->get();
        if($data->count() == 0 || $request->aksi != "detail" && $request->aksi != "edit"){ return abort(404); }

        return view("asset.kendaraan_detail",[
            'title' => "Detail Kendaraan",
            'sub_title' => "Kendaraan - PT Sumber Segara Primadaya",
            'mobil' => $data,
            'pegawai' => Pegawai::get(),
            'dokumen_stnk' => AKendaraan::find($data[0]->id)->a_kendaraan_dokumen->where('nama', 'mobil_stnk')->last(),
            'dokumen_bpkb' => AKendaraan::find($data[0]->id)->a_kendaraan_dokumen->where('nama', 'mobil_bpkb')->last(),
            'dokumen_foto' => AKendaraan::find($data[0]->id)->a_kendaraan_dokumen->where('nama', 'mobil_foto')->last(),
            'a_jenis_kendaraan' => AJenisKendaraan::get(),
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
