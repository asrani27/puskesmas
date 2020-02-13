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
              <h3 class="card-title">Data Pasien</h3>
              <button type="button" class="btn btn-primary btn-xs float-right shadow"><i class="fas fa-plus"></i> Tambah Pasien</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-sm">
                <thead>
                <tr class="bg-gradient-primary">
                  <th></th>
                  <th>No</th>
                  <th>No. eRM</th>
                  <th>No. RM Lama</th>
                  <th>No. Dok RM</th>
                  <th>Nama</th>
                  <th>NIK</th>
                  <th>No Asuransi</th>
                  <th>Jenis Kelamin</th>
                  <th>Tempat & Tgl Lahir</th>
                  <th>Kelurahan</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td class="text-center"><i class="fas fa-eye"></i></td>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td>Win 95+</td>
                  <td> 4</td>
                  <td>X</td>
                  <td>Win 95+</td>
                  <td> 4</td>
                  <td>X</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
                <tr>
                    <td>View</td>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td>Win 95+</td>
                  <td> 4</td>
                  <td>X</td>
                  <td>Win 95+</td>
                  <td> 4</td>
                  <td>X</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
                <tbody>
              </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection

@push('addjs')
<script src="/admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
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
