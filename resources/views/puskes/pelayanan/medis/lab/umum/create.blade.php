@extends('layouts.admin.default')

@push('addcss')
<link rel="stylesheet" href="/admin/js/bootstrap-datepicker.min.css">

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
              <h3 class="card-title">Detail Pelayanan Medis</h3>
              <div class="card-tools">
                <a href="/pelayanan/medis" class="btn bg-gradient-info btn-sm">Lihat Semua</a>
              </div>
            </div>
            @if($data->ruangan->id == 1)
              {{-- Menu Untuk Poli Umum --}}
              @include('puskes.pelayanan.medis.menu_umum')
            @elseif($data->ruangan->id == 6)
              {{-- Menu Untuk Poli GIGI --}}
              @include('puskes.pelayanan.medis.menu_gigi')
            @elseif($data->ruangan->id == 10 OR $data->ruangan->id == 29)
              {{-- Menu Untuk Poli ANAK --}}
              @include('puskes.pelayanan.medis.menu_anak')
            @elseif($data->ruangan->id == 8)
              {{-- Menu Untuk Poli KIA --}}
              @include('puskes.pelayanan.medis.menu_kia')
            @endif
            <div class="row">
                <div class="col-md-4" style="padding-left: 15px; padding-top:15px; padding-right:15px;">
                    <!-- Form Element sizes -->
                    <div class="card card-success card-outline">
                      <div class="card-header">
                        <h3 class="card-title">Pasien Pulang</h3>
                      </div>
                      <form method="post" action="/pelayanan/medis/proses/{{$data->id}}">
                        @csrf
                      <div class="card-body">
                        <div class="input-group row">
                            <label class="col-sm-3 col-form-label text-right"><small>Status Pulang</small></label>
                            <div class="col-sm-9">
                                <select class="form-control form-control-sm" id="statuspulang_id" name="statuspulang_id" onchange="changetextbox();">
                                <option value="">-Pilih-</option>
                                @foreach ($sp as $item)
                                @if($item->id == $data->statuspulang_id)
                                  <option value="{{$item->id}}" selected>{{$item->nama}}</option>
                                @else
                                  <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endif
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="input-group row">
                            <label class="col-sm-3 col-form-label text-right"><small>Tgl Mulai</small></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm"  name="tgl_mulai" value="{{$data->tanggal}}">
                            </div>
                        </div>
                        <div class="input-group row">
                            <label class="col-sm-3 col-form-label text-right"><small>Tgl Selesai</small></label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" name="tgl_selesai" value="{{\Carbon\Carbon::now()}}">
                            </div>
                        </div>
                        <div class="input-group row">
                            <label class="col-sm-3 col-form-label text-right"><small>Tgl Rencana Kontrol</small></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" id="datepicker" name="rencana_kontrol">
                            </div>
                        </div>
                      </div>
                      <div class="card-footer">
                          
                        <a href="#" class="btn btn-primary btn-sm">Panggil</a>
                        @if($data->pendaftaran->status_periksa == 0)
                        <a href="/pelayanan/medis/proses/{{$data->id}}/mulai" class="btn btn-success btn-sm">Mulai Periksa</a>
                        @elseif($data->pendaftaran->status_periksa == 1)
                        <button type="submit" class="btn btn-danger btn-sm">Selesai Periksa</button>
                        @elseif($data->pendaftaran->status_periksa == 2)
                        <a href="/pelayanan/medis/proses/{{$data->id}}/mulai" class="btn btn-success btn-sm">Mulai Periksa</a>
                        @else
                        @endif  
                      </div>
                      </form>
                      <!-- /.card-body -->
                    </div>
                    
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
                                  <td>{{$data->pendaftaran->pasien->jenis_kelamin}}</td>
                                </tr>
                                <tr>
                                  <td>Tempat & Tanggal Lahir</td>
                                  <td>{{$data->pendaftaran->pasien->tempat_lahir}}, {{\Carbon\Carbon::parse($data->pendaftaran->pasien->tanggal_lahir)->format('d M Y')}}</td>
                                </tr>
                                <tr>
                                  <td>Alamat</td>
                                  <td>{{$data->pendaftaran->pasien->alamat}}</td>
                                </tr>
                                <tr>
                                  <td>Umur</td>
                                  <td>{{hitungUmur($data->pendaftaran->pasien->tanggal_lahir)}}</td>
                                </tr>
                                <tr>
                                  <td>Asuransi</td>
                                  <td>{{$data->pendaftaran->pasien->asuransi->nama}}</td>
                                </tr>
                              </tbody>
                          </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-md-8" style="padding-left: 15px; padding-top:15px; padding-right:15px;">
                    <div class="card card-info card-outline">
                      <div class="card-header">
                        <h3 class="card-title">Riwayat Laboratorium</h3>
                      </div>
                      <div class="card-body p-1 table-responsive">
                        <table id="example" class="table table-bordered table-sm" width="100%">
                          <thead>
                          <tr class="bg-gradient-primary" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                            <th>No</th>
                            <th>Tgl Periksa</th>
                            <th>Penanggung Jawab</th>
                            <th>Pemeriksaan</th>
                            <th>Hasil</th>
                            <th></th>
                          </thead>
                          <tbody>
                              <tr>
                                  <td>-</td>
                                  <td>-</td>
                                  <td>-</td>
                                  <td>-</td>
                                  <td>-</td>
                                  <td>-</td>
                              </tr>
                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    
                    <div class="card card-info card-outline">
                      <div class="card-header">
                        <h3 class="card-title">LABORATORIUM</h3>
                      </div>
                      <div class="card-body table-responsive p-2">
                          <table>
                              <tr>
                          @foreach ($lab as $item)
                          <td valign="top" style="padding-right: 10px">
                          <label>{{$item->kode}}</label><br>
                             @foreach ($item->laboratorium as $item2)
                             <input type="checkbox"><small>{{$item2->value}}</small><br />
                             @endforeach
                          <br />
                          </td>
                          @endforeach
                              </tr>
                          </table>
                          <table id="example" class="table table-bordered table-sm" width="100%">
                            <thead>
                            <tr class="bg-gradient-primary" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                              <th>Pemeriksaan</th>
                              <th>Tarif</th>
                              <th>Hasil</th>
                              <th>Nilai Normal</th>
                              <th>Satuan</th>
                              <th>Sampel</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                            </tbody>
                          </table>
                      </div>
                    </div>
                </div>
            </div>
              {{-- <div class="row">
                <div class="col-md-4">
                    <div class="card-body">
                      <table class="table table-sm table-bordered">
                        <tbody>
                          <tr>
                            <td>Puskesmas</td>
                            <td>{{Auth::user()->puskes->first()->nama}}</td>
                          </tr>
                          <tr>
                            <td>Asuransi</td>
                            <td>{{$data->asuransi->nama}}</td>
                          </tr>
                          <tr>
                            <td>No Asuransi</td>
                            <td>{{$data->no_asuransi}}</td>
                          </tr>
                          <tr>
                            <td>No KK</td>
                            <td>{{$data->no_kk}}</td>
                          </tr>
                          <tr>
                            <td>NIK</td>
                            <td>{{$data->nik}}</td>
                          </tr>
                          <tr>
                            <td>Nama</td>
                            <td>{{$data->nama}}</td>
                          </tr>
                          <tr>
                            <td>Jenis Kelamin</td>
                            <td>{{$data->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan'}}</td>
                          </tr>
                          <tr>
                            <td>Tempat Dan Tanggal Lahir</td>
                            <td>{{$data->tempat_lahir}} / {{$data->tanggal_lahir == null ? null : \Carbon\Carbon::parse($data->tanggal_lahir)->format('d-M-Y')}}</td>
                          </tr>
                          <tr>
                            <td>No. Dokumen RM</td>
                            <td>{{$data->no_dok_rm}}</td>
                          </tr>
                          <tr>
                            <td>No RM Lama</td>
                            <td>{{$data->no_rm_lama}}</td>
                          </tr>
                          <tr>
                            <td>Golongan Darah</td>
                            <td>{{$data->goldarah == null ? '-' : $data->goldarah->nama }}</td>
                          </tr>
                          <tr>
                            <td>Email</td>
                            <td>{{$data->email}}</td>
                          </tr>
                          <tr>
                            <td>No HP</td>
                            <td>{{$data->no_hp}}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-body">
                      <table class="table table-sm table-bordered">
                        <tbody>
                          <tr>
                            <td>Provinsi</td>
                            <td>{{$data->kelurahan == null ? '-' : $data->kelurahan->kecamatan->kota->provinsi->nama }}</td>
                          </tr>
                          <tr>
                            <td>Kota</td>
                            <td>{{$data->kelurahan == null ? '-' : $data->kelurahan->kecamatan->kota->nama }}</td>
                          </tr>
                          <tr>
                            <td>Kecamatan</td>
                            <td>{{$data->kelurahan == null ? '-' : $data->kelurahan->kecamatan->nama }}</td>
                          </tr>
                          <tr>
                            <td>Kelurahan</td>
                            <td>{{$data->kelurahan == null ? '-' : $data->kelurahan->nama }}</td>
                          </tr>
                          <tr>
                            <td>Alamat</td>
                            <td>{{$data->nik}}</td>
                          </tr>
                          <tr>
                            <td>RT/RW</td>
                            <td>{{$data->rt}}/{{$data->rw}}</td>
                          </tr>
                          <tr>
                            <td>Pekerjaan</td>
                            <td>{{$data->pekerjaan == null ? '': $data->pekerjaan->nama}}</td>
                          </tr>
                          <tr>
                            <td>Agama</td>
                            <td>{{$data->agama == null ? '': $data->agama->nama}}</td>
                          </tr>
                          <tr>
                            <td>Pendidikan</td>
                            <td>{{$data->pendidikan == null ? '': $data->pendidikan->nama}}</td>
                          </tr>
                          <tr>
                            <td>Status Perkawinan</td>
                            <td>{{$data->statuskawin == null ? '': $data->statuskawin->nama}}</td>
                          </tr>
                          <tr>
                            <td>Status Keluarga</td>
                            <td>{{$data->statuskeluarga == null ? '': $data->statuskeluarga->nama}}</td>
                          </tr>
                          <tr>
                            <td>Warga Negara</td>
                            <td>{{$data->warganegara}}</td>
                          </tr>
                          <tr>
                            <td>Nama Ayah</td>
                            <td>{{$data->nama_ayah}}</td>
                          </tr>
                          <tr>
                            <td>Nama Ibu</td>
                            <td>{{$data->nama_ibu}}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                </div>         
                <div class="col-md-4">
                    <div class="card-body">
                      <strong>Riwayat Pendaftaran :</strong>
                      <table class="table table-sm table-bordered">
                        <thead>
                          <tr style="font-size:13px;" class="bg-gradient-blue">
                            <th style="width: 10px;">No</th>
                            <th>Tgl Daftar</th>
                            <th>Instalasi</th>
                            <th>Poli / Ruangan</th>
                            <th style="width: 40px">Skrinning</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1.</td>
                            <td>2 Des 2019</td>
                            <td>Rawat Jalan</td>
                            <td>Umum</td>
                            <td></td>
                          </tr>
                        </tbody>
                      </table>
                      <br />
                      
                      <strong>Data Keluarga :</strong>
                      <table class="table table-sm table-bordered">
                        <thead>
                          <tr style="font-size:13px;" class="bg-gradient-blue">
                            <th style="width: 10px;">No</th>
                            <th>Nama</th>
                            <th>Status Keluarga</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1.</td>
                            <td>Siti</td>
                            <td>Anak</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                </div>
              </div> --}}
            <div class="card-footer">
                <div class="text-right">
                    <a href="/pendaftaran/pasien/edit/" class="btn btn-sm btn-info shadow"><i class="fas fa-print"></i> Cetak Hasil Periksa</a>
                    <a href="/pendaftaran/pasien/edit/" class="btn btn-sm btn-success shadow"><i class="fas fa-check"></i> Simpan</a>
                    <a href="/pendaftaran/pasien/delete/" class="btn btn-sm btn-danger shadow"  onclick="return confirm('Yakin Menghapus Semua Data Tentang Pasien Ini?');"><i class="fas fa-trash"></i> Hapus</a>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
    </div>
</section>
@endsection

@push('addjs')

<script src="/admin/js/bootstrap-datepicker.min.js"></script>
<script>
$(document).ready(function(){
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy'
    }).on('changeDate', function() {
        $('#formTanggal').submit();
    });
});
</script>
@endpush
