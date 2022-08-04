<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Pegawai;


class UserController extends Controller
{


    public function jabatan_put(Request $request){
        $id['id'] = $request->id;
        $data['nama'] = $request->nama;
        $data['keterangan'] = $request->keterangan;
        $data['updated_at'] = now();
        
       
        if(DB::table('pegawai_jabatan')->where("id", $request->id)->update($data)){
            return redirect('/jabatan')->with('success', "Data berhasil dirubah");
        }else{
            return redirect('/jabatan')->with('error', "Data gagal dirubah");
        }
    }

    public function jabatan_store(Request $request){

        $save['nama'] = $request->nama;
        $save['keterangan'] = $request->keterangan;
        $save['created_at'] = now();
        $save['updated_at'] = now();

        if(Pegawai::jabatan_validasi($save)){
            DB::table('pegawai_jabatan')->insert($save);
            return redirect('/jabatan')->with('success', "Data berhasil di input");
        }else{
            return redirect('/jabatan')->with('error', "Data ".$save['nama']." Sudah tersedia");
        }
    }







    public function divisi_put(Request $request){
        $id['id'] = $request->id;
        $data['nama'] = $request->nama;
        $data['keterangan'] = $request->keterangan;
        $data['updated_at'] = now();

        
        
        if(DB::table('pegawai_divisi')->where("id", $request->id)->update($data)){
            return redirect('/divisi')->with('success', "Data berhasil dirubah");
        }else{
            return redirect('/divisi')->with('error', "Data gagal dirubah");
        }
    }

    public function divisi_store(Request $request){

        $save['nama'] = $request->nama;
        $save['keterangan'] = $request->keterangan;
        $save['created_at'] = now();
        $save['updated_at'] = now();

        
        if(Pegawai::divisi_validasi($save)){
            DB::table('pegawai_divisi')->insert($save);
            return redirect('/divisi')->with('success', "Data berhasil di input");
        }else{
            return redirect('/divisi')->with('error', "Data ".$save['nama']." Sudah tersedia");
        }
    }

    public function detail($nik){
        return view("pegawai.detail",[
            "title" => "Detail",
            'divisi' => Pegawai::get_divisi(),
            'pegawai' => Pegawai::get_detail($nik),
            'jabatan' => Pegawai::get_jabatan(),
        ]);
    }


    public function hak_akses(){
        // dd(Pegawai::hak_akses());
        return view("pegawai.hak_akses",[
            'title'   => "Manageman Hak Akses",
            'hak_akses' => Pegawai::hak_akses(),
            'modul' => Pegawai::get_modul(),
            'level' => Pegawai::get_level(),
        ]);
    }


    public function jabatan(){
        return view("pegawai.jabatan",[
            'title'   => "Manageman Jabatan",
            'jabatan' => Pegawai::get_jabatan(),
        ]);
    }

    public function divisi(){
        return view("pegawai.divisi",[
            'title'   => "Manageman Divisi",
            'divisi' => Pegawai::get_divisi(),
        ]);
    }


    public function index(){
        // dd(Pegawai::get_pegawai());
        return view('pegawai/index', 
            [   'title' => "Pegawai",
                'divisi' => Pegawai::get_divisi(),
                'jabatan' => Pegawai::get_jabatan(),
                'pegawai' => Pegawai::get_pegawai(),
        ]);
    }
}
