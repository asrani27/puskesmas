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
                USER
            </strong>,

            Untuk memanajemen User / Pengguna,
        </div>
        
<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Tambah User</h4>
            </div>

            <div class="widget-body">
                <div class="widget-main no-padding">
                    <form  class="form-horizontal" role="form" method="POST" action="/sa/user/add">
                        @csrf
                        <!-- <legend>Form</legend> -->
                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Pengguna </label>

                                <div class="col-sm-9">
                                    <input type="text" name="nama" class="form-control" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Username (Untuk Login) </label>

                                <div class="col-sm-9">
                                    <input type="text" name="username" class="form-control" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Password (Untuk Login) </label>

                                <div class="col-sm-9">
                                    <input type="password"  name="password" class="form-control" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email</label>

                                <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Role </label>

                                <div class="col-sm-9">
                                    <select name="role_id" id="role_id" class="form-control">
                                        @foreach ($role as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Puskesmas </label>

                                <div class="col-sm-9">
                                    <select name="puskes_id" id="puskes_id" class="form-control" disabled>
                                        <option value="">--Pilih--</option>
                                        @foreach ($puskes as $item)
                                            <option value="{{$item->id}}">{{$item->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </fieldset>

                        <div class="form-actions center">
                            <a href="/sa/user" class="btn btn-sm btn-danger">
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
<script type="text/javascript">
    $(document).ready(function() {
        $("#role_id").click(function() {
        var e = document.getElementById("role_id");
        var role_id = e.options[e.selectedIndex].value;
            if(role_id == 1){
                $('#puskes_id').attr('disabled', 'disabled');
            }else{
                $('#puskes_id').removeAttr('disabled');
            }
        });
    });
</script>
@endpush
