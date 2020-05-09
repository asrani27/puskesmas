@extends('layouts.admin.default')

@push('addcss')
<link rel="stylesheet" href="/admin/js/bootstrap-datepicker.min.css">

<link rel="stylesheet" href="/admin/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<style>
.select2-selection__rendered {
    line-height: 20px !important;
    font-size:14px;
}
.select2-container .select2-selection--single {
    height: 31px !important;
    padding-bottom: 5px;
}
.select2-selection__arrow {
    height: 25px !important;
    padding-bottom: 5px;
}

.myFont{
  font-size:13px;
}
</style>
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
              <h3 class="card-title">Data Periksa Gizi</h3>
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
                          <h3 class="card-title">Antropometri</h3>
                        </div>
                      <form method="POST" action="{{route('periksagizi',['id' => $data->id])}}">
                        @csrf
                      <div class="row">
                        <div class="col-md-6">
                            <div class="card-body">
                            <div class="input-group row">
                                <label class="col-sm-3 col-form-label text-right"><small>Dokter</small></label>
                                <div class="col-sm-9">
                                    <select class="form-control select2 form-control-sm" id="dokter_id" name="dokter_id">
                                        <option value="">-Pilih-</option>
                                        @foreach ($dokter as $item)
                                        <option value="{{$item->id}}">{{$item->nama}} / {{$item->nama_tenaga_medis}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-3 col-form-label text-right"><small>Keluhan Utama *</small></label>
                                <div class="col-sm-9"  style="padding-bottom:5px;">
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-3 col-form-label text-right"><small>Umur Bulan *</small></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="umur_bulan" readonly>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-3 col-form-label text-right"><small>Berat Badan</small></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="berat_badan" readonly>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-3 col-form-label text-right"><small>BB/U</small></label>
                                <div class="col-sm-9">
                                    <select class="form-control form-control-sm" id="dokter_id" name="dokter_id">
                                        <option value="">- PILIH -</option>
                                        <option value="GIZI BURUK">GIZI BURUK</option>
                                        <option value="GIZI KURANG">GIZI KURANG</option>
                                        <option value="GIZI BAIK">GIZI BAIK</option>
                                        <option value="GIZI LEBIH">GIZI LEBIH</option>
                                                                       
                                    </select>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-3 col-form-label text-right"><small>N/T</small></label>
                                <div class="col-sm-9">
                                    <select class="form-control form-control-sm" id="dokter_id" name="dokter_id">
                                        <option value="">- PILIH -</option>
                                        <option value="N">N</option>
                                        <option value="O">O</option>
                                        <option value="T">T</option>
                                        <option value="B">B</option>
                                        <option value="T2">T2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-3 col-form-label text-right"><small>Tinggi Badan</small></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="umur_bulan" readonly>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-3 col-form-label text-right"><small>Lingkar Pinggang</small></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="berat_badan" readonly>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-3 col-form-label text-right"><small>TB/U</small></label>
                                <div class="col-sm-9">
                                    <select class="form-control form-control-sm" id="dokter_id" name="dokter_id">
                                        <option value="">- PILIH -</option>
                                        <option value="SANGAT PENDEK" selected="">SANGAT PENDEK</option>
                                        <option value="PENDEK">PENDEK</option>
                                        <option value="NORMAL">NORMAL</option>
                                        <option value="TINGGI">TINGGI</option>                      
                                    </select>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-3 col-form-label text-right"><small>BB/TB</small></label>
                                <div class="col-sm-9">
                                    <select class="form-control form-control-sm" id="dokter_id" name="dokter_id">
                                        <option value="">- PILIH -</option>
                                        <option value="SANGAT KURUS">SANGAT KURUS</option>
                                        <option value="KURUS">KURUS</option>
                                        <option value="NORMAL" selected="">NORMAL</option>
                                        <option value="GEMUK">GEMUK</option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-3 col-form-label text-right"><small>IMT</small></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="umur_bulan" readonly>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-3 col-form-label text-right"><small>Hasil IMT</small></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="berat_badan" readonly>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-3 col-form-label text-right"><small>Keterangan Lain</small></label>
                                <div class="col-sm-9"  style="padding-bottom:5px;">
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-3 col-form-label text-right"><small>Riwayat Pengobatan</small></label>
                                <div class="col-sm-9"  style="padding-bottom:5px;">
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-3 col-form-label text-right"><small>Aktivitas Fisik</small></label>
                                <div class="col-sm-9"  style="padding-bottom:5px;">
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                
                            <div class="input-group row">
                                <label class="col-sm-3 col-form-label text-right"><small>Perawat</small></label>
                                <div class="col-sm-9">
                                    <select class="form-control select2 form-control-sm" id="perawat_id" name="perawat_id">
                                        <option value="">-Pilih-</option>
                                        @foreach ($perawat as $item)
                                        <option value="{{$item->id}}">{{$item->nama}} / {{$item->nama_tenaga_medis}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-3 col-form-label text-right"><small>Sistole *</small></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="berat_badan" required>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-3 col-form-label text-right"><small>Diastole *</small></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="berat_badan" required>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-3 col-form-label text-right"><small>Nafas *</small></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="berat_badan" required>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-3 col-form-label text-right"><small>Detak Nadi *</small></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="berat_badan" required>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-3 col-form-label text-right"><small>LiLA</small></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="berat_badan" readonly>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-3 col-form-label text-right"><small>KEK</small></label>
                                <div class="col-sm-9">
                                    <select class="form-control form-control-sm" id="perawat_id" name="perawat_id">
                                        <option value="">-Pilih-</option>
                                        <option value="KEK">KEK</option>
                                        <option value="NORMAL">NORMAL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-3 col-form-label text-right"><small>BB Lahir</small></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="berat_badan" required>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-3 col-form-label text-right"><small>TB Lahir</small></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="berat_badan" required>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-3 col-form-label text-right"><small>IMD</small></label>
                                <div class="col-sm-9">
                                    <label class="radio-inline">
                                    <input type="radio" name="imd"  value="0"> <span class="badge bg-green">Ya</span> &nbsp;&nbsp;
                                    </label>
                                    
                                    <label class="radio-inline">
                                    <input type="radio" name="imd" checked value="1"> <span class="badge bg-gray">Tidak</span>&nbsp;&nbsp;
                                    </label>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-3 col-form-label text-right"><small>Asi Eksklusif</small></label>
                                <div class="col-sm-9">
                                    <label class="radio-inline">
                                    <input type="radio" name="asi"  value="0"> <span class="badge bg-green">Ya</span> &nbsp;&nbsp;
                                    </label>
                                    
                                    <label class="radio-inline">
                                    <input type="radio" name="asi" checked value="1"> <span class="badge bg-gray">Tidak</span>&nbsp;&nbsp;
                                    </label>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-3 col-form-label text-right"><small>VITAMIN A</small></label>
                                <div class="col-sm-9">
                                    <select class="form-control form-control-sm" id="perawat_id" name="perawat_id">
                                        <option value="">-Pilih-</option>
                                        <option value="MERAH">MERAH</option>
                                        <option value="BIRU">BIRU</option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-3 col-form-label text-right"><small>Konseling</small></label>
                                <div class="col-sm-9"  style="padding-bottom:5px;">
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-3 col-form-label text-right"><small>PMT</small></label>
                                <div class="col-sm-9">
                                    <label class="radio-inline">
                                    <input type="radio" name="pmt"  value="0"> <span class="badge bg-green">Ya</span> &nbsp;&nbsp;
                                    </label>
                                    
                                    <label class="radio-inline">
                                    <input type="radio" name="pmt" checked value="1"> <span class="badge bg-gray">Tidak</span>&nbsp;&nbsp;
                                    </label>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-3 col-form-label text-right"><small>Obat Cacing</small></label>
                                <div class="col-sm-9">
                                    <label class="radio-inline">
                                    <input type="radio" name="obat_cacing"  value="0"> <span class="badge bg-green">Ya</span> &nbsp;&nbsp;
                                    </label>
                                    
                                    <label class="radio-inline">
                                    <input type="radio" name="obat_cacing" checked value="1"> <span class="badge bg-gray">Tidak</span>&nbsp;&nbsp;
                                    </label>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-3 col-form-label text-right"><small>Gejala Gizi Buruk</small></label>
                                <div class="col-sm-9">
                                    <select class="form-control form-control-sm" id="perawat_id" name="perawat_id">
                                        <option value="">- PILIH -</option>
                                        <option value="TANPA GEJALA KLINIS">TANPA GEJALA KLINIS</option>
                                        <option value="MARAMUS">MARAMUS</option>
                                        <option value="KWASHIORKOR">KWASHIORKOR</option>
                                        <option value="MARAMIC-KWASHIORKOR">MARAMIC-KWASHIORKOR</option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-3 col-form-label text-right"><small>Merokok</small></label>
                                <div class="col-sm-9">
                                    <label class="radio-inline">
                                    <input type="radio" name="merokok"  value="0"> <span class="badge bg-green">Ya</span> &nbsp;&nbsp;
                                    </label>
                                    
                                    <label class="radio-inline">
                                    <input type="radio" name="merokok" checked value="1"> <span class="badge bg-gray">Tidak</span>&nbsp;&nbsp;
                                    </label>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-3 col-form-label text-right"><small>Konsumsi Alkohol</small></label>
                                <div class="col-sm-9">
                                    <label class="radio-inline">
                                    <input type="radio" name="konsumsi_alkohol"  value="0"> <span class="badge bg-green">Ya</span> &nbsp;&nbsp;
                                    </label>
                                    
                                    <label class="radio-inline">
                                    <input type="radio" name="konsumsi_alkohol" checked value="1"> <span class="badge bg-gray">Tidak</span>&nbsp;&nbsp;
                                    </label>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-3 col-form-label text-right"><small>Kurang Sayur Buah</small></label>
                                <div class="col-sm-9">
                                    <label class="radio-inline">
                                    <input type="radio" name="kurang_sayur_buah"  value="0"> <span class="badge bg-green">Ya</span> &nbsp;&nbsp;
                                    </label>
                                    
                                    <label class="radio-inline">
                                    <input type="radio" name="kurang_sayur_buah" checked value="1"> <span class="badge bg-gray">Tidak</span>&nbsp;&nbsp;
                                    </label>
                                </div>
                            </div>
                            </div>
                        </div>   
                      </div>

                      <div class="row">
                          <div class="col-md-12">
                            <div class="card-body">
                                <div class="input-group row">
                                    <label class="col-sm-3 col-form-label">Biokimia</label>
                                    <div class="col-sm-9"  style="padding-bottom:5px;">
                                        <textarea class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="input-group row">
                                    <label class="col-sm-3 col-form-label">Pemeriksaan Klinis/Fisik</label>
                                    <div class="col-sm-9"  style="padding-bottom:5px;">
                                        <textarea class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="input-group row">
                                    <label class="col-sm-3 col-form-label">Riwayat Dietary</label>
                                    <div class="col-sm-9"  style="padding-bottom:5px;">
                                        <textarea class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="input-group row">
                                    <label class="col-sm-3 col-form-label">Riwayat Personal</label>
                                    <div class="col-sm-9"  style="padding-bottom:5px;">
                                        <textarea class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="input-group row">
                                    <label class="col-sm-3 col-form-label">Intervensi Gizi</label>
                                    <div class="col-sm-9"  style="padding-bottom:5px;">
                                        <textarea class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="input-group row">
                                    <label class="col-sm-3 col-form-label">Rencana Monev</label>
                                    <div class="col-sm-9"  style="padding-bottom:5px;">
                                        <textarea class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                          </div>
                      </div>
                      <div class="card-footer">
                          <div class="text-right">
                              <button type="submit" class="btn btn-sm btn-success">Simpan</a>
                          </div>
                      </div>
                      </form>
                    </div>
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
<script src="/admin/plugins/select2/js/select2.full.min.js"></script>
<script>  
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  
    $("#e2").select2({ dropdownCssClass: "myFont" })
    $("#e3").select2({ dropdownCssClass: "myFont" })
    $("#e4").select2({ dropdownCssClass: "myFont" })

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    
  });
</script>
<script src="/admin/js/bootstrap-datepicker.min.js"></script>
<script>
$(document).ready(function(){
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy'
    });
    $('#datepicker2').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy'
    });
});
</script>
@endpush
