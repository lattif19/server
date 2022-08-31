
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
                            <button class="btn btn-primary"
                            data-toggle="modal" data-target="#tambahData">Tambah Data Mapper</button>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>Nama Pegawai</td>
                                        <td>Nama Absensi</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if ($pegawaiMapped)
                                        @foreach ($pegawaiMapped as $p)
                                        <tr>
                                            <td>{{ $p->nama_pegawai }}</td>
                                            <td>{{ $p->nama_absensi }}</td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#rubahData{{ $p->user_id }}">Edit</a>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="rubahData{{ $p->user_id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="rubahData{{ $p->user_id }}"
                                            aria-hidden="true">

                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="rubahData">Merubah Mapping Absensi</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                             </button>
                                                    </div>



                                                    <div class="modal-body">
                                                        <form action="/absen_pengaturan" method="post">
                                                            @csrf
                                                            @method("put")
                                                            
                                                                <div class="form-group mb-4">
                                                                    <label for="pilihan1">Pilih Nama pada Data Pegawai</label>
                                                                    <select class="form-control" id="pilihan1" name="user_id" required>
                                                                        <option selected value="">Pilih Satau</option>
                                                                            @if ($pegawai)
                                                                                @foreach ($pegawai as $pe)
                                                                                    <option value="{{ $pe->user_id }}" 
                                                                                        @if($pe->user_id == $p->user_id) selected 
                                                                                        @endif>{{ $pe->nama }}
                                                                                    </option>
                                                                                 @endforeach
                                                                            @else
                                                                                <option>Tidak Ada Data</option>
                                                                            @endif
                                                                    </select>
                                                                </div>
                                                                
                                                                <div class="form-group mb-4">
                                                                    <label for="pilihan1">Pilih Nama pada Data Absensi</label>
                                                                    <select class="form-control" name="absen_id" required>
                                                                        <option selected value="">Pilih Satu</option>
                                                                            @if ($absensi)
                                                                                @foreach ($absensi as $pa)
                                                                                    <option value="{{ $pa->absen_id }}" 
                                                                                        @if($pa->absen_id == $p->lembur_absen_id) selected 
                                                                                        @endif>{{ $pa->nama }} 
                                                                                    </option>
                                                                                 @endforeach
                                                                            @else
                                                                                <option>Tidak Ada Data</option>
                                                                            @endif
                                                                    </select>

                                                                </div>

                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                                
                                                                        
                                                        </form>



                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @if ($pegawaiMapped->count()>10)
                                            <td colspan="3"> {{ $pegawaiMapped->links() }}</td>
                                        @endif
                                    @else
                                        <td colspan="3"> Tidak Ada Data</td>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="tambahData" tabindex="-1" role="dialog" 
                aria-labelledby="tambahData" 
                aria-hidden="true">

            <div class="modal-dialog modal-xl" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="tambahData">Menambah Mapping Absensi</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form action="/absen_pengaturan" method="post">
                    @csrf
                    @method("put")

                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>Nama Pegawai</td>
                                        <td>Nama Absensi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <select class="form-control" name="user_id" required>
                                                <option selected value="">Pilih Satau</option>
                                                    @if ($pegawai)
                                                        @foreach ($pegawai as $p)
                                                            <option value="{{ $p->user_id }}">{{ $p->nama }}</option>
                                                         @endforeach
                                                    @else
                                                        <option>Tidak Ada Data</option>
                                                    @endif
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control" name="absen_id" required>
                                                <option selected value="">Pilih Satu</option>
                                                    @if ($absensi)
                                                        @foreach ($absensi as $p)
                                                            <option value="{{ $p->absen_id }}">{{ $p->nama }}</option>
                                                         @endforeach
                                                    @else
                                                        <option>Tidak Ada Data</option>
                                                    @endif
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
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

