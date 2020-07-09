@extends('layouts.admin.default')

@push('addcss')
<link rel="stylesheet" href="/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" href="/admin/js/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="/admin/plugins/select2/css/select2.min.css">
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
              <h3 class="card-title">Resep Obat Pasien</h3>
              <div class="card-tools">
                <a href="/pengaturan/data_master/obat" class="btn bg-gradient-danger btn-sm"><i class="fas fa-chevron-left"></i> Kembali</a>
              </div>
            </div>
            
                <div class="card-body p-4 table-responsive">
                    <div class="row">       
                        <div class="col-12">                     
                        <div class="card card-success card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Detail Diagnosa</h3>
                        </div>
                        <div class="card-body p-1  table-responsive">
                            <table id="example" class="table table-bordered table-sm" width="100%">
                            <thead>
                            <tr class="bg-gradient-primary" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Tenaga Medis 1</th>
                                <th>Tenaga Medis 2</th>
                                <th>ICD-X</th>
                                <th>Diagnosa</th>
                            </thead>
                            @php
                            $no = 1;
                            @endphp
                            <tbody>
                                @foreach ($data->diagnosa as $key => $item)
                                <tr style="font-size:14px;">
                                    <td>{{$no++}}</td>
                                    <td>{{$item->tanggal}}</td>
                                    <td>{{$item->dokter->nama}}</td>
                                    <td>{{$item->perawat == null ? '-' : $item->perawat->nama}}</td>
                                    <td>{{$item->diagnosa_id}}</td>
                                    <td>{{$item->mdiagnosa->value}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table> 
                            

                            
                        </div>
                        <!-- /.card-body -->
                        </div>
                        </div>
                    </div>
                    <div class="row">       
                        <div class="col-12">                     
                        <div class="card card-success card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Detail Resep Pasien</h3>
                        </div>
                        <div class="card-body p-1  table-responsive">
                            <table id="example" class="table table-bordered table-sm" width="100%">
                            <thead>
                            <tr class="bg-gradient-primary" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                                <th>No</th>
                                <th>Nama Obat</th>
                                <th>Satuan</th>
                                <th>Jumlah</th>
                                <th>Signa</th>
                                <th>Pemakaian</th>
                                <th>Keterangan</th>
                                <th>Stok Di Apotek</th>
                            </thead>
                            @php
                            $no = 1;
                            @endphp
                            <tbody>
                                @foreach ($data->resep->resepdetail as $key => $item)
                                <tr style="font-size:14px;">
                                    <td>{{$no++}}</td>
                                    <td>{{$item->obat->value}}</td>
                                    <td>{{$item->obat->m_obat_unit->value}}</td>
                                    <td>{{$item->obat_jumlah}}</td>
                                    <td>{{$item->obat_signa}}</td>
                                    <td>
                                        @if($item->aturan_pakai == 0)
                                        -
                                        @elseif($item->aturan_pakai == 1)
                                        Sebelum Makan
                                        @elseif($item->aturan_pakai == 2)
                                        Sesudah Makan
                                        @elseif($item->aturan_pakai == 3)
                                        Pemakaian Luar
                                        @elseif($item->aturan_pakai == 4)
                                        Jika Diperlukan
                                        @endif
                                    </td>
                                    <td>{{$item->keterangan}}</td>
                                    <td>{{$item->obat->m_stok_obat->first()->jumlah_stok}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table> 
                            

                            
                        </div>
                        <!-- /.card-body -->
                        </div>
                        </div>
                    </div>
                </div>
    </div>
</div>
@endsection

@push('addjs')
<script src="/admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script src="/admin/plugins/select2/js/select2.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
    
  $('.select2').select2()
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
      autoclose: true,
      format: 'dd/mm/yyyy',
    })
});
</script>
@endpush
