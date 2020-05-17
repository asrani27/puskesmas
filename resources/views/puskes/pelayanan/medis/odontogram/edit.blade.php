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
              
            @include('puskes.pelayanan.medis.sidebar_medis')

                <div class="col-md-8" style="padding-left: 15px; padding-top:15px; padding-right:15px;">
                    
                    <div class="card card-info card-outline">
                        <div class="card-header">
                          <h3 class="card-title">RIWAYAT ODONTOGRAM</h3>
                        </div>
                        <div class="card-body table-responsive p-2">
                          
                          @include('puskes.pelayanan.medis.odontogram.riwayat_odon_edit')
                            {{-- <table id="example" class="table table-bordered table-sm" width="100%">
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
                            </table> --}}
                        </div>
                    </div>
                    <form method="POST" action="{{route('updateOdontogram', ['id' => $data->id])}}">
                    <div class="card card-info card-outline">
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
                    </div>
                    
                    @include('puskes.pelayanan.medis.odontogram.keadaan_gigi')
                    
                    @include('puskes.pelayanan.medis.odontogram.bahan_restorasi')
                    
                    @include('puskes.pelayanan.medis.odontogram.protesa')
                    
                    @include('puskes.pelayanan.medis.odontogram.restorasi')
                    
                    @include('puskes.pelayanan.medis.odontogram.keadaan_lainnya')
                    
                    <div class="card card-info card-outline">
                        <div class="card-header">
                          <h3 class="card-title">Odontogram</h3>
                        </div>
                      <div class="row">
                        <div class="col-md-12 p-1">
                            <div class="card-body p-2">
                              @include('puskes.pelayanan.medis.odontogram.odon_edit')
                            </div>
                        </div>
                      </div>
                      <div class="card-footer">
                          <div class="text-right">
                              <button type="submit" class="btn btn-sm btn-success">Update</button>
                              <a href="/delete/odontogram/{{$data->id}}" class="btn btn-sm btn-success">Update</a>
                          </div>
                      </div>
                    </div>
                    
                  </form>
                </div>

            </div>
            <div class="card-footer">
                <div class="text-right">
                </div>
            </div>
                        
            <input readonly="readonly" type="hidden" value="" name="code">
            <input readonly="readonly" type="hidden" value="" name="tambahCode">
            <!-- /.card-body -->
        </div>
    </div>
</div>
    </div>
</section>
@endsection

@push('addjs')
@include('puskes.pelayanan.medis.odontogram.js')
@include('puskes.pelayanan.medis.sidebar_riwayat')
@endpush
