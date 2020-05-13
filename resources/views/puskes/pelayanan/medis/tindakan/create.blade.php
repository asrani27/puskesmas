@extends('layouts.admin.default')

@push('addcss')
<link rel="stylesheet" href="/admin/js/bootstrap-datepicker.min.css">

<link rel="stylesheet" href="/admin/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<style>
  .myFont{
    font-size:12px;
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
                        <h3 class="card-title">TINDAKAN</h3>
                      </div>
                      <form method="POST" action="{{route('tindakan2',['id' => $data->id])}}">
                        @csrf
                      <div class="row">
                        <div class="col-md-6">
                            <div class="card-body">
                            <div class="input-group row">
                                <label class="col-sm-4 col-form-label text-right"><small>Dokter / Tenaga Medis</small><strong><span class="text-danger">*</span></strong></label>
                                <div class="col-sm-8">
                                  <div class="form-group">
                                    <select id="e2" class="form-control form-control-sm select2" style="width: 100%;" name="dokter_id" required>
                                      <option value="">-Pilih-</option>
                                      @foreach ($dokter as $item)
                                        <option value="{{$item->id}}">{{$item->nama}} / {{$item->nama_tenaga_medis}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-4 col-form-label text-right"><small>Tindakan</small><strong><span class="text-danger">*</span></strong></label>
                                <div class="col-sm-8">
                                  <div class="form-group">
                                    <select id="e4" class="form-control select2" name="tindakan_id" required>
                                      <option value="">-Pilih-</option>
                                      @foreach ($tindakan as $item)
                                        <option value="{{$item->id}}">{{$item->value}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-4 col-form-label text-right"><small>Lama Tindakan</small><strong></strong></label>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                       <input type="text" class="form-control" name="lama_tindakan">
                                    </div>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label class="col-sm-4 col-form-label text-right"><small>Tarif</small><strong><span class="text-danger">*</span></strong></label>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                       <input type="text" class="form-control" value="0" name="tarif">
                                    </div>
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
                                      <option value="{{$item->id}}">{{$item->nama}} / {{$item->nama_tenaga_medis}}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                          </div>
                          <div class="input-group row">
                              <label class="col-sm-4 col-form-label text-right"><small>Tanggal Rencana</small><strong></strong></label>
                              <div class="col-sm-8">
                                  <div class="form-group">
                                     <input type="text" class="form-control" name="tanggal_rencana" id="datepicker2">
                                  </div>
                              </div>
                          </div>
                          <div class="input-group row">
                              <label class="col-sm-4 col-form-label text-right"><small>Hasil</small><strong></strong></label>
                              <div class="col-sm-8">
                                  <div class="form-group">
                                     <input type="text" class="form-control" name="hasil">
                                  </div>
                              </div>
                          </div>
                          <div class="input-group row">
                              <label class="col-sm-4 col-form-label text-right"><small>Jumlah</small><strong></strong></label>
                              <div class="col-sm-8">
                                  <div class="form-group">
                                     <input type="text" class="form-control" name="jumlah" value="1" required>
                                  </div>
                              </div>
                          </div>
                          
                          <div class="input-group row">
                              <label class="col-sm-4 col-form-label text-right"><small>Keterangan</small></label>
                              <div class="col-sm-8">
                                <textarea class="form-control" rows="2" name="keterangan"></textarea>
                              </div>
                          </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer">
                          <div class="text-right">
                              <button type="submit" class="btn btn-sm btn-success">Simpan</a>
                          </div>
                      </div>
                      </form>
                    </div>
                    <div class="card card-info card-outline">
                        <div class="card-header">
                          <h3 class="card-title">RIWAYAT TINDAKAN</h3>
                        </div>
                        <div class="card-body table-responsive p-2">
                            <table id="example" class="table table-bordered table-sm" width="100%">
                              <thead>
                              <tr class="bg-gradient-primary" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                                <th>Tanggal</th>
                                <th>Tenaga Medis</th>
                                <th>Perawat/Bidan</th>
                                <th>Tindakan</th>
                                <th>Tgl Rencana</th>
                                <th>Lama Tindakan</th>
                                <th>Hasil</th>
                                <th>Tarif</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Keterangan</th>
                                <th></th>
                              </thead>
                              <tbody style="font-size:12px;">
                                @foreach ($data->tindakan as $item) 
                                  <tr>
                                    <td>{{$item->tanggal}}</td>
                                    <td>{{$item->dokter->nama}}</td>
                                    <td>{{$item->perawat == null ? '-': $item->perawat->nama}}</td>
                                    <td>{{$item->mtindakan->value}}</td>
                                    <td>{{$item->tanggal_rencana}}</td>
                                    <td>{{$item->lama_tindakan}}</td>
                                    <td>{{$item->hasil}}</td>
                                    <td>{{$item->tarif}}</td>
                                    <td>{{$item->jumlah}}</td>
                                    <td></td>
                                    <td>{{$item->keterangan}}</td>
                                    <td>
                                      <a href="/pelayanan/medis/proses/{{$data->id}}/tindakan/delete/{{$item->id}}" class="btn btn-xs btn-danger" onclick="return confirm('Yakin Ingin Menghapus Riwayat Resep?');"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-right">
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
