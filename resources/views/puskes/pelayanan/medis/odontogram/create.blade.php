@extends('layouts.admin.default')

@push('addcss')
<link rel="stylesheet" href="/admin/js/bootstrap-datepicker.min.css">

<link rel="stylesheet" href="/admin/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<style>
  .myFont{
    font-size:12px;
    }
    .custom {
    width: 108px !important;
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
                          <h3 class="card-title">RIWAYAT ODONTOGRAM</h3>
                        </div>
                        <div class="card-body table-responsive p-2">
                            <table id="example" class="table table-bordered table-sm" width="100%">
                              <thead>
                                <tr class="bg-gradient-primary" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                                  <th>Tanggal</th>
                                  <th>Dokter / Tenaga Medis</th>
                                  <th>Kode Status</th>
                                  <th>Nomor Gigi</th>
                                </tr>
                              </thead>
                              <tbody style="font-size:12px;">
                                
                              </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card card-info card-outline">
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
                          
                          </div>
                        </div>
                      </div>
                      {{-- <div class="card-footer">
                          <div class="text-right">
                              <button type="submit" class="btn btn-sm btn-success">Simpan</a>
                          </div>
                      </div> --}}
                      </form>
                    </div>
                    
                    <div class="card card-info card-outline">
                        <div class="card-header">
                          <h3 class="card-title">Keadaan Gigi</h3>
                        </div>
                      <div class="row">
                        <div class="col-md-12 p-1">
                            <div class="card-body p-2">
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> SOU </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> NVT </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> NON </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> UNE </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> PRE </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> ANO </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> CFR </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> RRX </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> MIS </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> IMV </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> DIA </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> ATT </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> ABR </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> CAR </button>
                            </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="card card-info card-outline">
                        <div class="card-header">
                          <h3 class="card-title">Bahan Restorasi</h3>
                        </div>
                      <div class="row">
                        <div class="col-md-12 p-1">
                            <div class="card-body p-2">
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> AMF </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> COF </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> FIS </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> GIF </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> INL </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> ONL </button>
                            </div>
                        </div>
                      </div>
                    </div>

                    <div class="card card-info card-outline">
                        <div class="card-header">
                          <h3 class="card-title">Protesa</h3>
                        </div>
                      <div class="row">
                        <div class="col-md-12 p-1">
                            <div class="card-body p-2">
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> PRD/FLD </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> PRD </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> FRD </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> ACR </button>
                            </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="card card-info card-outline">
                        <div class="card-header">
                          <h3 class="card-title">Restorasi</h3>
                        </div>
                      <div class="row">
                        <div class="col-md-12 p-1">
                            <div class="card-body p-2">
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> RCT </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> FMC </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> FMC-RCT </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> POC </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> POC-RCT </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> IPX-POC </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> MPC </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> GMC </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> IPX </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> MEB </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> POX </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> PON </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> ABU </button>
                            </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="card card-info card-outline">
                        <div class="card-header">
                          <h3 class="card-title">Keadaan Lainnya</h3>
                        </div>
                      <div class="row">
                        <div class="col-md-12 p-1">
                            <div class="card-body p-2">
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> ABS </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> CAL </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> PULP </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> PER </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> GIF </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> AVS </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> MUC </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> ULS </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> PST </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> STO </button>
                                <button type="button" class="btn btn-sm custom btn-outline-info btn-flat"> TMJ </button>
                            </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="card card-info card-outline">
                        <div class="card-header">
                          <h3 class="card-title">Odontogram</h3>
                        </div>
                      <div class="row">
                        <div class="col-md-12 p-1">
                            <div class="card-body p-2">
                                Gambar Gigi
                            </div>
                        </div>
                      </div>
                      <div class="card-footer">
                          <div class="text-right">
                              <button type="submit" class="btn btn-sm btn-success">Simpan</a>
                          </div>
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
@endpush
