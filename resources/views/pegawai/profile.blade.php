@extends('layout.main')


@section('container')
        <div class="container-fluid px-4">
            <h1 class="mt-4">{{ $title }} : {{ $pegawai[0]->nik }}</h1>
            <ol class="breadcrumb mb-4">
            </ol>


            <div class="row">



              <div class="col-xl-3">
                <div class="card mb-2">
                    <div class="card-body">
                      <p align="center">
                        <span class="material-icons" style="font-size: 200px; align:center;"> account_box </span>
                      </p>
                    </div>
                  </div>
              </div>



                <div class="col-xl-9">
                    <div class="card mb-2">
                        <div class="card-header">
                          <div class="text-primary">
                            <h2>
                              Profile Pegawai
                            </h2>
                          </div>
                        </div>
                        <div class="card-body">
                          <form method="post" action="/pegawai">
                            @csrf
                            @method('put')
                            <div class="form-group row mb-3">
                              <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="nik" value="{{ $pegawai[0]->nik }}">
                              </div>
                            </div>

                            <div class="form-group row mb-3">
                              <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                              <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" value="{{ $pegawai[0]->email }}">
                              </div>
                            </div>

                            <div class="form-group row mb-3">
                              <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" value="{{ $pegawai[0]->nama }}">
                              </div>
                            </div>

                            <div class="form-group row mb-3">
                              <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                              <div class="col-sm-10">
                                <select class="form-control custom-select" name="pegawai_jabatan_id">
                                  @foreach ($jabatan as $p)
                                      <option value="{{ $p->id }}" @if($p->nama == $pegawai[0]->jabatan) selected @endif>
                                        {{ $p->nama }}
                                      </option>
                                  @endforeach
                                </select>
                              </div>
                            </div>

                            <div class="form-group row mb-3">
                              <label for="divisi" class="col-sm-2 col-form-label">Divisi</label>
                              <div class="col-sm-10">
                                <select class="form-control custom-select" name="pegawai_divisi_id">
                                  @foreach ($divisi as $p)
                                      <option value="{{ $p->id }}" @if($p->nama == $pegawai[0]->divisi) selected @endif>
                                        {{ $p->nama }}
                                      </option>
                                  @endforeach
                                </select>
                              </div>
                            </div>

                            <div class="form-group row mb-3">
                              <label for="foto" class="col-sm-2 col-from-label">Foto</label>
                              <div class="col-sm-10">
                                <input type="file" class="form-control custom-file-input">
                              </div>
                            </div>

                            <hr class="mt-5 mb-3">
                            <input type="hidden" name="id" value="{{ $pegawai[0]->id }}">
                            <input type="hidden" name="user_id" value="{{ $pegawai[0]->user_id }}">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                              <a href="#" data-toggle="modal" data-target="#reset">
                                <button class="btn btn-warning">Reset Password</button>
                              </a>
                          </form>





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


      <div class="modal fade" id="reset" tabindex="-1" role="dialog" aria-labelledby="reset" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Reset : </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="/pegawai/reset" method="post">
                  @method("put")
                  @csrf
                    <div class="form-group mb-3">
                        <label for="password" class='mb-2'>New Password</label>
                        <input type="password" class="form-control" name="password1">
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class='mb-2'>Re-Type Password</label>
                        <input type="password" class="form-control" name="password2">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="id" value="{{ $pegawai[0]->user_id }}">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </form>
          </div>
        </div>
      </div>

@endsection