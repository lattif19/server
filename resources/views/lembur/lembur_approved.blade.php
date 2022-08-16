
@extends('layout.main')
@include('lembur.sidebar.menu')

@section('container')
        <div class="container-fluid px-4">
            <h1 class="mt-4">{{ $title }}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">PT Sumber Segara Primadaya</li>
            </ol>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            
        
                                <table class="table table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <td>No</td>
                                            <td>Nama</td>
                                            <td>Periode</td>
                                            <td>Hari Biasa</td>
                                            <td>Hari Libur</td>
                                            <td>Status</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($pengajuan_lembur) > 0)
                                        @foreach ($pengajuan_lembur as $d)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $d->nama }}</td>
                                                <td>{{ $d->periode }}</td>
                                                <td>{{ format_jam($d->total_biasa) }}</td>
                                                <td>{{ format_jam($d->total_libur) }}</td>
                                                <td>{{ $d->status }}</td>
                                                <td>
                                                    <a href="/lembur_approve/detail/{{ $d->id }}">Detail</a>
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

