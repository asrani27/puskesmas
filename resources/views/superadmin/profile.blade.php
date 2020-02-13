@extends('layouts.default')

@push('addcss')

@endpush

@section('content')
<div class="page-header">
    <a href="/home" class="btn-sm btn-danger"><i class="ace-icon fa fa-angle-double-left"></i>Kembali</a>
</div>
<div class="row">
    <div class="col-xs-12">
        <div id="user-profile-2" class="user-profile">
            <div class="tabbable">
                <ul class="nav nav-tabs padding-18">
                    <li class="active">
                        <a data-toggle="tab" href="#home">
                            <i class="green ace-icon fa fa-user bigger-120"></i>
                            Profile
                        </a>
                    </li>
                </ul>

                <div class="tab-content no-border padding-24">
                    <div id="home" class="tab-pane in active">
                        <div class="row">
                            <div class="col-xs-12 col-sm-3 center">
                                <span class="profile-picture">
                                    @if(Auth::user()->foto == null)
                                    <img class="editable img-responsive" alt="Alex's Avatar" id="avatar2" src="/assets/assets/images/avatars/profile-pic.jpg" />
                                    @else
                                    <img class="editable img-responsive" id="avatar2" src="/storage/profile/{{Auth::user()->foto}}" width="120" height="160"/>
                                    @endif
                                </span>

                                <div class="space space-4"></div>

                                <a href="#modal-table" data-toggle="modal" class="btn btn-sm btn-block btn-primary">
                                    <i class="ace-icon fa fa-photo bigger-110"></i>
                                    <span class="bigger-110">Ganti Foto</span>
                                </a>
                                <a href="#" class="btn btn-sm btn-block btn-success ganti-pass">
                                    <i class="ace-icon fa fa-pencil bigger-120"></i>
                                    <span class="bigger-110">Ganti Password</span>
                                </a>
                            </div><!-- /.col -->

                            <div class="col-xs-12 col-sm-9">
                                <h4 class="blue">
                                    <span class="middle">{{Auth::user()->name}}</span>

                                    <span class="label label-purple arrowed-in-right">
                                        <i class="ace-icon fa fa-circle smaller-80 align-middle"></i>
                                        online
                                    </span>
                                </h4>

                                <div class="profile-user-info">
                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Username </div>

                                        <div class="profile-info-value">
                                            <span>{{Auth::user()->username}}</span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Email </div>

                                        <div class="profile-info-value">
                                            <span>{{Auth::user()->email}}</span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Puskesmas </div>

                                        <div class="profile-info-value">
                                            <span>
                                                {{count(Auth::user()->puskes) == 0 ? '-' : Auth::user()->puskes->first()->nama}}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="hr hr-8 dotted"></div>
                            </div><!-- /.col -->
                        </div><!-- /.row -->

                        <div class="space-20"></div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="widget-box transparent">
                                    <div class="widget-header widget-header-small">
                                        <h4 class="widget-title smaller">
                                            <i class="ace-icon fa fa-check-square-o bigger-110"></i>
                                            Tentang Saya
                                        </h4>
                                    </div>

                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <p>
                                                Bla Bla Bla Bla
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                              
                            </div>
                        </div>
                    </div><!-- /#home -->

                </div>
            </div>
        </div>    
    </div>
</div>
<div id="modal-table" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="white">&times;</span>
                    </button>
                    Ganti Foto
                </div>
            </div>

            <div class="modal-body no-padding">
                <div class="widget-main no-padding">
                <form class="form-horizontal" role="form" method="POST" action="/profile/foto" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Upload Foto </label>

                            <div class="col-sm-9">
                                <input type="file" name="file" class="form-control" required/>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="modal-footer no-margin-top">
                <button type="submit" class="btn btn-sm btn-success pull-right">
                    <i class="ace-icon fa fa-check"></i>
                    Simpan
                </button>
                <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
                    <i class="ace-icon fa fa-times"></i>
                    Close
                </button>
            </div>
        </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div id="modal-table2" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="white">&times;</span>
                    </button>
                    Ganti Password
                </div>
            </div>

            <div class="modal-body no-padding">
                <div class="widget-main no-padding">
                <form class="form-horizontal" role="form" method="POST" action="/profile/password">
                    @csrf
                    <fieldset>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Password Baru </label>

                            <div class="col-sm-9">
                                <input type="text" name="password" class="form-control" required/>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="modal-footer no-margin-top">
                <button type="submit" class="btn btn-sm btn-success pull-right">
                    <i class="ace-icon fa fa-check"></i>
                    Simpan
                </button>
                <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
                    <i class="ace-icon fa fa-times"></i>
                    Close
                </button>
            </div>
        </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
@endsection

@push('addjs')
<script>
$(document).ready(function() {
    $('.ganti-pass').click(function(){
    $('#modal-table2').modal('show'); 
    });
});
</script>
@endpush
