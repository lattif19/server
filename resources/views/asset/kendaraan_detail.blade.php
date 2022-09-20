
@extends('layout.main')
@include('asset.sidebar.menu')

@section('container')
        <style>
            a{
                text-decoration: none;
            }
            tr{
                height: 60px;
                vertical-align: middle;
            }
        </style>
        <div class="container-fluid px-4">
            <h1 class="mt-4">{{ $title }}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">{{ $sub_title }}</li>
            </ol>

            <div class="row">
                <div class="col-lg-3">

                    <div class="col-md-12">
                        <div class="card">                         
                            @if($dokumen_foto)
                                <embed src="{{ $dokumen_foto->path }}" type="">
                            @else
                            <img class="card-img-top" src="/img/mobil/direksi/mobil.png" alt="Card image car">
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12 mt-3 bg-info">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h5>Informasi Asuransi</h5>
                                <a href="/kendaraan/asuransi/tambah_data_asuransi?mobil={{ $mobil[0]->id }}">
                                    <button class="btn btn-sm btn-dark text-light">Tambah</button>
                                </a>
                            </div>
                            <div class="card-body">
                                Tampil data disini
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-3 bg-info">
                        <div class="card">
                            <div class="card-header">
                                <h5>Informasi Pajak</h5>
                            </div>
                            <div class="card-body">
                                Tampil data disini
                            </div>
                        </div>
                    </div>

                </div>


                <div class="col-lg-9">
                    <div class="nav card">
                        <div class="nav card-header d-flex justify-content-between">
                            <span><h5>Informasi</h5></span>
                            <span>
                                <button onclick="changeAtribute()" id="tombol" class="btn btn-dark text-light">Rubah</button>
                            </span>
                        </div>
                        <div class="card-body">
                            <form action="/kendaraan/mobil/update" id="form-mobil-atas" method="POST" enctype="multipart/form-data">
                                @csrf
                                <table class="table">
                                    <tr>
                                        <td style="width:300px">Nama</td>
                                        <td style="width:30px">:</td>
                                        <td>
                                            <input type="text" name="nama" value="{{ $mobil[0]->nama }}" class="form-control" disabled>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Nomor Polisi</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" name="no_polisi" value="{{ $mobil[0]->no_polisi }}" class="form-control" disabled>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Tipe Kendaraan</td>
                                        <td>:</td>
                                        <td>
                                            <select name="a_jenis_kendaraan_id" class="form-control" disabled>
                                                @foreach ($a_jenis_kendaraan as $i)
                                                <option value="{{ $i->id }}" @if($mobil[0]->a_jenis_kendaraan->id == $i->id) selected @endif> {{ $i->nama }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>No Rangka</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" name="no_rangka" value="{{ $mobil[0]->no_rangka }}" class="form-control" disabled>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>No Mesin</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" name="no_mesin" value="{{ $mobil[0]->no_mesin }}" class="form-control" disabled>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Tanggal Pembelian</td>
                                        <td>:</td>
                                        <td>
                                            <input type="date" name="tanggal_pembelian" value="{{ $mobil[0]->tanggal_pembelian }}" class="form-control" disabled>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Driver PIC</td>
                                        <td>:</td>
                                        <td>
                                            <select name="user_id" class="form-control" disabled>
                                                @foreach ($pegawai as $p)
                                                    <option value="{{ $p->user_id }}" @if($mobil[0]->user->pegawai->user_id == $p->user_id) selected @endif>{{ $p->nama }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>File STNK</td>
                                        <td>:</td>
                                        <td>
                                            <input type="file" name="mobil_stnk" class="form-control" hidden id="file1">
                                            <span id="link1">
                                                @if($dokumen_stnk)
                                                    <a href="{{ $dokumen_stnk->path }}">
                                                        {{ $dokumen_stnk->nama }}
                                                    </a>
                                                @else
                                                -- Belum Ada Data --
                                                @endif
                                            </span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>File BPKB</td>
                                        <td>:</td>
                                        <td>
                                            <input type="file" name="mobil_bpkb" class="form-control" hidden id="file1">
                                            <span id="link1">
                                                @if($dokumen_bpkb)
                                                    <a href="{{ $dokumen_bpkb->path }}">
                                                        {{ $dokumen_bpkb->nama }}
                                                    </a>
                                                @else
                                                -- Belum Ada Data --
                                                @endif
                                            </span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>File Foto</td>
                                        <td>:</td>
                                        <td>
                                            <input type="file" name="mobil_foto" class="form-control" hidden id="file1">
                                            <span id="link1">
                                                @if($dokumen_foto)
                                                    <a href="{{ $dokumen_foto->path }}">
                                                        {{ $dokumen_foto->nama }}
                                                    </a>
                                                @else
                                                -- Belum Ada Data --
                                                @endif
                                            </span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Keterangan</td>
                                        <td>:</td>
                                        <td>
                                            <textarea name="keterangan" rows="5" class="form-control" disabled>{{ $mobil[0]->keterangan }}</textarea>    
                                        </td>
                                    </tr>

                                    <tfoot id="tombol-save" hidden class="mt-3">
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>
                                                <input type="hidden" name="kendaraan_id" value="{{ $mobil[0]->id }}">
                                                <button type="submit" class="btn btn-info btn-lg">Simpan</button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                        </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mt-3">
                <div class="col-lg-3">
                    &nbsp;
                </div>

                <div class="col-lg-9">
                    <div class="card">
                        <div class="nav card-header d-flex justify-content-between">
                            <h5>Riwayat Service</h5>
                            <span>
                                <a href="/kendaraan/service/s/{{ $mobil[0]->no_polisi }}/tambah">
                                    <button class="btn btn-dark text-light">Ajukan Service</button>
                                </a>
                            </span>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>No</td>
                                        <td>Nama Bengkel</td>
                                        <td>Tanggal</td>
                                        <td>Biaya Service</td>
                                        <td>Status Perbaikan</td>
                                        <td>Keterangan</td>
                                    </tr>

                                    @foreach($riwayat_service as $i)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>
                                                <a href="/kendaraan/service/{{ $i->id }}/detail">
                                                    <strong>
                                                        {{ $i->nama_bengkel }}
                                                    </strong>
                                                </a>
                                            </td>
                                            <td>{{ $i->tanggal_masuk }}</td>
                                            <td>{{ $i->biaya }}</td>
                                            <td>{{ $i->a_status_perbaikan->nama }}</td>
                                            <td>{{ $i->keterangan }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>

                                
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

@if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
@endif
@if(session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
@endif


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

