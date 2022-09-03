
@extends('layout.main')
@include('lembur.sidebar.menu')

@section('container')

<style>
    a{
        text-decoration: none;
    }
</style>
        <div class="container-fluid px-4">
            <h1 class="mt-4">{{ $title }}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">PT Sumber Segara Primadaya</li>
            </ol>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header end">
                            <form action="/lembur_approved" method="get" class="form-inline">
                                <input type="search" placeholder="cari nama.." name="cari" value="{{ request()->cari }}">
                                <button class="btn btn-dark inline">Cari</button>
                            </form>
                        </div>
                        <div class="card-body">
                            
        
                                <table class="table table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <td align="center" width="80px">No</td>
                                            <td>Nama</td>
                                            <td>Periode</td>
                                            <td align="center" width="150px">Hari Biasa</td>
                                            <td align="center" width="150px">Hari Libur</td>
                                            <td align="center" width="100px">Status</td>
                                            <td align="center" width="100px">Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($pengajuan_lembur) > 0)
                                        @foreach ($pengajuan_lembur as $d)
                                            <tr>
                                                <td align="center">{{ $pengajuan_lembur->firstItem() + $loop->index  }}</td>
                                                <td>{{ $d->nama }}</td>
                                                <td>{{ $d->periode }}</td>
                                                <td align="center">{{ format_jam($d->total_biasa) }}</td>
                                                <td align="center">{{ format_jam($d->total_libur) }}</td>
                                                @if($d->status == "Disetujui")
                                                    <td align="center" class="bg-info">
                                                        <a href="/lembur_approved/detail/{{ $d->id }}">
                                                            <div class="text-light">
                                                                {{ $d->status }}
                                                            </div>
                                                        </a>
                                                    </td>
                                                @elseif($d->status == "Selesai")
                                                    <td align="center" class="bg-primary">
                                                        <a href="/lembur_approved/detail/{{ $d->id }}">
                                                        <div class="text-light">
                                                            {{ $d->status }}
                                                        </div>
                                                        </a>
                                                    </td>
                                                @else
                                                    <td align="center" class="bg-primary">
                                                        <a href="/lembur_approved/detail/{{ $d->id }}">
                                                        <div class="text-light">
                                                            {{ $d->status }}
                                                        </div>
                                                        </a>
                                                    </td>
                                                @endif
                                                </td>
                                                <td align="center">
                                                    <a href="/lembur/print/{{ $d->id }}/{{ Str::slug($d->periode) }}">
                                                        <span class="material-symbols-outlined">print</span>
                                                    </a>

                                                    @if ($d->status == "Disetujui")

                                                        <button class="btn btn-success mr-2" 
                                                                data-toggle="modal" 
                                                                data-target="#tambahData{{ $d->id }}">Terima Pengajuan 
                                                        </button>


                                                        <div class="modal fade" id="tambahData{{ $d->id }}" tabindex="-1" role="dialog"
                                                        aria-labelledby="tambahData{{ $d->id }}"
                                                        aria-hidden="true">

                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="tambahData{{ $d->id }}">Terima Pengajuan</h5>
                                                                            <button type="button" class="btn close btn-danger" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="/lembur/terima_pengajuan_lembur" method="POST">
                                                                            @csrf
                                                                            <h4>Yakin yaa, pengajuan lembur ini sudah diterima oleh Departement HR&GA ?</h4>
                                                                            <h5>Pengjaun dari : <strong>{{ $d->nama }}</strong></h5>
                                                                            <h5>Periode  : <strong>{{ $d->periode }}</strong></h5>
                                                                            <input type="hidden" name="lembur_pengajuan_id" value="{{ $d->id }}">
                                                                            <div class="form-group mt-5">
                                                                                <button class="btn col-lg-2 btn-primary btn-lg" type="submit"> Terima Donk </button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif




                                                </td>
                                            </tr>


                                        @endforeach
                                    </tbody>
                                        @else
                                        <tfoot>
                                            <tr>
                                                <td colspan="5"> Tidak Ada Pengajuan</td>
                                            </tr>
                                        </tfoot>
                                        @endif
                                        
                                        
                                        <tfoot>
                                            <tr>
                                                <td colspan="5"> {{ $pengajuan_lembur->withQueryString()->links() }}</td>
                                            </tr>
                                        </tfoot>
                                       
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

