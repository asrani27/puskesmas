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
                                          <input type="text" class="form-control form-control-sm" name="imt" value="{{number_format($data->periksafisik->berat / ($data->periksafisik->tinggi / 100) / ($data->periksafisik->tinggi / 100), 2)}}" readonly>
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
                          
                          {{-- <div class="card card-success card-outline">
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
                          </div> --}}
                          
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

@include('puskes.pelayanan.medis.sidebar_riwayat')

@endpush
