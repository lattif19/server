
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


                <div class="col-lg-12">
                    <div class="nav card">
                        <div class="nav card-header d-flex justify-content-between">
                            <span><h5>Informasi Detail Service  </h5></span>
                            <span>
                                <button onclick="changeAtribute()" id="tombol" class="btn btn-dark text-light">Rubah</button>
                            </span>
                        </div>
                        <div class="card-body">
                            <form action="/kendaraan/service/aksi" id="form-mobil-atas" method="POST" enctype="multipart/form-data">
                                @csrf
                                <table class="table">
                                    <tr>
                                        <td style="width:300px">Nama Bengkel</td>
                                        <td style="width:30px">:</td>
                                        <td>
                                            {{ $service[0]->nama_bengkel }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Jenis Service</td>
                                        <td>:</td>
                                        <td>
                                            {{ $service[0]->a_jenis_service->nama }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Status Perbaikan</td>
                                        <td>:</td>
                                        <td>
                                            {{ $service[0]->a_status_perbaikan->nama }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Tanggal Masuk Bengkel</td>
                                        <td>:</td>
                                        <td>
                                            {{ $service[0]->tanggal_masuk }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Tanggal Selesai Perbaikan</td>
                                        <td>:</td>
                                        <td>
                                            {{ $service[0]->tanggal_keluar }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Estimasi Biaya (saat booking)</td>
                                        <td>:</td>
                                        <td>
                                            {{ $service[0]->estimasi }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Biaya Service Sebenarnya</td>
                                        <td>:</td>
                                        <td>
                                            {{ $service[0]->biaya }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Bukti Pembayaran</td>
                                        <td>:</td>
                                        <td>
                                            <span id="file1">
                                                <input id="file1" type="file" name="service_pembayaran[]" multiple class="form-control" hidden>
                                            </span>
                                            <span id="link1">
                                                @if($dok_pembayaran->count() > 0)
                                                @foreach($dok_pembayaran as $i)
                                                <span class="mt-1 mb-1 bordered">
                                                    <embed src="{{ $i->path }}" type="">
                                                </span>
                                                <br>
                                                @endforeach
                                                @else
                                                -- Tidak Ada Data --
                                                @endif
                                            </span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Foto Kerusakan / Sebelum Service</td>
                                        <td>:</td>
                                        <td>
                                        <span id="file1">
                                            <input id="file1" type="file" name="service_kerusakan[]" multiple class="form-control" hidden>
                                        </span>
                                        <span id="link1">

                                            @if($dok_kerusakan->count() > 0)
                                            @foreach($dok_kerusakan as $i)
                                            <span class="mt-1 mb-1 bordered">
                                                <embed src="{{ $i->path }}" type="">
                                            </span>
                                            <br>
                                            @endforeach
                                            @else
                                            -- Tidak Ada Data --
                                            @endif
                                        </span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Foto Perbaikan / Setelah Service</td>
                                        <td>:</td>
                                        <td>
                                            <span id="file1">
                                                <input id="file1" type="file" name="service_perbaikan[]" multiple class="form-control" hidden>
                                            </span>
                                            <span id="link1">

                                                @if($dok_perbaikan->count() > 0)
                                                @foreach($dok_perbaikan as $i)
                                                <span class="mt-1 mb-1 bordered">
                                                    <embed src="{{ $i->path }}" type="">
                                                </span>
                                                <br>
                                                @endforeach
                                                @else
                                                -- Tidak Ada Data --
                                                @endif
                                            </span>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>Keterangan</td>
                                        <td>:</td>
                                        <td>
                                            <textarea name="keterangan" rows="5" class="form-control" disabled></textarea>    
                                        </td>
                                    </tr>

                                    <tfoot id="tombol-save" hidden class="mt-3">
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>
                                                <input type="hidden" name="a_service_perbaikan_id" value="">
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

