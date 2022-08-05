@extends('layout.main')
@include('pegawai.sidebar.menu')

@section('container')
        <div class="container-fluid px-4">
            <h1 class="mt-4">{{ $title }}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Daftar Pegawai PT Sumber Segara Primadaya</li>
            </ol>


            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-2">
                        <div class="card-header">
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Tambah Data Pegawai</a>
                        </div>
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">NIK</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Divisi</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Password</th>
                              </tr>
                            </thead>
                            <tbody>

                            
                            @foreach ($pegawai as $p)    
                                <tr>
                                    <th scope="row">
                                        <a href="/pegawai/{{ $p->nik }}">
                                            {{ $p->nik }}
                                        </a>
                                    </th>
                                    <th scope="col">{{ $p->nama }}</th>
                                    <th scope="col">{{ $p->email }}</th>
                                    <th scope="col">{{ $p->divisi }}</th>
                                    <th scope="col">{{ $p->jabatan }}</th>
                                    <th scope="col">
                                        <a href="#" data-toggle="modal" data-target="#reset{{ $p->id }}">
                                            Reset
                                        </a>
                                    </th>

                                    <div class="modal fade" id="reset{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="reset{{ $p->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLongTitle">Reset : {{ $p->nama }}</h5>
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
                                                    <input type="hidden" name="id" value="{{ $p->user_id }}">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Reset</button>
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
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Menambah Data Pegawai</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            
            <form action="/pegawai" method="post">
              @csrf
                <div class="form-group mb-3">
                    <label for="nik" class='mb-2'>NIK</label>
                    <input type="text" class="form-control" 
                           name="nik" placeholder="contoh : '23324J' " 
                           value="{{ old('nik') }}" required>
                </div>

                <div class="form-group mb-3">
                  <label for="nama" class='mb-2'>Nama</label>
                  <input type="text" class="form-control" 
                          name="nama" placeholder="contoh : 'Nur Ardhiansyah' " value="{{ old('nama') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="email" class='mb-2'>Email</label>
                    <input type="text" class="form-control" name="email" placeholder="contoh : 'nur_a@ssprimadaya.co.id' " value="{{ old('email') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="nama" class='mb-2'>Jabatan</label>
                    <select class="form-control custom-select" name="jabatan" required>
                        <option value="" selected>Pilih Jabatan</option>
                        @foreach ($jabatan as $p)
                            <option value="{{ $p->id }}">{{ $p->nama }}</option>
                        @endforeach
                      </select>
                </div>

                <div class="form-group mb-3">
                    <label for="nama" class='mb-2'>Divisi</label>
                    <select class="form-control custom-select" name="divisi" required>
                        <option value="" selected>Pilih Divisi</option>
                        @foreach ($divisi as $p)
                            <option value="{{ $p->id }}">{{ $p->nama }}</option>
                        @endforeach
                      </select>    
                </div>

                <div class="form-group mb-3">
                    <label for="password" class='mb-2'>Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
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