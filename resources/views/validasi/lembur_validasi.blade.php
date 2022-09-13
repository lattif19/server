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
            <link href="/css/time-line.css" rel="stylesheet" />

    <style>
            body {
  padding: 25px;
  background-image: url("/img/verif1.png");
  background-repeat: no-repeat;
  background-size:250px 230px;
    background-attachment: fixed;
  background-position: center; 
  background-origin: content-box;
}
    </style>

<i><img src="/img/logo.jpg" width="100"></i>
</head>
<body>

    
    <h1 align="center"> Riwayat Lembur {{-- img src="/img/verif.png" width="30"> --}} </h1> 

    <hr>
    


<h4 align="center">Data Lembur</h4>
    <table border="1" align="center">
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
    

   
{{--     <h2>Riwayat Lembur</h2>

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
                    
            @endfor
        </table>
    <hr>


<h2 align="center">Mengetahui</h2>
<br>
<br>
<br>
<br>
        <h3 align="center">{{ $data_creator[0]->nama }}</h3>

<hr> --}}
    

{{-- <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card"> --}}
                {{-- <div id="verif"> --}}
                    <div>
                        @for ($data=0; $data<count($riwayat); $data++)
                        <div id="content">
                            <ul class="timeline">
                                <li class="event" data-date=" {{ $riwayat[$data]->created_at }} ">
                                    <h3> {{ $riwayat[$data]->status_pengajuan }} </h3>
                                    <i> {{ $riwayat[$data]->komentar }} </i>
                                    @if($status == "Lembur-Disetujui" && $riwayat[$data]->status_pengajuan == "Disetujui")
                                        <?php break; ?>
                                    @elseif($status == "Lembur-Diajukan" && $riwayat[$data]->status_pengajuan == "Diajukan")
                                        <?php break; ?>
                                    @endif
                                </li>
                                {{-- <li class="event" data-date="{{ $riwayat[$data]->created_at }}">
                                    <h3>Opening Ceremony</h3>
                                    <p>Get ready for an exciting event, this will kick off in amazing fashion with MOP &amp; Busta Rhymes as an opening show.</p>
                                </li>
                                <li class="event" data-date="{{ $riwayat[$data]->created_at }}">
                                    <h3>Main Event</h3>
                                    <p>This is where it all goes down. You will compete head to head with your friends and rivals. Get ready!</p>
                                </li>
                                <li class="event" data-date="{{ $riwayat[$data]->created_at }}">
                                    <h3>Closing Ceremony</h3>
                                    <p>See how is the victor and who are the losers. The big stage is where the winners bask in their own glory.</p> --}}
                                {{-- </li> --}}
                            </ul>
                        </div>
                    @endfor
                    </div>
                    
                {{-- </div> --}}
             {{-- </div>
        </div>
    </div>
</div> --}}
<hr>
<h5 align="right">Penanggung Jawab</h5>
<div align="right"> <i text-aligm="right">{{ $data_creator[0]->nama }}</i> </div>


</body>
</html>