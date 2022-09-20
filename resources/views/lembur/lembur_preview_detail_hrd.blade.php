
@extends('layout.main')
@include('lembur.sidebar.menu')

@section('container')
<div class="container-fluid px-4">
    <h1 class="mt-4">{{ $title }}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">PT Sumber Segara Primadaya</li>
    </ol>


    <div class="content">
            
        
            <div class="card mt-3 mb-3">
                <div class="card-header d-flex justify-content-between">
                    <h5> Pengajuan Lembur Hari Biasa </h5>
                    <span>
                        <button class="btn btn-primary" id="rubah" type="button" onclick="togleRubah()">Rubah</button>
                        <button class="btn btn-success" id="setuju">Persetujuan</button>
                    </span>
                </div>
                <div class="card-body table-respom">
        <form action="/lembur/hitung_ulang/oleh_hrd" method="GET" id="form_lembur">                
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td width="10px">No</td>
                                <td width="90px">Tanggal</td>
                                <td width="200px">Keterangan / Deskripsi</td>
                                <td width="60px">Jam Masuk Kantor</td>
                                <td width="60px">Jam Waktu Kerja</td>
                                <td width="60px">Jam Masuk</td>
                                <td width="60px">Jam Pulang <br> Standar</td>
                                <td width="60px">Jam Pulang <br> Sebenarnya</td>
                                <td width="60px">Waktu <br> Lembur</td>
                            </tr>
                        </thead>
                            <tbody>
                                <div hidden> {{ $total_lembur_biasa=0 }} {{ $nomor_biasa =1 }}</div>
                                @foreach ($detail as $d)
                                <input type="hidden" name="pengajuan_id" value="{{ $d->id }}">
                                @if($d->hari_libur == 0)
                                    <tr>
                                        <td>{{ $nomor_biasa }}</td>
                                        <td>{{ tanggl_id($d->tanggal) }}</td>
                                        <td>{{ $d->keterangan }}</td>

                                        <td>
                                            <input hidden type="time" 
                                                    value="{{ format_jam($pengaturan[0]->jam_masuk) }}" 
                                                    name="jam_masuk_kantor[]" 
                                                    id="jam_masuk_kantor{{ $d->id_detail }}" 
                                                    onchange="recalculate({{ $d->id_detail }})">
                                        </td>

                                        <td>
                                            <input hidden type="time" 
                                                    value="{{ format_jam($pengaturan[0]->jam_kerja) }}" 
                                                    name="jam_kerja_kantor[]" 
                                                    id="jam_kerja_kantor{{ $d->id_detail }}" 
                                                    onchange="recalculate({{ $d->id_detail }})">
                                        </td>

                                        <td>
                                            <input hidden type="time" 
                                                    value="{{ format_jam($d->jam_masuk) }}" 
                                                    name="jam_masuk[]" 
                                                    id="jam_masuk{{ $d->id_detail }}" 
                                                    onchange="recalculate({{ $d->id_detail }})">
                                            {{ format_jam($d->jam_masuk) }}</td>
                                        
                                        <td>
                                            <input hidden type="time" 
                                                    value="{{ format_jam($d->jam_pulang_standar) }}" 
                                                    name="jam_pulang_standar[]" 
                                                    id="jam_pulang_standar{{ $d->id_detail }}" 
                                                    onchange="recalculate({{ $d->id_detail }})">
                                            {{ format_jam($d->jam_pulang_standar) }}</td>
                                        <td>
                                            <input hidden type="time" 
                                                    value="{{ format_jam($d->jam_pulang) }}" 
                                                    name="jam_pulang[]" 
                                                    id="jam_pulang{{ $d->id_detail }}" 
                                                    onchange="recalculate({{ $d->id_detail }})">
                                            {{ format_jam($d->jam_pulang) }}</td>
                                        <td>
                                            <span id="jam_lembur{{ $d->id_detail }}">
                                                {{ format_jam($d->jam_lembur) }}
                                            </span>
                                            <input type="hidden" name="jam_lembur[]" id="i_jam_lembur{{ $d->id_detail }}" value="{{ format_jam($d->jam_lembur) }}">
                                        </td>
                                        <input type="hidden" name="id[]" value="{{ $d->id_detail }}">
                                        <input type="hidden" name="hari_libur[]" value="{{ $d->hari_libur }}">


                                        <div hidden>{{ $total_lembur_biasa = $d->total_biasa }} {{ $nomor_biasa++ }}</div>
                                    </tr>
                                @endif
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="8">Total</td>
                                    <td>
                                        <span id="total_lembur_biasa">
                                            {{ format_jam($total_lembur_biasa) }}
                                        </span>
                                        <input type="hidden" id="i_total_biasa" name="total_biasa" value="{{ format_jam($total_lembur_biasa) }}">
                                    </td>
                                </tr>
                            </tfoot>
                    </table>
                </div>
            </div>

            <div class="card mt-3 mb-3">
                <div class="card-header d-flex justify-content-between">
                    <h5> Pengajuan Lembur Libur </h5>
                </div>
                
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <td width="10px">No</td>
                            <td width="90">Tanggal</td>
                            <td width="200px">Keterangan</td>
                            <td width="60">Jam Masuk</td>
                            <td width="60">Jam Pulang Sebenarnya</td>
                            <td width="60">Jumlah <br> Lembur</td>
                        </tr>
                    </thead>
                    <tbody>
                        <div hidden> {{ $total_lembur_libur=0 }} {{ $nomor_libur =1 }}</div>
                        @foreach ($detail as $d)
                        @if($d->hari_libur == 1)
                            <tr>
                                <td>{{ $nomor_libur }}</td>
                                <td>{{ tanggl_id($d->tanggal) }}</td>
                                <td>{{ $d->keterangan }}</td>
                                <td width="100px">
                                    <input hidden type="time" 
                                            value="{{ format_jam($d->jam_masuk) }}" 
                                            name="jam_masuk[]" 
                                            id="jam_masuk{{ $d->id_detail }}" 
                                            onchange="recalculateLibur({{ $d->id_detail }})">
                                    {{ format_jam($d->jam_masuk) }}
                                </td>
                                <td width="100px">
                                    <input hidden type="time" 
                                        value="{{ format_jam($d->jam_pulang) }}" 
                                        name="jam_pulang[]" 
                                        id="jam_pulang{{ $d->id_detail }}" 
                                        onchange="recalculateLibur({{ $d->id_detail }})">
                                    {{ format_jam($d->jam_pulang) }}
                                </td>
                                <td width="100px">
                                    <span id="jam_lembur{{ $d->id_detail }}">
                                        {{ format_jam($d->jam_lembur) }}
                                    </span>
                                    <input type="hidden" name="jam_lembur[]" id="i_jam_lembur{{ $d->id_detail }}" value="{{ format_jam($d->jam_lembur) }}">
                                </td>
                                <div hidden>{{ $total_lembur_libur = $d->total_libur }} {{ $nomor_libur++ }}</div>
                            </tr>
                                        <input type="hidden" name="id[]" value="{{ $d->id_detail }}">
                                        <input type="hidden" name="hari_libur[]" value="{{ $d->hari_libur }}">
                                        <input type="hidden" name="jam_masuk_kantor[]" value="{{ $d->jam_masuk_kantor }}">
                                        <input type="hidden" name="jam_kerja_kantor[]" value="{{ $d->jam_kerja_kantor }}">
                                        <input type="hidden" name="jam_pulang_standar[]" value=" {{ $d->jam_pulang_standar }}">
                        @endif
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5">Total</td>
                            <td>
                                <span id="total_lembur_libur">
                                    {{ format_jam($total_lembur_libur) }}
                                </span>
                                <input type="hidden" id="i_total_libur" name="total_libur" value="{{ format_jam($total_lembur_libur) }}">
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <button hidden class="btn btn-primary btn-lg" type="submit">Simpan</button>
        </form>
    </div>
</div>



<script>
function togleRubah(){
    var status = document.getElementById("rubah").innerHTML;
    
    if(status == "Rubah"){
        document.getElementById("rubah").innerHTML = "Batal";

        for(var i=0; i<document.forms.form_lembur.length; i++){
            document.forms.form_lembur[i].hidden = false;
        }
    }else{
        document.getElementById("rubah").innerHTML = "Rubah";
        for(var i=0; i<document.forms.form_lembur.length; i++){
            document.forms.form_lembur[i].hidden = true;
        }
    } 
}

function recalculateLibur(id){
    
    var jam_masuk               = toMinutes(document.getElementById("jam_masuk"+id).value);
    var jam_pulang              = toMinutes(document.getElementById("jam_pulang"+id).value);
    var jam_lembur              = toMinutes(document.getElementById("jam_lembur"+id).textContent.trim());
    var total_lembur_libur      = toMinutes(document.getElementById("total_lembur_libur").textContent.trim());  


    var n_jam_lembur = jam_pulang-jam_masuk;
    var n_total_lembur = total_baru(total_lembur_libur, n_jam_lembur, jam_lembur);

    document.getElementById("jam_lembur"+id).innerHTML                  = toHourse(n_jam_lembur).substr(0,5);
    document.getElementById("i_jam_lembur"+id).value                    = toHourse(n_jam_lembur).substr(0,5);
    if(n_total_lembur == undefined){ 
        document.getElementById("total_lembur_libur").innerHTML         = "00:00";
    }else{
        document.getElementById("total_lembur_libur").innerHTML         = toHourse(n_total_lembur).substr(0,5);
        document.getElementById("i_total_libur").value                  = toHourse(n_total_lembur).substr(0,5);
    }


}

 function recalculate(id){
 var jam_masuk               = toMinutes(document.getElementById("jam_masuk"+id).value);
 var jam_pulang_standar      = toMinutes(document.getElementById("jam_pulang_standar"+id).value);
 var jam_pulang              = toMinutes(document.getElementById("jam_pulang"+id).value);
 var jam_masuk_kantor        = toMinutes(document.getElementById("jam_masuk_kantor"+id).value);
 var jam_kerja_kantor        = toMinutes(document.getElementById("jam_kerja_kantor"+id).value);
 var jam_lembur              = toMinutes(document.getElementById("jam_lembur"+id).textContent.trim());
 var total_lembur_biasa      = toMinutes(document.getElementById("total_lembur_biasa").textContent.trim());



 var n_jam_pulang_standar    = jam_pulang_standar_baru(jam_masuk, jam_masuk_kantor, jam_kerja_kantor);
 var n_jam_lembur            = jam_lembur_baru(n_jam_pulang_standar, jam_pulang);
 var n_total_biasa           = total_baru(total_lembur_biasa, n_jam_lembur, jam_lembur); 


 //Merubah Tampilan Pada Web Browser dan Values pada Hidden Input
    document.getElementById("jam_lembur"+id).innerHTML           = toHourse(n_jam_lembur).substr(0,5);
    document.getElementById("i_jam_lembur"+id).value             = toHourse(n_jam_lembur).substr(0,5);
    if(n_total_biasa == undefined){ 
        document.getElementById("total_lembur_biasa").innerHTML  = "00:00";
    }else{
        document.getElementById("total_lembur_biasa").innerHTML  = toHourse(n_total_biasa).substr(0,5);
        document.getElementById("i_total_biasa").value           = toHourse(n_total_biasa).substr(0,5);
    }

    document.getElementById("jam_pulang_standar"+id).value       = toHourse(n_jam_pulang_standar);

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

