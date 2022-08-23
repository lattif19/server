
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
                                                    <td align="center" class="bg-success">
                                                        <a href="/lembur_approve/detail/{{ $d->id }}">
                                                            <div class="text-light">
                                                                {{ $d->status }}
                                                            </div>
                                                        </a>
                                                    </td>
                                                @else
                                                    <td align="center" class="bg-secondary">
                                                        <a href="/lembur_approve/detail/{{ $d->id }}">
                                                        <div class="text-light">
                                                            {{ $d->status }}
                                                        </div>
                                                        </a>
                                                    </td>
                                                @endif
                                                </td>
                                                <td align="center">
                                                    {{-- <a href="/lembur_approve/detail/{{ $d->id }}">
                                                        <span class="material-symbols-outlined">info</span>
                                                    </a> --}}
                                                    <a href="/lembur/print/{{ $d->id }}/{{ Str::slug($d->periode) }}">
                                                        <span class="material-symbols-outlined">print</span>
                                                    </a>
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

