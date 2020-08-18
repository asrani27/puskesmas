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
              <h3 class="card-title">Edit Obat</h3>
              <div class="card-tools">
                <a href="/pengaturan/dm/obat" class="btn bg-gradient-danger btn-sm"><i class="fas fa-chevron-left"></i> Kembali</a>
              </div>
            </div>
            
            <form action="/pengaturan/dm/obat/{{$data->id}}/edit" method="post">
                @csrf  
                @method('patch')
                
                <div class="card-body p-2 table-responsive">
                    <div class="input-group row">
                        <label class="col-sm-2 col-form-label text-right">Nama Obat<strong><span class="text-danger">*</span></strong></label>
                        <div class="col-sm-8">
                        <div class="form-group">
                            <input type="text" class="form-control" name="value" value="{{$data->value}}" required>
                        </div>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-2 col-form-label text-right">Obat Title<strong><span class="text-danger">*</span></strong></label>
                        <div class="col-sm-8">
                        <div class="form-group">
                            <select class="form-control form-control  select2" style="width: 100%;" name="obat_title" required>
                            <option value="">-Pilih-</option>
                            @foreach ($title as $item)
                                @if($data->obat_title == $item->id)
                                <option value="{{$item->id}}" selected>{{$item->value}}</option>
                                @else
                                <option value="{{$item->id}}">{{$item->value}}</option>
                                @endif
                            @endforeach
                            </select>
                        </div>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-2 col-form-label text-right">Obat Unit<strong><span class="text-danger">*</span></strong></label>
                        <div class="col-sm-8">
                        <div class="form-group">
                            <select class="form-control form-control select2" style="width: 100%;" name="obat_unit" required>
                            <option value="">-Pilih-</option>
                            @foreach ($unit as $item)
                                @if($data->obat_unit == $item->id)
                                <option value="{{$item->id}}" selected>{{$item->value}}</option>
                                @else
                                <option value="{{$item->id}}">{{$item->value}}</option>
                                @endif
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
      autoclose: true
    })
});
</script>
@endpush
