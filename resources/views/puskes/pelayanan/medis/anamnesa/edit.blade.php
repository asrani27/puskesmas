@extends('layouts.admin.default')

@push('addcss')
<link rel="stylesheet" href="/admin/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<style>
  .select2-selection__rendered {
      line-height: 25px !important;
      font-size:14px;
  }
  .select2-container .select2-selection--single {
      height: 32px !important;
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
                  <h3 class="card-title">Ubah Data Anamnesa</h3>
                    <div class="card-tools">
                      <a href="/pelayanan/medis/proses/{{$data->id}}" class="btn bg-gradient-danger btn-sm">Kembali</a>
                    </div>
                  </div>

                  @include('puskes.pelayanan.medis.menu_utama')

                  <div class="row">
                    
                    @include('puskes.pelayanan.medis.sidebar_medis')
                      <div class="col-md-8" style="padding-left: 15px; padding-top:15px; padding-right:15px;">
                      <form method="POST" action="{{route('updateAnamnesa2', ['id'=>$data->id, 'anamnesa_id' => $anamnesa->id])}}">
                        @csrf
                          <div class="card card-success card-outline">
                            <div class="card-header">
                              <h3 class="card-title">Anamnesa</h3>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                  <div class="card-body">
                                  <div class="input-group row">
                                      <label class="col-sm-4 col-form-label text-right"><small>Dokter / Tenaga Medis</small><strong><span class="text-danger">*</span></strong></label>
                                      <div class="col-sm-8">
                                        <div class="form-group">
                                          <select id="e2" class="form-control form-control-sm select2" style="width: 100%;" name="dokter_id" required>
                                              @foreach ($dokter as $item)
                                                @if($data->anamnesa->dokter_id == $item->id)
                                                  <option value="{{$item->id}}" selected>{{strtoupper($item->nama)}} / {{strtoupper($item->nama_tenaga_medis)}}</option>
                                                @else
                                                  <option value="{{$item->id}}">{{strtoupper($item->nama)}} / {{strtoupper($item->nama_tenaga_medis)}}</option>
                                                @endif
                                              @endforeach
                                          </select>
                                        </div>
                                      </div>
                                  </div>
                                  <div class="input-group row">
                                      <label class="col-sm-4 col-form-label text-right"><small>Keluhan Utama</small><strong><span class="text-danger">*</span></strong></label>
                                      <div class="col-sm-8">
                                        <textarea class="form-control" rows="2" name="keluhan_utama">{{$data->anamnesa->keluhan_utama}}</textarea>
                                      </div>
                                  </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                <div class="card-body">
                                <div class="input-group row">
                                    <label class="col-sm-4 col-form-label text-right"><small>Perawat/Bidan/sdb</small></label>
                                    <div class="col-sm-8">
                                      <div class="form-group">
                                        <select id="e3" class="form-control select2" name="perawat_id">
                                          <option value="">-Pilih-</option>
                                            @foreach ($perawat as $item)
                                                @if($data->anamnesa->perawat_id == $item->id)
                                                  <option value="{{$item->id}}" selected>{{strtoupper($item->nama)}} / {{strtoupper($item->nama_tenaga_medis)}}</option>
                                                @else
                                                  <option value="{{$item->id}}">{{strtoupper($item->nama)}} / {{strtoupper($item->nama_tenaga_medis)}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                      </div>
                                    </div>
                                </div>
                                
                                <div class="input-group row">
                                    <label class="col-sm-4 col-form-label text-right"><small>Keluhan Tambahan</small></label>
                                    <div class="col-sm-8">
                                      <textarea class="form-control" rows="2" name="keluhan_tambahan">{{$data->anamnesa->keluhan_tambahan}}</textarea>
                                    </div>
                                </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="card-body">
                                <div class="input-group row">
                                    <label class="col-sm-3 col-form-label text-right"><small>Lama Sakit</small></label>
                                    
                                    <div class="col-sm-2">
                                      <div class="form-group">
                                        <input type="text" class="form-control form-control-sm" value="{{$data->anamnesa->lama_sakit_tahun}}" maxlength="3" name="lama_sakit_tahun" onkeypress="return hanyaAngka(event)">
                                      </div>
                                    </div>
                                    <label class="col-sm-1 col-form-label text-right"><small>Thn</small></label>
                                    
                                    <div class="col-sm-2">
                                      <div class="form-group">
                                        <input type="text" class="form-control form-control-sm" value="{{$data->anamnesa->lama_sakit_bulan}}" maxlength="3" name="lama_sakit_bulan" onkeypress="return hanyaAngka(event)">
                                      </div>
                                    </div>
                                    <label class="col-sm-1 col-form-label text-right"><small>Bln</small></label>
                                    
                                    <div class="col-sm-2">
                                      <div class="form-group">
                                        <input type="text" class="form-control form-control-sm" value="{{$data->anamnesa->lama_sakit_hari}}"  maxlength="3" name="lama_sakit_hari" onkeypress="return hanyaAngka(event)">
                                      </div>
                                    </div>
                                    <label class="col-sm-1 col-form-label text-right"><small>Hr</small></label>
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
                                      <label class="col-sm-4 col-form-label text-right"><small>Kesadaran</small><strong><span class="text-danger">*</span></strong></label>
                                      <div class="col-sm-8">
                                          <select class="form-control form-control" style="width: 100%;" name="kesadaran">
                                            @foreach ($kesadaran as $item)
                                              @if($data->periksafisik->kesadaran === $item->value)
                                              <option value="{{$item->value}}" selected>{{$item->value}}</option>
                                              @else
                                              <option value="{{$item->value}}">{{$item->value}}</option>
                                              @endif
                                            @endforeach
                                          </select>
                                      </div>
                                  </div>
                                  <div class="input-group row input-group"  style="padding-bottom:5px;">
                                      <label class="col-sm-4 col-form-label text-right"><small>Sistole</small><strong><span class="text-danger">*</span></strong></label>
                                        <input type="text" class="form-control" name="sistole" value="{{$data->periksafisik->sistole}}" maxlength="3" onkeypress="return hanyaAngka(event)" required>
                                        <div class="input-group-append">
                                          <button type="button" class="btn btn-info">mm</button>
                                        </div>
                                  </div>
                                  <div class="input-group row input-group" style="padding-bottom:5px;">
                                      <label class="col-sm-4 col-form-label text-right"><small>Diastole</small><strong><span class="text-danger">*</span></strong></label>
                                        <input type="text" class="form-control" name="diastole" value="{{$data->periksafisik->diastole}}" maxlength="3" onkeypress="return hanyaAngka(event)" required>
                                        <div class="input-group-append">
                                          <button type="button" class="btn btn-info">Hg</button>
                                        </div>
                                  </div>
                                  <div class="input-group row input-group" style="padding-bottom:5px;">
                                      <label class="col-sm-4 col-form-label text-right"><small>Tinggi Badan</small><strong><span class="text-danger">*</span></strong></label>
                                        <input type="text" class="form-control" name="tinggi" value="{{$data->periksafisik->tinggi}}" maxlength="3" onkeypress="return hanyaAngka(event)" required>
                                        <div class="input-group-append">
                                          <button type="button" class="btn btn-info">cm</button>
                                        </div>
                                  </div>
                                  <div class="input-group row input-group" style="padding-bottom:5px;">
                                      <label class="col-sm-4 col-form-label text-right"><small>Berat Badan</small><strong><span class="text-danger">*</span></strong></label>
                                        <input type="text" class="form-control" name="berat" value="{{$data->periksafisik->berat}}" maxlength="3" onkeypress="return hanyaAngka(event)" required>
                                        <div class="input-group-append">
                                          <button type="button" class="btn btn-info">Kg</button>
                                        </div>
                                  </div>
                                  <div class="input-group row input-group" style="padding-bottom:5px;">
                                      <label class="col-sm-4 col-form-label text-right"><small>Lingkar Perut</small><strong><span class="text-danger">*</span></strong></label>
                                        <input type="text" class="form-control" name="lingkar_perut" value="{{$data->periksafisik->lingkar_perut}}" maxlength="3" onkeypress="return hanyaAngka(event)" required>
                                        <div class="input-group-append">
                                          <button type="button" class="btn btn-info">cm</button>
                                        </div>
                                  </div>
                                  
                                  <div class="input-group row">
                                      <label class="col-sm-4 col-form-label text-right"><small>IMT</small></label>
                                      <div class="col-sm-8">
                                          <input type="text" class="form-control form-control-sm" name="imt" value="{{$data->periksafisik->imt}}" readonly>
                                      </div>
                                  </div>
                                  
                                  <div class="input-group row">
                                      <label class="col-sm-4 col-form-label text-right"><small>Hasil IMT</small></label>
                                      <div class="col-sm-8">
                                          <input type="text" class="form-control form-control-sm" name="hasil_imt" value="{{$data->periksafisik->hasil_imt}}" readonly>
                                      </div>
                                  </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                <div class="card-body">
                                  <div class="input-group row input-group" style="padding-bottom:5px;">
                                      <label class="col-sm-4 col-form-label text-right"><small>Detak Nadi</small><strong><span class="text-danger">*</span></strong></label>
                                        <input type="text" class="form-control" name="detak_nadi" required value="{{$data->periksafisik->detak_nadi}}">
                                        <div class="input-group-append">
                                          <button type="button" class="btn btn-info">/Menit</button>
                                        </div>
                                  </div>
                                  <div class="input-group row input-group" style="padding-bottom:5px;">
                                      <label class="col-sm-4 col-form-label text-right"><small>Nafas</small><strong><span class="text-danger">*</span></strong></label>
                                        <input type="text" class="form-control" name="nafas"  value="{{$data->periksafisik->nafas}}" required>
                                        <div class="input-group-append">
                                          <button type="button" class="btn btn-info">/Menit</button>
                                        </div>
                                  </div>
                                  <div class="input-group row input-group" style="padding-bottom:5px;">
                                      <label class="col-sm-4 col-form-label text-right"><small>Suhu</small></label>
                                        <input type="text" class="form-control" name="suhu"  value="{{$data->periksafisik->suhu}}">
                                        <div class="input-group-append">
                                          <button type="button" class="btn btn-info">*C</button>
                                        </div>
                                  </div>
                                  <div class="input-group row">
                                      <label class="col-sm-4 col-form-label text-right"><small>Aktivitas Fisik</small></label>
                                      <div class="col-sm-8">
                                          <input type="text" class="form-control form-control-sm" name="aktifitas_fisik"  value="{{$data->periksafisik->aktifitas_fisik}}">
                                      </div>
                                  </div>
                                  <div class="input-group row">
                                      <label class="col-sm-4 col-form-label text-right"><small>Detak Jantung</small></label>
                                      <div class="col-sm-8">
                                        <div class="input-group">
                                          <label class="radio-inline">
                                            <input type="radio" name="detak_jantung" value="REGULAR" {{$data->periksafisik->detak_jantung == 'REGULAR' ? 'checked':''}}> 
                                            <span class="badge bg-gray">REGULAR</span> 
                                          </label>
                                          &nbsp;
                                          &nbsp;
                                          <label class="radio-inline">
                                            <input type="radio" name="detak_jantung" value="IREGULAR" {{$data->periksafisik->detak_jantung == 'IREGULAR' ? 'checked':''}}> 
                                            <span class="badge bg-black">IREGULAR</span>  
                                          </label>
                                        </div>
                                      </div>
                                  </div>
                                  <div class="input-group row">
                                      <label class="col-sm-4 col-form-label text-right"><small>Triage</small></label>
                                      <div class="col-sm-8">
                                        
                                        <label class="radio-inline">
                                        <input type="radio" name="triage" value="GAWAT DARURAT" {{$data->periksafisik->triage == 'GAWAT DARURAT' ? 'checked':''}}> <span class="badge bg-red">Gawat Darurat </span>&nbsp;&nbsp;
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="triage" value="DARURAT" {{$data->periksafisik->triage == 'DARURAT' ? 'checked':''}}> <span class="badge bg-pink"> Darurat</span> &nbsp;&nbsp;
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="triage"  value="TIDAK GAWAT DARURAT" {{$data->periksafisik->triage == 'TIDAK GAWAT DARURAT' ? 'checked':''}}> <span class="badge bg-green"> Tidak Gawat Darurat</span> &nbsp;&nbsp;
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="triage" value="MENINGGAL" {{$data->periksafisik->triage == 'MENINGGAL' ? 'checked':''}}> <span class="badge bg-black"> Meninggal</span>
                                        </label>
                                      </div>
                                  </div>
                                  <div class="input-group row">
                                      <label class="col-sm-4 col-form-label text-right"><small>Skala Nyeri</small></label>
                                      <div class="col-sm-8">
                                        <label class="radio-inline">
                                        <input type="radio" name="nyeri" value="0" {{$data->periksafisik->skala_nyeri == '0' ? 'checked':''}}> <span class="badge bg-green">Tidak Nyeri</span> &nbsp;&nbsp;
                                        </label>
                                        
                                        <label class="radio-inline">
                                        <input type="radio" name="nyeri" value="1" {{$data->periksafisik->skala_nyeri == '1' ? 'checked':''}}> <span class="badge bg-gray">Sedang</span>&nbsp;&nbsp;
                                        </label>
                                        
                                        <label class="radio-inline">
                                        <input type="radio" name="nyeri" value="2" {{$data->periksafisik->skala_nyeri == '2' ? 'checked':''}}> <span class="badge bg-pink">Ringan</span>&nbsp;&nbsp;
                                        </label>
                                        
                                        <label class="radio-inline">
                                        <input type="radio" name="nyeri" value="3" {{$data->periksafisik->skala_nyeri == '3' ? 'checked':''}}> <span class="badge bg-red">Berat</span>&nbsp;&nbsp;
                                        </label>
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
                                        <textarea class="form-control" rows="2" name="riwayat_penyakit_sekarang">{{$anamnesa->rps->where('jenis_riwayat','Riwayat Penyakit Sekarang')->first() == null ? '':$anamnesa->rps->where('jenis_riwayat','Riwayat Penyakit Sekarang')->first()->value}}</textarea>
                                        </div>
                                    </div>
                                    <div class="input-group row" style="padding-bottom: 5px;">
                                        <label class="col-sm-4 col-form-label text-right"><small>RPD</small></label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" rows="2" name="riwayat_penyakit_dulu">{{$anamnesa->rpd->where('jenis_riwayat','Riwayat Penyakit Dulu')->first() == null ? '':$anamnesa->rpd->where('jenis_riwayat','Riwayat Penyakit Dulu')->first()->value}}</textarea>
                                        </div>
                                    </div>
                                    <div class="input-group row" style="padding-bottom: 5px;">
                                        <label class="col-sm-4 col-form-label text-right"><small>RPK</small></label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" rows="2" name="riwayat_penyakit_keluarga">{{$anamnesa->rpk->where('jenis_riwayat','Riwayat Penyakit Keluarga')->first() == null ? '':$anamnesa->rpk->where('jenis_riwayat','Riwayat Penyakit Keluarga')->first()->value}}</textarea>
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
                                            <textarea class="form-control" rows="2" name="obat">{{$anamnesa->obat->where('jenis_alergi','Obat')->first() == null ? '':$anamnesa->obat->where('jenis_alergi','Obat')->first()->value}}</textarea>
                                        </div>
                                    </div>
                                    <div class="input-group row" style="padding-bottom: 5px;">
                                        <label class="col-sm-4 col-form-label text-right"><small>Makanan</small></label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" rows="2" name="makanan">{{$anamnesa->obat->where('jenis_alergi','Makanan')->first() == null ? '':$anamnesa->obat->where('jenis_alergi','Makanan')->first()->value}}</textarea>
                                        </div>
                                    </div>
                                    <div class="input-group row" style="padding-bottom: 5px;">
                                        <label class="col-sm-4 col-form-label text-right"><small>Lainnya</small></label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" rows="2" name="umum">{{$anamnesa->obat->where('jenis_alergi','Umum')->first() == null ? '':$anamnesa->obat->where('jenis_alergi','Umum')->first()->value}}</textarea>
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
                                        <textarea class="form-control" rows="2" name="edukasi">{{$data->anamnesa->edukasi}}</textarea>
                                      </div>
                                  </div>
                                  <div class="input-group row" style="padding-bottom: 5px;">
                                      <label class="col-sm-4 col-form-label text-right"><small>Terapi</small></label>
                                      <div class="col-sm-8">
                                          <textarea class="form-control" rows="2" name="terapi">{{$data->anamnesa->terapi}}</textarea>
                                      </div>
                                  </div>
                                  <div class="input-group row" style="padding-bottom: 5px;">
                                      <label class="col-sm-4 col-form-label text-right"><small>Rencana</small></label>
                                      <div class="col-sm-8">
                                          <textarea class="form-control" rows="2" name="tindakan">{{$data->anamnesa->tindakan}}</textarea>
                                      </div>
                                  </div>
                                  <div class="input-group row" style="padding-bottom: 5px;">
                                      <label class="col-sm-4 col-form-label text-right"><small>Deskripsi Askep</small></label>
                                      <div class="col-sm-8">
                                          <textarea class="form-control" rows="2" name="askep">{{$data->anamnesa->askep}}</textarea>
                                      </div>
                                  </div>
                                  <div class="input-group row" style="padding-bottom: 5px;">
                                      <label class="col-sm-4 col-form-label text-right"><small>Observasi</small></label>
                                      <div class="col-sm-8">
                                          <textarea class="form-control" rows="2" name="observasi">{{$data->anamnesa->observasi}}</textarea>
                                      </div>
                                  </div>
                                  <div class="input-group row" style="padding-bottom: 5px;">
                                      <label class="col-sm-4 col-form-label text-right"><small>Biopsikososial</small></label>
                                      <div class="col-sm-8">
                                          <textarea class="form-control" rows="2" name="biopsikososial">{{$data->anamnesa->biopsikososial}}</textarea>
                                      </div>
                                  </div>
                                  <div class="input-group row" style="padding-bottom: 5px;">
                                      <label class="col-sm-4 col-form-label text-right"><small>Ket</small></label>
                                      <div class="col-sm-8">
                                          <textarea class="form-control" rows="2" name="keterangan">{{$data->anamnesa->keterangan}}</textarea>
                                      </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="card-body">
                                  <div class="input-group row" style="padding-bottom: 5px;">
                                      <label class="col-sm-4 col-form-label text-right"><small>Merokok</small></label>
                                      <div class="col-sm-8">

                                        <label class="radio-inline">
                                          <input type="radio" name="merokok" value="0" {{$data->anamnesa->merokok == 0 ? 'checked': ''}}> 
                                          <span class="badge bg-black">Tidak</span>  
                                        </label>
                                        <label class="radio-inline">
                                          <input type="radio" name="merokok" value="1" {{$data->anamnesa->merokok == 1 ? 'checked': ''}}> 
                                          <span class="badge bg-gray">Ya</span>  
                                        </label>
                                        
                                      </div>
                                  </div>
                                  <div class="input-group row" style="padding-bottom: 5px;">
                                      <label class="col-sm-4 col-form-label text-right"><small>Konsumsi Alkohol</small></label>
                                      <div class="col-sm-8">
                                        <label class="radio-inline">
                                          <input type="radio" name="alkohol" value="0" {{$data->anamnesa->konsumsi_alkohol == 0 ? 'checked': ''}}> 
                                          <span class="badge bg-black">Tidak</span>  
                                        </label>
                                        <label class="radio-inline">
                                          <input type="radio" name="alkohol" value="1" {{$data->anamnesa->konsumsi_alkohol == 1 ? 'checked': ''}}> 
                                          <span class="badge bg-gray">Ya</span>  
                                        </label>
                                      </div>
                                  </div>
                                  <div class="input-group row" style="padding-bottom: 5px;">
                                      <label class="col-sm-4 col-form-label text-right"><small>Kurang Sayur / Buah</small></label>
                                      <div class="col-sm-8">
                                        <label class="radio-inline">
                                          <input type="radio" name="sayur" value="0" {{$data->anamnesa->kurang_sayur_buah == 0 ? 'checked': ''}} > 
                                          <span class="badge bg-black">Tidak</span>  
                                        </label>
                                        <label class="radio-inline">
                                          <input type="radio" name="sayur" value="1" {{$data->anamnesa->kurang_sayur_buah == 1 ? 'checked': ''}}> 
                                          <span class="badge bg-gray">Ya</span>  
                                        </label>
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
                          
                          <div class="card-footer">
                              <div class="text-right">
                                  <button type="submit" class="btn btn-sm btn-success shadow"><i class="fas fa-save"></i> UPDATE</button>
                                  <a href="/pendaftaran/pasien/delete/" class="btn btn-sm btn-danger shadow"><i class="fas fa-trash"></i> KEMBALI</a>
                              </div>
                          </div>
                        </form>
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

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    
  });
  function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;
          return true;
	}
</script>

<script>
  $(document).on("click", ".open-modal", function () {
   var pendaftaran = $(this).data('pendaftaran');
   console.log(pendaftaran);
   document.getElementById("id_pelayanan").innerHTML = pendaftaran.pelayanan.id;
   document.getElementById("instalasi").innerHTML = pendaftaran.instalasi;
   document.getElementById("nik_pasien").innerHTML = pendaftaran.pasien.nik;
   document.getElementById("nama_pasien").innerHTML = pendaftaran.pasien.nama;
   document.getElementById("nama_ibu").innerHTML = pendaftaran.pasien.nama_ibu;
   document.getElementById("poli").innerHTML = pendaftaran.ruangan.nama;
   document.getElementById("no_erm").innerHTML = pendaftaran.pasien.id;
   document.getElementById("no_rm_lama").innerHTML = pendaftaran.pasien.no_rm_lama;
   document.getElementById("tgl_pelayanan").innerHTML = pendaftaran.pelayanan.tanggal;
   document.getElementById("no_dok_rm").innerHTML = pendaftaran.pasien.no_dok_rm;
   document.getElementById("jkel").innerHTML = pendaftaran.pasien.jenis_kelamin;
   document.getElementById("tempat_lahir").innerHTML = pendaftaran.pasien.tempat_lahir+','+pendaftaran.pasien.tanggal_lahir;
   document.getElementById("id_pendaftaran").innerHTML = pendaftaran.id;
   document.getElementById("tanggal_daftar").innerHTML = pendaftaran.tanggal;
   document.getElementById("alamat").innerHTML = pendaftaran.pasien.alamat;
   document.getElementById("asuransi").innerHTML = pendaftaran.asuransi.jenis_asuransi;
   if(pendaftaran.anamnesa == null){

   document.getElementById("id_anamnesa").innerHTML = '';
   document.getElementById("tanggal_anamnesa").innerHTML = '';
   document.getElementById("dokter_anamnesa").innerHTML = '';
   document.getElementById("perawat_anamnesa").innerHTML = '';
   document.getElementById("keluhan_utama").innerHTML = '';
   document.getElementById("keluhan_tambahan").innerHTML = '';
   document.getElementById("lama_sakit").innerHTML  = '';
   document.getElementById("kesadaran").innerHTML  = '';
   document.getElementById("detak_nadi").innerHTML  = '';
   document.getElementById("sistole").innerHTML  = '';
   document.getElementById("diastole").innerHTML  = '';
   document.getElementById("suhu").innerHTML  = '';
   document.getElementById("nafas").innerHTML  = '';
   document.getElementById("tinggi_badan").innerHTML  = '';
   document.getElementById("aktifitas_fisik").innerHTML  = '';
   document.getElementById("id_periksafisik").innerHTML  = '';
   document.getElementById("berat").innerHTML  = '';
   document.getElementById("detak_jantung").innerHTML  = '';
   document.getElementById("lingkar_perut").innerHTML  = '';
   document.getElementById("triage").innerHTML  = '';
   document.getElementById("imt").innerHTML  = '';
   document.getElementById("skala_nyeri").innerHTML  = '';
   document.getElementById("hasil_imt").innerHTML  = '';
   document.getElementById("status").innerHTML  = '';
   document.getElementById("edukasi").innerHTML  = '';
   document.getElementById("merokok").innerHTML  = '';
   document.getElementById("terapi").innerHTML  = '';
   document.getElementById("konsumsi_alkohol").innerHTML  = '';
   document.getElementById("rencana").innerHTML  = '';
   document.getElementById("kurang_sayur_buah").innerHTML  = '';
   document.getElementById("observasi").innerHTML  = '';
   document.getElementById("biopsikososial").innerHTML  = '';
   }else{
   document.getElementById("id_anamnesa").innerHTML = pendaftaran.anamnesa.id;
   document.getElementById("tanggal_anamnesa").innerHTML = pendaftaran.anamnesa.tanggal;
   document.getElementById("dokter_anamnesa").innerHTML = pendaftaran.anamnesa.dokter.nama;
   document.getElementById("perawat_anamnesa").innerHTML = pendaftaran.anamnesa.perawat.nama;
   document.getElementById("keluhan_utama").innerHTML = pendaftaran.anamnesa.keluhan_utama;
   document.getElementById("keluhan_tambahan").innerHTML = pendaftaran.anamnesa.keluhan_tambahan;
   document.getElementById("lama_sakit").innerHTML = pendaftaran.anamnesa.lama_sakit_tahun+' Thn,'+pendaftaran.anamnesa.lama_sakit_bulan+' Bln,'+pendaftaran.anamnesa.lama_sakit_hari+' Hr';

   document.getElementById("id_periksafisik").innerHTML = pendaftaran.periksafisik.id;
   document.getElementById("kesadaran").innerHTML = pendaftaran.periksafisik.kesadaran;
   document.getElementById("detak_nadi").innerHTML  = pendaftaran.periksafisik.detak_nadi;
   document.getElementById("sistole").innerHTML  = pendaftaran.periksafisik.sistole;
   document.getElementById("diastole").innerHTML  = pendaftaran.periksafisik.diastole;
   document.getElementById("suhu").innerHTML  = pendaftaran.periksafisik.suhu;
   document.getElementById("nafas").innerHTML  = pendaftaran.periksafisik.nafas;
   document.getElementById("tinggi_badan").innerHTML  =  pendaftaran.periksafisik.tinggi;
   document.getElementById("aktifitas_fisik").innerHTML  =  pendaftaran.periksafisik.aktifitas_fisik;
   
   document.getElementById("berat").innerHTML  = pendaftaran.periksafisik.berat;
   document.getElementById("detak_jantung").innerHTML  = pendaftaran.periksafisik.detak_jantung;
   document.getElementById("lingkar_perut").innerHTML  = pendaftaran.periksafisik.lingkar_perut;
   document.getElementById("triage").innerHTML  = pendaftaran.periksafisik.triage;
   document.getElementById("imt").innerHTML  = pendaftaran.periksafisik.imt;
   if(pendaftaran.periksafisik.skala_nyeri == 0){
     sn = 'Tidak Nyeri';
   }else if(pendaftaran.periksafisik.skala_nyeri == 1){
     sn = 'Sedang';
   }else if(pendaftaran.periksafisik.skala_nyeri == 2){
     sn = 'Ringan';
   }else if(pendaftaran.periksafisik.skala_nyeri == 3){
     sn = 'Berat';
   }
   document.getElementById("skala_nyeri").innerHTML  = sn;
   document.getElementById("hasil_imt").innerHTML  = pendaftaran.periksafisik.hasil_imt;
   document.getElementById("status").innerHTML  = '';
   document.getElementById("edukasi").innerHTML  = pendaftaran.anamnesa.edukasi;
   document.getElementById("merokok").innerHTML  = pendaftaran.anamnesa.merokok == 0 ? 'Tidak' : 'Ya';
   document.getElementById("terapi").innerHTML  = pendaftaran.anamnesa.terapi;
   document.getElementById("konsumsi_alkohol").innerHTML  = pendaftaran.anamnesa.konsumsi_alkohol == 0 ? 'Tidak' : 'Ya';
   document.getElementById("rencana").innerHTML  = pendaftaran.anamnesa.rencana_tindakan;
   document.getElementById("kurang_sayur_buah").innerHTML  = pendaftaran.anamnesa.kurang_sayur_buah == 0 ? 'Tidak' : 'Ya';
   document.getElementById("observasi").innerHTML  = pendaftaran.anamnesa.observasi;
   document.getElementById("biopsikososial").innerHTML  = pendaftaran.anamnesa.biopsikososial;
   }
   $("#tableDiagnosa tbody tr").remove(); 

   data = pendaftaran.diagnosa;
   
   for(i = 0; i< data.length; i++)
   {
     console.log(data[i].id);
      $('#tableDiagnosa').append('<tr><td>'+data[i].id+'</td><td>'+data[i].tanggal+'</td><td>'+data[i].dokter.nama+'</td><td>'+data[i].perawat.nama+'</td><td>'+data[i].diagnosa_id+'</td><td>'+data[i].diagnosis.value+'</td><td>'+data[i].diagnosa_jenis+'</td><td>'+data[i].diagnosa_kasus+'</td></tr>');
   }
   $('#modal-xl').modal('show');
});
</script>
@endpush
