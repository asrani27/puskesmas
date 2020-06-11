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
              <h3 class="card-title">Data Poli / Ruangan</h3>
              <div class="card-tools">
                <a href="/pengaturan/data_master/poli/add" class="btn bg-gradient-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</a>
                <a href="/pengaturan/data_master/" class="btn bg-gradient-danger btn-sm"><i class="fas fa-chevron-left"></i> Kembali</a>
              </div>
            </div>
            
              
            <div class="card-body p-1 table-responsive">
              <table id="example1" class="table table-bordered table-sm ">
                <thead>
                <tr class="bg-gradient-primary" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                  <th>No</th>
                  <th>ID</th>
                  <th>Nama Instalasi</th>
                  <th>Nama Poli</th>
                  <th>Jenis Poli</th>
                  <th>Is Aktif?</th>
                  <th>#</th>
                </thead><small>
                    @php
                    $no = 1;
                    @endphp
                <tbody>
                  @foreach ($data as $key => $item)
                  <tr>
                    <td><small>{{$no++}}</small></td>
                    <td><small>{{$item->id}}</small></td>
                    <td><small>{{$item->instalasi->nama}}</small></td>
                    <td><small>{{$item->nama}}</small></td>
                    <td><small>{{$item->poli_sakit == 1 ? 'Sakit' : 'Sehat'}}</small></td>
                    <td><small>{{$item->is_aktif == 'Y' ? 'Ya' : 'Tidak'}}</small></td>
                    <td width="80px">
                      <a href="/pengaturan/poli/edit/{{$item->id}}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                      <a href="/pengaturan/poli/delete/{{$item->id}}" class="btn btn-xs btn-danger" onclick="return confirm('Yakin Menghapus Semua Data Tentang Pasien Ini?');"><i class="fa fa-trash"></i></a>
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
