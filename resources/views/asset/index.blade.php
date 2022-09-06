
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
                <hr class="mt-3 mb-3">
                <h5>Kategori Kendaraan</h5>
                @foreach ($jenis as $i)
                    <div class="col-xl-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h2 align="center">{{ $i->nama }}</h2>
                            </div>
                            <div class="card-body">
                                <div>
                                    <strong>
                                        <a href="/kendaraan/mobil?jenis={{ Str::slug($i->nama) }}">
                                            <h1 align="center" style="font-size: 100px">{{ $i->akendaraan->count() }}</h1>
                                        </a>
                                    </strong>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
@endsection

