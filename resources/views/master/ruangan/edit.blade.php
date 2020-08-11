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
              <h3 class="card-title">Edit Data Poli / Ruangan</h3>
              <div class="card-tools">
                <a href="/pengaturan/data_master/poli" class="btn bg-gradient-danger btn-sm"><i class="fas fa-chevron-left"></i> Kembali</a>
              </div>
            </div>
            
            <form action="{{route('editPoli', ['id' => $data->id])}}" method="POST">
                @csrf  
                <div class="card-body p-2 table-responsive">
                    <div class="input-group row">
                        <label class="col-sm-2 col-form-label text-right">Instalasi<strong><span class="text-danger">*</span></strong></label>
                        <div class="col-sm-8">
                        <div class="form-group">
                            <select class="form-control form-control" style="width: 100%;" name="instalasi_id" required>
                            <option value="">-Pilih-</option>
                            @foreach ($int as $item)
                                @if($data->instalasi_id == $item->id)
                                <option value="{{$item->id}}" selected>{{$item->nama}}</option>
                                @else
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endif
                            @endforeach
                            </select>
                        </div>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-2 col-form-label text-right">Nama Poli / Ruangan<strong><span class="text-danger">*</span></strong></label>
                        <div class="col-sm-8">
                        <div class="form-group">
                            <input type="text" class="form-control" name="nama" required value="{{$data->nama}}">
                        </div>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-2 col-form-label text-right">Is Aktif ?<strong><span class="text-danger">*</span></strong></label>
                        <div class="col-sm-8">
                        <div class="form-group">
                            <select class="form-control form-control" style="width: 100%;" name="is_aktif" required>
                                @if($data->is_aktif == 'Y')
                                <option value="Y" selected>Ya</option>
                                <option value="T">Tidak</option>
                                @else
                                <option value="Y">Ya</option>
                                <option value="T" selected>Tidak</option>
                                @endif
                            </select>
                        </div>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-2 col-form-label text-right">Menu Yg Di Akses<strong><span class="text-danger">*</span></strong></label>
                        <div class="col-sm-8">
                        <div class="form-group">
                            <input type="checkbox" name="menu[]" value="anamnesa" {{$menuAkses->contains('anamnesa') == true ? 'checked' : ''}}> Anamnesa <br>
                            <input type="checkbox" name="menu[]" value="diagnosa" {{$menuAkses->contains('diagnosa') == true ? 'checked' : ''}}> Diagnosa <br>
                            <input type="checkbox" name="menu[]" value="resep"  {{$menuAkses->contains('resep') == true ? 'checked' : ''}}> Resep <br>
                            <input type="checkbox" name="menu[]" value="laboratorium"  {{$menuAkses->contains('laboratorium') == true ? 'checked' : ''}}> Laboratorium <br>
                            <input type="checkbox" name="menu[]" value="tindakan"  {{$menuAkses->contains('tindakan') == true ? 'checked' : ''}}> Tindakan <br>
                            <input type="checkbox" name="menu[]" value="mtbs" {{$menuAkses->contains('mtbs') == true ? 'checked' : ''}}> mtbs <br>
                            <input type="checkbox" name="menu[]" value="imunisasi" {{$menuAkses->contains('imunisasi') == true ? 'checked' : ''}}> imunisasi <br>
                            <input type="checkbox" name="menu[]" value="odontogram" {{$menuAkses->contains('odontogram') == true ? 'checked' : ''}}> odontogram <br>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-save"></i> Update</a>
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
