
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
                    <div class="card mb-4 col-lg-2">
                        <button class="btn btn-primary btn-lg">Hitung Pengajuan
                        </button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5> Pengajuan Lembur Hari Biasa </h5>
                        </div>
                        <div class="card-body">
                           <table class="table table-bordered mb-5">
                                <thead align="center" class="table-dark">
                                    <tr>
                                        <td width="10px">NO</td>
                                        <td>Tanggal</td>
                                        <td>Keterangan / Deskripsi</td>
                                        <td>Jam Masuk</td>
                                        <td>Jam Pulang Standar</td>
                                        <td>Jam Pulang Sebenarnya</td>
                                        <td>Waktu Lembur</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <div hidden>{{ $total_lembur = 0; }}</div>
                                    @foreach ($jam_lembur as $d)
                                        @if ($d->hari_libur == 0)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $d->tanggal }}</td>
                                                <td>{{ $d->keterangan }}</td>
                                                <td>{{ format_jam($d->jam_masuk) }}</td>
                                                <td>{{ $jam_standar = jam_pulang_standar($d->jam_masuk, $pengaturan_jam->jam_masuk, $pengaturan_jam->jam_kerja) }}</td>
                                                <td>{{ format_jam($d->jam_pulang) }}</td>
                                                <td>{{ $jum_jam_lembur = jumlah_lembur($d->jam_pulang, $jam_standar) }}</td>  
                                            </tr>
                                            <div hidden>{{ $total_lembur += to_menit($jum_jam_lembur) }}</div>
                                            @endif 
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6">Total</td>
                                        <td class="bg-info">{{ menit_to_jam($total_lembur) }}</td>
                                    </tr>
                                </tfoot>
                           </table>
                        </div>
                    </div>
                </div>



                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5> Pengajuan Lembur Libur </h5>
                        </div>
                        <div class="card-body">
                           <table class="table mb-5">
                                <thead align="center" class="table-dark">
                                    <tr>
                                        <td width="10px">NO</td>
                                        <td>Tanggal</td>
                                        <td>Keterangan / Deskripsi</td>
                                        <td>Jam Masuk</td>
                                        <td>Jam Pulang Sebenarnya</td>
                                        <td>Waktu Lembur</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <div hidden>{{ $total_libur = 0; }}</div>
                                    @foreach ($jam_lembur as $d)
                                        @if ($d->hari_libur == 1)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $d->tanggal }}</td>
                                                <td>{{ $d->keterangan }}</td>
                                                <td>{{ format_jam($d->jam_masuk) }}</td>
                                                <td>{{ format_jam($d->jam_pulang) }}</td>
                                                <td>{{ $jum_jam_lembur = jumlah_lembur($d->jam_pulang, $d->jam_masuk) }}</td>  
                                            </tr>
                                            <div hidden>{{ $total_libur += to_menit($jum_jam_lembur) }}</div>
                                            @endif 
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5">Total</td>
                                        <td class="bg-info">{{ menit_to_jam($total_libur) }}</td>
                                    </tr>
                                </tfoot>
                           </table>
                        </div>
                    </div>
                </div>





            </div>
        </div>

<?php

    function menit_to_jam($menit){
        $jam = floor($menit/60);
                if($jam < 1){ $jam2 = "00"; }elseif($jam<10){ $jam2= "0".$jam; }else{ $jam2 = $jam; }
        $m  = $menit-($jam*60);
                if($m < 10){ $menit = "0".$m; }else{ $menit = $m; }
        return $jam2.":".$menit;
    }

    function jumlah_lembur($jam_pulang, $jam_standar){
        $total  = to_menit($jam_pulang) - to_menit($jam_standar);
        $jam    = floor($total/60);
                if($jam < 1){ $jam2 = "00"; }elseif($jam<10){ $jam2= "0".$jam; }else{ $jam2 = $jam; }
        $m      = $total-($jam*60);
                if($m < 10){ $menit = "0".$m; }else{ $menit = $m; }
        return $jam2.":".$menit;
    }

    function jam_pulang_standar($data, $jam_masuk, $jam_kerja){
        //normal
        if(to_menit($data) <= 480){
            $data = (to_menit($jam_masuk)+to_menit($jam_kerja))/60; 
            return $data.":00";
        }
        //telat
            $total = (to_menit($jam_masuk)+to_menit($jam_kerja))+(to_menit($data)-to_menit($jam_masuk));
            $jam = floor($total/60);
            $m = $total-($jam*60);
                if($m < 10){ $menit = "0".$m; }else{ $menit = $m; }
            return $jam.":".$menit;
        }
    
  
    
    function format_jam($data){
        return substr($data,"0", 5);
    }
    function to_menit($data){
        return (substr($data, "0", 2) * 60)+substr($data, "3", 2);
    }




    
?> 


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

