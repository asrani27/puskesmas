@extends('layouts.admin.default')

@push('addcss')
<link rel="stylesheet" href="/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
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
              <h3 class="card-title">Data Sinkronisasi Dari DB Lama</h3>
        
            </div>
            
            <!-- /.card-header -->
            <div class="card-body p-0 table-responsive">
              <table id="example" class="table table-bordered table-sm">
                <thead>
                <tr class="bg-gradient-primary" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                  <th>#</th>
                  <th>Label</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </thead>
                @php
                $no = 1;
                @endphp
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$item->nama}}</td>
                        <td>
                            @if($item->status == 0)
                            <span class="text-danger"><i class="fa fa-times" aria-hidden="true"></i></span>
                            @else
                            <span class="text-success"><i class="fa fa-check" aria-hidden="true"></i></span>
                            @endif
                        </td>
                        <td>
                            <a href="/sinkrondb/lihat/{{$item->id}}" class="btn btn-sm bg-gradient-primary" id="btn-lihat">Lihat Data</a> | 
                            <a href="/sinkrondb/truncate/{{$item->id}}" class="btn btn-sm bg-gradient-danger" id="btn-truncate">Truncate</a> | 
                            <a href="/sinkrondb/sinkron/{{$item->id}}" class="btn btn-sm bg-gradient-success sinkron-loader" id="btn-sinkron">Sinkron</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
              </table>
            </div>
            <div class="card-footer text-center">
                <div id="loader">
                <span class="text-primary loader"><i class="fas fa-1x fa-sync-alt fa-spin"></i></span> Sedang Sinkronisasi, Harap Tunggu.....
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addjs')
<script src="/admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
 
$(document).ready(function(){
    $("#loader").fadeOut();
    $(".sinkron-loader").on("click", function(){
        document.getElementById("btn-lihat").disabled = true;
        document.getElementById("btn-sinkron").disabled = true;
        document.getElementById("btn-truncate").disabled = true;
        $("#loader").fadeIn();
  });
});   
  $(function () {
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
