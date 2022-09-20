@extends('layout.main')
@include('absen.sidebar.menu')

@section('container')
        <div class="container-fluid px-4">
            <h1 class="mt-4">{{ $title }}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">PT Sumber Segara Primadaya</li>
            </ol>
            
            {{-- <div class="row"> --}}
                <div class="content">
                    <div class="box">
                        <div class="box-header">
                            <div class="form-control">
                                <form action="/absen" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="test" value="test">
                                    <input type="file" 
                                            name="absensi" 
                                            class="btn btn-lg btn-default" required>
                                    <button class="btn btn-primary" type="submit">Upload</button>
                                </form>
                            </div>
                        </div>
                        <div class="box-body table-respon mt-4">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Nama</td>
                                        <td>Tanggal</td>
                                        <td>Jam Masuk</td>
                                        <td>Jam Pulang</td>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($absensi as $absen)
                                    <tr>
                                        <td width="50px">{{ $absen->absen_id }}</td>
                                        <td>{{ $absen->nama }}</td>
                                        <td>{{ $absen->tanggal }}</td>
                                        <td>{{ $absen->jam_masuk }}</td>
                                        <td>{{ $absen->jam_pulang }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $absensi->links() !!}
                            
                        </div>
                    </div>
                </div>
            {{-- </div> --}}
        </div>
@endsection
