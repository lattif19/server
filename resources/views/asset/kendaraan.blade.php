
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
                            <span>
                                <a href="/kendaraan/mobil/tambah">
                                    <button class="btn btn-sm btn-dark text-light">Tambah</button>
                                </a>
                            </span>
                            <span>
                                <form action="/kendaraan/mobil">
                                    <input type="search" name="jenis" value="{{ request()->jenis }}">
                                    <button type="submit" class="bnt btn-sm btn-dark">Cari</button>
                                </form>
                            </span>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Nama Kendaraan</td>
                                        <td>No Polisi</td>
                                        <td>PIC Driver</td>
                                        <td>Kategori Kendaraan</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mobil as $i)
                                        <tr>
                                            <td>{{ $mobil->firstItem() + $loop->index }}</td>
                                            <td>
                                                <a href="/kendaraan/{{ $i->no_polisi }}/detail">
                                                    {{ $i->nama }}
                                                </a>
                                            </td>
                                            <td>{{ $i->no_polisi }}</td>
                                            <td>{{ $i->user->pegawai->nama }}</td>
                                            <td>{{ $i->a_jenis_kendaraan->nama }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4">{{ $mobil->withQueryString()->links() }}</td>
                                    </tr>
                                </tfoot>
                                
                            </table>
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
@endsection

