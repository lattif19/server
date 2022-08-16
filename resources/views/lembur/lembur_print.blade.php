<link rel="stylesheet" href="/css/bootstrap.min.css">


<style>
    @page {
    size: 21mm 29.7mm;
    margin: 20mm 20mm 20mm 20mm;
    }

    html{
        font-size : 12px;
    }
</style>
<table>
    <tr>
        <td>
            <img src="{{ asset("/img/logo.jpg") }}" alt="Logo" width="50px">
        </td>
        <td>
            <h2>Formulir Pengajuan Lembur</h2>
        </td>
    </tr>
</table>


<br class="mt-6 mb-6">
<h5 class="mt-3 mb-3" >Pengajuan Hari Biasa</h5>
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
                <td>{{ tanggl_id($l->tanggal) }}</td>
                <td>{{ $l->keterangan }}</td>
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
<h5 class="mt-3 mb-3" >Pengajuan Hari Libur</h5>
<table border="1" width="100%">
    <tr align="center">
        <td width="35px">No</td>
        <td width="185px">Tanggal</td>
        <td>Keterangan / Deskripsi</td>
        <td>Jam <br> Masuk</td>
        <td>Jam Pulang <br>Sebenarnya</td>
        <td>Jumlah <br>Lembur</td>
    </tr>

    <div hidden>{{ $urut2=1 }} {{ $total_lembur_libur=0 }}</div>

    @foreach ($lembur as $l)
        @if($l->hari_libur == 1)
                <tr>
                    <td>{{ $urut2 }}</td>
                    <td>{{ tanggl_id($l->tanggal) }}</td>
                    <td>{{ $l->keterangan }}</td>
                    <td>{{ format_jam($l->jam_masuk) }}</td>
                    <td>{{ format_jam($l->jam_pulang) }}</td>
                    <td>{{ format_jam($l->jam_lembur) }}</td>
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
        <td colspan="5">Total</td>
        <td>{{ format_jam($total_lembur_libur) }}</td>
    </tr>
</table>

<script type="text/javascript">
        window.print(); 
</script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
crossorigin="anonymous"></script>