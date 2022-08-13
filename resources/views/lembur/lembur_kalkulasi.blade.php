
@extends('layout.main')
@include('lembur.sidebar.menu')

@section('container')
        <div class="container-fluid px-4">
            <h1 class="mt-4">{{ $title }}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">PT Sumber Segara Primadaya</li>
            </ol>




        <form action="/lembur/calculated/" method="post">@csrf
            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-4 col-lg-2">
                        <button class="btn btn-primary btn-lg">Proses Pengajuan
                        <input type="hidden" name="lembur_pengajuan_periode" value="{{ $title }}">
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
                           <table class="table table-bordered mb-5">
                                <thead align="center" class="table-dark">
                                    <tr>
                                        <td width="10px">No</td>
                                        <td>Tanggal</td>
                                        <td>Keterangan / Deskripsi</td>
                                        <td>Jam Masuk</td>
                                        <td>Jam Pulang Standar</td>
                                        <td>Jam Pulang Sebenarnya</td>
                                        <td>Waktu Lembur</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <div hidden>{{ $total_lembur = 0; }}</div>
                                    @foreach ($jam_lembur as $d)
                                        @if ($d->hari_libur == 0)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ tanggl_id($d->tanggal) }}</td>
                                                <td>{{ $d->keterangan }}</td>

                                                <td>{{ format_jam($d->jam_masuk) }}</td>
                                                <td>{{ $jam_standar = jam_pulang_standar($d->jam_masuk, $pengaturan_jam->jam_masuk, $pengaturan_jam->jam_kerja) }}</td>
                                                <td>{{ format_jam($d->jam_pulang) }}</td>
                                                <td>{{ $jum_jam_lembur = jumlah_lembur($d->jam_pulang, $jam_standar) }}</td>


                                                <input type="hidden" name="hari_libur[]" value="{{ $d->hari_libur }}">
                                                <input type="hidden" name="tanggal[]" value="{{ $d->tanggal }}">
                                                <input type="hidden" name="jam_masuk_kantor[]" value="{{ $pengaturan_jam->jam_masuk }}">
                                                <input type="hidden" name="jam_kerja_kantor[]" value="{{ $pengaturan_jam->jam_kerja }}">
                                                <input type="hidden" name="jam_masuk[]" value="{{ $d->jam_masuk }}">
                                                <input type="hidden" name="jam_pulang[]" value="{{ $d->jam_pulang }}">
                                                <input type="hidden" name="jam_pulang_standar[]" value="{{ $jam_standar.":00" }}">
                                                <input type="hidden" name="jam_lembur[]" value="{{ $jum_jam_lembur.":00" }}">
                                                
                                            </tr>
                                            <div hidden>{{ $total_lembur += to_menit($jum_jam_lembur) }}</div>
                                            @endif 
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6">Total</td>
                                        <td class="bg-info">
                                            {{ $total_lembur_biasa = menit_to_jam($total_lembur) }}
                                            <input type="hidden" name="total_biasa" value="{{ $total_lembur_biasa.":00" }}">
                                        </td>
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
                           <table class="table mb-5">
                                <thead align="center" class="table-dark">
                                    <tr>
                                        <td width="10px">No</td>
                                        <td>Tanggal</td>
                                        <td>Keterangan / Deskripsi</td>
                                        <td>Jam Masuk</td>
                                        <td>Jam Pulang Sebenarnya</td>
                                        <td>Waktu Lembur</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <div hidden>{{ $total_libur = 0; }}</div>
                                    @foreach ($jam_lembur as $d)
                                        @if ($d->hari_libur == 1)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ tanggl_id($d->tanggal) }}</td>
                                                <td>{{ $d->keterangan }}</td>
                                                <td>{{ format_jam($d->jam_masuk) }}</td>
                                                <td>{{ format_jam($d->jam_pulang) }}</td>
                                                <td>{{ $jum_jam_lembur = jumlah_lembur($d->jam_pulang, $d->jam_masuk) }}</td>
                                                
                                                <input type="hidden" name="hari_libur[]" value="{{ $d->hari_libur }}">
                                                <input type="hidden" name="tanggal[]" value="{{ $d->tanggal }}">
                                                <input type="hidden" name="jam_masuk_kantor[]" value="{{ $pengaturan_jam->jam_masuk }}">
                                                <input type="hidden" name="jam_kerja_kantor[]" value="{{ $pengaturan_jam->jam_kerja }}">
                                                <input type="hidden" name="jam_masuk[]" value="{{ $d->jam_masuk }}">
                                                <input type="hidden" name="jam_pulang[]" value="{{ $d->jam_pulang }}">
                                                <input type="hidden" name="jam_pulang_standar[]" value="{{ "00:00:00" }}">
                                                <input type="hidden" name="jam_lembur[]" value="{{ $jum_jam_lembur.":00" }}">



                                            </tr>
                                            <div hidden>{{ $total_libur += to_menit($jum_jam_lembur) }}</div>
                                            @endif 
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5">Total</td>
                                        <td class="bg-info">
                                            {{ $total_lembur_libur = menit_to_jam($total_libur) }}
                                            <input type="hidden" name="total_libur" value="{{ $total_lembur_libur.":00" }}">
                                        </td>
                                    </tr>
                                </tfoot>
                           </table>
                        </div>
                    </div>
                </div>
                




            </div>

        </form>
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

