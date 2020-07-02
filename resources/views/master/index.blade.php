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
      <a href="/pengaturan/data_master/pegawai">
      <div class="info-box bg-gradient-info">
        <span class="info-box-icon"><i class="fas fa-users"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Data Pegawai Puskesmas</span>
          <span class="info-box-number">{{$pegawai}}</span>

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
      <a href="/pengaturan/data_master/jenispegawai">
      <div class="info-box bg-gradient-danger">
        <span class="info-box-icon"><i class="fab fa-buffer"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Data Jenis Pegawai</span>
          <span class="info-box-number">{{$jenispegawai}}</span>

          <div class="progress">
            <div class="progress-bar" style="width: 70%"></div>
          </div>
        </div>
        <!-- /.info-box-content -->
      </div>
      </a>
      <!-- /.info-box -->
    </div>
</div>

<div class="row">
  <div class="col-md-4 col-sm-6 col-12">
      <a href="/pengaturan/data_master/user">
          <div class="info-box bg-gradient-success">
              <span class="info-box-icon"><i class="fa fa-user"></i></span>

              <div class="info-box-content">
              <span class="info-box-text">Data User Pengguna</span>
              <span class="info-box-number">{{$user}}</span>

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
    <a href="/pengaturan/data_master/obat">
    <div class="info-box bg-gradient-info">
      <span class="info-box-icon"><i class="fas fa-medkit"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Data Obat</span>
        <span class="info-box-number">{{$obat}}</span>

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
    <a href="/pengaturan/data_master/stokobat">
    <div class="info-box bg-gradient-danger">
      <span class="info-box-icon"><i class="fas fa-medkit"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Stok Obat</span>
        <span class="info-box-number">~</span>

        <div class="progress">
          <div class="progress-bar" style="width: 70%"></div>
        </div>
      </div>
      <!-- /.info-box-content -->
    </div>
    </a>
    <!-- /.info-box -->
  </div>
  
 
</div>
<div class="row">
  <div class="col-md-4 col-sm-6 col-12">
      <a href="/pengaturan/data_master/obatmasuk">
          <div class="info-box bg-gradient-success">
              <span class="info-box-icon"><i class="fa fa-medkit"></i></span>

              <div class="info-box-content">
              <span class="info-box-text">Penerimaan Obat / Obat Masuk</span>
              <span class="info-box-number">~</span>

              <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
              </div>
              </div>
              <!-- /.info-box-content -->
          </div>
      </a>
    <!-- /.info-box -->
  </div>
</div>
@endsection

@push('addjs')

@endpush
