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
                ROLE
            </strong>,

            Untuk memanajemen Role user,
        </div>
        
<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Edit Role</h4>
            </div>

            <div class="widget-body">
                <div class="widget-main no-padding">
                    <form  class="form-horizontal" role="form" method="POST" action="/sa/role/update/{{$data->id}}">
                        @csrf
                        <!-- <legend>Form</legend> -->
                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Role </label>

                                <div class="col-sm-9">
                                <input type="text" id="form-field-1-1" name="nama" class="form-control" value="{{$data->name}}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Deskripsi </label>

                                <div class="col-sm-9">
                                    <input type="text" id="form-field-1" name="deskripsi" class="form-control" value="{{$data->description}}"/>
                                </div>
                            </div>
                        </fieldset>

                        <div class="form-actions center">
                            <a href="/sa/role" class="btn btn-sm btn-danger">
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
