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
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Tambah Divisi</a>
                        </div>
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>

                            
                            @foreach ($divisi as $p)    
                                <tr>
                                    <th scope="row">{{ $p->id }}</th>
                                    <th scope="col">{{ $p->nama }}</th>
                                    <th scope="col">{{ $p->keterangan }}</th>
                                    <th scope="col" width="150px">
                                        <a href="#" data-toggle="modal" 
                                                    data-target="#rubah{{ $p->id }}">Rubah</a>
                                    </th>

                                    <div class="modal fade" id="rubah{{ $p->id }}" tabindex="-1" role="dialog" 
                                            aria-labelledby="rubah{{ $p->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="rubah{{ $p->id }}">Merubah Divisi</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                                
                                                <form>
                                                    <div class="form-group mb-3">
                                                        <label for="nik" class='mb-2'>Nama</label>
                                                        <input type="text" class="form-control" id="nama" 
                                                            value="{{ $p->nama }}">
                                                    </div>
                                    
                                                    <div class="form-group mb-3">
                                                      <label for="nama" class='mb-2'>Keterangan</label>
                                                      <textarea name="keterangan" id=""rows="10" 
                                                       class="form-control"
                                                       value="{{ $p->keterangan }}"></textarea>
                                                    </div>
                                                </form>
                                    
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                              <button type="button" class="btn btn-primary">Rubah</button>
                                            </div>
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
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Menambah Divisi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            
            <form>
                <div class="form-group mb-3">
                    <label for="nik" class='mb-2'>Nama</label>
                    <input type="text" class="form-control" id="nik" placeholder="contoh : 'Engginering' ">
                </div>

                <div class="form-group mb-3">
                  <label for="nama" class='mb-2'>Keterangan</label>
                  <textarea name="keterangan" id=""rows="10" class="form-control" placeholder="contoh : 'Menangani pekerjaan berkaitan dengan Engginering' "></textarea>
                </div>
            </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-primary">Tambah</button>
        </div>
      </div>
    </div>
  </div>
@endsection

