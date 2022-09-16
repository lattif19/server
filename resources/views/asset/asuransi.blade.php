
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
                    <div class="nav card">
                        <div class="nav card-header d-flax justify-content-between">
                            <a href="/kendaraan/asuransi/tambah_data_asuransi">
                                <button class="btn btn-dark text-light"> Tambah Data Asuransi</button>
                            </a>
                            <form action="/kendaraan/asuransi">
                                <input type="search" name="cari" value="{{ request()->cari }}">
                                <button type="submit" class="bnt btn-sm btn-dark">Cari</button>
                            </form>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>No Polisi</td>
                                        <td>Nama Kendaraan</td>
                                        <td>Nama Asuransi</td>
                                        <td>Jenis Asuransi</td>
                                        <td>Jenis Premi</td>
                                        <td>Biaya Premi</td>
                                        <td>Nama PIC</td>
                                        <td>Perusahaan Asuransi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($asuransi as $i)    
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>
                                                <a href="/kendaraan/{{ $i->a_kendaraan->no_polisi }}/detail">
                                                    <strong>
                                                        {{ $i->a_kendaraan->no_polisi }}
                                                    </strong>
                                                </a>
                                            </td>
                                            <td>{{ $i->a_kendaraan->nama }}</td>
                                            <td>
                                                <a href="/kendaraan/asuransi/detail/{{ $i->id }}">
                                                    <strong>
                                                        {{ $i->nama_asuransi }}
                                                    </strong>
                                                </a>
                                            
                                            </td>
                                            <td>{{ $i->a_jenis_asuransi->nama }}</td>
                                            <td>{{ $i->a_jenis_premi->nama }}</td>
                                            <td>{{ $i->biaya_premi }}</td>
                                            <td>{{ $i->a_asuransi_pic->nama }}</td>
                                            <td>{{ $i->a_asuransi_pic->perusahaan }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
@endsection

