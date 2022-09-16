
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
                            <div class="card-header d-flex justify-content-between">
                                <span>
                                    <strong>
                                        Infomasi Detail Asuransi
                                    </strong>
                                </span>
                                <button onclick="changeAtribute()" class="btn btn-sm btn-dark text-light" type="button" id="tombol">Rubah</button>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div class="container">
                                        <div class="card">
                                            <div class="card-header">
                                                Detail Asuransi
                                            </div>
                                        
                                            <div class="card-body">
                                                <label for="">Kendaraan</label>
                                                <select class="form-control" name="a_kendaraan_id" disabled id="perusahaan1">
                                                    @foreach ($kendaraan as $i)
                                                        <option value="{{ $i->id }}"
                                                            @if($asuransi->a_kendaraan_id == $i->id)
                                                                selected
                                                            @endif
                                                            >{{ $i->nama }} : {{ $i->no_polisi }}</option>
                                                    @endforeach
                                                </select>

                                                <label for="">Tipe Asuransi</label> 
                                                <select name="a_jenis_asuransi_id" class="form-control" disabled>
                                                    @foreach ($jenis_asuransi as $i)
                                                        <option value="{{ $i->id }}"
                                                            @if ($asuransi->a_jenis_asuransi_id == $i->id)
                                                                selected
                                                            @endif
                                                            >{{ $i->nama }}</option>
                                                    @endforeach
                                                </select>

                                                <label for="">No Polis Asuransi</label>
                                                <input class="form-control" type="text" name="no_polis" value="{{ $asuransi->no_polis }}" disabled>

                                                <label for="">Nama Produk Asuransi</label>
                                                <input class="form-control" type="text" name="nama_asuransi" value="{{ $asuransi->nama_asuransi }}" disabled>

                                                <label for="">Keterangan</label>
                                                <textarea class="form-control" name="keterangan" rows="5" disabled>{{ $asuransi->keterangan }}</textarea>

                                                <label for="">Jenis Pembayaran Premi</label>
                                                <select name="a_jenis_premi_id" class="form-control" disabled>
                                                    @foreach ($jenis_premi as $i)
                                                        <option value="{{ $i->id }}"
                                                            @if ($asuransi->a_jenis_premi_id == $i->id)
                                                                selected
                                                            @endif
                                                            >{{ $i->nama }}</option>
                                                    @endforeach
                                                </select>

                                                <label for="">Biaya Premi</label>
                                                <input class="form-control" type="number" name="biaya_premi" value="{{ $asuransi->biaya_premi }}" disabled>


                                                <label for="">Tanggal Mulai</label>
                                                <input class="form-control" type="date" value="{{ date('Y-m-d') }}" name="tanggal_mulai" value="{{ $asuransi->tanggal_mulai }}" disabled>


                                                <label for="">Tanggal Selesai</label>
                                                <input class="form-control" type="date" value="{{ date('Y-m-d') }}" name="tanggal_selesai" value="{{ $asuransi->tanggal_selesai }}" disabled>

                                                <label for="">Dokumen Polis / Asuransi</label>
                                                    
                                                    @if($asuransi->a_asuransi_dokumen->count() > 0)
                                                        @for ($loop=0 ; $loop < $asuransi->a_asuransi_dokumen->count() ; $loop++)
                                                            @if($asuransi->a_asuransi_dokumen[$loop]->nama == "dok_asuransi")
                                                                <div class="col-md-3">
                                                                    <embed src="{{ $asuransi->a_asuransi_dokumen[$loop]->path }}" type="" width="300px" id="link1">
                                                                </div>
                                                            @endif
                                                        @endfor
                                                    
                                                        <input class="form-control" type="file" name="dok_asuransi[]" multiple id="file1" hidden>
                                                    @endif
                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="container">
                                        <div class="card">
                                            <div class="card-header">
                                                Detail PIC
                                            </div>
                                        
                                            <div class="card-body">
                                                <label for="">Nama Perusahaan Asuransi</label>
                                                <select class="form-control js-tags" 
                                                    id="perusahaan" 
                                                    onchange="cek_perusahaan()" 
                                                    name="a_asuransi_pic_id" disabled>
                                                    @foreach ($asuransi_pic as $i)
                                                        <option value="{{ $i->id }}"
                                                            @if($asuransi->a_asuransi_pic_id == $i->id)
                                                                selected
                                                            @endif
                                                            >{{ $i->perusahaan }}</option>
                                                    @endforeach    
                                                </select>

                                                <label for="">Nama Seles Asuransi</label>
                                                <input class="form-control" type="text" name="pic_asuransi_nama" value="{{ $asuransi->a_asuransi_pic->nama }}" disabled>

                                                <label for="">Alamat Perusahaan</label>
                                                <textarea class="form-control" name="pic_asuransi_alamat_perusahaan" rows="5" name="pic_asuransi_alamat" disabled>{{ $asuransi->a_asuransi_pic->alamat_perusahaan }}</textarea>
                                                
                                                <label for="">No Telepon Perusahaan</label>
                                                <input class="form-control" type="text" name="pic_asuransi_telepon_perusahaan" value="{{ $asuransi->a_asuransi_pic->telepon_perusahaan }}" disabled>

                                                <label for="">No Telepon Pribadi</label>
                                                <input class="form-control" type="text" name="pic_asuransi_telepon_pribadi" value="{{ $asuransi->a_asuransi_pic->telepon_pribadi }}" disabled>
                                                
                                                <label for="">Email Perusahaan</label>
                                                <input class="form-control" type="text" name="pic_asuransi_email_perusahaan" value="{{ $asuransi->a_asuransi_pic->email_perusahaan }}" disabled>
                                                
                                                <label for="">Email Pribadi</label>
                                                <input class="form-control" type="text" name="pic_asuransi_email_pribadi" value="{{ $asuransi->a_asuransi_pic->email_pic }}" disabled>

                                                <label for="">Portofolio Perusahaan / Penawaran / Pamflet Produk</label>
                                                    @if($asuransi->a_asuransi_dokumen->count() > 0)
                                                        @for ($loop=0 ; $loop < $asuransi->a_asuransi_dokumen->count() ; $loop++)
                                                            @if($asuransi->a_asuransi_dokumen[$loop]->nama == "dok_asuransi_pic")
                                                                <div class="col-md-3">
                                                                    <embed src="{{ $asuransi->a_asuransi_dokumen[$loop]->path }}" type="" width="300px" id="link1">
                                                                </div>
                                                            @endif
                                                        @endfor
                                                    
                                                        <input type="file" name="dok_asuransi_pic[]" multiple class="form-control" id="file1" hidden>
                                                    @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-3 mb-3">
                            <div class="card-footer">
                                <input type="hidden" name="a_asuransi_id" value="{{ $asuransi->id }}">
                                <input type="hidden" name="a_asuransi_pic_id" value="{{ $asuransi->a_asuransi_pic->id }}">
                                <input type="submit" name="aksi" value="Rubah" class="btn btn-primary" hidden id="tombol-save">
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

<script>
    function changeAtribute(){
        if(document.getElementById("tombol").innerHTML == "Rubah"){
            document.getElementById("tombol").innerHTML="Batal";
            for(var i=0; i<document.getElementsByClassName("form-control").length; i++){
                document.getElementsByClassName("form-control")[i].disabled = false;
            }
            
            for(var y=0; y<document.querySelectorAll("#file1").length; y++){
                document.querySelectorAll("#file1")[y].hidden = false;
            }
            for(var z=0; z<document.querySelectorAll("#link1").length; z++){
                document.querySelectorAll("#link1")[z].hidden = true;
            }

            document.getElementById("tombol-save").hidden = false;
            document.getElementById("perusahaan1").disabled = true;
            document.getElementById("perusahaan").disabled = true;


        }else{
            document.getElementById("tombol").innerHTML="Rubah";
            for(var i=0; i<document.getElementsByClassName("form-control").length; i++){
                document.getElementsByClassName("form-control")[i].disabled = true;
            }
            for(var y=0; y<document.querySelectorAll("#file1").length; y++){
                document.querySelectorAll("#file1")[y].hidden = true;
            }
            for(var z=0; z<document.querySelectorAll("#link1").length; z++){
                document.querySelectorAll("#link1")[z].hidden = false;
            }

            document.getElementById("tombol-save").hidden = true;            
        }
    }
</script>

@endsection

