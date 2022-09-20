
@extends('layout.main')
@include('asset.sidebar.menu')

@section('container')
<style>
    a{
        text-decoration: none;
    }
</style>
<div class="container-fluid px-4">
    <h1 class="mt-4">{{ $title }}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">{{ $sub_title }}</li>
    </ol>
    
    <div class="row">
        
        <form   action="/kendaraan/service/tambah_pengajuan" 
                method="POST" 
                enctype="multipart/form-data">
            @csrf
            <div class="modal-body">

                @if(request()->no_polisi != "service")
                    <strong>{{ request()->no_polisi }}</strong>
                    <select name="a_kendaraan_id" class="form-control" hidden>
                        @foreach ($kendaraan as $i)
                            <option value="{{ $i->id }}"
                                @if( $i->no_polisi == request()->no_polisi)
                                selected
                                @endif
                                >
                                {{ $i->nama }}
                            </option>
                        @endforeach
                    </select>
                @else
                <select name="a_kendaraan_id" class="form-control">
                    @foreach ($kendaraan as $i)
                        <option value="{{ $i->id }}"
                            @if( $i->no_polisi == request()->no_polisi)
                            selected
                            @endif
                            >
                            {{ $i->nama }}
                        </option>
                    @endforeach
                </select>
                @endif

                <select name="a_jenis_service_id" class="form-control">
                    @foreach ($jenis_service as $i)
                    <option value="{{ $i->id }}">{{ $i->nama }}</option>
                    @endforeach
                </select>
                <input class="form-control" type="text" name="nama_bengkel" placeholder="Nama Bengkel" required> 
                <textarea class="form-control" name="keterangan" rows="10" placeholder="Deskripsi Kerusakan / Perbaikan" required></textarea>
                <input class="form-control" type="date" name="tanggal_booking" value="{{ date('Y-m-d') }}">  
                <input class="form-control" type="date" name="tanggal_masuk" value="{{ date('Y-m-d') }}"> 
                <input class="form-control" type="number" name="estimasi" placeholder="1000000">
                <input type="file" name="service_kerusakan[]" multiple class="form-control">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" name="aksi" value="tambah">Ajukan</button>
            </div>
        </form>

    </div>
</div>

@endsection

