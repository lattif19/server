
@extends('layout.main')
@include('lembur.sidebar.menu')

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
                            <h5> Pengaturan Approver Lembur </h5>
                        </div>
                        <div class="card-body">
                           <table class="table">
                                <thead>
                                    <tr>
                                        <td>Nomor</td>
                                        <td>Nama Pegawai</td>
                                        <td>Nama Manager / Approver</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $i)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ $i->nama }}</td>
                                            <td>{{ $i->lembur_approve_id }}</td>
                                            <td>Rubah</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                           </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
@endif
@if(session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
@endif
@endsection

