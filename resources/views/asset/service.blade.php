
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
                        <div class="card-header">
                            <form action="/kendaraan/service">
                                <input type="search" name="cari" value="{{ request()->cari }}">
                                <button type="submit" class="bnt btn-sm btn-dark">Cari</button>
                            </form>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Nama Mobil</td>
                                        <td>No Polisi</td>
                                        <td>Nama Bengkel</td>
                                        <td>Biaya Service</td>
                                        <td>Driver PIC</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- {{ dd($service) }} --}}
                                    @foreach ($service as $i)
                                    <tr>
                                        <td>{{ $service->firstItem() + $loop->index }}</td>
                                        <td>{{ $i->a_kendaraan->nama }}</td>
                                        <td>{{ $i->a_kendaraan->no_polisi }}</td>
                                        <td>{{ $i->nama_bengkel }}</td>
                                        <td>{{ $i->biaya }}</td>
                                        <td>{{ $i->nama }}</td>
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

