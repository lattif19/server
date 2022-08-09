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
                            <button class="btn btn-default">Pilih Periode</button>
                        </div>
                        <div class="card-body">
                            <h2 class="success"> Development In Progress !!</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection