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
                          <h3 class="card-title">DATA KMS ANAK</h3>
                          <div class="card-tools">
                            <a href="/pelayanan/medis/proses/{{$data->id}}/imunisasi" class="btn bg-gradient-info btn-sm">Ubah Kategori Imunisasi</a>
                          </div>
                        </div>
                       <form method="POST" action="{{route('updatekms', ['id' => $data->id, 'kms_id' => $kms->id])}}">
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
                                  <input type="text" class="form-control form-control-sm" name="pekerjaan_ayah" value="{{$kms->pekerjaan_ayah}}">
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
                                      <input type="text" class="form-control form-control-sm" name="pekerjaan_ibu" value="{{$kms->pekerjaan_ibu}}">
                                  </div>
                              </div>
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>Macamnya Persalinan</small></label>
                                  <div class="col-sm-9">
                                      <input type="radio" name="macam_persalinan" value=1 {{$kms->macam_persalinan == 1 ? 'checked' : ''}}> Normal <br />
                                      <input type="radio" name="macam_persalinan" value=2 {{$kms->macam_persalinan == 2 ? 'checked' : ''}}> Kelainan Letak <br />
                                      <input type="radio" name="macam_persalinan" value=3 {{$kms->macam_persalinan == 3 ? 'checked' : ''}}> CPD <br />
                                      <input type="radio" name="macam_persalinan" value=4 {{$kms->macam_persalinan == 4 ? 'checked' : ''}}> Cacat Bawaan<br />
                                      <input type="radio" name="macam_persalinan" value=5 {{$kms->macam_persalinan == 5 ? 'checked' : ''}}> Caesar <br />
                                  </div>
                              </div>
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>Pelayanan Persalinan</small></label>
                                  <div class="col-sm-9">
                                      <input type="radio" name="persalinan_oleh" value=1 {{$kms->persalinan_oleh == 1 ? 'checked' : ''}}> Dokter <br />
                                      <input type="radio" name="persalinan_oleh" value=2 {{$kms->persalinan_oleh == 2 ? 'checked' : ''}}> Bidan <br />
                                      <input type="radio" name="persalinan_oleh" value=3 {{$kms->persalinan_oleh == 3 ? 'checked' : ''}}> Tenaga Medis <br />
                                      <input type="radio" name="persalinan_oleh" value=4 {{$kms->persalinan_oleh == 4 ? 'checked' : ''}}> Dukun Terlatih<br />
                                      <input type="radio" name="persalinan_oleh" value=5 {{$kms->persalinan_oleh == 5 ? 'checked' : ''}}> Tenaga Tak Terlatih<br />
                                  </div>
                              </div>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="card-body">
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>Anak Ke *</small></label>
                                  <div class="col-sm-9">
                                  <input type="text" class="form-control form-control-sm" name="anak_ke" required value="{{$kms->anak_ke}}">
                                  </div>
                              </div>
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>Tempat Persalinan</small></label>
                                  <div class="col-sm-9">
                                      <input type="radio" name="tempat_persalinan" value=1 {{$kms->tempat_persalinan == 1 ? 'checked' : ''}}> Rumah <br />
                                      <input type="radio" name="tempat_persalinan" value=2 {{$kms->tempat_persalinan == 2 ? 'checked' : ''}}> Rumah Sakit <br />
                                      <input type="radio" name="tempat_persalinan" value=3 {{$kms->tempat_persalinan == 3 ? 'checked' : ''}}> Puskesmas <br />
                                      <input type="radio" name="tempat_persalinan" value=4 {{$kms->tempat_persalinan == 4 ? 'checked' : ''}}> R. Bersalin<br />
                                      <input type="radio" name="tempat_persalinan" value=5 {{$kms->tempat_persalinan == 5 ? 'checked' : ''}}> R. Bidan<br />
                                      <input type="radio" name="tempat_persalinan" value=6 {{$kms->tempat_persalinan == 6 ? 'checked' : ''}}> Klinik<br />
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
                                  <input type="text" class="form-control form-control-sm" name="neonatal_1" value="{{$kms->neonatal_1}}">
                                  </div>
                              </div>
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>6 - 48 Jam</small></label>
                                  <div class="col-sm-9">
                                      <input type="text" class="form-control form-control-sm" name="neonatal_2" value="{{$kms->neonatal_2}}">
                                  </div>
                              </div>
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>Hari ke 3-7</small></label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="neonatal_3" value="{{$kms->neonatal_3}}">
                                  </div>
                              </div>
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>Hari 8 - 28</small></label>
                                  <div class="col-sm-9">
                                      <input type="text" class="form-control form-control-sm" name="neonatal_4" value="{{$kms->neonatal_4}}">
                                  </div>
                              </div>
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>ASI?</small></label>
                                  <div class="col-sm-9">
                                    <input type="radio" name="asi" value=1 {{$kms->asi == 1 ? 'checked' : ''}}> ASI<br />
                                    <input type="radio" name="asi" value=2 {{$kms->asi == 2 ? 'checked' : ''}}> Bukan ASI<br />
                                  </div>
                              </div>
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>VIT A 6 Bulan ?</small></label>
                                  <div class="col-sm-9">
                                    <input type="radio" name="vita" value=1 {{$kms->asi == 1 ? 'checked' : ''}}> Ya<br />
                                    <input type="radio" name="vita" value=2 {{$kms->asi == 2 ? 'checked' : ''}}> Tidak<br />
                                  </div>
                              </div>
                              </div>
                          </div>   
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <button type="submit" class="btn btn-sm btn-primary">Update</a>
                            </div>
                        </div>
                        </form>
                    </div>
                    
                    @if($checkImun != null)
                    @include('puskes.pelayanan.medis.imunisasi.edit_ia')
                    @else
                    @include('puskes.pelayanan.medis.imunisasi.create_ia')
                    @endif
                    
                    <div class="card card-info card-outline">
                        <div class="card-header">
                          <h3 class="card-title">RIWAYAT PEMBERIAN IMUNISASI</h3>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                              <div class="card-body">
                                  
                              </div>
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
