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
                            <form action="/absen" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="test" value="test">
                                <input type="file" 
                                        name="absensi" 
                                        class="btn btn-lg btn-default">
                                <button class="btn btn-primary" type="submit">Upload</button>
                            </form>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>Person ID</td>
                                        <td>Nama</td>
                                        <td>Tanggal</td>
                                        <td>Jam Masuk</td>
                                        <td>Jam Pulang</td>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($absensi as $absen)
                                    <tr>
                                        <td>{{ $absen->absen_id }}</td>
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
            </div>
        </div>
@endsection