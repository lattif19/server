
@extends('layout.main')
@include('asset.sidebar.menu')

@section('container')
        <style>
            a{
                text-decoration: none;
            }
        </style>
        <div class="container-fluid px-4">
            <h1 class="mt-4">{{ $title }}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">{{ $sub_title }}</li>
            </ol>
            
            <hr>
            <div class="row">
                <div class="col-lg-6">
                    <div class="nav card">
                        <div class="card-header bg-success d-flex justify-content-between">
                            <span class="text-light">
                                Pengaturan Premi Asuransi 
                            </span>
                            <span class="float-right text-dark">
                                <button class="btn btn-light btn-sm" data-toggle="modal" data-target="#tambahPremi">Tambah</button>
                            </span>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Deskripsi</td>
                                        <td>Keterangan</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jenis_permi as $i)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#jenisPremi{{ $i->id }}">
                                                    <strong class="text-dark">{{ $i->nama }}</strong>
                                                </a>                                             
                                            </td>
                                            <td>{{ $i->keterangan }}</td>

                                            <div class="modal fade" id="jenisPremi{{ $i->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="jenisPremi{{ $i->id }}">{{ $i->nama }}</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>

                                                    <form action="/kendaraan/setting/premi_asuransi" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <input type="text" class="form-control mb-2" name="nama" value="{{ $i->nama }}">
                                                            <textarea name="keterangan" rows="10" class="form-control mt-3">{{ $i->keterangan }}</textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id" value="{{ $i->id }}">
                                                            <button type="submit" class="btn btn-warning" name="aksi" value="hapus">Hapus</button>
                                                            <button type="submit" class="btn btn-success" name="aksi" value="edit">Simpan</button>
                                                        </div>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="nav card">
                        <div class="card-header bg-success d-flex justify-content-between">
                            <span class="text-light">
                                Pengaturan Jenis Asuransi 
                            </span>
                            <span class="float-right text-dark">
                                <button class="btn btn-light btn-sm" data-toggle="modal" data-target="#tambahJenisAsuransi">Tambah</button>
                            </span>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Deskripsi</td>
                                        <td>Keterangan</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jenis_asuransi as $i)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#jenisAsuransi{{ $i->id }}">
                                                    <strong class="text-dark">{{ $i->nama }}</strong>
                                                </a>                                             
                                            </td>
                                            <td>{{ $i->keterangan }}</td>

                                            <div class="modal fade" id="jenisAsuransi{{ $i->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="jenisAsuransi{{ $i->id }}">{{ $i->nama }}</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>

                                                    <form action="/kendaraan/setting/jenis_asuransi" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <input type="text" class="form-control mb-2" name="nama" value="{{ $i->nama }}">
                                                            <textarea name="keterangan" rows="10" class="form-control mt-3">{{ $i->keterangan }}</textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id" value="{{ $i->id }}">
                                                            <button type="submit" class="btn btn-warning" name="aksi" value="hapus">Hapus</button>
                                                            <button type="submit" class="btn btn-success" name="aksi" value="edit">Simpan</button>
                                                        </div>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <hr>
            <div class="row mt-3">
                <div class="col-lg-6">
                    <div class="nav card">
                        <div class="card-header bg-primary d-flex justify-content-between">
                            <span class="text-light">
                                Jenis Kendaraan
                            </span>
                            <span class="float-right text-dark">
                                <button class="btn btn-light btn-sm" data-toggle="modal" data-target="#tambahJenisKendaran">Tambah</button>
                            </span>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Deskripsi</td>
                                        <td>Keterangan</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jenis_kendaraan as $i)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#jenisKendaraan{{ $i->id }}">
                                                    <strong class="text-dark">{{ $i->nama }}</strong>
                                                </a>                                             
                                            </td>
                                            <td>{{ $i->keterangan }}</td>

                                            <div class="modal fade" id="jenisKendaraan{{ $i->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="jenisKendaraan{{ $i->id }}">{{ $i->nama }}</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>

                                                    <form action="/kendaraan/setting/jenis_kendaraan" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <input type="text" class="form-control mb-2" name="nama" value="{{ $i->nama }}">
                                                            <textarea name="keterangan" rows="10" class="form-control mt-3">{{ $i->keterangan }}</textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id" value="{{ $i->id }}">
                                                            <button type="submit" class="btn btn-warning" name="aksi" value="hapus">Hapus</button>
                                                            <button type="submit" class="btn btn-success" name="aksi" value="edit">Simpan</button>
                                                        </div>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <div class="row mt-3">
                <div class="col-lg-6">
                    <div class="nav card">
                        <div class="card-header bg-info d-flex justify-content-between">
                            <span class="text-dark">
                                Jenis Service / Perbaikan
                            </span>
                            <span class="float-right text-dark">
                                <button class="btn btn-light btn-sm" data-toggle="modal" data-target="#tambahJenisService">Tambah</button>
                            </span>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Deskripsi</td>
                                        <td>Keterangan</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jenis_service as $i)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#jenisService{{ $i->id }}">
                                                    <strong class="text-dark">{{ $i->nama }}</strong>
                                                </a>                                             
                                            </td>
                                            <td>{{ $i->keterangan }}</td>

                                            <div class="modal fade" id="jenisService{{ $i->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="jenisService{{ $i->id }}">{{ $i->nama }}</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>

                                                    <form action="/kendaraan/setting/jenis_service" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <input type="text" class="form-control mb-2" name="nama" value="{{ $i->nama }}">
                                                            <textarea name="keterangan" rows="10" class="form-control mt-3">{{ $i->keterangan }}</textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id" value="{{ $i->id }}">
                                                            <button type="submit" class="btn btn-warning" name="aksi" value="hapus">Hapus</button>
                                                            <button type="submit" class="btn btn-success" name="aksi" value="edit">Simpan</button>
                                                        </div>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="nav card">
                        <div class="card-header bg-info d-flex justify-content-between">
                            <span class="text-dark">
                                Jenis Status Perbaikan
                            </span>
                            <span class="float-right text-dark">
                                <button class="btn btn-light btn-sm" data-toggle="modal" data-target="#tambahStatusPerbaikan">Tambah</button>
                            </span>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Deskripsi</td>
                                        <td>Keterangan</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($status_perbaikan as $i)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#statusPerbaikan{{ $i->id }}">
                                                    <strong class="text-dark">{{ $i->nama }}</strong>
                                                </a>                                             
                                            </td>
                                            <td>{{ $i->keterangan }}</td>

                                            <div class="modal fade" id="statusPerbaikan{{ $i->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="statusPerbaikan{{ $i->id }}">{{ $i->nama }}</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>

                                                    <form action="/kendaraan/setting/status_perbaikan" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <input type="text" class="form-control mb-2" name="nama" value="{{ $i->nama }}">
                                                            <textarea name="keterangan" rows="10" class="form-control mt-3">{{ $i->keterangan }}</textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id" value="{{ $i->id }}">
                                                            <button type="submit" class="btn btn-warning" name="aksi" value="hapus">Hapus</button>
                                                            <button type="submit" class="btn btn-success" name="aksi" value="edit">Simpan</button>
                                                        </div>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>



        </div>

        {{-- Modal Tambah Jenis Status Perbaikan --}}
        <div class="modal fade" id="tambahStatusPerbaikan" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="tambahStatusPerbaikan">Tambah Jenis Status Perbaikan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <form action="/kendaraan/setting/status_perbaikan" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="text" class="form-control mb-2" name="nama" required>
                        <textarea name="keterangan" rows="10" class="form-control mt-3" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="aksi" value="tambah">Simpan</button>
                    </div>
                </form>
              </div>
            </div>
          </div>


        {{-- Modal Tambah Jenis Service Kendaraan --}}
        <div class="modal fade" id="tambahJenisService" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="tambahJenisService">Tambah Jenis Kendaraan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <form action="/kendaraan/setting/jenis_service" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="text" class="form-control mb-2" name="nama" required>
                        <textarea name="keterangan" rows="10" class="form-control mt-3" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="aksi" value="tambah">Simpan</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
          

        {{-- Modal Tambah Jenis Kendaraan --}}
        <div class="modal fade" id="tambahJenisKendaran" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="tambahJenisKendaran">Tambah Jenis Kendaraan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <form action="/kendaraan/setting/jenis_kendaraan" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="text" class="form-control mb-2" name="nama" required>
                        <textarea name="keterangan" rows="10" class="form-control mt-3" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="aksi" value="tambah">Simpan</button>
                    </div>
                </form>
              </div>
            </div>
          </div>





        {{-- Modal Tambah Premi --}}
        <div class="modal fade" id="tambahPremi" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="tambahPremi">Tambah Jenis Premi</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <form action="/kendaraan/setting/premi_asuransi" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="text" class="form-control mb-2" name="nama" required>
                        <textarea name="keterangan" rows="10" class="form-control mt-3" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="aksi" value="tambah">Simpan</button>
                    </div>
                </form>
              </div>
            </div>
          </div>


          {{-- Modal Tambah Jenis Asuransi --}}
        <div class="modal fade" id="tambahJenisAsuransi" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="tambahJenisAsuransi">Tambah Jenis Asuransi</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <form action="/kendaraan/setting/jenis_asuransi" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="text" class="form-control mb-2" name="nama" required>
                        <textarea name="keterangan" rows="10" class="form-control mt-3" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="aksi" value="tambah">Simpan</button>
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

