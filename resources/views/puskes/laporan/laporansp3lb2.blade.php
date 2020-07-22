@extends('layouts.admin.default')

@push('addcss')
<link rel="stylesheet" href="/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" href="/admin/js/bootstrap-datepicker.min.css">
@endpush

@section('content-header')
<div class="content-header">
    <div class="row">
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Laporan Bulanan SP3 LB2</h3>
              {{-- <div class="card-tools">
               <a href="/rekam_medis" class="btn btn-danger btn-xs shadow"> <i class="fas fa-backward"></i> Kembali</a>
             </div> --}}
           </div>
            
            <!-- /.card-header -->
            <div class="card-body p-2 table-responsive">
            <form method="POST" action="/laporansp3lb1">
            @csrf
            <div class="row">
                @php
                $bulan = \Carbon\Carbon::now()->format('m');
                $tahun = \Carbon\Carbon::now()->format('Y');
                @endphp
                <div class="col-md-3">
                    <div class="card-body">
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Bulan</small></label>
                        <div class="col-sm-9"> 
                            <select class="form-control form-control-sm" name="bulan">
                            <option value="">-Pilih-</option>
                            <option value="01" {{$bulan == '01' ? 'selected' : ''}}>Januari</option>
                            <option value="02" {{$bulan == '02' ? 'selected' : ''}}>Februari</option>
                            <option value="03" {{$bulan == '03' ? 'selected' : ''}}>Maret</option>
                            <option value="04" {{$bulan == '04' ? 'selected' : ''}}>April</option>
                            <option value="05" {{$bulan == '05' ? 'selected' : ''}}>Mei</option>
                            <option value="06" {{$bulan == '06' ? 'selected' : ''}}>Juni</option>
                            <option value="07" {{$bulan == '07' ? 'selected' : ''}}>Juli</option>
                            <option value="08" {{$bulan == '08' ? 'selected' : ''}}>Agustus</option>
                            <option value="09" {{$bulan == '09' ? 'selected' : ''}}>September</option>
                            <option value="10" {{$bulan == '10' ? 'selected' : ''}}>Oktober</option>
                            <option value="11" {{$bulan == '11' ? 'selected' : ''}}>November</option>
                            <option value="12" {{$bulan == '12' ? 'selected' : ''}}>Dasember</option>
                            </select>
                        </div>
                    </div> 
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card-body">
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Tahun</small></label>
                        <div class="col-sm-9"> 
                            <select class="form-control form-control-sm" name="tahun">
                            <option value="">-Pilih-</option>
                            <option value="2020" {{$tahun == '2020' ? 'selected' : ''}}>2020</option>
                            <option value="2019" {{$tahun == '2019' ? 'selected' : ''}}>2019</option>
                            <option value="2018" {{$tahun == '2018' ? 'selected' : ''}}>2019</option>
                            <option value="2017" {{$tahun == '2017' ? 'selected' : ''}}>2017</option>
                            <option value="2016" {{$tahun == '2016' ? 'selected' : ''}}>2016</option>
                            </select>
                        </div>
                    </div> 
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        
                    </div>
                </div>
                <div class="card-tools">&nbsp;&nbsp;&nbsp;&nbsp;
                <button type='submit' class="btn btn-sm btn-info shadow">Tampilkan</button>
                {{-- <a href="/laporansp3lb1/export"  class="btn btn-sm btn-info shadow">Export</a> --}}
                </div>
            </div>
            </form>
            <hr>
                <center><b>LAPORAN BULANAN - SP3 LB2</b></center>
                <table style="font-size:13px; font-family:Arial, Helvetica, sans-serif; font-weight:bold">
                    <tr>
                        <td>Puskesmas</td>
                        <td style="padding-right:100px">: Pekauman</td>
                        <td>Bulan Dan Tahun</td>
                        <td>: {{\Carbon\Carbon::today()->format('m-Y')}}</td>
                    </tr>
                </table>
                <br />
              <table id="example" class="table table-bordered table-sm">
                <thead>
                <tr class="bg-gradient-primary" style="font-size:12px; font-family:Arial, Helvetica, sans-serif; font-weight:bold">
                  <th>No URUT</th>
                  <th>NAMA OBAT</th>
                  <th>SATUAN</th>
                  <th>STOK AWAL</th>
                  <th>PENERIMAAN</th>
                  <th>PERSEDIAAN</th>
                  <th>PEMAKAIAN</th>
                  <th>AKHIR STOK</th>
                  <th>RATA-RATA PEMAKAIAN</th>
                  <th>WAKTU DISTRIBUSI</th>
                  <th>WAKTU TUNGGU</th>
                  <th>BUFFER STOK</th>
                  <th>STOK OPTIMUM</th>
                  <th>PERMINTAAN</th>
                  <th>PEMBERIAN</th>
                  <th>KETERANGAN</th>
                </tr>
                <tr style="font-size:12px; font-family:Arial, Helvetica, sans-serif; font-weight:bold; text-align:center; background-color:silver;">
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>7</th>
                    <th>8</th>
                    <th>9</th>
                    <th>10</th>
                    <th>11</th>
                    <th>12</th>
                    <th>13</th>
                    <th>14</th>
                    <th>15</th>
                    <th>16</th>
                </tr>
                </thead>
                <small>
                    @php
                    $no = 1;
                    @endphp
                <tbody>
                    {{-- @if($mapData == null)
                    @else
                    @foreach ($mapData as $item)
                        <tr style="font-size:12px; font-family:Arial, Helvetica, sans-serif;">
                            <td>{{$no++}}</td>
                            <td>{{$item->diagnosa_id}}</td>
                            <td>{{$item->jenis_penyakit}}</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                    @endforeach
                    @endif --}}
                <tbody>
                </small> 
              </table>
            </div>
            
            <div class="card-footer">
                {{-- {{ $data->onEachSide(1)->links() }} --}}
            </div>
        </div>
    </div>
</div>
@endsection

@push('addjs')
<script src="/admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="/admin/js/bootstrap-datepicker.min.js"></script>
<script>
  $(function () {
      
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy',
    })
    
    $('#datepicker2').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy',
    })
    $("#example1").DataTable({
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
@endpush
