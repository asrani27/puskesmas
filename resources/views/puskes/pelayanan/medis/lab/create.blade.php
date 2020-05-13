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
            
            @include('puskes.pelayanan.medis.menu_utama')
            
            <div class="row">
            @include('puskes.pelayanan.medis.sidebar_medis')
                {{-- <div class="col-md-4" style="padding-left: 15px; padding-top:15px; padding-right:15px;">
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
                </div> --}}
                <div class="col-md-8" style="padding-left: 15px; padding-top:15px; padding-right:15px;">
                    <div class="card card-info card-outline">
                      <div class="card-header">
                        <h3 class="card-title">Data Pemeriksaan</h3>
                      </div>
                      <div class="card-body p-1 table-responsive">
                        
                        @if($data->lab == null)
                          <div class="input-group row">
                              <label class="col-sm-3 col-form-label text-right"><small>ID</small><strong></strong></label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control form-control-sm" name="id_lab" value="- Otomatis -" readonly>
                              </div>
                          </div>
                          <div class="input-group row">
                              <label class="col-sm-3 col-form-label text-right"><small>Tanggal</small><strong></strong></label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control form-control-sm" name="tanggal" value="{{\Carbon\Carbon::now()->format('d M Y h:i:s')}}" readonly>
                              </div>
                          </div>
                        @else
                          <div class="input-group row">
                              <label class="col-sm-3 col-form-label text-right"><small>ID</small><strong></strong></label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" name="id_lab" value="{{$data->lab->id}}" readonly>
                              </div>
                          </div>
                          <div class="input-group row">
                              <label class="col-sm-3 col-form-label text-right"><small>Tanggal</small><strong></strong></label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control form-control-sm" name="tanggal" value="{{\Carbon\Carbon::parse($data->lab->tanggal)->format('d M Y h:i:s')}}" readonly>
                              </div>
                          </div>
                        @endif
                      </div>
                      <!-- /.card-body -->
                    </div>
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
                        <form method="POST" action="{{route('laboratorium', ['id' => $data->id])}}">
                          @csrf
                          <table>
                              <tr>
                              @foreach ($lab as $item)
                              <td valign="top" style="padding-right: 10px">
                              <label>{{$item->kode}}</label><br>
                                @foreach ($item->laboratorium as $item2)
                                <input type="checkbox" name="lab[]" value="{{$item2->id}}"><small>{{$item2->value}}</small><br />
                                @endforeach
                              <br />
                              </td>
                              @endforeach
                              </tr>
                          </table>
                          <div class="text-right">
                              <button type="submit" class="btn btn-sm btn-success shadow"><i class="fas fa-check"></i> Simpan</a>
                          </div>
                          <br />
                        </form>
                          <table id="example" class="table table-bordered table-sm" width="100%">
                            <thead>
                            <tr class="bg-gradient-primary" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                              <th>Pemeriksaan</th>
                              <th>Tarif</th>
                              <th>Hasil</th>
                              <th>Nilai Normal</th>
                              <th>Satuan</th>
                              <th>Sampel</th>
                              <th></th>
                            </thead>
                            <tbody>
                              @if($data->lab == null)

                              @else
                                @foreach ($data->lab->t_lab_detail as $item)
                                  <tr>
                                      <td><strong>{{$item->m_lab->jenis_pemeriksaan}}</strong> / {{$item->m_lab->value}}</td>
                                      <td>{{$item->tarif}}</td>
                                      <td>-</td>
                                      <td>{{$item->nilai_normal}}</td>
                                      <td>{{$item->satuan}}</td>
                                      <td>-</td>
                                      <td class="text-center">
                                        <a href="/pelayanan/medis/proses/lab/delete/{{$item->id}}" class="btn btn-xs btn-danger"><strong>X</strong></a>
                                      </td>
                                  </tr>
                                @endforeach
                              @endif
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
            {{-- <div class="card-footer">
                <div class="text-right">
                    <a href="/pendaftaran/pasien/edit/" class="btn btn-sm btn-info shadow"><i class="fas fa-print"></i> Cetak Hasil Periksa</a>
                    <a href="/pendaftaran/pasien/edit/" class="btn btn-sm btn-success shadow"><i class="fas fa-check"></i> Simpan</a>
                    <a href="/pendaftaran/pasien/delete/" class="btn btn-sm btn-danger shadow"  onclick="return confirm('Yakin Menghapus Semua Data Tentang Pasien Ini?');"><i class="fas fa-trash"></i> Hapus</a>
                </div>
            </div> --}}
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
