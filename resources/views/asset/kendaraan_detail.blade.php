
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
                            <img class="card-img-top" src="/img/mobil/direksi/mobil.png" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text"><center> <strong>{{ $mobil[0]->nama }}</strong></center></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-3 bg-info">
                        <div class="card">
                            <div class="card-header">
                                <h5>Informasi Asuransi</h5>
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
                                        <strong>
                                            {{ $mobil[0]->nama }}
                                        </strong>
                                        @else
                                            <input type="text" name="nama" value="{{ $mobil[0]->nama }}" class="form-control">
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>Nomor Polisi</td>
                                    <td>:</td>
                                    <td>
                                        @if(request()->aksi == "detail")
                                        <strong>
                                            {{ $mobil[0]->no_polisi }}
                                        </strong>
                                        @else
                                            <input type="text" name="no_polisi" value="{{ $mobil[0]->no_polisi }}" class="form-control">
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>No Rangka</td>
                                    <td>:</td>
                                    <td>
                                        @if(request()->aksi == "detail")
                                        <strong>
                                            {{ $mobil[0]->no_rangka }}
                                        </strong>
                                        @else
                                            <input type="text" name="no_rangka" value="{{ $mobil[0]->no_rangka }}" class="form-control">
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>No Mesin</td>
                                    <td>:</td>
                                    <td>
                                        @if(request()->aksi == "detail")
                                        <strong>
                                            {{ $mobil[0]->no_mesin }}
                                        </strong>
                                        @else
                                            <input type="text" name="no_mesin" value="{{ $mobil[0]->no_mesin }}" class="form-control">
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>Tanggal Pembelian</td>
                                    <td>:</td>
                                    <td>
                                        @if(request()->aksi == "detail")
                                        <strong>
                                            {{ $mobil[0]->tanggal_pembelian }}
                                        </strong>
                                        @else
                                            <input type="date" name="tanggal_pembelian" value="{{ $mobil[0]->tanggal_pembelian }}" class="form-control">
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>Driver PIC</td>
                                    <td>:</td>
                                    <td>
                                        @if(request()->aksi == "detail")
                                        <strong>
                                            {{ $mobil[0]->user->pegawai->nama }}
                                        </strong>
                                        @else
                                            <select name="user_id" class="form-control">
                                                @foreach ($pegawai as $p)
                                                    <option value="{{ $p->user_id }}" @if($mobil[0]->user->pegawai->user_id == $p->user_id) selected @endif>{{ $p->nama }}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>Keterangan</td>
                                    <td>:</td>
                                    <td>
                                        @if(request()->aksi == "detail")
                                        <strong>
                                            {{ $mobil[0]->keterangan }}
                                        </strong>
                                        @else
                                            <textarea name="keterangan" rows="5" class="form-control">{{ $mobil[0]->keterangan }}</textarea>
                                        @endif
                                    </td>
                                </tr>

                            </table>
                            
                            
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
                        <div class="card-header">
                            <h5>Riwayat Service</h5>
                        </div>
                        <div class="card-body">
                            Tampil Riwayat Service dari mobil ini
                        </div>
                    </div>
                </div>

            </div>
        </div>
@endsection

