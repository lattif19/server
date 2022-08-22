
@extends('layout.main')
@include('lembur.sidebar.menu')

@section('container')
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
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($pengajuanLembur)
                                        @foreach ($pengajuanLembur as $i)
                                            <tr>
                                                <td>{{ $i->periode }}</td>
                                                <td>{{ format_jam($i->total_biasa) }} </td>
                                                <td>{{ format_jam($i->total_libur) }} </td>
                                                <td>{{ $i->keterangan }} </td>
                                                <td>
                                                    
                                                    {{ $i->status }} 
                                                
                                                </td>
                                                <td width="250px"> 
                                                    @if ($i->status == "Belum Diajukan" or $i->status == "Dikembalikan")
                                                        <a href="/lembur/{{  Str::slug($i->periode) }}/{{ $i->id }}">Detail</a>&nbsp;|&nbsp;
                                                        <a href="/lembur/calculating/{{ Str::slug($i->periode) }}/{{ $i->id }}">Hitung Total</a> &nbsp;|&nbsp;
                                                        {{-- <a href="/lembur/print_pengajuan/{{ $i->id }}/{{  Str::slug($i->periode) }}">Print</a>    --}}
                                                    @else
                                                        <a href="/lembur/calculated/{{  Str::slug($i->periode) }}/{{ $i->id }}">Detail</a>
                                                        @endif
                                                    <a href="/lembur/print/{{ $i->id }}/{{  Str::slug($i->periode) }}">Print</a> 
                                                    
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

