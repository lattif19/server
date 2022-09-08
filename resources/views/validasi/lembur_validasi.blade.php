<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verivikasi QR</title>
    <link   rel="stylesheet" 
            href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
            crossorigin="anonymous">
</head>
<body>

    
    <h1 align="center"> Lembur Terverifikasi <img src="/img/verif.png" width="30"> </h1> 
</td>

    <hr>
    


<h2>Data Lembur</h2>
    <table border="1">
        <thead>
            <tr>   
                <td>Nama</td>
                <td>Periode</td>
                <td>Lembur Hari Biasa</td>
                <td>Lembur Hari Libur</td>
            </tr>
        </thead>
        <tr>
            <td width="250px">{{ DB::table("pegawai")->where("user_id", $data_lembur[0]->user_id)->get()[0]->nama }}</td>
            <td width="250px">{{ $data_lembur[0]->periode }}</td>
            <td width="250px">{{ $data_lembur[0]->total_biasa }}</td>
            <td width="250px">{{ $data_lembur[0]->total_libur }}</td>
        </tr>
    </table>
<hr>
    

   
    <h2>Riwayat Lembur</h2>

            <table border="1">
            
                    <tr>
                        <td width="300px">Tanggal</td>
                        <td width="300px">Status</td>
                        <td width="300px">Keterangan</td>
                    </tr>
                
            @for ($data=0; $data<count($riwayat); $data++)
                    <tr>
                        <td>{{ $riwayat[$data]->created_at }}</td>
                        <td>{{ $riwayat[$data]->status_pengajuan }}</td>
                        <td>{{ $riwayat[$data]->komentar }}</td>
                    </tr>
                    @if($status == "Lembur-Disetujui" && $riwayat[$data]->status_pengajuan == "Disetujui")
                        <?php break; ?>
                    @elseif($status == "Lembur-Diajukan" && $riwayat[$data]->status_pengajuan == "Diajukan")
                        <?php break; ?>
                    @endif
            @endfor
        </table>
    <hr>


<h2 align="center">Mengetahui</h2>
<br>
<br>
<br>
<br>
        <h3 align="center">{{ $data_creator[0]->nama }}</h3>

<hr>
    



</body>
</html>