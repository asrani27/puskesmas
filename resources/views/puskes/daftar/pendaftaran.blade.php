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
              <h3 class="card-title">Data Pendaftaran Hari Ini ({{\Carbon\Carbon::today()->format('d M Y')}})</h3>
                
            <div class="text-right">
                {{-- <a href="/pendaftaran/pasien/add" class="btn btn-danger btn-xs float-right shadow"><i class="fas fa-docs"></i> Reset</a> &nbsp;
              <a href="/pendaftaran/pasien/add" class="btn btn-info btn-xs float-right shadow"><i class="fas fa-print"></i> Print</a> &nbsp;
              <a href="/pendaftaran/pasien/add" class="btn btn-primary btn-xs float-right shadow"><i class="fas fa-plus"></i> Tambah</a> &nbsp; --}}
            </div>
            </div>
            
            <!-- /.card-header -->
            {{-- <div class="card-body p-0"> --}}
              <div class="row" style="padding-top:5px;">
                {{-- <div class="col-sm-2" style="padding-right:10px; padding-left:10px;">
                  <!-- text input -->
                  <div class="form-group">
                    <select class="form-control form-control-sm">
                        <option>- Asuransi -</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-2" style="padding-right:10px; padding-left:10px;">
                  <!-- text input -->
                  <div class="form-group">
                    <select class="form-control form-control-sm">
                        <option>- Asal Pendaftaran -</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-2" style="padding-right:10px; padding-left:10px;">
                  <!-- text input -->
                  <div class="form-group">
                    <select class="form-control form-control-sm">
                        <option>- Semua Ruangan -</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-2" style="padding-right:10px; padding-left:10px;">
                  <!-- text input -->
                  <div class="form-group">
                    <select class="form-control form-control-sm">
                        <option>- Semua Pemeriksaan -</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-2" style="padding-right:10px; padding-left:10px;">
                  <!-- text input -->
                  <div class="form-group">
                    <select class="form-control form-control-sm">
                        <option>- Semua Pelayanan -</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-2" style="padding-right:10px; padding-left:10px;">
                  <!-- text input -->
                  <form method="post" action="/pendaftaran/search">
                    @csrf
                  <div class="form-group">
                    <div class="input-group input-group-sm">
                      <input type="text" name="search" class="form-control" value="{{ old('search') }}" placeholder="Pencarian">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-success"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                  </form>
                </div> --}}
                <div class="col-sm-12 text-right" style="padding-right:20px; padding-left:20px; padding-bottom:10px;">
                  
                  <a href="/pendaftaran/add" class="btn btn-sm btn-success">Tambah Pendaftaran</a>
                      
                </div>
              </div>
                {{-- <div class="d-flex">
                    <div class="p-2" style="padding-bottom: 5px;">
                          <a href="/pendaftaran" class="btn btn-sm btn-info"><i class="fas fa-sync-alt"></i> Reset</a>
                    </div>
                </div> --}}
            <div class="card-body p-1 table-responsive">
              <table id="example" class="table table-bordered table-sm">
                <thead>
                <tr class="bg-gradient-primary" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                  <th>#</th>
                  <th>Tanggal</th>
                  <th>eRM</th>
                  <th>No. Dok RM</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Penyakit Khusus</th>
                  <th>Tempat & Tgl Lahir</th>
                  <th>Umur</th>
                  <th>Kelurahan</th>
                  <th>Asuransi</th>
                  <th>Kunjungan</th>
                  <th>Status Pelayanan</th>
                  <th>Status PRB</th>
                  <th>Status Prolanis</th>
                  <th>Cetak</th>
                </thead>
                <tbody>
                  @foreach ($data as $key => $item)
                <tr style="
                  @if($item->status_periksa == 0)
                  background-color:#fff
                  @elseif($item->status_periksa == 1)
                  background-color:#f2dede
                  @elseif($item->status_periksa == 2)
                  background-color: #dff0d8
                  @endif
                ">
                      <td></td>
                    <td><small>{{$item->tanggal}}</small></td>
                    <td><small>{{$item->pasien_id}}</small></td>
                    <td><small>{{$item->pasien == null ? '-': $item->pasien->no_dok_rm}}</small></td>
                    <td><small>{{$item->pasien == null ? '-': $item->pasien->nik}}</small></td>
                    <td><small>{{$item->pasien->nama}}</small></td>
                    <td><small>-</small></td>
                    <td><small>{{$item->pasien == null ? '': $item->pasien->tempat_lahir}}, {{$item->pasien == null ? null : \Carbon\Carbon::parse($item->pasien->tanggal_lahir)->format('d-M-Y')}}</small></td>
                    <td><small>{{$item->umur_tahun}} Thn,{{$item->umur_bulan}} Bln, {{$item->umur_hari}} Hari</small></td>
                    <td><small>{{$item->pasien->kelurahan == null ? '-' : $item->pasien->kelurahan->nama}}</small></td>
                    <td><small>{{$item->asuransi == null ? '-' : $item->asuransi->nama}}</small></td>
                    <td><small>{{$item->kunjungan}}</small></td>
                    <td>
                      <small>{{$item->pelayanan->statuspulang == null ? 'Pendaftaran' : $item->pelayanan->statuspulang->nama}}</small>
                    </td>
                    <td><small>{{$item->status_prb == 0 ? 'Tidak' : 'Ya'}}</small></td>
                    <td><small>{{$item->status_prolanis == 0 ? 'Tidak' : 'Ya'}}</small></td>
                    <td>
                        {{-- <a href="" class="btn btn-info btn-sm">Cetak</a> --}}
                    </td>
                  </tr>
                  @endforeach
                <tbody>
              </table>
            </div>
            <div class="row">
              <div class="col-sm-4 text-center">
                <button class="btn btn-default"></button> Belum Diperiksa<br>
              </div>
              <div class="col-sm-4 text-center">
                <button class="btn btn-danger"></button> Sedang Diperiksa<br>
              </div>
              <div class="col-sm-4 text-center">
                <button class="btn btn-success"></button> Selesai Diperiksa<br>
              </div>
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
