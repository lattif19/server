
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
                            <button class="btn btn-primary">Persetujuan</button>
                        </div>
                        <div class="card-body">
                            <h5> Pengajuan Lembur Hari Biasa </h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Tanggal</td>
                                        <td>Keterangan</td>
                                        <td>Jam Masuk</td>
                                        <td>Jam Pulang Standar</td>
                                        <td>Jam Pulang Sebenarnya</td>
                                        <td>Jumlah Lembur</td>
                                    </tr>
                                </thead>
                                    <tbody>
                                        <div hidden> {{ $total_lembur_biasa=0 }} {{ $nomor_biasa =1 }}</div>
                                        @foreach ($detail as $d)
                                        @if($d->hari_libur == 0)
                                            <tr>
                                                <td>{{ $nomor_biasa }}</td>
                                                <td>{{ tanggl_id($d->tanggal) }}</td>
                                                <td>{{ $d->keterangan }}</td>
                                                <td>{{ format_jam($d->jam_masuk) }}</td>
                                                <td>{{ format_jam($d->jam_pulang_standar) }}</td>
                                                <td>{{ format_jam($d->jam_pulang) }}</td>
                                                <td>{{ format_jam($d->jam_lembur) }}</td>
                                                <div hidden>{{ $total_lembur_biasa = $d->total_biasa }} {{ $nomor_biasa++ }}</div>
                                            </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="6">Total</td>
                                            <td>{{ format_jam($total_lembur_biasa) }}</td>
                                        </tr>
                                    </tfoot>
                            </table>
                            
                            

                            <hr class="mt-5 mb-5">

                            <h5> Pengajuan Lembur Libur </h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Tanggal</td>
                                        <td>Keterangan</td>
                                        <td>Jam Masuk</td>
                                        <td>Jam Pulang Standar</td>
                                        <td>Jam Pulang Sebenarnya</td>
                                        <td>Jumlah Lembur</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <div hidden> {{ $total_lembur_libur=0 }} {{ $nomor_libur =1 }}</div>
                                    @foreach ($detail as $d)
                                    @if($d->hari_libur == 1)
                                        <tr>
                                            <td>{{ $nomor_libur }}</td>
                                            <td>{{ tanggl_id($d->tanggal) }}</td>
                                            <td>{{ $d->keterangan }}</td>
                                            <td>{{ format_jam($d->jam_masuk) }}</td>
                                            <td>{{ format_jam($d->jam_pulang_standar) }}</td>
                                            <td>{{ format_jam($d->jam_pulang) }}</td>
                                            <td>{{ format_jam($d->jam_lembur) }}</td>
                                            <div hidden>{{ $total_lembur_libur = $d->total_libur }} {{ $nomor_libur++ }}</div>
                                        </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6">Total</td>
                                        <td>{{ format_jam($total_lembur_libur) }}</td>
                                    </tr>
                                </tfoot>
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

