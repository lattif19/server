
@extends('layout.main')
@include('lembur.sidebar.menu')

@section('container')
<style>
    a{
        text-decoration: none;
    }
</style>
        <div class="container-fluid px-4">
            <div class="row">
                <h1 class="mt-4">{{ $title }}</h1>
            </div>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">PT Sumber Segara Primadaya</li>
            </ol>

            


            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="nav justify-content-between card-header">
                            <h2>Riwayat Pengajuan</h2>
                            <form action="/lembur" method="get">
                                <input  type="search" placeholder="Cari..." name="cari" value="{{ request()->cari }}">
                                <button class="btn btn-dark text-light" type="submit">Cari</button>
                            </form>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <td>Periode</td>
                                        <td>Total Hari Biasa </td>
                                        <td>Total Hari Libur </td>
                                        <td>Keterangan </td>
                                        <td>Status </td>
                                        <td  width="150px" align="center">Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($pengajuanLembur)
                                        @foreach ($pengajuanLembur as $i)
                                            <tr>
                                                <td>
                                                    @if ($i->status == "Belum Diajukan" or $i->status == "Dikembalikan")
                                                        <a href="/lembur/{{  Str::slug($i->periode) }}/{{ $i->id }}">
                                                            <strong>{{ $i->periode }} </strong>
                                                        </a>
                                                    @else
                                                        <a href="/lembur/calculated/{{ $i->id }}/{{  Str::slug($i->periode) }}">
                                                            <strong>{{ $i->periode }} </strong>
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>{{ format_jam($i->total_biasa) }} </td>
                                                <td>{{ format_jam($i->total_libur) }} </td>
                                                <td>{{ $i->keterangan }} </td>
                                                <td>
                                                    {{ $i->status }} 
                                                </td>
                                                <td align="center"> 
                                                    @if ($i->status == "Belum Diajukan" or $i->status == "Dikembalikan")
                                                        <a href="/lembur/{{  Str::slug($i->periode) }}/{{ $i->id }}">
                                                            <span class="material-symbols-outlined">info</span>
                                                        </a>
                                                        <a href="/lembur/calculating/{{ Str::slug($i->periode) }}/{{ $i->id }}">
                                                            <span class="material-symbols-outlined">summarize</span>
                                                        </a>
                                                                                                              
                                                    @else
                                                        <a href="/lembur/calculated/{{ $i->id }}/{{  Str::slug($i->periode) }}">
                                                            <span class="material-symbols-outlined">info</span>
                                                        </a>
                                                        @endif
                                                    <a href="/lembur/print/{{ $i->id }}/{{  Str::slug($i->periode) }}">
                                                        <span class="material-symbols-outlined">print</span>
                                                    </a> 
                                                    
                                                </td>
                                            </tr>
                                        @endforeach                                       
                                    @else
                                        <tr>
                                            <td colspan="4">Tidak Ada Data</td>
                                        </tr>
                                    @endif
                                </tbody>
                                @if ($pengajuanLembur)
                                    @if ($pengajuanLembur->count()>10)
                                        <tfoot>
                                            {!! $pengajuanLembur->links() !!}                         
                                        </tfoot>
                                        @endif
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

