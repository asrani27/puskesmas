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
              <h3 class="card-title">Data Pasien</h3>
              <a href="/pendaftaran/pasien/add" class="btn btn-primary btn-xs float-right shadow"><i class="fas fa-plus"></i> Tambah Pasien</a> &nbsp;
            </div>
            
            <!-- /.card-header -->
              <div class="row" style="padding-top:10px;">
                <div class="col-sm-2" style="padding-right:10px; padding-left:10px;">
                  <!-- text input -->
                  <form method="post" action="/pendaftaran/pasien/search">
                    @csrf
                    <div class="form-group">
                      <div class="input-group input-group-sm">
                        <input type="text" name="search" class="form-control" placeholder="Pencarian">
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-success"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                
                <div class="col-sm-2" style="padding-right:10px; padding-left:10px;">
                  <form method="post" action="/pendaftaran/pasien/search/tgl_lahir">
                    @csrf
                  <div class="form-group">
                    <div class="input-group input-group-sm">
                      <input type="text" name="tanggal" id="datepicker" class="form-control"  autocomplete="off" placeholder="Tanggal Lahir">
                      <div class="input-group-append">
                        <button type="submit" class="btn bg-purple"><i class="fas fa-calendar"></i></button>
                      </div>
                    </div>
                  </div>
                  </form>
                </div>
                
                <div class="col-sm-2" style="padding-right:10px; padding-left:10px;">
                  <div class="form-group">
                    <a href="/pendaftaran/pasien" class="btn btn-sm btn-info"><i class="fas fa-sync-alt"></i> Reset</a>
                  </div>
                </div>
              </div>
              
            <div class="card-body p-0 table-responsive">
              <table id="example" class="table table-bordered table-sm ">
                <thead>
                <tr class="bg-gradient-primary" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                  <th>#</th>
                  <th>eRM</th>
                  <th>No. RM Lama</th>
                  <th>No. Dok RM</th>
                  <th>Nama</th>
                  <th>NIK</th>
                  <th>No Asuransi</th>
                  <th>Jenis Kelamin</th>
                  <th>Tempat & Tgl Lahir</th>
                  <th>Kelurahan</th>
                </thead><small>
                <tbody>
                  @foreach ($data as $key => $item)
                  <tr>
                      <td>
                        <a href="/pendaftaran/pasien/view/{{$item->id}}" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
                        <a href="/pendaftaran/pasien/delete/{{$item->id}}" class="btn btn-xs btn-danger" onclick="return confirm('Yakin Menghapus Semua Data Tentang Pasien Ini?');"><i class="fa fa-trash"></i></a>
                      </td>
                    {{-- <td class="text-center"><small>{{ $key+ $data->firstItem() }}</small></td> --}}
                    <td><small>{{$item->id}}</small></td>
                    <td><small>{{$item->no_rm_lama}}</small></td>
                    <td><small>{{$item->no_dok_rm}}</small></td>
                    <td><small>{{$item->nama}}</small></td>
                    <td><small>{{$item->nik}}</small></td>
                    <td><small>{{$item->no_asuransi}}</small></td>
                    <td>
                      <small>
                      @if($item->jkel == 'L')
                      Laki-Laki
                      @else
                      Perempuan
                      @endif
                      </small>
                    </td>
                    <td><small>{{$item->tempat_lahir}}, {{$item->tgl_lahir == null ? null : \Carbon\Carbon::parse($item->tgl_lahir)->format('d-M-Y')}}</small></td>
                    <td>
                      <small>@if($item->kelurahan == null)
                        @else
                        {{$item->kelurahan->nama}}
                        @endif
                      </small>
                    </td>
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
<script src="/admin/js/bootstrap-datepicker.min.js"></script>
<script>
$(function() {
    $('#datepicker').datepicker({
      autoclose: true
    })
});
</script>
@endpush
