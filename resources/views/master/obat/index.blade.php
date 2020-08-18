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
              <h3 class="card-title">Data Obat</h3>
              <div class="card-tools">
                @if(count($errors) > 0)
                <font color="red">Hanya Bisa Upload File Excel </font><br>
                @endif
                
                @if ($message = Session::get('info'))
                {{$message}}
                @endif
                <a href="#" class="btn bg-gradient-warning btn-sm" data-toggle="modal" data-target="#modal-import"><i class="fas fa-file-excel"></i> Import Data</a>
                <a href="{{asset('/formatexcel/ObatFormat.xlsx')}}" class="btn bg-gradient-success btn-sm"><i class="fas fa-file-excel"></i> Download Format</a>
                <a href="/pengaturan/dm/obat/add" class="btn bg-gradient-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</a>
                <a href="/pengaturan/data_master/stokobat" class="btn bg-gradient-info btn-sm"><i class="fas fa-cube"></i> Ke Stok Obat</a>
                <a href="/pengaturan/data_master/" class="btn bg-gradient-danger btn-sm"><i class="fas fa-chevron-left"></i> Kembali</a>
              </div>
            </div>
            
              
            <div class="card-body p-1 table-responsive">
              <table id="example1" class="table table-bordered table-sm ">
                <thead>
                <tr class="bg-gradient-primary" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                  <th>No</th>
                  <th>Nama Obat</th>
                  <th>Obat Title</th>
                  <th>Obat Unit</th>
                  <th>#</th>
                </thead><small>
                    @php
                    $no = 1;
                    @endphp
                <tbody>
                  @foreach ($data as $key => $item)
                  <tr>
                    <td><small>{{$no++}}</small></td>
                    <td><small>{{$item->value}}</small></td>
                    <td><small>{{$item->m_obat_title == null ? '' : $item->m_obat_title->value}}</small></td>
                    <td><small>{{$item->m_obat_unit == null ? '' : $item->m_obat_unit->value}}</small></td>
                    <td width="80px">
                      <a href="/pengaturan/dm/obat/{{$item->id}}/edit/" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                      <a href="/pengaturan/dm/obat/{{$item->id}}/delete" class="btn btn-xs btn-danger" onclick="return confirm('Yakin Menghapus Data Ini?');"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                  @endforeach
                <tbody></small> 
              </table>
            </div>
            {{-- <div class="card-footer">
                {{ $data->onEachSide(1)->links() }}
            </div> --}}
        </div>
    </div>
</div>
<div class="modal fade" id="modal-import" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="/pengaturan/dm/obat/import" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h4 class="modal-title">Upload Data Obat Excel</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="file" name="file">
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Upload</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
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
<script src="/admin/js/bootstrap-datepicker.min.js"></script>
<script>
$(function() {
    $('#datepicker').datepicker({
      autoclose: true
    })
});
</script>
@endpush
