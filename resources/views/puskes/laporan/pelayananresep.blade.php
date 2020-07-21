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
              <h3 class="card-title">Laporan Harian - Pelayanan Resep</h3>
              {{-- <div class="card-tools">
               <a href="/rekam_medis" class="btn btn-danger btn-xs shadow"> <i class="fas fa-backward"></i> Kembali</a>
             </div> --}}
           </div>
            
            <!-- /.card-header -->
            <div class="card-body p-2 table-responsive">
            <form method="POST" action="/laporanpelayananresep">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="card-body">
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Dari <span class="text-danger"><strong>*</strong></span></small></label>
                        <div class="col-sm-9">
                        <input type="text" id="datepicker" class="form-control form-control-sm"  name="dari" required value="{{\Carbon\Carbon::parse(old('dari'))->format('d-m-Y')}}">
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Sampai <span class="text-danger"><strong>*</strong></span></small></label>
                        <div class="col-sm-9">
                            <input type="text" id="datepicker2" class="form-control form-control-sm"  name="sampai" required value="{{\Carbon\Carbon::parse(old('sampai'))->format('d-m-Y')}}">
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-body">
                    <div class="input-group row">
                        <label class="col-sm-5 col-form-label text-right">PUSKESMAS : {{strtoupper(Auth::user()->puskesmas->nama)}}</label>
                        <div class="col-sm-7"> 
                        </div>
                    </div> 
                    
                    
                    </div>
                </div>
                <div class="col-md-4">
                    
                </div>
                <div class="card-tools">&nbsp;&nbsp;&nbsp;&nbsp;
                <button type='submit' class="btn btn-sm btn-info shadow">Tampilkan</button>
                
                <a href="/laporanpelayananresep"  class="btn btn-sm btn-info shadow">Reset</a>
                </div>
            </div>
            </form>
            <hr>
                <center><b>LAPORAN HARIAN - PELAYANAN RESEP</b></center>
                <br />
              <table id="example" class="table table-bordered table-sm">
                <thead>
                <tr class="bg-gradient-primary" style="font-size:12px; font-family:'Arial Narrow';">
                  <th>No</th>
                  <th>Nama Obat</th>
                  <th>Jumlah Obat</th>
                </thead>
                <small>
                    @php
                    $no = 1;
                    @endphp
                <tbody>
                  @foreach ($data as $item)
                      <tr style="font-size:12px; font-family:Arial, Helvetica, sans-serif;">
                        <td>{{$no++}}</td>
                        <td>{{$item->value}}</td>
                        <td>{{$item->resep}}</td>
                       
                      </tr>
                  @endforeach
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
