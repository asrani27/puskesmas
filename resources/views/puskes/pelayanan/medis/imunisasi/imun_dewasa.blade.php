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
                          <h3 class="card-title">IMUNISASI DEWASA</h3>
                          <div class="card-tools">
                            <a href="/pelayanan/medis/proses/{{$data->id}}/imunisasi" class="btn bg-gradient-info btn-sm">Ubah Kategori Imunisasi</a>
                          </div>
                        </div>
                      <form method="POST" action="{{route('imunisasiDewasa', ['id' => $data->id])}}">
                          @csrf
                            <div class="row">
                            <div class="col-md-6">
                                <div class="card-body">
                                <div class="input-group row">
                                    <label class="col-sm-3 col-form-label text-right"><small>Tanggal</small></label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="tanggal" value="{{\Carbon\Carbon::now()->format('d m Y h:i:s')}}" readonly>
                                    </div>
                                </div>
                                <div class="input-group row">
                                    <label class="col-sm-3 col-form-label text-right"><small>Umur</small></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm" name="umur_bulan" id="datepicker" value="{{umurBulan2($data->pendaftaran->pasien->tanggal_lahir)}}" readonly>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <div class="input-group row">
                                        <label class="col-sm-3 col-form-label text-right"><small>Dokter</small></label>
                                        <div class="col-sm-9">
                                            <select class="form-control select2 form-control-sm" id="dokter_id" name="dokter_id">
                                                <option value="">-Pilih-</option>
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
                                    <div class="input-group row">
                                        <label class="col-sm-3 col-form-label text-right"><small>Perawat</small></label>
                                        <div class="col-sm-9">
                                            <select class="form-control select2 form-control-sm" id="perawat_id" name="perawat_id">
                                                <option value="">-Pilih-</option>
                                                @foreach ($perawat as $item)
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
                            </div>   
                            </div>
                            <div class="row">
                            <div class="col-md-12">
                                <div class="card-body  table-responsive">
                                    <strong>DATA IMUNISASI</strong><br/>
                                <table class="table table-bordered table-sm" width="100%">
                                    @foreach ($imun as $item)
                                    <tr>
                                        @foreach ($item as $value)
                                          <td><input type="checkbox" name="data_imun[]" value="{{$value->imunisasi_kode}}"> {{$value->imunisasi_nama}}</td>
                                        @endforeach
                                    </tr>
                                    @endforeach
                                </table>
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
