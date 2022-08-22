<link rel="stylesheet" href="/css/bootstrap.min.css">


<style>
    @page {
    size: 21mm 29.7mm;
    margin: 25mm;
    }

    html{
        font-size : 12px;
    }
</style>
<div hidden>
    {{ $id_approve = DB::table('pegawai')->where("user_id", auth()->user()->id)->get()[0]->lembur_approve_id}}
    {{ $tanggal_pengajuan = DB::table("lembur_riwayat_pengajuan")->where("lembur_pengajuan_id", $lembur[0]->id)->where("status_pengajuan", "Diajukan")->orderBy("id", "desc")->limit("1")->get() }}
    {{ $tanggal_approve = DB::table("lembur_riwayat_pengajuan")->where("lembur_pengajuan_id", $lembur[0]->id)->where("status_pengajuan", "Disetujui")->orderBy("id", "desc")->limit("1")->get() }}
    {{ $tanggal_diterima = DB::table("lembur_riwayat_pengajuan")->where("lembur_pengajuan_id", $lembur[0]->id)->where("status_pengajuan", "Diterima")->orderBy("id", "desc")->limit("1")->get() }}
</div>
@if(count($lembur) > 0) 

<table>
    <tr>
        <td>
            <img src="{{ asset("/img/logo.jpg") }}" alt="Logo" width="90px">
        </td>
        <td>
            <h1 class="ml-4">
               <strong>
                   Formulir Pengajuan Lembur
                </strong>
            </h1>
        </td>
    </tr>
</table>


    
<br class="mt-6 mb-6">
<h4 class="mt-3 mb-3" >Pengajuan Hari Biasa</h4>
<table border="1" width="100%">
    <tr align="center" cellpadding="7">
        <td width="35px">No</td>
        <td width="185px">Tanggal</td>
        <td>Keterangan / Deskripsi</td>
        <td width="80px">Jam <br> Masuk</td>
        <td width="80px">Jam <br> Kerja</td>
        <td width="100px">Jam Pulang <br> Standar</td>
        <td width="100px">Jam Pulang <br> Sebenarnya</td>
        <td width="80px">Jumlah <br> Lembur</td>
    </tr>

    <div hidden>{{ $urut=1 }}</div>
    @foreach ($lembur as $l)
        @if($l->hari_libur == 0)
            <tr>
                <td  align="center" >{{ $urut }}</td>
                <td>&nbsp;{{ tanggl_id($l->tanggal) }}</td>
                <td>&nbsp;{{ $l->keterangan }}</td>
                <td  align="center" >{{ format_jam($l->jam_masuk) }}</td>
                <td  align="center" >{{ format_jam($l->jam_kerja_kantor) }}</td>
                <td  align="center" >{{ format_jam($l->jam_pulang_standar) }}</td>
                <td  align="center" >{{ format_jam($l->jam_pulang) }}</td>
                <td  align="center" >{{ format_jam($l->jam_lembur) }}</td>
            </tr>
            <div hidden>{{ $urut++ }} {{ $total_lembur_biasa = $l->total_biasa }}</div>
        @endif
    @endforeach
    <tr align="center">
        <td colspan="7">Total</td>
        <td>{{ format_jam($total_lembur_biasa) }}</td>
    </tr>
</table>


<br class="mt-6 mb-6">
<h4 class="mt-3 mb-3" >Pengajuan Hari Libur</h4>
<table border="1" width="100%">
    <tr align="center">
        <td width="35px">No</td>
        <td width="185px">Tanggal</td>
        <td>Keterangan / Deskripsi</td>
        <td width="100px">Jam <br> Masuk</td>
        <td width="100px">Jam Pulang <br>Sebenarnya</td>
        <td width="100px">Jumlah <br>Lembur</td>
    </tr>

    <div hidden>{{ $urut2=1 }} {{ $total_lembur_libur=0 }}</div>

    @foreach ($lembur as $l)
        @if($l->hari_libur == 1)
                <tr>
                    <td>{{ $urut2 }}</td>
                    <td>&nbsp;{{ tanggl_id($l->tanggal) }}</td>
                    <td>&nbsp;{{ $l->keterangan }}</td>
                    <td align="center">{{ format_jam($l->jam_masuk) }}</td>
                    <td align="center">{{ format_jam($l->jam_pulang) }}</td>
                    <td align="center">{{ format_jam($l->jam_lembur) }}</td>
                </tr>
                <div hidden>{{ $urut2++ }} {{ $total_lembur_libur = $l->total_libur }}</div>                
        @endif
    @endforeach
    @if ($total_lembur_libur == 0)
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>{{ format_jam($total_lembur_libur) }}</td>
    </tr>
    @endif
    <tr>
        <td colspan="5" align="center">Total</td>
        <td align="center">{{ format_jam($total_lembur_libur) }}</td>
    </tr>
</table>

<h1>&nbsp;</h1>
<table border="0" width=100%>
    <tr align="center">
        <td>Diajukan Oleh</td>
        <td>Disetujui Oleh</td>
        <td>Diterima Oleh</td>
    </tr>
    <tr align="center">
        <td>{{ tanggl_id($tanggal_pengajuan[0]->created_at) }} <br><br><br><br> </td>
        <td>@if(count($tanggal_approve) > 0)  {{ tanggl_id($tanggal_approve[0]->created_at) }} <br><br><br><br> @endif </td>
        <td>@if(count($tanggal_diterima) > 0) {{ tanggl_id($tanggal_diterima[0]->created_at) }} <br><br><br><br> @endif</td>
    </tr>
    <tr align="center">
        <td>{{ DB::table('pegawai')->where("user_id", auth()->user()->id)->get()[0]->nama }}</td>
        <td>
            @if($id_approve > 0)
            {{ DB::table('pegawai')->where("user_id", $id_approve)->get()[0]->nama }}
            @else
            -- Belum Ditentukan --
            @endif
        </td>
        <td>HR & GA</td>
    </tr>
</table>

@else
<p align="center">

    <h1 class="mt-10">Pengajuan Lembur</h1>
    <h4 class="mt-5">
        Tidak dapat di print karena belum ada perhitungan lembur
    </h4>
</p>
@endif
<script type="text/javascript">
        window.print(); 
</script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
crossorigin="anonymous"></script>