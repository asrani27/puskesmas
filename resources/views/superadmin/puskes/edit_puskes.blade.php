@extends('layouts.default')

@push('addcss')

@endpush

@section('content')
<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <div class="alert alert-block alert-info">
            <button type="button" class="close" data-dismiss="alert">
                <i class="ace-icon fa fa-times"></i>
            </button>

            <i class="ace-icon fa fa-exclamation-circle blue bigger-160"></i>
            Menu
            <strong class="green">
                PUSKESMAS
            </strong>,

            Untuk memanajemen data Master Puskesmas,
        </div>
        
<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Edit Puskesmas</h4>
            </div>

            <div class="widget-body">
                <div class="widget-main no-padding">
                    <form  class="form-horizontal" role="form" method="POST" action="/sa/puskes/update/{{$data->id}}">
                        @csrf
                        <!-- <legend>Form</legend> -->
                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Puskesmas </label>

                                <div class="col-sm-9">
                                <input type="text" id="form-field-1-1" name="nama" class="form-control" value="{{$data->nama}}" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Alamat Puskesmas </label>

                                <div class="col-sm-9">
                                    <input type="text" id="form-field-1-1" name="alamat" class="form-control" value="{{$data->alamat}}" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Telp Puskesmas </label>

                                <div class="col-sm-9">
                                    <input type="text" id="form-field-1-1" name="telp" class="form-control" value="{{$data->telp}}" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kecamatan </label>

                                <div class="col-sm-9">
                                    <input type="text" id="form-field-1-1" name="kecamatan" class="form-control" value="{{$data->kecamatan}}" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kelurahan </label>

                                <div class="col-sm-9">
                                    <input type="text" id="form-field-1-1" name="kelurahan" class="form-control" value="{{$data->kelurahan}}" required/>
                                </div>
                            </div>
                        </fieldset>

                        <div class="form-actions center">
                            <a href="/sa/puskes" class="btn btn-sm btn-danger">
                                <i class="ace-icon fa fa-arrow-left icon-on-left bigger-110"></i>
                                Kembali
                            </a>
                            <button type="submit" class="btn btn-sm btn-primary">
                                Submit
                                <i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    </div><!-- /.col -->
</div>
@endsection

@push('addjs')

@endpush
