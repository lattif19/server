@extends('layout.main')
@include('pegawai.sidebar.menu')

@section('container')
        <div class="container-fluid px-4">
            <h1 class="mt-4">{{ $title }}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">PT Sumber Segara Primadaya</li>
            </ol>


            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-2">
                        <div class="card-header">
                            <a href="#" class="btn btn-primary" data-toggle="modal" 
                            data-target="#exampleModalCenter">Tambah Hak Akses User</a>
                        </div>
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Modul</th>
                                <th scope="col">Level Sistem</th>
                                <th scope="col">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>

                            
                            @foreach ($hak_akses as $p)    
                                <tr>
                                    <th scope="row">{{ $loop->index+1 }}</th>
                                    <th scope="col">{{ $p->nama }}</th>
                                    <th scope="col">{{ $p->modul }}</th>
                                    <th scope="col">{{ $p->level }}</th>
                                    <th scope="col" width="150px">
                                        <a href="#" data-toggle="modal" 
                                                    data-target="#rubah{{ $p->id }}">Rubah</a>
                                    </th>



                                    <div class="modal fade" id="rubah{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="rubah{{ $p->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="rubah{{ $p->id }}">Merubah Hak Akses User : {{ $p->nama }}</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/hak_akses_put2" method="post">
                                                  @csrf
                                                      <div class="form-group row mb-3">
                                                        <label for="nama" class="col-sm-2 col-form-label">Level</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control custom-select" name="pegawai_level_user_id">
                                                                @foreach ($level as $x)
                                                                    <option value="{{ $x->id }}" @if ($x->nama == $p->level)
                                                                    selected    
                                                                    @endif>
                                                                    {{ $x->nama }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                      </div>
                                                      
                                                      
                                                    </div>
                                                    <div class="modal-footer">
                                                      <input type="hidden" name="id" value="{{ $p->id }}">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                      <button type="submit" class="btn btn-primary">Rubah</button>
                                                  </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>



                                    
                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                              <tr>
                                <td colspan="5"> {{ $hak_akses->links() }}</td>
                              </tr>
                            </tfoot>
                          </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Menambah Hak Akses User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form action="/hak_akses_put" method="post">
                      @csrf
                        <div class="form-group row mb-3">
                          <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                          <div class="col-sm-10">
                            <select class="form-control custom-select" name="user_id">
                                <option selected>--Pilih Satu--</option>
                                @foreach ($pegawai as $p)
                                    <option value="{{ $p->user_id }}">
                                      {{ $p->nama }}
                                    </option>
                                @endforeach
                              </select>
                          </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="nama" class="col-sm-2 col-form-label">Modul</label>
                            <div class="col-sm-10">
                                <select class="form-control custom-select" name="modul_id">
                                    <option selected>--Pilih Satu--</option>
                                    @foreach ($modul as $p)
                                        <option value="{{ $p->id }}">
                                          {{ $p->nama }}
                                        </option>
                                    @endforeach
                                  </select>
                            </div>
                          </div>

                          <div class="form-group row mb-3">
                            <label for="nama" class="col-sm-2 col-form-label">Level</label>
                            <div class="col-sm-10">
                                <select class="form-control custom-select" name="level_id">
                                    <option selected>--Pilih Satu--</option>
                                    @foreach ($level as $p)
                                        <option value="{{ $p->id }}">
                                          {{ $p->nama }}
                                        </option>
                                    @endforeach
                                  </select>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-primary">Tambah</button>
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

