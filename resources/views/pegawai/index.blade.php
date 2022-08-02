
@extends('layout.main')
@include('pegawai.sidebar.menu')

@section('container')
        <div class="container-fluid px-4">
            <h1 class="mt-4">Pegawai</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Daftar Pegawai PT Sumber Segara Primadaya</li>
            </ol>


            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-2">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            Pegawai
                        </div>
                        <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                    </div>
                </div>
            </div>
        </div>
@endsection

