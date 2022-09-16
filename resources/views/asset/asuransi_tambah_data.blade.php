
@extends('layout.main')
@include('asset.sidebar.menu')

@section('container')
        <style>
            a{
                text-decoration: none;
            }
        </style>
        <div class="container-fluid px-4">
            <h1 class="mt-4">{{ $title }}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">{{ $sub_title }}</li>
            </ol>
            
            <div class="row">
                <div class="col-lg-12">
                    <form action="/kendaraan/asuransi/tambah_data" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                        <div class="card">
                            <div class="card-header">Infomasi Asuransi</div>
                            <div class="card-body">
                                <label for="">Kendaraan </label>
                                <select class="form-control js-tags" name="a_kendaraan_id">
                                    @foreach ($kendaraan as $i)
                                        <option value="{{ $i->id }}"
                                            @if(request()->mobil == $i->id)
                                                selected
                                            @endif
                                            >{{ $i->nama }}  : ({{ $i->no_polisi }})</option>
                                    @endforeach
                                </select>

                                <label for="">Tipe Asuransi</label> 
                                <select name="a_jenis_asuransi_id" class="form-control">
                                    @foreach ($jenis_asuransi as $i)
                                        <option value="{{ $i->id }}">{{ $i->nama }}</option>
                                    @endforeach
                                </select>

                                <label for="">No Polis Asuransi</label>
                                <input class="form-control" type="text" name="no_polis">

                                <label for="">Nama Produk Asuransi</label>
                                <input class="form-control" type="text" name="nama_asuransi">

                                <label for="">Keterangan</label>
                                <textarea class="form-control" name="keterangan" rows="5"></textarea>

                                <label for="">Jenis Pembayaran Premi</label>
                                <select name="a_jenis_premi_id" class="form-control">
                                    @foreach ($jenis_premi as $i)
                                        <option value="{{ $i->id }}">{{ $i->nama }}</option>
                                    @endforeach
                                </select>

                                <label for="">Biaya Premi</label>
                                <input class="form-control" type="number" name="biaya_premi">


                                <label for="">Tanggal Mulai</label>
                                <input class="form-control" type="date" value="{{ date('Y-m-d') }}" name="tanggal_mulai">


                                <label for="">Tanggal Selesai</label>
                                <input class="form-control" type="date" value="{{ date('Y-m-d') }}" name="tanggal_selesai">

                                <label for="">Dokumen Plis / Asuransi</label>
                                <input class="form-control" type="file" name="dok_asuransi[]" multiple>

                                <label for="">Nama Perusahaan</label>
                                <select class="form-control js-example-tags" id="perusahaan" onchange="cek_perusahaan()" name="a_asuransi_pic_id">
                                    @foreach ($asuransi_pic as $i)
                                        <option value="{{ $i->id }}">{{ $i->perusahaan }}</option>
                                    @endforeach    
                                </select>
                                  

                                    <div id="tampil" hidden>
                                        <label for="">Nama Seles Asuransi</label>
                                        <input class="form-control" type="text" name="pic_asuransi_nama">

                                        <label for="">Alamat Perusahaan</label>
                                        <textarea class="form-control" name="pic_asuransi_alamat_perusahaan" rows="5" name="pic_asuransi_alamat"></textarea>
                                        
                                        <label for="">No Telepon Perusahaan</label>
                                        <input class="form-control" type="text" name="pic_asuransi_telepon_perusahaan">

                                        <label for="">No Telepon Pribadi</label>
                                        <input class="form-control" type="text" name="pic_asuransi_telepon_pribadi">
                                        
                                        <label for="">Email Perusahaan</label>
                                        <input class="form-control" type="text" name="pic_asuransi_email_perusahaan">
                                        
                                        <label for="">Email Pribadi</label>
                                        <input class="form-control" type="text" name="pic_asuransi_email_pribadi">

                                        <label for="">Portofolio Perusahaan / Penawaran / Pamflet Produk</label>
                                        <input type="file" name="dok_asuransi_pic[]" multiple class="form-control">

                                    </div>
                            </div>

                            <div class="card-footer">
                                
                                <input type="submit" name="aksi" value="Simpan" class="btn btn-primary">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

<script>
    function cek_perusahaan(){
        if(!Number.isInteger(parseInt(document.getElementById("perusahaan").value))){
            document.getElementById("tampil").hidden = false;
        }else{
            document.getElementById("tampil").hidden = true;
        }
    }
    
</script>
@endsection

