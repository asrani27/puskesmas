@extends('layouts.admin.default')

@push('addcss')
<script src="/admin/plugins/chart.js/Chart.min.js"></script>
@endpush

@section('content-header')
<div class="content-header">
    {{-- <div class="row">
        <div class="col-lg-12">
            <a href="#" class="btn btn-sm btn-primary">Dashboard Utama</a>
            <a href="#" class="btn btn-sm btn-success">Dashboard Antrian</a>
            <a href="#" class="btn btn-sm btn-info">Dashboard SIP</a>
        </div>
    </div> --}}
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4 col-sm-6 col-12">
        <a href="/pengaturan/data_master/poli">
            <div class="info-box bg-gradient-success">
                <span class="info-box-icon"><i class="fa fa-bed"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Data Poli / Ruangan</span>
                <span class="info-box-number">{{$ruang}}</span>

                <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                </div>
                </div>
                <!-- /.info-box-content -->
            </div>
        </a>
      <!-- /.info-box -->
    </div>
    
    <div class="col-md-4 col-sm-6 col-12">
      <div class="info-box bg-gradient-info">
        <span class="info-box-icon"><i class="fas fa-users"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Data Pegawai Puskesmas</span>
          <span class="info-box-number">11/110</span>

          <div class="progress">
            <div class="progress-bar" style="width: 70%"></div>
          </div>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    
    <div class="col-md-4 col-sm-6 col-12">
      <div class="info-box bg-gradient-danger">
        <span class="info-box-icon"><i class="fab fa-buffer"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Data Jenis Pegawai</span>
          <span class="info-box-number">1/10</span>

          <div class="progress">
            <div class="progress-bar" style="width: 70%"></div>
          </div>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
</div>

@endsection

@push('addjs')

@endpush
