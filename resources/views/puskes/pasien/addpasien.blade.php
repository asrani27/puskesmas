@extends('layouts.default')

@push('addcss')
<link rel="stylesheet" href="/assets/assets/css/chosen.min.css" />
@endpush

@section('content')
<h3 class="header smaller lighter blue">
    Buat Data Pasien Baru
</h3>
<form class="form-horizontal" role="form" action="/pendaftaran/pasien/add" method="POST">
    @csrf
<div class="row">
    <div class="col-xs-12 col-sm-4">
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right">Asuransi <span class="red"><strong>*</strong></span></label>
            <div class="col-sm-9">
                <select class="form-controll" name="asuransi_id">
                    @foreach ($asuransi as $item)
                    <option value="{{$item->id}}" {{ old('asuransi_id') == $item->id ? 'selected' : '' }}>{{$item->nama}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right">No Asuransi</label>
            <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="no_asuransi" value="{{ old('no_asuransi') }}">
                <span class="red"><strong>{{($errors->has('no_asuransi')) ? $errors->first('no_asuransi') : ''}}</strong></span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right">NIK</label>
            <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="nik" value="{{ old('nik') }}">
                <span class="red"><strong>{{($errors->has('nik')) ? $errors->first('nik') : ''}}</strong></span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right">Nama Pasien <span class="red"><strong>*</strong></span></label>
            <div class="col-sm-9">
                <input type="text" class="form-control input-sm" name="nama" value="{{ old('nama') }}">
                <span class="red"><strong>{{($errors->has('nama')) ? $errors->first('nama') : ''}}</strong></span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right">Jenis Kelamin <span class="red"><strong>*</strong></span></label>
            <div class="col-sm-9">
                <select class="form-controll" name='jkel'>
                    <option value="L" {{ old('jkel') == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                    <option value="P" {{ old('jkel') == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right">Tempat Lahir</label>
            <div class="col-sm-9">
                <input type="text" class="form-control input-sm" value="{{ old('tempat_lahir') }}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right">Tanggal Lahir</label>
            <div class="col-sm-9">
                <input type="text" class="form-control input-sm">
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-4">
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right">Gol. Darah</label>
            <div class="col-sm-9">
                <input type="text" class="form-control input-sm">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right">Pendidikan</label>
            <div class="col-sm-9">
                <input type="text" class="form-control input-sm">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right">Status Kawin</label>
            <div class="col-sm-9">
                <select class="form-controll">
                    <option value="T">Belum Kawin</option>
                    <option value="Y">Kawin</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right">Status Keluarga</label>
            <div class="col-sm-9">
                <input type="text" class="form-control input-sm">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right">Warga Negara</label>
            <div class="col-sm-9">
                <input type="text" class="form-control input-sm" value="INDONESIA">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right">Nama Ayah</label>
            <div class="col-sm-9">
                <input type="text" class="form-control input-sm">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right">Nama Ibu</label>
            <div class="col-sm-9">
                <input type="text" class="form-control input-sm">
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-4">
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right">Alamat</label>
            <div class="col-sm-9">
                <input type="text" class="form-control input-sm">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right">No Hp</label>
            <div class="col-sm-9">
                <input type="text" class="form-control input-sm">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right">RT</label>
            <div class="col-sm-9">
                <input type="text" class="form-control input-sm">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right">RW</label>
            <div class="col-sm-9">
                <input type="text" class="form-control input-sm">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right">Kelurahan</label>
            <div class="col-sm-9">
                <select name="kelurahan_id" class="chosen-select form-control">
                    @foreach ($kelurahan as $item)
                        <option value="{{$item->id}}" {{ old('kelurahan_id
                        ') == $item->id ? 'selected' : '' }}>{{$item->nama}}</option>
                    @endforeach
                </select> 
            </div>
        </div>
    </div>
    
</div>
<div class="form-actions center">
    <a href="/pendaftaran/pasien" class="btn btn-sm btn-danger">
        <i class="ace-icon fa fa-arrow-left icon-on-left bigger-110"></i>
        Kembali
    </a>
    <button type="submit" class="btn btn-sm btn-primary">
        Simpan
        <i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
    </button>
</div>
</form>
@endsection

@push('addjs')

<script src="/assets/assets/js/chosen.jquery.min.js"></script>
@endpush
