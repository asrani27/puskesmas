@extends('layouts.admin.default')

@push('addcss')
<link rel="stylesheet" href="/admin/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<style>
.select2-selection__rendered {
    line-height: 17px !important;
    font-size:14px;
}
.select2-container .select2-selection--single {
    height: 25px !important;
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
              <h3 class="card-title">Buat Baru Diagnosa</h3>
              <div class="card-tools">
                <a href="/pelayanan/medis/proses/{{$data->id}}" class="btn bg-gradient-danger btn-sm">Kembali</a>
              </div>
            </div>

            @include('puskes.pelayanan.medis.menu_utama')
        
            <div class="row">
              
            @include('puskes.pelayanan.medis.sidebar_medis')
                {{-- <div class="col-md-4" style="padding-left: 15px; padding-top:15px; padding-right:15px;">
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
                </div> --}}
                <div class="col-md-8" style="padding-left: 15px; padding-top:15px; padding-right:15px;">
                    <div class="card card-success card-outline">
                      <div class="card-header">
                        <h3 class="card-title">Riwayat Penyakit</h3>
                      </div>
                      <div class="card-body p-1 table-responsive">
                        <table id="example" class="table table-bordered table-sm" width="100%">
                          <thead>
                          <tr class="bg-gradient-primary" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                            <th>Tanggal</th>
                            <th>Dokter /Tenaga Medis</th>
                            <th>Perawat / Bidan</th>
                            <th>ICD-X / Diagnosa</th>
                            <th>Jenis</th>
                            <th>Kasus</th>
                            <th></th>
                          </thead>
                          <tbody>
                            @foreach ($data->diagnosa as $item)
                              <tr style="font-size:14px;">
                                <td>{{$item->tanggal}}</td>
                                <td>{{$item->dokter->nama}}</td>
                                <td>{{$item->perawat->nama}}</td>
                                <td>{{$item->diagnosa_id}} / {{$item->mdiagnosa->value}}</td>
                                <td>{{$item->diagnosa_jenis}}</td>
                                <td>{{$item->diagnosa_kasus}}</td>
                                <td>
                                  <a href="/pelayanan/medis/proses/{{$data->id}}/diagnosa/delete/{{$item->id}}" class="btn btn-xs btn-danger" onclick="return confirm('Yakin Ingin Menghapus Riwayat Diagnosa?');"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
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
                        <table id="example" class="table table-bordered table-sm" width="100%">
                          <thead>
                          <tr class="bg-gradient-primary" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                            <th>Dokter /Tenaga Medis</th>
                            <th>Perawat / Bidan</th>
                            <th>ICD-X / Diagnosa</th>
                            <th>Jenis</th>
                            <th>Kasus</th>
                            <th>Aksi</th>
                          </thead>
                          <form method="POST" action="{{route('diagnosa2', ['id' => $data->id])}}">
                            @csrf
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
                                    <select name="perawat_id" class="form-control form-control-sm select2">
                                      @foreach ($perawat as $item)
                                      <option value="{{$item->id}}">{{$item->nama}}</option>
                                      @endforeach
                                    </select>
                                  </td>
                                  <td>
                                    <select name="diagnosa_id" class="form-control select2" style="width: 250px">
                                      @foreach ($diagnosa as $item)
                                      <option value="{{$item->id}}">{{$item->id}} / {{$item->value}}</option>
                                      @endforeach
                                    </select>
                                  </td>
                                  <td>
                                    <select name="diagnosa_jenis" class="form-control select2">
                                      <option value="PRIMER">PRIMER</option>
                                      <option value="SEKUNDER">SEKUNDER</option>
                                      <option value="KOMPLIKASI">KOMPLIKASI</option>
                                    </select>
                                  </td>
                                  <td>
                                    <select name="diagnosa_kasus" class="form-control form-control-sm select2">
                                      <option value="BARU">BARU</option>
                                      <option value="LAMA">LAMA</option>
                                    </select>
                                  </td>
                                  <td>
                                      <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-save"></i></button>
                                  </td>
                              </tr>
                          </tbody>
                          </form>
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
    $('.select2').select2({ dropdownCssClass: "myFont" })
  
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    
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
