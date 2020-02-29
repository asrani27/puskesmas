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
              <h3 class="card-title">Data Ruangan</h3>
              <a href="/sinkrondb" class="btn btn-danger btn-sm float-right shadow"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a> &nbsp;
            </div>
            
            <!-- /.card-header -->
            <div class="card-body p-0 table-responsive">
              <table id="example" class="table table-bordered table-sm">
                <thead>
                <tr class="bg-gradient-primary" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                  <th>ID</th>
                  <th>Instalasi ID</th>
                  <th>Nama Ruangan</th>
                </thead><small>
                <tbody>
                  @foreach ($data as $key => $item)
                  <tr>
                    {{-- <td class="text-center"><small>{{ $key+ $data->firstItem() }}</small></td> --}}
                    <td><small>{{$item->id}}</small></td>
                    <td><small>{{$item->instalasi_id}} - {{$item->instalasi->nama}}</small></td>
                    <td><small>{{$item->nama}}</small></td>
                  </tr>
                  @endforeach
                <tbody></small> 
              </table>
            </div>
            <div class="card-footer">
                {{ $data->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('addjs')
<script src="/admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
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
