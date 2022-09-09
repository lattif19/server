
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
                <div class="col-lg-9">
                    <div class="nav card">
                        <div class="nav card-header d-flex justify-content-between">
                            <span><h5>Detail Mobil</h5></span>
                        </div>
                        <div class="card-body">
                            <form action="" id="form-mobil-atas">
                                <table class="table">
                                    <tr>
                                        <td style="width:300px">Nama</td>
                                        <td style="width:30px">:</td>
                                        <td>
                                            <input type="text" name="nama" class="form-control" >
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Nomor Polisi</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" name="no_polisi" class="form-control" >
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Tipe Kendaraan</td>
                                        <td>:</td>
                                        <td>
                                            <select name="a_jenis_kendaraan_id" class="form-control" >
                                                <option value="" selected>-- Pilih Satu --</option> 
                                                @foreach ($a_jenis_kendaraan as $i)
                                                <option value="{{ $i->id }}"> {{ $i->nama }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>No Rangka</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" name="no_rangka" class="form-control" >
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>No Mesin</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" name="no_mesin" class="form-control" >
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Tanggal Pembelian</td>
                                        <td>:</td>
                                        <td>
                                            <input type="date" name="tanggal_pembelian" class="form-control" >
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Driver PIC</td>
                                        <td>:</td>
                                        <td>
                                            <select name="user_id" class="form-control" >
                                                <option value="" selected>-- Pilih Satu --</option> 
                                                @foreach ($pegawai as $p)
                                                    <option value="{{ $p->user_id }}">{{ $p->nama }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>File STNK</td>
                                        <td>:</td>
                                        <td>
                                            <input type="file" name="mobil_stnk" class="form-control" id="file1">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>File BPKB</td>
                                        <td>:</td>
                                        <td>
                                            <input type="file" name="mobil_bpkb" class="form-control" id="file1">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Keterangan</td>
                                        <td>:</td>
                                        <td>
                                            <textarea name="keterangan" rows="5" class="form-control" ></textarea>    
                                        </td>
                                    </tr>

                                    <tfoot id="tombol-save"  class="mt-3">
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>
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

        <script>
            function changeAtribute(){
                if(document.getElementById("tombol").innerHTML == "Rubah"){
                    document.getElementById("tombol").innerHTML="Batal";
                    for(var i=0; i<document.getElementsByClassName("form-control").length; i++){
                        document.getElementsByClassName("form-control")[i]. = false;
                    }
                    
                    for(var y=0; y<document.querySelectorAll("#file1").length; y++){
                        document.querySelectorAll("#file1")[y]. = false;
                    }
                    for(var z=0; z<document.querySelectorAll("#link1").length; z++){
                        document.querySelectorAll("#link1")[z]. = true;
                    }

                    document.getElementById("tombol-save"). = false;


                }else{
                    document.getElementById("tombol").innerHTML="Rubah";
                    for(var i=0; i<document.getElementsByClassName("form-control").length; i++){
                        document.getElementsByClassName("form-control")[i]. = true;
                    }
                    for(var y=0; y<document.querySelectorAll("#file1").length; y++){
                        document.querySelectorAll("#file1")[y]. = true;
                    }
                    for(var z=0; z<document.querySelectorAll("#link1").length; z++){
                        document.querySelectorAll("#link1")[z]. = false;
                    }

                    document.getElementById("tombol-save"). = true;
                    
                }

            }
        </script>
@endsection

