
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
                <div class="col-lg-12">
                    <div class="nav card">
                        <div class="card-header d-flex justify-content-between">
                            <button class="btn btn-dark text-light" data-toggle="modal" data-target="#tambahPengajuanService" >Pengajuan Perbaikan</button>
                            <form action="/kendaraan/service">
                                <input type="search" name="cari" value="{{ request()->cari }}">
                                <button type="submit" class="bnt btn-sm btn-dark">Cari</button>
                            </form>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Nama Mobil</td>
                                        <td>No Polisi</td>
                                        <td>Nama Bengkel</td>
                                        <td>Biaya Service</td>
                                        <td>Driver PIC</td>
                                        <td>Jenis Service</td>
                                        <td>Status Perbaikan</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($service as $i)
                                    <tr>
                                        <td>{{ $service->firstItem() + $loop->index }}</td>
                                        <td>{{ $i->a_kendaraan->nama }}</td>
                                        <td>{{ $i->a_kendaraan->no_polisi }}</td>
                                        <td>{{ $i->nama_bengkel }}</td>
                                        <td>{{ $i->biaya }}</td>
                                        <td>{{ $i->user->pegawai->nama }}</td>
                                        <td>{{ $i->a_jenis_service->nama }}</td>
                                        <td>{{ $i->a_status_perbaikan->nama }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>
                                            {{ $service->withQueryString()->links() }}
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

                {{-- Modal Pengajuan Service --}}
                <div class="modal fade" id="tambahPengajuanService" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="tambahPengajuanService">Tambah Pengajuan Service</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
        
                        <form action="/kendaraan/service/tambah_pengajuan" method="POST">
                            @csrf
                            <div class="modal-body">
                                <select name="a_kendaraan_id" class="form-control">
                                    @foreach ($kendaraan as $i)
                                        <option value="{{ $i->id }}">{{ $i->nama }}</option>
                                    @endforeach
                                </select>

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
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" name="aksi" value="tambah">Ajukan</button>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>

@endsection

