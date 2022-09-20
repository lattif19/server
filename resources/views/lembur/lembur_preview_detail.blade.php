
@extends('layout.main')
@include('lembur.sidebar.menu')

@section('container')
        <div class="container-fluid px-4">
            <h1 class="mt-4">{{ $title }}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">PT Sumber Segara Primadaya</li>
            </ol>

            {{-- <div class="row"> --}}
                <div class="content">
                    <div class="box">
                        <div class="box-header">
                            <h5> Pengajuan Lembur Hari Biasa </h5>
                        </div>
                        
                        <div class="box-body table-respom">
                            
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td width="10px">No</td>
                                        <td width="90px">Tanggal</td>
                                        <td width="200px">Keterangan / Deskripsi</td>
                                        <td width="60px">Jam Masuk</td>
                                        <td width="60px">Jam Pulang <br> Standar</td>
                                        <td width="60px">Jam Pulang <br> Sebenarnya</td>
                                        <td width="60px">Waktu <br> Lembur</td>
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
                            <div class="box-header">
                                <h5> Pengajuan Lembur Libur </h5>
                            </div>
                            
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td width="10px">No</td>
                                        <td width="90">Tanggal</td>
                                        <td width="200px">Keterangan</td>
                                        <td width="60">Jam Masuk</td>
                                        {{-- <td>Jam Pulang Standar</td> --}}
                                        <td width="60">Jam Pulang Sebenarnya</td>
                                        <td width="60">Jumlah <br> Lembur</td>
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
                                            <td width="100px">{{ format_jam($d->jam_masuk) }}</td>
                                            {{-- <td>{{ format_jam($d->jam_pulang_standar) }}</td> --}}
                                            <td width="100px">{{ format_jam($d->jam_pulang) }}</td>
                                            <td width="100px">{{ format_jam($d->jam_lembur) }}</td>
                                            <div hidden>{{ $total_lembur_libur = $d->total_libur }} {{ $nomor_libur++ }}</div>
                                        </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        {{-- <td colspan="6">Total</td> --}}
                                        <td colspan="5">Total</td>
                                        <td>{{ format_jam($total_lembur_libur) }}</td>
                                    </tr>
                                </tfoot>
                            </table>


                        </div>
                    </div>
               </div>
            {{-- </div> --}}
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

