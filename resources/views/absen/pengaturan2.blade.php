
@extends('layout.main')
@include('absen.sidebar.menu')

@section('container')
        <div class="container-fluid px-4">
            <h1 class="mt-4">{{ $title }}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">PT Sumber Segara Primadaya</li>
            </ol>

            {{-- <div class="row"> --}}
                <div class="content">
                    <div class="box">
                        <div class="navbar box-header">
                            <h5></h5>
                            <form method="get" action="/absen_pengaturan2">
                                <input type="search" placeholder="Cari... " name="cari" aria-label="Search" value="{{ request('cari') }}">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </form>
                        </div>
                        <div class="box-body table-respon">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td>Nama Pegawai  </td>
                                        <td>Nama Absensi </td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>

                                <tbody>
                                        @foreach ($pegawai as $p)
                                        <tr>
                                            <td>{{ $p->nama }}</td>
                                            <td>   
                                                    @foreach ($absensi as $nama)
                                                        @if($p->lembur_absen_id == $nama->absen_id)
                                                            {{ $nama->nama }}
                                                        @endif    
                                                    @endforeach
                                                    
                                            </td>
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
                                                                    
                                                                    <select class="form-control" name="absen_id" required>
                                                                        <option value="0">-- Kosong -- </option>
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
                                                                <input type="hidden" name="user_id" value="{{ $p->user_id }}">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                                
                                                                        
                                                        </form>



                                                    </div>
                                                </div>
                                            </div>




                                        </div>
                                        @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3"> {{ $pegawai->withQueryString()->links() }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            {{-- </div> --}}
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

