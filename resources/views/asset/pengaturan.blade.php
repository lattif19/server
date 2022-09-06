
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
                            df
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>Nama Kendaraan</td>
                                        <td>No Polisi</td>
                                        <td>PIC</td>
                                        <td>Kategori Kendaraan</td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
@endsection

