@extends('layouts.admin.default')

@push('addcss')
<script src="/admin/plugins/chart.js/Chart.min.js"></script>
@endpush

@section('content-header')
<div class="content-header">
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Tarik Gambar</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                  <ul>
                      @foreach ($data as $item)
                  <li> <a href="https://kotabanjarmasin.epuskesmas.id/odontogram/edit/2726?code={{$item->kode}}&tipe=empat" target="_
                    blank">{{$item->id}} - {{$item->kode}}</a></li>
                      @endforeach
                  </ul>
              </div>
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
console.log([jumlah, ruangan]);
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
<script>
var speedCanvas = document.getElementById("speedChart");

Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 18;

var speedData = {
  labels: ["0s", "10s", "20s", "30s", "40s", "50s", "60s"],
  datasets: [{
    label: "Car Speed (mph)",
    data: [0, 59, 75, 20, 20, 55, 40],
  }]
};

var chartOptions = {
  legend: {
    display: true,
    position: 'top',
    labels: {
      boxWidth: 80,
      fontColor: 'black'
    }
  }
};

var lineChart = new Chart(speedCanvas, {
  type: 'line',
  data: speedData,
  options: chartOptions
});
</script>
@endpush
