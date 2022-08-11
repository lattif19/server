
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
                    <div class="card mb-4 col-lg-2">
                        <button class="btn btn-primary btn-lg">Hitung Pengajuan
                        </button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5> Pengajuan Lembur Hari Biasa </h5>
                        </div>
                        <div class="card-body">
                           <table class="table">
                                <thead align="center">
                                    <tr>
                                        <td width="10px">NO</td>
                                        <td>Tanggal</td>
                                        <td>Keterangan / Deskripsi</td>
                                        <td>Jam Masuk</td>
                                        <td>Jam Pulang Standar</td>
                                        <td>Jam Pulang Sebenarnya</td>
                                        <td>Waktu Lembur</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jam_lembur as $d)
                                        @if ($d->hari_libur == 0)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $d->tanggal }}</td>
                                                <td>{{ $d->keterangan }}</td>
                                                <td>{{ $d->jam_masuk }}</td>
                                                <td>{{ $pengaturan_jam->jam_kerja }}+ Waktu Kerja</td>
                                                <td>{{ $d->jam_pulang }}</td>
                                                <td>{{ $d->jam_pulang }} - Jam Pulang Standar</td>
                                            </tr>
                                        @endif  
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6">Total</td>
                                        <td>Total Lembur</td>
                                    </tr>
                                </tfoot>
                           </table>
                        </div>
                    </div>
                </div>



                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5> Pengajuan Lembur Libur </h5>
                        </div>
                        <div class="card-body">
                           <table class="table">
                                <thead align="center">
                                    <tr>
                                        <td width="10px">NO</td>
                                        <td>Tanggal</td>
                                        <td>Keterangan / Deskripsi</td>
                                        <td>Jam Masuk</td>
                                        <td>Jam Pulang Standar</td>
                                        <td>Jam Pulang Sebenarnya</td>
                                        <td>Waktu Lembur</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jam_lembur as $d)
                                        @if ($d->hari_libur == 1)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $d->tanggal }}</td>
                                                <td>{{ $d->keterangan }}</td>
                                                <td>{{ $d->jam_masuk }}</td>
                                                <td>Jam Masuk + Waktu Kerja</td>
                                                <td>{{ $d->jam_pulang }}</td>
                                                <td>Jam Pulang - Jam Pulang Standar</td>
                                                <td>Rubah</td>
                                            </tr>
                                        @endif  
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

