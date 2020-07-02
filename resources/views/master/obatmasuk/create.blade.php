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
              <h3 class="card-title">Penerimaan Obat / Obat Masuk</h3>
              <div class="card-tools">
                <a href="/pengaturan/data_master/obat" class="btn bg-gradient-danger btn-sm"><i class="fas fa-chevron-left"></i> Kembali</a>
              </div>
            </div>
            
                <div class="card-body p-4 table-responsive">
                    
                    <div class="row">       
                        <div class="col-12">                     
                        <div class="card card-success card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Detail penerimaan Obat</h3>
                        </div>
                        <div class="card-body p-1 table-responsive">
                            
                        
                        
                        <div class="row">
                        <div class="col-6">   
                        <form method="POST" action="{{route('tambahObatMasuk')}}">
                                @csrf   
                                <div class="input-group row">
                                    <label class="col-sm-2 col-form-label text-right">Nama Obat<strong><span class="text-danger">*</span></strong></label>
                                    <div class="col-sm-8">
                                    <div class="form-group">
                                        <select class="form-control form-control select2" style="width: 100%;" name="obat_id" required>
                                        <option value="">-Pilih-</option>
                                        @foreach ($obat as $item)
                                        <option value="{{$item->id}}">{{$item->value}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    </div>
                                </div>
                                <div class="input-group row">
                                    <label class="col-sm-2 col-form-label text-right">Jumlah Obat<strong><span class="text-danger">*</span></strong></label>
                                    <div class="col-sm-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="jumlah_obat" value="1" required>
                                    </div>
                                    </div>
                                </div>
                                <div class="input-group row">
                                    <label class="col-sm-2 col-form-label text-right"><strong><span class="text-danger"></span></strong></label>
                                    <div class="col-sm-8">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-primary"> Tambah </button>
                                        <a href="/pengaturan/obatmasuk/reset" class="btn btn-sm btn-warning"> Reset </a>
                                    </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-6">
                            <table id="example" class="table table-bordered table-sm" width="100%">
                            <thead>
                            <tr class="bg-gradient-primary" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                                <th>No</th>
                                <th>Nama Obat</th>
                                <th>Jumlah Obat</th>
                                <th></th>
                            </thead>
                            @php
                            $no = 1;
                            @endphp
                            <tbody>
                                @foreach ($data as $key => $item)
                                <tr style="font-size:14px;">
                                    <td>{{$no++}}</td>
                                    <td>{{$item->m_obat->value}}</td>
                                    <td>{{$item->jumlah}}</td>
                                    <td>
                                        <a href="/pengaturan/data_master/obatmasuk/delete/{{$item['id']}}" class="btn btn-xs btn-danger"> Delete </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table> 
                        </div>
                        </div>

                            
                        </div>
                        <!-- /.card-body -->
                        </div>
                        </div>
                    </div>

            <form action="{{route('simpanObatmasuk')}}" method="POST">
                @csrf  
                    <div class="input-group row">
                        <label class="col-sm-2 col-form-label text-right">Tanggal Penerimaan<strong><span class="text-danger">*</span></strong></label>
                        <div class="col-sm-8">
                        <div class="form-group">
                            <input type="text" id="datepicker" autocomplete="off" class="form-control" name="tanggal" value="{{old('tanggal') == null ? \Carbon\Carbon::today()->format('d/m/Y') : old('tanggal')}}" required>
                        </div>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-2 col-form-label text-right">Ruangan<strong><span class="text-danger">*</span></strong></label>
                        <div class="col-sm-8">
                        <div class="form-group">
                            <input type="text" class="form-control" name="ruangan_id" value="Apotek" readonly>
                            
                        </div>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-2 col-form-label text-right">Petugas<strong><span class="text-danger">*</span></strong></label>
                        <div class="col-sm-8">
                        <div class="form-group">
                            <select class="form-control form-control select2" style="width: 100%;" name="pegawai_id" required>
                            <option value="">-Pilih-</option>
                            @foreach ($petugas as $item)
                            <option value="{{$item->id}}">{{strtoupper($item->nama)}}</option>
                            @endforeach
                            </select>
                        </div>
                        </div>
                    </div>
                    
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-save"></i> Simpan</a>
                    </div>
                </div>
            </form>

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
