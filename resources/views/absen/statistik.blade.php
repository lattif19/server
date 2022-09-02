@extends('layout.main')
@include('absen.sidebar.menu')

@section('container')
<div class="container-fluid px-4">
    <h1 class="mt-4">{{ $title }}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">PT Sumber Segara Primadaya</li>
    </ol>
    
    <div class="row">
        <div class="col-xl-12">
            <div class="card mb-4">
                <div class="card-header">
                    <button class="btn btn-default">Pilih Periode</button>
                </div>
                <div class="card-body">
                    <div style="width: 800px;">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div hidden>
    <input type="hidden" id="jam-masuk"     value="{{ $jam_masuk }}">
    <input type="hidden" id="jam-kantor"    value="08.00,08.00,08.00,08.00,08.00,08.00,08.00">
    <input type="hidden" id="jam-pulang"    value="{{ $jam_pulang }}">
    <input type="hidden" id="tanggal"       value="{{ $tanggal }}">
</div>






<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    
    var jam_masuk  = document.getElementById("jam-masuk").value.trim().split(",");
    var jam_pulang = document.getElementById("jam-pulang").value.trim().split(",");
    var jam_kantor = document.getElementById("jam-kantor").value.trim().split(",");
    var tanggal    = document.getElementById("tanggal").value.trim().split(",");
    
var data_masuk   = []; 
var data_pulang  = []; 
var data_kantor  = []; 
var labels       = [];


for(var i in jam_masuk){
    data_masuk.push(jam_masuk[i]);
}

for(var i in jam_pulang){
    data_pulang.push(jam_pulang[i]);
}

for(var i in jam_kantor){
    data_kantor.push(jam_kantor[i]);
}

for(var i in tanggal){
    labels.push(tanggal[i]);
}
  const data = {
    labels: labels,
    datasets: [

    {
      label: 'Jam Kantor',
      type: ['line'],
      backgroundColor: 'balck',
      borderColor: 'black',
      data: jam_kantor,
    },

    {
      label: 'Jam Masuk',
      type: ['line'],
      backgroundColor: 'skyblue',
      borderColor: 'skyblue',
      data: jam_masuk,
    },

    {
      label: 'Jam Pulang',
      type: ['bar'],
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: jam_pulang,
    },


],

  };

  const config = {
    data: data,
    options: {
        scales: {
            x: {
                //type: "time",
                
            },
            y:{
                min : 6,
                max: 24,
                type: 'linear',
                ticks : {
                    stepSize : 2,
                },
            }
        }
    }
  };

  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );


</script>
@endsection