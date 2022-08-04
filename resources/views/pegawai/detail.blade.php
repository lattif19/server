@extends('layout.main')
@include('pegawai.sidebar.menu')

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
                          <form>

                            <div class="form-group row mb-3">
                              <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="nik" value="{{ $pegawai[0]->nik }}">
                              </div>
                            </div>

                            <div class="form-group row mb-3">
                              <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                              <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" value="{{ $pegawai[0]->email }}">
                              </div>
                            </div>

                            <div class="form-group row mb-3">
                              <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" value="{{ $pegawai[0]->nama }}">
                              </div>
                            </div>

                            <div class="form-group row mb-3">
                              <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                              <div class="col-sm-10">
                                <select class="form-control custom-select" name="jabatan">
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
                                <select class="form-control custom-select" name="jabatan">
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
                            <button class="btn btn-lg btn-primary">Simpan</button>
                            
    
                          </form>





                        </div>
                    </div>
                </div>




            </div>
        </div>

@endsection