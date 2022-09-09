
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
                    <div class="card mb-4 col-md-4">
                            <div class="btn-group">
                                <button class="btn btn-success mr-2" data-toggle="modal" data-target="#tambahData">Tambah Pengajuan </button>

                                <a class="btn btn-dark ml-2" method="post" href="/lembur/calculating/{{ Str::slug($title) }}/{{ $lembur_pengajuan_id }}">Hitung Total</a>
                            </div>
                        
                    
                        <div class="modal fade" id="tambahData" tabindex="-1" role="dialog"
                            aria-labelledby="tambahData"
                            aria-hidden="true">

                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tambahData">Tambah Catatan Lembur</h5>
                                            <button type="button" class="btn close btn-danger" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                             </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/lembur/pengajuan_harian" method="post">
                                            @csrf
                                            <div class="form-group mb-4">
                                                <label for="tanggal" class="mb-2">Tanggal</label>
                                                <input type="date" name="tanggal" class="form-control" required value="{{ date("Y-m-d") }}">
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="keterangan" class="mb-2">Keterangan</label>
                                                <textarea class="form-control" name="keterangan" id="" rows="10" required></textarea>
                                            </div>

                                            <div class="form-group mb-4">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="hari_libur" value="0" checked>
                                                    <label class="form-check-label" >Hari Biasa</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="hari_libur" value="1">
                                                    <label class="form-check-label">Hari Libur</label>
                                                </div>
                                            </div>

                                            <div class="form-group mt-5">
                                                <input type="hidden" name="lembur_pengajuan_id" value="{{ $lembur_pengajuan_id }}">
                                                <button class="btn col-lg-2 btn-primary btn-lg" type="submit"> Tambah </button>
                                            </div>
                                        </form>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>








                </div>
            </div>

            <!-- <div class="row"> -->
                <div class="content">
                    <div class="box">
                        <div class="box-header">
                            <h5> Pengajuan Lembur Hari Biasa </h5>
                        </div>
                        <div class="box-body table-respon">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td width="50px">Nomor</td>
                                        <td width="150px">Tanggal </td>
                                        <td>Keterangan</td>
                                        <td width="150px">Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($biasa)
                                        @foreach ($biasa as $i)
                                            <tr>
                                                <td align="center">{{ $loop->index+1 }}</td>
                                                <td>{{ tanggl_id($i->tanggal) }} </td>
                                                <td>{{ $i->keterangan }} </td>
                                                <td>
                                                    <a href="#" data-toggle="modal" data-target="#rubahData{{ $i->id }}">Edit</a>&nbsp;|&nbsp;
                                                    <a href="#" data-toggle="modal" data-target="#hapusData{{ $i->id }}">Hapus</a>

                                                </td>
                                            </tr>

                                            <div class="modal fade" id="hapusData{{ $i->id }}" tabindex="-1" role="dialog"
                                                aria-labelledby="hapusData{{ $i->id }}"
                                                aria-hidden="true">

                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="hapusData{{ $i->id }}">Hapus Data Lembur</h5>
                                                                <button type="button" class="btn close btn-danger" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="/lembur/hapus_pengjuan_lembur" method="post">
                                                                @csrf
                                                                Hapus Data ini..?
                                                                <div class="form-group mt-5">
                                                                    <input type="hidden" name="lembur_catatan" value="{{ $i->id }}">
                                                                    <input type="hidden" name="tanggal" value="{{ $i->tanggal }}">
                                                                    <input type="hidden" name="lembur_pengajuan_id" value="{{ $i->lembur_pengajuan_id }}">
                                                                    <button class="btn col-lg-2 btn-warning btn-lg" type="submit"> Hapus </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="modal fade" id="rubahData{{ $i->id }}" tabindex="-1" role="dialog"
                                                aria-labelledby="rubahData{{ $i->id }}"
                                                aria-hidden="true">

                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="rubahData{{ $i->id }}">Edit Data Lembur</h5>
                                                                <button type="button" class="btn close btn-danger" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="/lembur/rubah_pengjuan_lembur" method="post">
                                                                @csrf
                                                                @method("put")
                                                                <div class="form-group mb-4">
                                                                    <label for="tanggal" class="mb-2">Tanggal</label>
                                                                    <input type="date" name="tanggal" class="form-control" value="{{ $i->tanggal }}">
                                                                </div>

                                                                <div class="form-group mb-4">
                                                                    <label for="keterangan" class="mb-2">Keterangan</label>
                                                                    <textarea class="form-control" name="keterangan" id="" rows="10" required>{{ $i->keterangan }}</textarea>
                                                                </div>

                                                                <div class="form-group mb-4">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" name="hari_libur" value="0" checked>
                                                                        <label class="form-check-label" >Hari Biasa</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" name="hari_libur" value="1">
                                                                        <label class="form-check-label">Hari Libur</label>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group mt-5">
                                                                    <input type="hidden" name="lembur_catatan" value="{{ $i->id }}">
                                                                    <button class="btn col-lg-2 btn-primary btn-lg" type="submit"> Edit </button>
                                                                </div>
                                                            </form>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach                                       
                                    @else
                                        <tr>
                                            <td colspan="4">Tidak Ada Data</td>
                                        </tr>
                                    @endif
                                </tbody>
                                <tfoot>
                                    @if ($biasa)
                                        @if ($biasa->count()>10)
                                            {!! $biasa->links() !!}                         
                                        @endif
                                    @endif
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    @if($libur->count()>0)
                    <div class="box">
                        <div class="box-header">
                            <h5> Pengajuan Lembur Hari Libur </h5>
                        </div>
                        <div class="box-body table-respon">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td width="50px">Nomor</td>
                                        <td width="150px">Tanggal </td>
                                        <td>Keterangan</td>
                                        <td width="150px">Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($libur)
                                        @foreach ($libur as $i)
                                            <tr>
                                                <td align="center">{{ $loop->index+1 }}</td>
                                                <td>{{ tanggl_id($i->tanggal) }} </td>
                                                <td>{{ $i->keterangan }} </td>
                                                <td><a href="#" data-toggle="modal" data-target="#rubahData{{ $i->id }}">Edit</a>&nbsp;|&nbsp;
                                                    <a href="#" data-toggle="modal" data-target="#hapusData{{ $i->id }}">Hapus</a></td>
                                            </tr>




                                            <div class="modal fade" id="hapusData{{ $i->id }}" tabindex="-1" role="dialog"
                                                aria-labelledby="hapusData{{ $i->id }}"
                                                aria-hidden="true">

                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="hapusData{{ $i->id }}">Hapus Data Lembur</h5>
                                                                <button type="button" class="btn close btn-danger" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="/lembur/hapus_pengjuan_lembur" method="post">
                                                                @csrf
                                                                Hapus Data ini..?
                                                                <div class="form-group mt-5">
                                                                    <input type="hidden" name="lembur_catatan" value="{{ $i->id }}">
                                                                    <button class="btn col-lg-2 btn-warning btn-lg" type="submit"> Hapus </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="modal fade" id="rubahData{{ $i->id }}" tabindex="-1" role="dialog"
                                                aria-labelledby="rubahData{{ $i->id }}"
                                                aria-hidden="true">

                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="rubahData{{ $i->id }}">Edit Data Lembur</h5>
                                                                <button type="button" class="btn close btn-danger" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="/lembur/rubah_pengjuan_lembur" method="post">
                                                                @csrf
                                                                @method("put")
                                                                <div class="form-group mb-4">
                                                                    <label for="tanggal" class="mb-2">Tanggal</label>
                                                                    <input type="date" name="tanggal" class="form-control" value="{{ $i->tanggal }}">
                                                                </div>

                                                                <div class="form-group mb-4">
                                                                    <label for="keterangan" class="mb-2">Keterangan</label>
                                                                    <textarea class="form-control" name="keterangan" id="" rows="10" required>{{ $i->keterangan }}</textarea>
                                                                </div>

                                                                <div class="form-group mb-4">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" name="hari_libur" value="0">
                                                                        <label class="form-check-label" >Hari Biasa</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" name="hari_libur" value="1" checked>
                                                                        <label class="form-check-label">Hari Libur</label>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group mt-5">
                                                                    <input type="hidden" name="lembur_catatan" value="{{ $i->id }}">
                                                                    <button class="btn col-lg-2 btn-primary btn-lg" type="submit"> Edit </button>
                                                                </div>
                                                            </form>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach                                       
                                    @else
                                        <tr>
                                            <td colspan="4">Tidak Ada Data</td>
                                        </tr>
                                    @endif
                                </tbody>
                                <tfoot>
                                    @if ($libur)
                                        @if ($libur->count()>10)
                                            {!! $libur->links() !!}                         
                                        @endif
                                    @endif
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    @endif



                </div>
            <!-- </div> -->
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

