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
              <h3 class="card-title">Buat Baru Anamnesa</h3>
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
                        <h3 class="card-title">Anamnesa</h3>
                      </div>
                      
                      <div class="row">
                        <div class="col-md-6">
                            <div class="card-body">
                            <div class="input-group row">
                                <label class="col-sm-4 col-form-label text-right"><small>Dokter / Tenaga Medis</small></label>
                                <div class="col-sm-8">
                                  <div class="form-group">
                                    <select class="form-control select2" style="width: 100%;">
                                      <option value=""></option>
                                      <option>Alabama</option>
                                      <option>Utuh</option>
                                      <option>Galuh</option>
                                      <option>Delaware</option>
                                      <option>Tennessee</option>
                                      <option>Texas</option>
                                      <option>Washington</option>
                                    </select>
                                  </div>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-4 col-form-label text-right"><small>Keluhan Utama</small></label>
                                <div class="col-sm-8">
                                  <select class="form-control form-control-sm select2bs4" multiple="multiple" style="width: 100%;">
                                    @foreach ($keluhan as $item)
                                      <option value="{{$item->id}}">{{$item->value}}</option>
                                    @endforeach
                                  </select>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="card-body">
                          <div class="input-group row">
                              <label class="col-sm-4 col-form-label text-right"><small>Perawat/Bidan/sdb</small></label>
                              <div class="col-sm-8">
                                  <select class="form-control form-control-sm" id="asuransi_id" name="asuransi_id" onchange="changetextbox();" >
                                      
                                  </select>
                              </div>
                          </div>
                          
                          <div class="input-group row">
                              <label class="col-sm-4 col-form-label text-right"><small>Keluhan Tambahan</small></label>
                              <div class="col-sm-8">
                              <select class="form-control form-control-sm select2bs4" multiple="multiple" style="width: 100%;">
                                  @foreach ($keluhan as $item)
                                      <option value="{{$item->id}}">{{$item->value}}</option>
                                  @endforeach
                              </select>
                              </div>
                          </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    
                    <div class="card card-success card-outline">
                      <div class="card-header">
                        <h3 class="card-title">Periksa Fisik</h3>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                            <div class="card-body">
                            <div class="input-group row" style="padding-bottom:5px;">
                                <label class="col-sm-4 col-form-label text-right"><small>Kesadaran</small></label>
                                <div class="col-sm-8">
                                    <select class="form-control form-control" style="width: 100%;">
                                      <option value="">-Pilih-</option>
                                      <option>Alabama</option>
                                      <option>Utuh</option>
                                      <option>Galuh</option>
                                      <option>Delaware</option>
                                      <option>Tennessee</option>
                                      <option>Texas</option>
                                      <option>Washington</option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-group row input-group"  style="padding-bottom:5px;">
                                <label class="col-sm-4 col-form-label text-right"><small>Sistole</small></label>
                                  <input type="text" class="form-control" name="sistole" placeholder="0">
                                  <div class="input-group-append">
                                    <button type="button" class="btn btn-info">mm</button>
                                  </div>
                            </div>
                            <div class="input-group row input-group" style="padding-bottom:5px;">
                                <label class="col-sm-4 col-form-label text-right"><small>Diastole</small></label>
                                  <input type="text" class="form-control" name="sistole" placeholder="0">
                                  <div class="input-group-append">
                                    <button type="button" class="btn btn-info">Hg</button>
                                  </div>
                            </div>
                            <div class="input-group row input-group" style="padding-bottom:5px;">
                                <label class="col-sm-4 col-form-label text-right"><small>Tinggi Badan</small></label>
                                  <input type="text" class="form-control" name="sistole" placeholder="0">
                                  <div class="input-group-append">
                                    <button type="button" class="btn btn-info">cm</button>
                                  </div>
                            </div>
                            <div class="input-group row input-group" style="padding-bottom:5px;">
                                <label class="col-sm-4 col-form-label text-right"><small>Berat Badan</small></label>
                                  <input type="text" class="form-control" name="sistole" placeholder="0">
                                  <div class="input-group-append">
                                    <button type="button" class="btn btn-info">Kg</button>
                                  </div>
                            </div>
                            <div class="input-group row input-group" style="padding-bottom:5px;">
                                <label class="col-sm-4 col-form-label text-right"><small>Lingkar Perut</small></label>
                                  <input type="text" class="form-control" name="sistole" placeholder="0">
                                  <div class="input-group-append">
                                    <button type="button" class="btn btn-info">cm</button>
                                  </div>
                            </div>
                            
                            <div class="input-group row">
                                <label class="col-sm-4 col-form-label text-right"><small>IMT</small></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm" name="email" readonly>
                                </div>
                            </div>
                            
                            <div class="input-group row">
                                <label class="col-sm-4 col-form-label text-right"><small>Hasil IMT</small></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm" name="email" readonly>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="card-body">
                            <div class="input-group row input-group" style="padding-bottom:5px;">
                                <label class="col-sm-4 col-form-label text-right"><small>Detak Nadi</small></label>
                                  <input type="text" class="form-control" name="sistole" placeholder="0">
                                  <div class="input-group-append">
                                    <button type="button" class="btn btn-info">/Menit</button>
                                  </div>
                            </div>
                            <div class="input-group row input-group" style="padding-bottom:5px;">
                                <label class="col-sm-4 col-form-label text-right"><small>Nafas</small></label>
                                  <input type="text" class="form-control" name="sistole" placeholder="0">
                                  <div class="input-group-append">
                                    <button type="button" class="btn btn-info">/Menit</button>
                                  </div>
                            </div>
                            <div class="input-group row input-group" style="padding-bottom:5px;">
                                <label class="col-sm-4 col-form-label text-right"><small>Suhu</small></label>
                                  <input type="text" class="form-control" name="sistole" placeholder="0">
                                  <div class="input-group-append">
                                    <button type="button" class="btn btn-info">*C</button>
                                  </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-4 col-form-label text-right"><small>Aktivitas Fisik</small></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm" name="email">
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-4 col-form-label text-right"><small>Detak Jantung</small></label>
                                <div class="col-sm-8">
                                    <input type="radio" name="detak_jantung"> REGULAR &nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="detak_jantung"> IREGULAR
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-4 col-form-label text-right"><small>Triage</small></label>
                                <div class="col-sm-8">
                                  <input type="radio" name="Triage"> Gawat Darurat &nbsp;&nbsp;&nbsp;&nbsp;
                                  <input type="radio" name="Triage"> Darurat
                                  <input type="radio" name="Triage"> Tidak Gawat Darurat
                                  <input type="radio" name="Triage"> Meninggal
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-4 col-form-label text-right"><small>Skala Nyeri</small></label>
                                <div class="col-sm-8">
                                  <input type="radio" name="Triage"> Tidak Nyeri &nbsp;&nbsp;&nbsp;&nbsp;
                                  <input type="radio" name="Triage"> Sedang
                                  <input type="radio" name="Triage"> Ringan
                                  <input type="radio" name="Triage"> Berat
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                    <div class="col-md-6">
                      <div class="card card-success card-outline">
                        <div class="card-header">
                          <h3 class="card-title">Riwayat Pasien</h3>
                        </div>
                        <div class="card-body">
                            <div class="input-group row" style="padding-bottom: 5px;">
                                <label class="col-sm-4 col-form-label text-right"><small>RPS</small></label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="2" name="email"></textarea>
                                </div>
                            </div>
                            <div class="input-group row" style="padding-bottom: 5px;">
                                <label class="col-sm-4 col-form-label text-right"><small>RPD</small></label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="2" name="email"></textarea>
                                </div>
                            </div>
                            <div class="input-group row" style="padding-bottom: 5px;">
                                <label class="col-sm-4 col-form-label text-right"><small>RPK</small></label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="2" name="email"></textarea>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-6">
                      <div class="card card-success card-outline">
                        <div class="card-header">
                          <h3 class="card-title">Alergi Pasien</h3>
                        </div>
                        <div class="card-body">
                            <div class="input-group row" style="padding-bottom: 5px;">
                                <label class="col-sm-4 col-form-label text-right"><small>Obat</small></label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="2" name="email"></textarea>
                                </div>
                            </div>
                            <div class="input-group row" style="padding-bottom: 5px;">
                                <label class="col-sm-4 col-form-label text-right"><small>Makanan</small></label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="2" name="email"></textarea>
                                </div>
                            </div>
                            <div class="input-group row" style="padding-bottom: 5px;">
                                <label class="col-sm-4 col-form-label text-right"><small>Lainnya</small></label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="2" name="email"></textarea>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    </div>
                    
                    
                    <div class="card card-success card-outline">
                      <div class="card-header">
                        <h3 class="card-title">Lainnya</h3>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="card-body">
                            <div class="input-group row" style="padding-bottom: 5px;">
                                <label class="col-sm-4 col-form-label text-right"><small>Edukasi</small></label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="2" name="email"></textarea>
                                </div>
                            </div>
                            <div class="input-group row" style="padding-bottom: 5px;">
                                <label class="col-sm-4 col-form-label text-right"><small>Terapi</small></label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="2" name="email"></textarea>
                                </div>
                            </div>
                            <div class="input-group row" style="padding-bottom: 5px;">
                                <label class="col-sm-4 col-form-label text-right"><small>Rencana</small></label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="2" name="email"></textarea>
                                </div>
                            </div>
                            <div class="input-group row" style="padding-bottom: 5px;">
                                <label class="col-sm-4 col-form-label text-right"><small>Deskripsi Askep</small></label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="2" name="email"></textarea>
                                </div>
                            </div>
                            <div class="input-group row" style="padding-bottom: 5px;">
                                <label class="col-sm-4 col-form-label text-right"><small>Observasi</small></label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="2" name="email"></textarea>
                                </div>
                            </div>
                            <div class="input-group row" style="padding-bottom: 5px;">
                                <label class="col-sm-4 col-form-label text-right"><small>Biopsikososial</small></label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="2" name="email"></textarea>
                                </div>
                            </div>
                            <div class="input-group row" style="padding-bottom: 5px;">
                                <label class="col-sm-4 col-form-label text-right"><small>Ket</small></label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="2" name="email"></textarea>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="card-body">
                            <div class="input-group row" style="padding-bottom: 5px;">
                                <label class="col-sm-4 col-form-label text-right"><small>Tipe Askep</small></label>
                                <div class="col-sm-8">
                                    <input type="radio" name="tipe_askep"> TEXT &nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="tipe_askep"> SOAP
                                </div>
                            </div>
                            <div class="input-group row" style="padding-bottom: 5px;">
                                <label class="col-sm-4 col-form-label text-right"><small>Merokop</small></label>
                                <div class="col-sm-8">
                                    <input type="radio" name="tipe_askep"> Tidak &nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="tipe_askep"> Ya
                                </div>
                            </div>
                            <div class="input-group row" style="padding-bottom: 5px;">
                                <label class="col-sm-4 col-form-label text-right"><small>Konsumsi Alkohol</small></label>
                                <div class="col-sm-8">
                                    <input type="radio" name="tipe_askep"> Tidak &nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="tipe_askep"> Ya
                                </div>
                            </div>
                            <div class="input-group row" style="padding-bottom: 5px;">
                                <label class="col-sm-4 col-form-label text-right"><small>Kurang Sayur / Buah</small></label>
                                <div class="col-sm-8">
                                    <input type="radio" name="tipe_askep"> Tidak &nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="tipe_askep"> Ya
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="card card-success card-outline">
                      <div class="card-header">
                        <h3 class="card-title">Anatomi Tubuh</h3>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="card-body">
                          <img src="https://kotabanjarmasin.epuskesmas.id/images/anatomi.svg" style="width:100%">
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="card card-success card-outline">
                      <div class="card-header">
                        <h3 class="card-title">Keadaan Fisik</h3>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-6">
                            <input type=checkbox> Pemeriksaan Kulit <br>
                            <input type=checkbox> Pemeriksaan Kuku<br>
                            <input type=checkbox> Pemeriksaan Kepala<br>
                            <input type=checkbox> Pemeriksaan Wajah <br>
                            <input type=checkbox> Pemeriksaan Mata <br>
                            <input type=checkbox> Pemeriksaan Telinga<br>
                            <input type=checkbox> Pemeriksaan Hidung Dan Sinus <br>
                            <input type=checkbox> Pemeriksaan Mulut Dan Bibir<br>
                          </div>
                          <div class="col-md-6">
                            <input type=checkbox> Pemeriksaan Leher <br>
                            <input type=checkbox> Pemeriksaan Dada Dan Punggung<br>
                            <input type=checkbox> Pemeriksaan Kepala<br>
                            <input type=checkbox> Pemeriksaan Wajah <br>
                            <input type=checkbox> Pemeriksaan Mata <br>
                            <input type=checkbox> Pemeriksaan Telinga<br>
                            <input type=checkbox> Pemeriksaan Hidung Dan Sinus <br>
                            <input type=checkbox> Pemeriksaan Mulut Dan Bibir<br>
                          </div>
                        </div>
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
                            <td>{{$data->jkel == 'L' ? 'Laki-Laki' : 'Perempuan'}}</td>
                          </tr>
                          <tr>
                            <td>Tempat Dan Tanggal Lahir</td>
                            <td>{{$data->tempat_lahir}} / {{$data->tgl_lahir == null ? null : \Carbon\Carbon::parse($data->tgl_lahir)->format('d-M-Y')}}</td>
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
