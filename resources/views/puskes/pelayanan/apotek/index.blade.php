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
              <h3 class="card-title">Data Pelayanan Resep</h3>
                
            <div class="text-right">
             </div>
            </div>
            
            <!-- /.card-header -->
              <div class="row" style="padding-top:10px;">
                    
                <div class="col-sm-2" style="padding-right:10px; padding-left:10px;">
                  <div class="form-group">
                    <form method="POST" id='formTanggal' action="/pelayanan/apotek">
                      @csrf
                        <div class="input-group input-group-sm">
                        <input type="text" name="tanggal" id="datepicker" class="form-control"  autocomplete="off" value="{{old('tanggal') == null ? \Carbon\Carbon::today()->format('d/m/Y') : old('tanggal')}}">
                          <div class="input-group-append">
                            <button type="submit" class="btn bg-purple"><i class="fas fa-calendar"></i></button>
                          </div>
                        </div>
                    </form>
                  </div>
                </div>

                
                <div class="col-sm-2" style="padding-right:10px; padding-left:10px;">
                  <!-- text input -->
                  <form method="post" action="/pelayanan/apotek/search">
                    @csrf
                    {{-- <div class="form-group">
                      <div class="input-group input-group-sm">
                      <input type="text" name="search" class="form-control" value="{{old('search')}}" placeholder="Pencarian">
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-success"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </div> --}}
                  </form>
                </div>

                <div class="col-sm-2" style="padding-right:10px; padding-left:10px;">
                  <div class="form-group">
                    <a href="/pelayanan/apotek" class="btn btn-sm btn-info"><i class="fas fa-sync-alt"></i> Reset</a>
                  </div>
                </div>

              </div>
            <div class="card-body p-1 table-responsive">
              <table id="example" class="table table-bordered table-sm">
                <thead>
                <tr class="bg-gradient-primary" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                  <th>#</th>
                  <th>No Antrian</th>
                  <th>Tanggal Resep</th>
                  <th>Nama Pasien</th>
                  <th>No. eRM</th>
                  <th>NIK</th>
                  <th>Jenis Kelamin</th>
                  <th>Tempat & Tgl Lahir</th>
                  <th>Umur</th>
                  <th>Ruangan Asal</th>
                  <th>Cara Bayar</th>
                  <th>Tenaga Medis 1</th>
                  <th>Tenaga Medis 2</th>
                  <th>Aksi</th>
                </thead>
                @php
                $no = 1;
                @endphp
                <tbody>
                  @foreach ($data as $key => $item)
                    @if($item->resep == null)
                    @else
                    <tr style="
                    @if($item->resep == null ? null:$item->resep->status_ambil == '0')
                    background-color:#f2dede
                    @elseif($item->resep == null ? null:$item->resep->status_ambil == '1')
                    background-color:#dff0d8
                    @endif
                    ">
                      <td class="text-center"><small>{{ $key+ $data->firstItem() }}</small></td>
                      <td><small>{{$item->resep->antrean}}</small></td>
                      <td><small>{{$item->tanggal}}</small></td>
                      <td><small>{{$item->pendaftaran->pasien->nama}}</small></td>
                      <td><small>{{$item->pendaftaran->pasien_id}}</small></td>
                      <td><small>{{$item->pendaftaran->pasien->nik}}</small></td>
                      <td><small>{{$item->pendaftaran->pasien->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan'}}</small></td>
                      <td><small>{{$item->pendaftaran->pasien->tempat_lahir}}, {{$item->pendaftaran->pasien->tanggal_lahir}}</small></td>
                      <td><small>{{$item->pendaftaran->umur_tahun}} tahun, {{$item->pendaftaran->umur_bulan}} bulan, {{$item->pendaftaran->umur_hari}} hari</small></td>
                      <td><small>{{$item->ruangan->nama}}</small></td>
                      <td><small>{{$item->pendaftaran->asuransi->nama}}</small></td>
                      <td><small>{{$item->resep->dokter->nama}}</small></td>
                      <td><small>{{$item->resep->perawat == null ? '-' : $item->resep->perawat->nama}}</small></td>
                      <td class="text-center">  
                        <a href="/pelayanan/apotek/proses/{{$item->id}}" class="btn btn-xs btn-success"><i class="fas fa-medkit"></i></a>
                      </td>
                    </tr>
                    @endif
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="row">
              <div class="col-sm-4 text-center">
                <button class="btn btn-danger"></button> Obat Belum Di ambil<br>
              </div>
              <div class="col-sm-4 text-center">
                <button class="btn btn-default"></button>  Obat Tidak Di ambil<br>
              </div>
              <div class="col-sm-4 text-center">
                <button class="btn btn-success"></button> Obat Sudah Di Ambil<br>
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
<script src="/admin/js/bootstrap-datepicker.min.js"></script>
<script>
$(document).ready(function(){
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy',
    }).on('changeDate', function() {
        $('#formTanggal').submit();
    });
});
</script>
@endpush
