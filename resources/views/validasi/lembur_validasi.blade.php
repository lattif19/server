<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verivikasi QR</title>
</head>
<body>
    <h1> {{ $status }}</h1>

    <hr>
    <h2>Data Lembur</h2>
    <ul>
        <li>Nama : {{ DB::table("pegawai")->where("user_id", $data_lembur[0]->user_id)->get()[0]->nama }}</li>
        <li>Periode : {{ $data_lembur[0]->periode }}</li>
        <li>Lembur Hari Biasa : {{ $data_lembur[0]->total_biasa }}</li>
        <li>Total Hari Libur : {{ $data_lembur[0]->total_libur }}</li>
    </ul>

    <hr>
    <h2>Data Yang Tandatangan</h2>
    <ul>
        <li>Nama : {{ $data_creator[0]->nama }}</li>
    </ul>

    <hr>
    <h2>Riwayat Lembur</h2>
    
    @if($status == "Lembur-Diajukan")
        @for ($data=0; $data<count($riwayat); $data++)
            <ul>
                <li>Status :    {{ $riwayat[$data]->status_pengajuan }}</li>
                <li>Komentar :  {{ $riwayat[$data]->komentar }}</li>
                <li>Tanggal :   {{ $riwayat[$data]->created_at }}</li>
            </ul>
            @if($riwayat[$data]->status_pengajuan == "Diajukan")
                <?php break; ?>
            @endif
        @endfor
    @endif


    @if($status == "Lembur-Disetujui")
        @for ($data=0; $data<count($riwayat); $data++)
            <ul>
                <li>Status :    {{ $riwayat[$data]->status_pengajuan }}</li>
                <li>Komentar :  {{ $riwayat[$data]->komentar }}</li>
                <li>Tanggal :   {{ $riwayat[$data]->created_at }}</li>
            </ul>
            @if($riwayat[$data]->status_pengajuan == "Diajukan")
                
                <ul>
                    <li>Status :    {{ $riwayat[$data+1]->status_pengajuan }}</li>
                    <li>Komentar :  {{ $riwayat[$data+1]->komentar }}</li>
                    <li>Tanggal :   {{ $riwayat[$data+1]->created_at }}</li>
                </ul>
                <?php break; ?>
            @endif
        @endfor
    @endif


    @if($status == "Lembur-Selesai")
        @for ($data=0; $data<count($riwayat); $data++)
            <ul>
                <li>Status :    {{ $riwayat[$data]->status_pengajuan }}</li>
                <li>Komentar :  {{ $riwayat[$data]->komentar }}</li>
                <li>Tanggal :   {{ $riwayat[$data]->created_at }}</li>
            </ul>
        @endfor
    @endif



</body>
</html>