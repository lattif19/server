
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
                            <div hidden> {{ $id_lembur = DB::table("pegawai")->where("user_id", auth()->user()->id)->get(["lembur_approve_id"])[0]->lembur_approve_id }}</div>
                           <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td>Nomor</td>
                                        <td>Nama Pegawai</td>
                                        <td>Nama Manager / Approver</td>
                                        <td width="100px" align="center">Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        <tr>
                                            <td> 1 </td>
                                            <td> {{ $data_user->find(auth()->user()->id)->nama }} </td>
                                            <td>
                                                {{-- {{ dd($id_lembur) }} --}}
                                                @if($id_lembur == null)
                                                -- Approver Belum Dipilih --
                                                @else
                                                {{ $data_user->find($id_lembur)->nama }}
                                                @endif
                                            </td>
                                            <td align="center">
                                                <a href="#" data-toggle="modal" data-target="#rubahData">
                                                    <span class="material-icons">
                                                        edit
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>


                                        <div class="modal fade" id="rubahData" tabindex="-1" role="dialog"
                                            aria-labelledby="rubahData"
                                            aria-hidden="true">

                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="rubahData">Edit Data Approver</h5>
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
                                                                        @foreach ($data_user as $p)
                                                                            <option value="{{ $p->user_id }}" 
                                                                                @if($p->user_id == $id_lembur) selected @endif> {{ $p->nama }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                            <div class="form-group mt-5">
                                                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                                <button class="btn col-lg-2 btn-success" type="submit">
                                                                    Save
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    
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

