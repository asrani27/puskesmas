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
            
            @include('puskes.pelayanan.medis.menu_utama')

            <div class="row">
              
            @include('puskes.pelayanan.medis.sidebar_medis')

                <div class="col-md-8" style="padding-left: 15px; padding-top:15px; padding-right:15px;">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                          <h3 class="card-title">DATA KMS ANAK</h3>
                          <div class="card-tools">
                            <a href="/pelayanan/medis/proses/{{$data->id}}/imunisasi" class="btn bg-gradient-info btn-sm">Ubah Kategori Imunisasi</a>
                          </div>
                        </div>
                       <form method="POST" action="{{route('kms', ['id' => $data->id])}}">
                          @csrf
                        <div class="row">
                          <div class="col-md-6">
                              <div class="card-body">
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>Nama Anak</small></label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" value="{{$data->pendaftaran->pasien->nama}}" readonly>
                                  </div>
                              </div>
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>Tanggal Lahir</small></label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="datepicker" value="{{Carbon\Carbon::parse($data->pendaftaran->pasien->tanggal_lahir)->format('d M Y')}}" readonly>
                                  </div>
                              </div>
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>Jenis Kelamin</small></label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" value="{{$data->pendaftaran->pasien->jenis_kelamin}}"  readonly>
                                  </div>
                              </div>
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>Tempat Lahir</small></label>
                                  <div class="col-sm-9">
                                      <input type="text" class="form-control form-control-sm" value="{{$data->pendaftaran->pasien->tempat_lahir}}" >
                                  </div>
                              </div>
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>Alamat</small></label>
                                  <div class="col-sm-9">
                                      <input type="text" class="form-control form-control-sm" value="{{$data->pendaftaran->pasien->alamat}}" >
                                  </div>
                              </div>
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>Berat Waktu Lahir</small></label>
                                  <div class="col-sm-9">
                                      <input type="text" class="form-control form-control-sm" name="bb">
                                  </div>
                              </div>
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>Panjang Waktu Lahir</small></label>
                                  <div class="col-sm-9">
                                      <input type="text" class="form-control form-control-sm" name="pb">
                                  </div>
                              </div>
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>Nama Ayah</small></label>
                                  <div class="col-sm-9">
                                      <input type="text" class="form-control form-control-sm" value="{{$data->pendaftaran->pasien->nama_ayah}}" >
                                  </div>
                              </div>
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>Pekerjaan Ayah</small></label>
                                  <div class="col-sm-9">
                                      <input type="text" class="form-control form-control-sm" name="pekerjaan_ayah">
                                  </div>
                              </div>
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>Nama Ibu</small></label>
                                  <div class="col-sm-9">
                                      <input type="text" class="form-control form-control-sm"  value="{{$data->pendaftaran->pasien->nama_ibu}}">
                                  </div>
                              </div>
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>Pekerjaan Ibu</small></label>
                                  <div class="col-sm-9">
                                      <input type="text" class="form-control form-control-sm" name="pekerjaan_ibu">
                                  </div>
                              </div>
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>Macamnya Persalinan</small></label>
                                  <div class="col-sm-9">
                                      <input type="radio" name="macam_persalinan" value=1> Normal <br />
                                      <input type="radio" name="macam_persalinan" value=2> Kelainan Letak <br />
                                      <input type="radio" name="macam_persalinan" value=3> CPD <br />
                                      <input type="radio" name="macam_persalinan" value=4> Cacat Bawaan<br />
                                      <input type="radio" name="macam_persalinan" value=5> Caesar <br />
                                  </div>
                              </div>
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>Pelayanan Persalinan</small></label>
                                  <div class="col-sm-9">
                                      <input type="radio" name="persalinan_oleh" value=1> Dokter <br />
                                      <input type="radio" name="persalinan_oleh" value=2> Bidan <br />
                                      <input type="radio" name="persalinan_oleh" value=3> Tenaga Medis <br />
                                      <input type="radio" name="persalinan_oleh" value=4> Dukun Terlatih<br />
                                      <input type="radio" name="persalinan_oleh" value=5> Tenaga Tak Terlatih<br />
                                  </div>
                              </div>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="card-body">
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>Anak Ke *</small></label>
                                  <div class="col-sm-9">
                                      <input type="text" class="form-control form-control-sm" name="anak_ke" required>
                                  </div>
                              </div>
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>Tempat Persalinan</small></label>
                                  <div class="col-sm-9">
                                      <input type="radio" name="tempat_persalinan" value=1> Rumah <br />
                                      <input type="radio" name="tempat_persalinan" value=2> Rumah Sakit <br />
                                      <input type="radio" name="tempat_persalinan" value=3> Puskesmas <br />
                                      <input type="radio" name="tempat_persalinan" value=4> R. Bersalin<br />
                                      <input type="radio" name="tempat_persalinan" value=5> R. Bidan<br />
                                      <input type="radio" name="tempat_persalinan" value=6> Klinik<br />
                                  </div>
                              </div>
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>MASA NEONATAL:</small></label>
                                  <div class="col-sm-9">
                                      
                                  </div>
                              </div>
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>Lahir - 5 Jam</small></label>
                                  <div class="col-sm-9">
                                      <input type="text" class="form-control form-control-sm" name="berat_badan">
                                  </div>
                              </div>
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>6 - 48 Jam</small></label>
                                  <div class="col-sm-9">
                                      <input type="text" class="form-control form-control-sm" name="berat_badan">
                                  </div>
                              </div>
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>Hari ke 3-7</small></label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="berat_badan">
                                  </div>
                              </div>
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>Hari 8 - 28</small></label>
                                  <div class="col-sm-9">
                                      <input type="text" class="form-control form-control-sm" name="berat_badan">
                                  </div>
                              </div>
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>ASI?</small></label>
                                  <div class="col-sm-9">
                                    <input type="radio" name="asi" value=1> ASI<br />
                                    <input type="radio" name="asi" value=2> Bukan ASI<br />
                                  </div>
                              </div>
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>VIT A 6 Bulan ?</small></label>
                                  <div class="col-sm-9">
                                    <input type="radio" name="vita" value=1> Ya<br />
                                    <input type="radio" name="vita" value=2> Tidak<br />
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
@include('puskes.pelayanan.medis.sidebar_riwayat')
@endpush
