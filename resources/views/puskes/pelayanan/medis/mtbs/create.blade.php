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
              <h3 class="card-title">Data MTBS</h3>
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
                  <form method="POST" action="{{route('mtbs',['id' => $data->id])}}">
                    @csrf
                    <div class="card card-info card-outline">
                      
                      <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>ID</small><strong></strong></label>
                                  <div class="col-sm-9">
                                      <input type="text" class="form-control form-control-sm" value="- Otomatis -" readonly>
                                  </div>
                              </div>
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>Tanggal</small><strong></strong></label>
                                  <div class="col-sm-9">
                                      <input type="text" class="form-control form-control-sm" name="tanggal_rencana" value="{{\Carbon\Carbon::now()->format('d M Y h:i:s')}}" readonly>
                                  </div>
                              </div>
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>Dokter / Tenaga Medis</small><strong><span class="text-danger">*</span></strong></label>
                                  <div class="col-sm-9">
                                      <select id="e2" class="form-control form-control-sm select2" style="width: 100%;" name="dokter_id" required>
                                        <option value="">-Pilih-</option>
                                        @foreach ($dokter as $item)
                                          <option value="{{$item->id}}">{{$item->nama}} / {{$item->nama_tenaga_medis}}</option>
                                        @endforeach
                                      </select>
                                  </div>
                              </div>
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>Perawat/Bidan/sdb</small></label>
                                  <div class="col-sm-9">
                                      <select id="e3" class="form-control select2" name="perawat_id">
                                        <option value="">-Pilih-</option>
                                        @foreach ($perawat as $item)
                                          <option value="{{$item->id}}">{{$item->nama}} / {{$item->nama_tenaga_medis}}</option>
                                        @endforeach
                                      </select>
                                  </div>
                              </div>
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>BB</small><strong></strong></label>
                                  <div class="col-sm-9">
                                        <label class="col-form-label text-right"><small>KG</small><strong></strong></label>
                                  </div>
                              </div>
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>Anak Sakit Apa?</small><strong><span class="text-danger">*</span></strong></label>
                                  <div class="col-sm-9">
                                        <textarea class="form-control" rows="2" name="keterangan"></textarea>
                                  </div>
                              </div>
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>PB/TB</small><strong></strong></label>
                                  <div class="col-sm-9">
                                        <label class="col-form-label text-right"><small>CM</small><strong></strong></label>
                                  </div>
                              </div>
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>Jenis Kunjungan</small><strong></strong></label>
                                  <div class="col-sm-9">
                                        <input type="radio" id="kunjungan-1" name="jenis_kunjungan" value="1" required=""> Kunjungan Pertama <br>
                                        <input type="radio" id="kunjungan-1" name="jenis_kunjungan" value="2" required=""> Kunjungan Ulang
                                  </div>
                              </div>
                              <div class="input-group row">
                                  <label class="col-sm-3 col-form-label text-right"><small>Suhu</small><strong></strong></label>
                                  <div class="col-sm-9">
                                        <label class="col-form-label text-right"><sup>o</sup><small>C</small><strong></strong></label>
                                  </div>
                              </div>
                            </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="card card-info card-outline">
                        <div class="card-header">
                          <h3 class="card-title">Data MTBS</h3>
                        </div>
                        <div class="card-body table-responsive p-2">
                            <table id="example" class="table table-bordered table-sm" width="100%">
                              <thead>
                              <tr class="bg-gradient-primary" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                                <th colspan="2">PENILAIAN</th>
                                <th>KLASIFIKASI</th>
                                <th>Tindakan</th>
                              </thead>
                              <tbody style="font-size:13px;">
                                @include('puskes.pelayanan.medis.mtbs.anak.penilaian')
                              </tbody>
                            </table>
                        </div>
                        <div class="card-footer p-1">
                            <div class="text-right">
                              <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                              <button type="button" class="btn btn-sm btn-warning">Reset</button>
                            </div>
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
