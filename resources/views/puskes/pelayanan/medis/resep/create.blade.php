@extends('layouts.admin.default')

@push('addcss')
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
              <h3 class="card-title">Data Resep</h3>
              <div class="card-tools">
                <a href="/pelayanan/medis/proses/{{$data->id}}" class="btn bg-gradient-danger btn-sm">Kembali</a>
              </div>
            </div>

            @include('puskes.pelayanan.medis.menu_utama')

            <div class="row">
              
            @include('puskes.pelayanan.medis.sidebar_medis')
                
                <div class="col-md-8" style="padding-left: 15px; padding-top:15px; padding-right:15px;">
                    <div class="card card-success card-outline">
                      <div class="card-header">
                        <h3 class="card-title">Detail</h3>
                      </div>
                    <form method="POST" action="{{route('resep2', ['id' => $data->id])}}">
                      @csrf
                    <div class="card-body">
                      <div class="input-group row">
                          <label class="col-sm-3 col-form-label text-right"><small>No Resep</small></label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" name="no_resep">
                          </div>
                      </div>
                      <div class="input-group row">
                          <label class="col-sm-3 col-form-label text-right"><small>Ruangan Tujuan</small></label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" name="ruangan_id" value="APOTEK">
                          </div>
                      </div>
                      <div class="input-group row">
                          <label class="col-sm-3 col-form-label text-right"><small>Tng. Medis 1</small><strong><span class="text-danger">*</span></strong></label>
                          <div class="col-sm-9">
                            <div class="form-group">
                              <select class="form-control form-control-sm select2" style="width: 100%;" name="dokter_id" required>
                                @foreach ($dokter as $item)
                                  @if($data->anamnesa->dokter_id == $item->id)
                                  <option value="{{$item->id}}" selected>{{$item->nama}} / {{$item->nama_tenaga_medis}}</option>
                                  @else
                                  <option value="{{$item->id}}">{{$item->nama}} / {{$item->nama_tenaga_medis}}</option>
                                  @endif
                                @endforeach
                              </select>
                            </div>
                          </div>
                      </div>
                      <div class="input-group row">
                          <label class="col-sm-3 col-form-label text-right"><small>Tng. Medis 2</small></label>
                          <div class="col-sm-9">
                            <div class="form-group">
                              <select class="form-control form-control-sm select2" style="width: 100%;" name="perawat_id">
                                @if($data->anamnesa->perawat_id == null)
                                <option value=""></option>
                                @foreach ($perawat as $item)
                                  <option value="{{$item->id}}">{{$item->nama}} / {{$item->nama_tenaga_medis}}</option>
                                @endforeach
                                @else
                                @foreach ($perawat as $item)
                                  @if($data->anamnesa->perawat_id == $item->id)
                                  <option value="{{$item->id}}" selected>{{$item->nama}} / {{$item->nama_tenaga_medis}}</option>
                                  @else
                                  <option value="{{$item->id}}">{{$item->nama}} / {{$item->nama_tenaga_medis}}</option>
                                  @endif
                                @endforeach
                                @endif
                              </select>
                            </div>
                          </div>
                      </div>
                    </div>
                      <!-- /.card-body -->
                    </div>

                    <div class="card card-success card-outline">
                      <div class="card-header">
                        <h3 class="card-title">Data Resep</h3>
                      </div>
                      <div class="card-body p-1 table-responsive">
                        <table id="example" class="table table-bordered table-sm" width="100%">
                          <thead>
                          <tr class="bg-gradient-primary" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                            <th>Nama Obat</th>
                            <th>Jml</th>
                            <th>Signa</th>
                            <th>Aturan Pakai</th>
                            <th>Keterangan</th>
                            <th></th>
                          </thead>
                          <tbody>
                            @if($data->resep == null)
                            @else
                            @foreach ($data->resep->resepdetail as $item)
                              <tr style="font-size:14px;">
                                <td>{{$item->obat->value}}</td>
                                <td>{{$item->obat_jumlah}}</td>
                                <td>{{$item->obat_signa}}</td>
                                <td>
                                  @if($item->aturan_pakai == null)
                                  @elseif($item->aturan_pakai == 1)
                                  Sebelum Makan
                                  @elseif($item->aturan_pakai == 2)
                                  Sesudah Makan
                                  @elseif($item->aturan_pakai == 3)
                                  Pemakaian Luar
                                  @elseif($item->aturan_pakai == 4)
                                  Jika Di Perlukan
                                  @endif
                                </td>
                                <td>{{$item->keterangan}}</td>
                                <td>
                                  <a href="/pelayanan/medis/proses/{{$data->id}}/resep/delete/{{$item->id}}" class="btn btn-xs btn-danger" onclick="return confirm('Yakin Ingin Menghapus Riwayat Resep?');"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>

                    <div class="card card-success card-outline">
                      <div class="card-header">
                        <h3 class="card-title">Tambah Resep</h3>
                        <div class="card-tools">
                          {{-- <a href="/pelayanan/medis/proses/{{$data->id}}" class="btn bg-gradient-primary btn-xs">Tambah Resep</a> --}}
                        </div>
                      </div>
                      <div class="card-body p-1 table-responsive">
                        <table id="example" class="table table-bordered table-sm">
                          <thead>
                          <tr class="bg-gradient-primary" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                            <th>Racikan</th>
                            <th>Jml<br>Permintaan</th>
                            <th>Nama Obat</th>
                            <th>Jumlah</th>
                            <th>Signa</th>
                            <th>Aturan Pakai</th>
                            <th>Keterangan</th>
                            <th></th>
                          </thead>
                          <tbody>
                              <tr>
                              <td>
                              <select name="racikan" class="form-control form-control-sm">
                                <option value="">-Pilih-</option>
                                <option value="R1">R1</option>
                                <option value="R2">R2</option>
                                <option value="R3">R3</option>
                                <option value="R4">R4</option>
                                <option value="R5">R5</option>
                              </select>
                              </td>    
                              <td><input type="text" class="form-control form-control-sm" name="obat_jumlah_permintaan"></td>
                              <td>
                                <select name="obat_id" class="form-control select2">
                                  @foreach ($obat as $item)
                                    <option value="{{$item->id}}">{{$item->id}} - {{$item->value}}</option>
                                  @endforeach
                                </select>
                              </td>  
                              <td><input type="text" class="form-control form-control-sm" name="obat_jumlah" required></td>
                              <td>
                                
                                <select name="obat_signa" class="form-control select2">
                                  @foreach ($signa as $item)
                                    <option value="{{$item->value}}">{{$item->value}}</option>
                                  @endforeach
                                </select>
                              </td>
                              <td>
                                <select name="aturan_pakai" class="form-control form-control-sm">
                                  <option value="">-Pilih-</option>
                                  <option value="1">Sebelum Makan</option>
                                  <option value="2">Sesudah Makan</option>
                                  <option value="3">Pemakaian Luar</option>
                                  <option value="4">Jika Diperlukan</option>
                                </select>
                              </td>
                              <td><input type="text" class="form-control form-control-sm" name="keterangan"></td>
                              <td>
                                <button type="submit" class="btn btn-sm btn-success shadow"><i class="fas fa-save"></i></button>
                              </td>
                              
                              </tr>
                          </tbody>
                        </table>
                      </div>
                      
                        <div class="card-footer">
                            <div class="text-right">
                                </div>
                        </div>
                    </div>
                    
                    {{-- <div class="card card-success card-outline">
                      <div class="card-header">
                        <h3 class="card-title">ALERGI OBAT</h3>
                      </div>
                      
                      <div class="row">
                          
                      </div>
                    </div> --}}
                </div>
              </form>
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
