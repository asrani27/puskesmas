@extends('layouts.admin.default')

@push('addcss')
<script src="/admin/plugins/chart.js/Chart.min.js"></script>
@endpush

@section('content-header')
<div class="content-header">
    <div class="row">
        <div class="col-lg-12">
            {{-- <a href="#" class="btn btn-sm btn-primary">Dashboard Utama</a>
            <a href="#" class="btn btn-sm btn-success">Dashboard Antrian</a>
            <a href="#" class="btn btn-sm btn-info">Dashboard SIP</a> --}}
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4 col-sm-6 col-12">
      <div class="info-box bg-gradient-success">
        <span class="info-box-icon"><i class="far fa-user"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Pasien Data Lengkap</span>
          <span class="info-box-number">41/410 &nbsp;&nbsp;</span>

          <div class="progress">
            <div class="progress-bar" style="width: 70%"></div>
          </div>
          <span class="progress-description">
            70% Data pasien terverifikasi lengkap
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    
    <div class="col-md-4 col-sm-6 col-12">
      <div class="info-box bg-gradient-info">
        <span class="info-box-icon"><i class="fas fa-stethoscope"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Pasien Sudah Dilayani</span>
          <span class="info-box-number">11/110</span>

          <div class="progress">
            <div class="progress-bar" style="width: 70%"></div>
          </div>
          <span class="progress-description">
            70% Pasien dilayani di semua pelayanan
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    
    <div class="col-md-4 col-sm-6 col-12">
      <div class="info-box bg-gradient-danger">
        <span class="info-box-icon"><i class="fas fa-book-medical"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Resep Obat Di Berikan</span>
          <span class="info-box-number">1/10</span>

          <div class="progress">
            <div class="progress-bar" style="width: 70%"></div>
          </div>
          <span class="progress-description">
            70% Resep Sudah Di Proses Apotek
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>

    <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box bg-gradient-olive">
          <span class="info-box-icon"><i class="fas fa-money-bill-wave"></i></span>
  
          <div class="info-box-content">
            <span class="info-box-text">Pasien Sudah Membayar</span>
            <span class="info-box-number">41/410</span>
  
            <div class="progress">
              <div class="progress-bar" style="width: 70%"></div>
            </div>
            <span class="progress-description">
              70% Pasien Umum Yang Membayar
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      
      <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box bg-gradient-purple">
          <span class="info-box-icon"><i class="fas fa-user-injured"></i></span>
  
          <div class="info-box-content">
            <span class="info-box-text">Pasien BPJS Yang Di Layani</span>
            <span class="info-box-number">41/410</span>
  
            <div class="progress">
              <div class="progress-bar" style="width: 70%"></div>
            </div>
            <span class="progress-description">
              70% Pasien BPJS Sudah Di Layani
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      
      <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box bg-gradient-primary">
          <span class="info-box-icon"><i class="fab fa-connectdevelop"></i></span>
  
          <div class="info-box-content">
            <span class="info-box-text">Pasien BPJS Sudah Bridging</span>
            <span class="info-box-number">41/410</span>
  
            <div class="progress">
              <div class="progress-bar" style="width: 70%"></div>
            </div>
            <span class="progress-description">
              70% Pasien BPJS Sudah Bridging ke Pcare
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
</div>
<div class="row">
    <div class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Pasien Poli / Ruangan Bulan {{\Carbon\Carbon::today()->format('M Y')}}</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart"></canvas>
                </div>
              </div>
            </div>
            <div id="namaPoli" data-info="{{$ruangan}}" data-jumlah="{{$jml}}">
            </div>
    </div>
</div>
@endsection

@push('addjs')
<script src="/admin/plugins/chart.js/Chart.min.js"></script>
<script>
var myDiv = document.querySelector('#namaPoli');
var ruangan = JSON.parse(myDiv.dataset.info);
var jumlah = JSON.parse(myDiv.dataset.jumlah);

var popCanvas = document.getElementById("barChart");
var barChart = new Chart(popCanvas, {
  type: 'bar',
  data: {
    labels: ruangan,
    datasets: [{
      label: 'Pasien',
      data: jumlah,
      backgroundColor: [
        'rgba(255, 99, 132, 0.6)',
        'rgba(54, 162, 235, 0.6)',
        'rgba(255, 206, 86, 0.6)',
        'rgba(75, 192, 192, 0.6)',
        'rgba(153, 102, 255, 0.6)',
        'rgba(255, 159, 64, 0.6)',
        'rgba(255, 99, 132, 0.6)',
        'rgba(54, 162, 235, 0.6)',
        'rgba(255, 206, 86, 0.6)',
        'rgba(75, 192, 192, 0.6)',
        'rgba(75, 192, 192, 0.6)',
        'rgba(153, 102, 255, 0.6)',
        'rgba(255, 159, 64, 0.6)',
        'rgba(255, 99, 132, 0.6)',
        'rgba(54, 162, 235, 0.6)',
        'rgba(255, 206, 86, 0.6)',
        'rgba(75, 192, 192, 0.6)',
        'rgba(153, 102, 255, 0.6)'
      ]
    }]
  }
});
</script>
@endpush
