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
    @foreach($riwayat as $i)
        <ul>
            <li>Status : {{ $i->status_pengajuan }}</li>
            <li>Komentar : {{ $i->komentar }}</li>
            <li>Tanggal : {{ $i->created_at }}</li>
        </ul>
        @endforeach
</body>
</html>