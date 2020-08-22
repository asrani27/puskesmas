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
            </div>
        </a>

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
            </div>
        </a>
        
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
            </div>
        </a>
        
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

      <a href="/pengaturan/dm/obat">
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

      <a href="/pengaturan/dm/diagnosa">
        <div class="info-box bg-gradient-info">
          <span class="info-box-icon"><i class="fas fa-stethoscope"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Data Diagnosa</span>
            <span class="info-box-number">{{$diagnosa}}</span>

            <div class="progress">
              <div class="progress-bar" style="width: 70%"></div>
            </div>
          </div>
          <!-- /.info-box-content -->
        </div>
      </a>
    </div>
    
    <div class="col-md-4 col-sm-6 col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><b>Video Panduan Aplikasi</b></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="callout callout-warning">
            <h5>1. Buat User Untuk Pengguna Lain <a href="https://drive.google.com/file/d/1Qxu3VF414xPhaqtRENhmii5oJu5wiinN/view?usp=sharing"  target="_blank">Lihat</a></h5>
          </div>
          <div class="callout callout-info">
            <h5>2. Menyiapkan Poli <a href="https://drive.google.com/file/d/1xvoNSNIBfwUwDOnk7UycRhrgwB4WtQCy/view?usp=sharing" target="_blank">Lihat</a></h5>
          </div>
          <div class="callout callout-success">
            <h5>3. Menyiapkan Data Dokter / Tenaga Medis <a href="https://drive.google.com/file/d/1nXSwvTTdVR52dXgK_GN-q7hSH0KsRkxy/view?usp=sharing" target="_blank">Lihat</a></h5>
          </div>
          <div class="callout callout-warning">
            <h5>4. Menyiapkan Data Diagnosa Juga <a href="https://drive.google.com/file/d/1SVghrFAEoUonCRzjjazQMv-oLol0EVWP/view?usp=sharing" target="_blank">Lihat</a></h5>
          </div>
          <div class="callout callout-danger">
            <h5>5. Menyiapkan Data Obat <a href="https://drive.google.com/file/d/1bWv7aLV4Bqo-h9pBYvswe34aTDUbqtRE/view?usp=sharing" target="_blank">Lihat</a></h5>
          </div>
          <div class="callout callout-info">
            <h5>6. Mendaftarkan Pasien Ke Poli<a href="https://drive.google.com/file/d/1Esr5QnLRwwZULVjID6gjixIun-DHWLab/view?usp=sharing" target="_blank">Lihat</a></h5>
          </div>
          <div class="callout callout-info">
            <h5>7. Penginputan Anamnesa, Diagnosa Dan Resep <a href="https://drive.google.com/file/d/1_BDrGnn49XJ0Ympbbf2Rqi_h8qqm1hel/view?usp=sharing" target="_blank">Lihat</a></h5>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection

@push('addjs')

@endpush
