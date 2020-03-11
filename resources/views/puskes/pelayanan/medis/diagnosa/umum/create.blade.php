@extends('layouts.admin.default')

@push('addcss')
<link rel="stylesheet" href="/admin/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush

@section('content-header')
<div class="content-header">
    <div class="row">
    </div>
</div>
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Buat Baru Diagnosa</h3>
              <div class="card-tools">
                <a href="/pelayanan/medis/proses/{{$data->id}}" class="btn bg-gradient-danger btn-sm">Kembali</a>
              </div>
            </div>

            @include('puskes.pelayanan.medis.menu_umum')

            <div class="row">
                <div class="col-md-4" style="padding-left: 15px; padding-top:15px; padding-right:15px;">
                    <!-- Form Element sizes -->
                    <div class="card card-success card-outline">
                      <div class="card-header">
                        <h3 class="card-title">Data Pasien</h3>
                      </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-sm" style="font-size:15px;">
                                <tbody>
                                  <tr>
                                    <td>ID Pelayanan</td>
                                    <td>{{$data->id}}</td>
                                  </tr>
                                  <tr>
                                    <td>Tanggal</td>
                                    <td>{{$data->tanggal}}</td>                            
                                  </tr>
                                  <tr>
                                    <td>Poli/Ruangan</td>
                                    <td>{{$data->ruangan->nama}}</td>     
                                  </tr>
                                  <tr>
                                    <td>No. eRM</td>
                                    <td>{{$data->pendaftaran->pasien->id}}</td>    
                                  </tr>
                                  <tr>
                                    <td>No RM Lama</td>
                                    <td>{{$data->pendaftaran->pasien->no_rm_lama}}</td>   
                                  </tr>
                                  <tr>
                                    <td>No Dokumen RM</td>
                                    <td>{{$data->pendaftaran->pasien->no_dok_rm}}</td>
                                  </tr>
                                  <tr>
                                    <td>NIK</td>
                                    <td>{{$data->pendaftaran->pasien->nik}}</td>
                                  </tr>
                                  <tr>
                                    <td>Nama KK</td>
                                    <td>-</td>
                                  </tr>
                                  <tr>
                                    <td>Nama</td>
                                    <td>{{$data->pendaftaran->pasien->nama}}</td>
                                  </tr>
                                  <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>{{$data->pendaftaran->pasien->jkel}}</td>
                                  </tr>
                                  <tr>
                                    <td>Tempat & Tanggal Lahir</td>
                                    <td>{{$data->pendaftaran->pasien->tempat_lahir}}, {{\Carbon\Carbon::parse($data->pendaftaran->pasien->tgl_lahir)->format('d M Y')}}</td>
                                  </tr>
                                  <tr>
                                    <td>Alamat</td>
                                    <td>{{$data->pendaftaran->pasien->alamat}}</td>
                                  </tr>
                                  <tr>
                                    <td>Umur</td>
                                    <td>{{hitungUmur($data->pendaftaran->pasien->tgl_lahir)}}</td>
                                  </tr>
                                  <tr>
                                    <td>Asuransi</td>
                                    <td>{{$data->pendaftaran->pasien->asuransi->nama}}</td>
                                  </tr>
                                </tbody>
                            </table>
                        </div>
                      <div class="card-footer">
                          
                      </div>
                      <!-- /.card-body -->
                    </div>
                    
                    <div class="card card-success card-outline">
                      <div class="card-header">
                        <h3 class="card-title">Riwayat</h3>
                      </div>
                      <div class="card-body">
                          
                      </div>
                      <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-md-8" style="padding-left: 15px; padding-top:15px; padding-right:15px;">
                    <div class="card card-success card-outline">
                      <div class="card-header">
                        <h3 class="card-title">Riwayat Penyakit</h3>
                      </div>
                      
                      <div class="row">
                          
                      </div>
                      <!-- /.card-body -->
                    </div>
                    
                    <div class="card card-success card-outline">
                      <div class="card-header">
                        <h3 class="card-title">DIAGNOSA</h3>
                        <div class="card-tools">
                        </div>
                      </div>
                      <div class="card-body p-1 table-responsive">
                        <table id="example" class="table table-bordered table-sm">
                          <thead>
                          <tr class="bg-gradient-primary" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                            <th>Dokter /Tenaga Medis</th>
                            <th>Perawat / Bidan</th>
                            <th>ICD-X</th>
                            <th>Diagnosa</th>
                            <th>Jenis</th>
                            <th>Kasus</th>
                            <th>Aksi</th>
                          </thead>
                          <tbody>
                              <tr>
                                  <td>
                                    <select name="dokter_id" class="form-control form-control-sm select2">
                                      @foreach ($dokter as $item)
                                      <option value="{{$item->id}}">{{$item->nama}}</option>
                                      @endforeach
                                    </select>
                                  </td>
                                  <td>
                                    <select name="dokter_id" class="form-control form-control-sm select2">
                                      @foreach ($perawat as $item)
                                      <option value="{{$item->id}}">{{$item->nama}}</option>
                                      @endforeach
                                    </select>
                                  </td>
                                  <td>
                                    <select name="dokter_id" class="form-control select2">
                                      @foreach ($diagnosa as $item)
                                      <option value="{{$item->id}}">{{$item->id}}</option>
                                      @endforeach
                                    </select>
                                  </td>
                                  <td>
                                    <input type="text" class="form-control">
                                  </td>
                                  <td>
                                    <select name="diagnosa_jenis" class="form-control select2">
                                      <option value="PRIMER">PRIMER</option>
                                      <option value="SEKUNDER">SEKUNDER</option>
                                      <option value="KOMPLIKASI">KOMPLIKASI</option>
                                    </select>
                                  </td>
                                  <td>
                                    <select name="diagnosa_kasus" class="form-control form-control-sm  select2">
                                      <option value="BARU">BARU</option>
                                      <option value="LAMA">LAMA</option>
                                    </select>
                                  </td>
                                  <td>
                                      <a href="#" class="btn btn-sm btn-success"><i class="fas fa-save"></i></a>
                                  </td>
                              </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                {{-- <div class="text-right">
                    <a href="/pendaftaran/pasien/edit/" class="btn btn-sm btn-info shadow"><i class="fas fa-print"></i> Cetak Pengantar Rujukan</a>
                    <a href="/pendaftaran/pasien/delete/" class="btn btn-sm btn-info shadow"  onclick="return confirm('Yakin Menghapus Semua Data Tentang Pasien Ini?');"><i class="fas fa-trash"></i> Cetak</a>
                </div> --}}
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
    </div>
</section>
@endsection

@push('addjs')

<script src="/admin/plugins/select2/js/select2.full.min.js"></script>
<script>  
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    
  });
</script>

@endpush
