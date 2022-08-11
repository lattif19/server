
@extends('layout.main')
@include('lembur.sidebar.menu')

@section('container')
        <div class="container-fluid px-4">
            <h1 class="mt-4">{{ $title }}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">PT Sumber Segara Primadaya</li>
            </ol>

            <div class="row">
                <div class="col-xl-6">
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
                                            <td>
                                                @foreach ($users as $p)
                                                    @if($i->lembur_approve_id == $p->user_id) {{ $p->nama }} @endif
                                                @endforeach
                                            </td>
                                            <td width="100px">
                                                <a href="#" data-toggle="modal" data-target="#rubahData{{ $i->id }}">
                                                    Rubah
                                                </a>
                                            </td>
                                        </tr>


                                        <div class="modal fade" id="rubahData{{ $i->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="rubahData{{ $i->id }}"
                                            aria-hidden="true">

                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="rubahData{{ $i->id }}">Rubah Data Approver</h5>
                                                            <button type="button" class="btn close btn-danger" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="/lembur_settings" method="post">
                                                            @csrf
                                                            @method("put")
                                                            
                                                                <div class="form-group mt-3">
                                                                    <select name="lembur_approve_id" class="form-control" required>
                                                                        <option value="">--Pilih Satu---</option>
                                                                        @foreach ($users as $p)
                                                                            <option value="{{ $p->user_id }}" 
                                                                                @if($i->lembur_approve_id == $p->user_id) selected @endif> {{ $p->nama }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                            <div class="form-group mt-5">
                                                                <input type="hidden" name="user_id" value="{{ $i->user_id }}">
                                                                <button class="btn col-lg-2 btn-success" type="submit"> Rubah </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                </tbody>
                           </table>
                        </div>
                    </div>
                </div>



                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5> Pengaturan Jam Kerja </h5>
                        </div>
                        <div class="card-body">
                           <table class="table">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Deskripsi Pengaturan</td>
                                        <td>Value</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="/lembur/pengaturan_jam" method="post">
                                        @csrf
                                        @method("put")
                                        <tr>
                                            <td>1</td>
                                            <td>Jam Masuk</td>
                                            <td><input type="time" name="jam_masuk" value="{{ $jam_kerja->jam_masuk }}" class="form-control"></td>
                                            <td><input type="submit" value="Submit" class="btn btn-sm btn-dark"></td>
                                        </tr>

                                        <tr>
                                            <td>1</td>
                                            <td>Waktu Kerja</td>
                                            <td><input type="time" name="jam_kerja" value="{{ $jam_kerja->jam_kerja }}" class="form-control"></td>
                                            <td><input type="submit" value="Submit" class="btn btn-sm btn-dark"></td>
                                        </tr>
                                    </form>
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

