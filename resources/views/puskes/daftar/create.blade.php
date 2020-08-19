@extends('layouts.admin.default')

@push('addcss')
<!-- Select2 -->
<link rel="stylesheet" href="/admin/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush

@section('content-header')
<div class="content-header">
    <div class="row">
    </div>
</div>
@endsection

@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Daftarkan Pasien Ke Poli</h3>
    </div>
    <!-- form start -->
    <form class="form-horizontal"  method="POST" action="/pendaftaran/add">
    @csrf
      <div class="card-body">
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">NIK/Nama/No. eRm</label>
          <div class="col-sm-8">
                <select name="id" class="form-control select2">
                    @foreach ($data as $item)
                        <option value={{$item->id}}>{{$item->nik}} / {{$item->nama}}</option>   
                    @endforeach
                </select>
          </div>
          <div class="col-sm-2">
              <button type="submit" class="btn btn-info">Search</button>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">.</label>
          <div class="col-sm-8">
              <h5>Belum pernah berobat di puskesmas ini ?  </h5>
              <a href="/pendaftaran/pasien/add" class="btn btn-xs btn-danger"><b>Daftar Kan Pasien !!</b></a>
          </div>
          <div class="col-sm-2">
          </div>
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
      </div>
      <!-- /.card-footer -->
    </form>
</div>

@endsection

@push('addjs')
<!-- Select2 -->
<script src="/admin/plugins/select2/js/select2.full.min.js"></script>

<script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
    })
</script>  
@endpush
