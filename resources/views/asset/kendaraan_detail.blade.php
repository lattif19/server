
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
                <div class="col-lg-3">
                    <div class="card">
                        <img class="card-img-top" src="/img/mobil/direksi/mobil.png" alt="Card image cap">
                        <div class="card-body">
                          <p class="card-text"><center> <strong>{{ $mobil[0]->nama }}</strong></center></p>
                        </div>
                      </div>
                </div>


                <div class="col-lg-9">
                    <div class="nav card">
                        <div class="nav card-header d-flex justify-content-between">
                            <span><h3>Informasi</h3></span>
                            <span>
                                @if(request()->aksi == "detail")
                                    <a href="/kendaraan/{{ request()->no_polisi }}/edit">
                                        <div class="btn btn-info">Rubah</div>
                                    </a>
                                @else
                                    <a href="/kendaraan/{{ request()->no_polisi }}/detail">
                                        <div class="btn btn-dark text-light">Batal</div>
                                    </a>
                                @endif
                            </span>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <td style="width:300px">Nama</td>
                                    <td style="width:30px">:</td>
                                    <td>
                                        @if(request()->aksi == "detail")
                                            {{ $mobil[0]->nama }}
                                        @else
                                            <input type="text" name="nama" value="{{ $mobil[0]->nama }}" class="form-control">
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>Nomor Polisi</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td>No Rangka</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td>No Mesin</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td>Tanggal Pembelian</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td>Tanggal Pembelian</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td>Keterangan</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>

                            </table>
                            
                            
                        </div>
                    </div>
                </div>


                <div class="col-lg-9">
                Riwayat Service
                </div>
                
            </div>
        </div>
@endsection

