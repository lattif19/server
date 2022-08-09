
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
                        <div class="card-header">
                            <h5> Daftar Pengajuan Lembur </h5>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>Periode</td>
                                        <td>Total Hari Biasa </td>
                                        <td>Total Hari Libur </td>
                                        <td>Status </td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($pengajuanLembur)
                                        @foreach ($pengajuanLembur as $i)
                                            <tr>
                                                <td>{{ $i->periode }}</td>
                                                <td>{{ $i->total_biasa }} </td>
                                                <td>{{ $i->total_libur }} </td>
                                                <td>{{ $i->status }} </td>
                                                <td width="250px"> 
                                                    @if ($i->total_biasa == "00:00:00" and $i->total_libur == "00:00:00")
                                                        <a href="/lembur/{{  Str::slug($i->periode) }}/{{ $i->id }}">Detail</a>&nbsp;|&nbsp;
                                                        <a href="/lembur/pengajuan/{{  Str::slug($i->periode) }}/{{ $i->id }}">Ajukan</a>&nbsp;|&nbsp;
                                                        <a href="/lembur/calculating/{{  Str::slug($i->periode) }}/{{ $i->id }}">Calculated</a>    
                                                    @else
                                                        <a href="/lembur/calculated/{{  Str::slug($i->periode) }}/{{ $i->id }}">Detail</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach                                       
                                    @else
                                        <tr>
                                            <td colspan="4">Tidak Ada Data</td>
                                        </tr>
                                    @endif
                                </tbody>
                                <tfoot>
                                    @if ($pengajuanLembur)
                                        @if ($pengajuanLembur->count()>10)
                                            {!! $pengajuanLembur->links() !!}                         
                                        @endif
                                    @endif
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

