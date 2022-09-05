
@extends('layout.main')
@include('lembur.sidebar.menu')

@section('container')
        <div class="container-fluid px-4">
            <h1 class="mt-4">{{ $title }}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">PT Sumber Segara Primadaya</li>
            </ol>

            <!-- <div class="row"> -->
                <div class="content">
                    <div class="box">
                        <div class="box-header">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#persetujuan">Persetujuan</button>
                        </div>
                        
                        <div class="box-body table-respon">
                            <h5> Pengajuan Lembur Hari Biasa </h5>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <td width="10px">No</td>
                                        <td width="200px">Tanggal</td>
                                        <td>Keterangan / Deskripsi</td>
                                        <td width="90px">Jam Masuk</td>
                                        <td width="100px">Jam Pulang <br> Standar</td>
                                        <td width="100px">Jam Pulang <br> Sebenarnya</td>
                                        <td width="100px">Waktu <br> Lembur</td>
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
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <td width="10px">No</td>
                                        <td width="200px">Tanggal</td>
                                        <td>Keterangan</td>
                                        <td>Jam Masuk</td>
                                        {{-- <td>Jam Pulang Standar</td> --}}
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
            <!-- </div> -->
        </div>



        




        <div class="modal fade" id="persetujuan" tabindex="-1" role="dialog"
            aria-labelledby="persetujuan"
            aria-hidden="true">

            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="persetujuan">Persetujuan Lembur</h5>
                            <button type="button" class="btn close btn-danger" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <form action="/lembur_aprove/aksi" method="post">
                            @csrf
                            @method("put")
                                <div class="form-group mt-3">
                                    <label for="keterangan" class="mb-3">Keterangan</label>
                                    <textarea name="keterangan" class="form-control" rows="5"></textarea>
                                </div>
                                <div class="form-group mt-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" value="Disetujui" checked>
                                        <label class="form-check-label" for="inlineRadio1">Disetujui</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" value="Dikembalikan">
                                        <label class="form-check-label" for="inlineRadio2">Dikembalikan</label>
                                    </div>
                                </div>
                                    
                            <div class="form-group mt-5">
                                <input type="hidden" name="pengajuan_lembur_id" value="{{ $detail[0]->id }}">
                                <button class="btn col-lg-2 btn-primary" type="submit"> Submit </button>
                            </div>
                        </form>
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

