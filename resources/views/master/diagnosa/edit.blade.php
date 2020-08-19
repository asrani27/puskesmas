@extends('layouts.admin.default')

@push('addcss')
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
              <h3 class="card-title">Edit Data Diagnosa</h3>
              <div class="card-tools">
                <a href="/pengaturan/dm/diagnosa" class="btn bg-gradient-danger btn-sm"><i class="fas fa-chevron-left"></i> Kembali</a>
              </div>
            </div>
            
            <form action="/pengaturan/dm/diagnosa/{{$data->id}}/edit" method="POST">
                @csrf  
                @method('patch')
                <div class="card-body p-2 table-responsive">
                    <div class="input-group row">
                        <label class="col-sm-2 col-form-label text-right">Kode Diagnosa<strong><span class="text-danger">*</span></strong></label>
                        <div class="col-sm-8">
                        <div class="form-group">
                            <input type="text" class="form-control" name="id" required value="{{$data->id}}">
                        </div>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-2 col-form-label text-right">Nama Diagnosa<strong><span class="text-danger">*</span></strong></label>
                        <div class="col-sm-8">
                        <div class="form-group">
                            <input type="text" class="form-control" name="value" required value="{{$data->value}}">
                        </div>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-2 col-form-label text-right">Induk<strong><span class="text-danger">*</span></strong></label>
                        <div class="col-sm-8">
                        <div class="form-group">
                            <select class="form-control form-control  select2" style="width: 100%;" name="induk_id" required>
                            <option value="">-Pilih-</option>
                            @foreach ($diagnosaInduk as $item)
                                @if($data->induk_id == $item->id)
                                    <option value="{{$item->id}}" selected>{{$item->id}} - {{$item->value}}</option>
                                @else
                                    <option value="{{$item->id}}">{{$item->id}} - {{$item->value}}</option>
                                @endif
                            @endforeach
                            </select>
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
<script src="/admin/plugins/select2/js/select2.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
  $('.select2').select2()
</script>
@endpush
