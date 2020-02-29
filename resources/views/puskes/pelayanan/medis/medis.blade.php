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
              <h3 class="card-title">Data Pelayanan Medis</h3>
                
            <div class="text-right">
             </div>
            </div>
            
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="d-flex">
                    <div class="p-2" style="padding-bottom: 5px;">
                      <div class="input-group input-group-sm" style="width: 200px;">
                        <select class="form-control form-control-sm">
                            <option>- Pilih Poli -</option>
                        </select>
                      </div>
                    </div>
                    
                    <form action="/pendaftaran/search" method="POST">
                      @csrf
                    <div class="p-2" style="padding-bottom: 5px;">
                        <div class="input-group input-group-sm" style="width: 200px;">
                          <input type="text" name="search" class="form-control" placeholder="Pencarian">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-success"><i class="fas fa-calendar"></i></button>
                          </div>
                        </div>
                    </div>
                    </form>
                    <div class="p-2" style="padding-bottom: 5px;">
                      <div class="input-group input-group-sm" style="width: 200px;">
                        <select class="form-control form-control-sm">
                            <option>SEMUA</option>
                            <option>Belum Diperiksa</option>
                            <option>Sedang Diperiksa</option>
                            <option>Sudah Diperiksa</option>
                        </select>
                      </div>
                    </div>
                    <form action="/pendaftaran/search" method="POST">
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
                          <a href="/pendaftaran" class="btn btn-sm btn-info"><i class="fas fa-sync-alt"></i> Reset</a>
                    </div>
                </div>
              <table id="example" class="table table-bordered table-sm table-responsive">
                <thead>
                <tr class="bg-gradient-primary" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                  <th>#</th>
                  <th>Tanggal</th>
                  <th>ID Pasien</th>
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
