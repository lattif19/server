
@extends('layout.main')
@include('lembur.sidebar.menu')

@section('container')
<style>
    a{
        text-decoration: none;
    }
</style>
<div hidden>
    {{ $jenis_report    = request()->jenis_report }}
    {{ $filter          = request()->filter }}
</div>
<div class="container-fluid px-4">
   <div>

       <div class="row">
           <h1 class="mt-4">{{ $title }}</h1>
        </div>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">PT Sumber Segara Primadaya</li>
        </ol>
    </div>
    
    <div class="row">
        <div class="col-lg-12 ">
            <div class="col">
                <a href="#" class="btn btn-primary" data-toggle="collapse" id="hide_filter" aria-expanded="true">
                    <i class="fa fa-filter"></i>
                    <span class="hidden-xs" >Show Filter</span>
                </a>
                <div class="card">
                    <div class="card-header">
                        <div class="card-body">
                            <form action="/lembur_report" method="get" id="show">
                                <div class="form-group">
                                    <label for="periode" class="mb-2"> <strong>Periode Lembur</strong></label>
                                    <select name="periode" class="form-control">
                                        @foreach ($periode as $p)
                                            <option value="{{ $p->periode }}" @if($periode_hari_ini == $p->periode) selected @endif id="periode_lembur"> {{ $p->periode }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mt-3">
                                    <div class="mb-2"><strong>Jenis Laporan</strong></div>
                                    <div class="form-check form-check-inline">
                                        <input  class="form-check-input" 
                                                type="radio" 
                                                name="jenis_report" 
                                                id="inlineRadio1" 
                                                value="general" 
                                                @if($jenis_report == false || $jenis_report == "general") checked @endif>
                                        <label class="form-check-label" for="inlineRadio1">General</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" 
                                                type="radio" 
                                                name="jenis_report" 
                                                id="inlineRadio2" 
                                                value="detail" 
                                                @if($jenis_report == "detail") checked @endif>
                                        <label class="form-check-label" for="inlineRadio2">Detail</label>
                                    </div>
                                </div>


                                <div class="form-group mt-3">
                                    <div class="mb-2"><strong>Status</strong></div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" 
                                                type="radio" 
                                                name="filter" 
                                                id="inlineRadio1" 
                                                value="semua"  
                                                @if($filter == false || $filter == "semua") checked @endif>
                                        <label class="form-check-label" for="inlineRadio1">Semua</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" 
                                                type="radio" 
                                                name="filter" 
                                                id="inlineRadio2" 
                                                value="disetujui" 
                                                @if($filter == "disetujui") checked @endif>
                                        <label class="form-check-label" for="inlineRadio2">Disetujui</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" 
                                                type="radio" 
                                                name="filter" 
                                                id="inlineRadio2" 
                                                value="diajukan" 
                                                @if($filter == "diajukan") checked @endif>
                                        <label class="form-check-label" for="inlineRadio2">Diajukan</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" 
                                                type="radio" 
                                                name="filter" 
                                                id="inlineRadio3" 
                                                value="selesai" 
                                                @if($filter == "selesai") checked @endif>
                                        <label class="form-check-label" for="inlineRadio3">Selesai</label>
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <button class="btn btn-warning text-light btn-block">
                                        <i class="fa fa-check"></i>
                                        Apply
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header nav justify-content-between">
                    <h5>Laporan Lembur</h5>
                    <h5>
                        
                        <button class="btn btn-dark text-light" onclick="ExportToExcel('xlsx')">Export to Excel</button>
                    </h5>
                </div>
                <div class="card-body">
                    @if(request()->jenis_report == null || request()->jenis_report== "general")
                        <table class="table table-bordered" id="tbl_exporttable_to_xls">
                            <tr class="bg-dark text-light">
                                <td width="50px">No</td>
                                <td>Nama</td>
                                <td>Lembur Biasa</td>
                                <td>Lembur Libur</td>
                                <td>status</td>
                            </tr>
                            @foreach ($data_lembur as $i)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $i->nama }}</td>
                                <td>{{ format_jam($i->total_biasa) }}</td>
                                <td>{{ format_jam($i->total_libur) }}</td>
                                <td>{{ $i->status }}</td>
                            </tr>
                            @endforeach
                        </table>
                    @else
                    <table class="table table-bordered" id="tbl_exporttable_to_xls">
                        <tr class="bg-dark text-light">
                            <td width="50px">No</td>
                            <td>Nama</td>
                            <td>Tanggal Lembur</td>
                            <td>Keterangan</td>
                            <td >Jam Masuk</td>
                            <td >Jam Pulang Standar</td>
                            <td >Jam Pulang Sebenarnya</td>
                            <td >Jam Lembur</td>
                            <td >Status Hari</td>
                        </tr>
                        @foreach ($data_lembur as $i)
                        <tr>
                            <td >{{ $loop->index+1 }}</td>
                            <td>{{ $i->nama }}</td>
                            <td>{{ tanggl_id($i->tanggal) }}</td>
                            <td>{{ $i->keterangan }}</td>
                            <td>{{ format_jam($i->jam_masuk) }}</td>
                            <td>{{ format_jam($i->jam_pulang_standar) }}</td>
                            <td>{{ format_jam($i->jam_pulang) }}</td>
                            <td>{{ format_jam($i->jam_lembur) }}</td>
                            <td>
                                @if($i->hari_libur == 0) Hari Biasa @endif
                                @if($i->hari_libur == 1) Hari Libur @endif
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
        
        
</div>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script>

function ExportToExcel(type, fn, dl) {
       var elt = document.getElementById('tbl_exporttable_to_xls');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
       var periode = document.getElementById("periode_lembur").value.trim();

       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fn || ('Lembur_'+periode+'.'+ (type || 'xlsx')));
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



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
$("#show").hide();
  $("#hide_filter").click(function(){
    $("#show").show();
  });
});
</script>