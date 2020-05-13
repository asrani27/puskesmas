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
              <h3 class="card-title">Data Rekam Medis Pasien</h3>
           </div>
            
            <!-- /.card-header -->
            <div class="card-body p-2 table-responsive">
                <div class="d-flex">
                  <form method="post" action="/rekam_medis/search">
                    @csrf
                    <div class="p-2" style="padding-bottom: 5px;">
                      <div class="input-group input-group-sm" style="width: 200px;">
                        <input type="text" name="search" class="form-control" placeholder="Pencarian">
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-success"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </div>
                  </form>
                    <div class="p-2" style="padding-bottom: 5px;">
                      <div class="input-group input-group-sm" style="width: 200px;">
                        <input type="text" name="tanggal" class="form-control" placeholder="Tanggal Lahir">
                        <div class="input-group-append">
                          <button type="submit" class="btn bg-purple"><i class="fas fa-calendar"></i></button>
                        </div>
                      </div>
                    </div>
                    <div class="p-2" style="padding-bottom: 5px;">
                          <a href="/pendaftaran/pasien" class="btn btn-sm btn-info"><i class="fas fa-sync-alt"></i> Reset</a>
                    </div>
                </div>
              <table id="example" class="table table-bordered table-sm">
                <thead>
                <tr class="bg-gradient-primary" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                  <th>#</th>
                  <th>ID Pasien</th>
                  <th>No. RM Lama</th>
                  <th>No. Dok RM</th>
                  <th>Nama</th>
                  <th>NIK</th>
                  <th>Jenis Kelamin</th>
                  <th>Tempat & Tgl Lahir</th>
                  <th>Alamat</th>
                  <th></th>
                </thead><small>
                <tbody>
                  @foreach ($data as $key => $item)
                  <tr>
                    <td class="text-center"><small>{{ $key+ $data->firstItem() }}</small></td>
                    <td><small>{{$item->id}}</small></td>
                    <td><small>{{$item->no_rm_lama}}</small></td>
                    <td><small>{{$item->no_dok_rm}}</small></td>
                    <td><small>{{$item->nama}}</small></td>
                    <td><small>{{$item->nik}}</small></td>
                    <td>
                      <small>
                      @if($item->jenis_kelamin == 'L')
                      Laki-Laki
                      @else
                      Perempuan
                      @endif
                      </small>
                    </td>
                    <td><small>{{$item->tempat_lahir}}, {{$item->tanggal_lahir == null ? null : \Carbon\Carbon::parse($item->tanggal_lahir)->format('d-M-Y')}}</small></td>
                  
                    <td><small>{{$item->alamat}}</small></td>
                    <td>
                      <a href="/rekammedis/detail/{{$item->id}}" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
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
@endpush
