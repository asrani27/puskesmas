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
              <h3 class="card-title">Data Obat Masuk / Penerimaan Obat</h3>
              <div class="card-tools">
                <a href="/pengaturan/data_master/obatmasuk/add" class="btn bg-gradient-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</a>
                <a href="/pengaturan/data_master/" class="btn bg-gradient-danger btn-sm"><i class="fas fa-chevron-left"></i> Kembali</a>
              </div>
            </div>
            
              
            <div class="card-body p-1 table-responsive">
              <table id="example1" class="table table-bordered table-sm ">
                <thead>
                <tr class="bg-gradient-primary" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                  <th>No</th>
                  <th>Tanggal Penerimaan</th>
                  <th>Ruangan</th>
                  <th>Petugas</th>
                  <th>Daftar Obat Diterima</th>
                  <th>#</th>
                </thead><small>
                    @php
                    $no = 1;
                    @endphp
                <tbody>
                  @foreach ($data as $key => $item)
                  <tr>
                    <td><small>{{$no++}}</small></td>
                    <td><small>{{\Carbon\Carbon::parse($item->tanggal)->format('d-m-Y')}}</small></td>
                    <td><small>{{$item->m_ruangan->nama}}</small></td>
                    <td><small>{{$item->petugas->nama}}</small></td>
                    <td><small>
                        <table class="table table-bordered table-sm">
                        @foreach ($item->t_penerimaan_obat_detail as $item2)
                            <tr>
                                <td width="70%">- {{$item2->m_obat->value}}</td>
                                <td width="15%">{{$item2->obat_jumlah}}</td>
                                <td width="15%">{{$item2->m_obat->m_obat_unit->value}}</td>
                            </tr>
                        @endforeach
                        </table>
                    </small></td>
                    
                    <td width="80px">
                      {{-- <a href="/pengaturan/obatmasuk/edit/{{$item->id}}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a> --}}
                      <a href="/pengaturan/obatmasuk/delete/{{$item->id}}" class="btn btn-xs btn-danger" onclick="return confirm('Yakin Menghapus Data Ini?');"><i class="fa fa-trash"></i></a>
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
