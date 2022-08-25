
@extends('layout.main')
@include('lembur.sidebar.menu')

@section('container')
        <div class="container-fluid px-4">
            <h1 class="mt-4">{{ $title }}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">PT Sumber Segara Primadaya</li>
            </ol>



        @if(count($jam_lembur) > 0)
        <form action="/lembur/calculated/" method="POST">@csrf
            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-4 col-lg-2">
                        <button class="btn btn-primary btn-lg">Proses Pengajuan
                        <input type="hidden" name="lembur_pengajuan_periode" value="{{ $title }}">
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
                                        <td width="10px">No</td>
                                        <td width="200px">Tanggal</td>
                                        <td>Keterangan / Deskripsi</td>
                                        @if($pengaturan_jam->edit_jam_masuk == 1) <td width="90px">Jam Masuk <br> Kerja</td> @endif
                                        @if($pengaturan_jam->edit_jam_kerja == 1) <td width="90px">Jam Waktu <br> Kerja </td> @endif
                                        <td width="90px">Jam Masuk</td>
                                        <td width="100px">Jam Pulang <br> Standar</td>
                                        <td width="100px">Jam Pulang <br> Sebenarnya</td>
                                        <td width="100px">Waktu <br> Lembur</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <div hidden>{{ $total_lembur = 0; }}</div>
                                    @foreach ($jam_lembur as $d)
                                        @if ($d->hari_libur == 0)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ tanggl_id($d->tanggal) }}</td>
                                                <td> <input type="text" name="keterangan[]" value="{{ $d->keterangan }}" class="form-control"> </td>

                                                @if($pengaturan_jam->edit_jam_masuk == 1)
                                                    <td> <input type="time"   
                                                                name="jam_masuk_kantor[]" 
                                                                value="{{ $pengaturan_jam->jam_masuk }}"
                                                                id="jam_masuk_kantor_{{ $d->id }}"
                                                                onchange="hitung_ulang({{ $d->id }})"
                                                                class="form-control"> 
                                                    </td>            
                                                @else 
                                                         <input type="hidden" 
                                                                name="jam_masuk_kantor[]" 
                                                                value="{{ $pengaturan_jam->jam_masuk }}" 
                                                                id="jam_masuk_kantor_{{ $d->id }}"> 
                                                @endif

                                                @if($pengaturan_jam->edit_jam_kerja == 1)  
                                                    <td> <input type="time"
                                                                name="jam_kerja_kantor[]" 
                                                                value="{{ $pengaturan_jam->jam_kerja }}" 
                                                                id="jam_kerja_kantor_{{ $d->id }}"
                                                                onchange="hitung_ulang({{ $d->id }})"
                                                                class="form-control"> 
                                                    </td>            
                                                @else 
                                                         <input type="hidden" 
                                                                name="jam_kerja_kantor[]" 
                                                                value="{{ $pengaturan_jam->jam_kerja }}" 
                                                                id="jam_kerja_kantor_{{ $d->id }}">
                                                @endif


                                                <td> 
                                                    <div id="jam_masuk_{{ $d->id }}">
                                                        {{ format_jam($d->jam_masuk) }}
                                                        <input type="hidden" 
                                                               name="jam_masuk[]" 
                                                               value="{{ $d->jam_masuk }}" 
                                                               id="jam_masuk_{{ $d->id }}">
                                                    </div>
                                                </td>

                                                <td> <div id="jam_pulang_standar_{{ $d->id }}">
                                                        {{ $jam_standar = jam_pulang_standar($d->jam_masuk, $pengaturan_jam->jam_masuk, $pengaturan_jam->jam_kerja) }}
                                                    </div>
                                                        <input  type="hidden" 
                                                                name="jam_pulang_standar[]" 
                                                                value="{{ $jam_standar.":00" }}"
                                                                id="i_jam_pulang_standar_{{ $d->id }}">
                                                </td>
                                                <td>
                                                    @if ($pengaturan_jam->edit_jam_pulang == 1)
                                                        <input  type="time" 
                                                                name="jam_pulang[]" 
                                                                value="{{ $d->jam_pulang }}"
                                                                id="jam_pulang_{{ $d->id }}"
                                                                onchange="hitung_ulang({{ $d->id }})"
                                                                class="form-control">
                                                    @else
                                                        {{ format_jam($d->jam_pulang) }}
                                                        <input type="hidden" 
                                                               name="jam_pulang[]" 
                                                               value="{{ $d->jam_pulang }}" 
                                                               id="i_jam_pulang_{{ $d->id }}" >
                                                    @endif
                                                </td>
                                                <td>    <div id="jum_lembur_{{ $d->id }}"> 
                                                            {{ $jum_jam_lembur = jumlah_lembur($d->jam_pulang, $jam_standar) }} 
                                                        </div>
                                                        <input type="hidden" 
                                                               name="jam_lembur[]" 
                                                               value="{{ $jum_jam_lembur.":00" }}"
                                                               id="i_jum_lembur_{{ $d->id }}">
                                                </td>


                                                <input type="hidden" name="hari_libur[]" value="{{ $d->hari_libur }}">
                                                <input type="hidden" name="tanggal[]" value="{{ $d->tanggal }}">
                                                
                                                
                                            </tr>
                                            <div hidden>{{ $total_lembur += to_menit($jum_jam_lembur) }}</div>
                                            @endif 
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6">Total</td>
                                        <td class="bg-info">
                                            <div id="total_biasa">
                                                {{ $total_lembur_biasa = menit_to_jam($total_lembur) }}
                                            </div>
                                                <input  type="hidden" 
                                                name="total_biasa" 
                                                value="{{ $total_lembur_biasa.":00" }}"
                                                id="i_total_biasa">
                                        </td>
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
                           <table class="table table-bordered mb-5">
                                <thead align="center" class="table-dark">
                                    <tr>
                                        <td width="10px">No</td>
                                        <td width="200px">Tanggal</td>
                                        <td>Keterangan / Deskripsi</td>
                                        <td width="100px">Jam Masuk</td>
                                        <td width="100px">Jam Pulang Sebenarnya</td>
                                        <td width="100px">Waktu Lembur</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <div hidden>{{ $total_libur = 0; }}</div>
                                    @foreach ($jam_lembur as $d)
                                        @if ($d->hari_libur == 1)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ tanggl_id($d->tanggal) }}</td>
                                                <td>
                                                    <input  type="text" 
                                                            name="keterangan[]" 
                                                            value="{{ $d->keterangan }}" 
                                                            class="form-control">
                                                </td>
                                                <td>
                                                    <div id="jam_masuk_libur_{{ $d->id }}">
                                                        {{ format_jam($d->jam_masuk) }}</td>
                                                    </div>
                                                <td>
                                                    @if($pengaturan_jam->edit_jam_pulang == 1)
                                                        <input  type="time"
                                                                name="jam_pulang[]" 
                                                                value="{{ $d->jam_pulang }}" 
                                                                class="form-control"
                                                                id="i_jam_pulang_libur_{{ $d->id }}"
                                                                onchange="hitung_libur({{ $d->id }})">
                                                    @else
                                                        <input  type="hidden" 
                                                                name="jam_pulang[]" 
                                                                value="{{ $d->jam_pulang }}">
                                                                {{ format_jam($d->jam_pulang) }}
                                                    @endif
                                                
                                                </td>
                                                <td>   
                                                    <div id="jum_jam_libur_{{ $d->id }}">
                                                        {{ $jum_jam_lembur = jumlah_lembur($d->jam_pulang, $d->jam_masuk) }}
                                                    </div>
                                                        <input  type="hidden" 
                                                                name="jam_lembur[]" 
                                                                value="{{ $jum_jam_lembur.":00" }}"
                                                                id="i_jum_jam_libur_{{ $d->id }}">
                                                </td>
                                                
                                                <input type="hidden" name="hari_libur[]" value="{{ $d->hari_libur }}">
                                                <input type="hidden" name="tanggal[]" value="{{ $d->tanggal }}">
                                                <input type="hidden" name="jam_masuk_kantor[]" value="{{ $pengaturan_jam->jam_masuk }}">
                                                <input type="hidden" name="jam_kerja_kantor[]" value="{{ $pengaturan_jam->jam_kerja }}">
                                                <input type="hidden" name="jam_masuk[]" value="{{ $d->jam_masuk }}">
                                                <input type="hidden" name="jam_pulang_standar[]" value="{{ "00:00:00" }}">



                                            </tr>
                                            <div hidden>{{ $total_libur += to_menit($jum_jam_lembur) }}</div>
                                            @endif 
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5">Total</td>
                                        <td class="bg-info">
                                            <div id="total_libur">
                                                {{ $total_lembur_libur = menit_to_jam($total_libur) }}
                                            </div>
                                            <input  type="hidden" 
                                                    name="total_libur" 
                                                    value="{{ $total_lembur_libur.":00" }}"
                                                    id="i_total_libur">
                                        </td>
                                    </tr>
                                </tfoot>
                           </table>
                        </div>
                    </div>
                </div>
                




            </div>

        </form>
        </div>

        @else
            <h1 class="text-warning bg-dark">Data Absensi Belum Di Upload</h1>
        @endif


{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
<script>
    function hitung_libur(id){
        var jam_masuk           = toMinutes(document.getElementById("jam_masuk_libur_"+id).textContent.trim());
        var jam_pulang          = toMinutes(document.getElementById("i_jam_pulang_libur_"+id).value);
        var jam_lembur          = toMinutes(document.getElementById("jum_jam_libur_"+id).textContent.trim());
        var total_lembur        = toMinutes(document.getElementById("total_libur").textContent.trim());

        var n_jam_lembur = jam_pulang-jam_masuk;
        var n_total_lembur = total_baru(total_lembur, n_jam_lembur, jam_lembur);

        document.getElementById("jum_jam_libur_"+id).innerHTML  = toHourse(n_jam_lembur).substr(0,5);
        document.getElementById("i_jum_jam_libur_"+id).value    = toHourse(n_jam_lembur);
        document.getElementById("total_libur").innerHTML        = toHourse(n_total_lembur).substr(0,5);
        document.getElementById("i_total_libur").value       = toHourse(n_total_lembur);
    }


    function hitung_ulang(id){
        var jam_masuk_kantor    = toMinutes(document.getElementById("jam_masuk_kantor_"+id).value);
        var jam_kerja_kantor    = toMinutes(document.getElementById("jam_kerja_kantor_"+id).value);
        var jam_masuk           = toMinutes(document.getElementById("jam_masuk_"+id).textContent.trim());
        var jam_pulang          = toMinutes(document.getElementById("jam_pulang_"+id).value);
        var jam_pulang_standar  = toMinutes(document.getElementById("jam_pulang_standar_"+id).textContent.trim());
        var jum_lembur          = toMinutes(document.getElementById("jum_lembur_"+id).textContent.trim());
        var total_biasa         = toMinutes(document.getElementById("total_biasa").textContent.trim());

        //Memanggil fungsi perhitungan
        var n_jam_pulang_standar    = jam_pulang_standar_baru(jam_masuk, jam_masuk_kantor, jam_kerja_kantor);
        var n_jam_lembur            = jam_lembur_baru(n_jam_pulang_standar, jam_pulang);
        var n_total_biasa           = total_baru(total_biasa, n_jam_lembur, jum_lembur); 
        
        
        //Merubah Tampilan Pada Web Browser dan Values pada Hidden Input
        document.getElementById("total_biasa").innerHTML            = toHourse(n_total_biasa).substr(0,5);
        document.getElementById("i_total_biasa").value              = toHourse(n_total_biasa);
        document.getElementById("jum_lembur_"+id).innerHTML         = toHourse(n_jam_lembur).substr(0,5);
        document.getElementById("i_jum_lembur_"+id).value           = toHourse(n_jam_lembur);
        document.getElementById("i_jam_pulang_standar_"+id).value   = toHourse(n_jam_pulang_standar);
        document.getElementById("jam_pulang_standar_"+id).innerHTML = toHourse(n_jam_pulang_standar).substr(0,5);
    }

    function total_baru(a,b,c){
        //jika berubah
        if(b != c) { return b+(a-c); }
        //jika sama
        if(b = c) { return a; }
    }

    function jam_lembur_baru(a,b){
        if(b > a) { return b-a; }
        if(b < a) { return 0; }
    }

    function jam_pulang_standar_baru(a,b,c){
        
        if(a <= b)  { return b+c; }
        
        if(a > b)   { return a+c; }
    }

    function toMinutes(data){
        var a = 1*data.substr(0,2)*60;
        var b = 1*data.substr(3,2);
        return a+b;
    }

    function toHourse(data){
        var a = Math.floor(data/60);
        var b = data%60;
        if(a < 10){ a = "0"+a; }
        if(b < 10){ b = "0"+b; }
        return a+":"+b+":00";
    }


</script>

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

