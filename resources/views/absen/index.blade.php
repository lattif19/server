
@extends('layout.main')
@include('absen.sidebar.menu')

@section('container')
        <div class="container-fluid px-4">
            <h1 class="mt-4">{{ $title }}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">PT Sumber Segara Primadaya</li>
            </ol>
            
            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <form action="/absen/store" method="post"></form>
                            <input type="file" name="absensi" class="btn btn-lg btn-default">
                            <button class="btn btn-primary" type="submit">Upload</button>
                        </div>
                        <div class="card-body">
                            table
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

