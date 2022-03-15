@extends('layouts.admin.default')

@push('addcss')

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
                <h3 class="card-title">Bridging BPJS</h3>
                <div class="card-tools">
                </div>
            </div>

            <form action="/pengaturan/akun_bpjs" method="POST">
                @csrf
                <div class="card-body p-2 table-responsive">
                    <div class="input-group row">
                        <label class="col-sm-2 col-form-label text-right">Consumer ID<strong><span
                                    class="text-danger">*</span></strong></label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input type="text" class="form-control" name="cons_id" required
                                    value="{{$data == null ? '': $data->cons_id}}">
                            </div>
                        </div>
                    </div>

                    <div class="input-group row">
                        <label class="col-sm-2 col-form-label text-right">Secret Key<strong><span
                                    class="text-danger">*</span></strong></label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input type="text" class="form-control" name="secret_key" required
                                    value="{{$data == null ? '': $data->secret_key}}">
                            </div>
                        </div>
                    </div>

                    <div class="input-group row">
                        <label class="col-sm-2 col-form-label text-right">Username Pcare<strong><span
                                    class="text-danger">*</span></strong></label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input type="text" class="form-control" name="username_pcare" required
                                    value="{{$data == null ? '': $data->username_pcare}}">
                            </div>
                        </div>
                    </div>

                    <div class="input-group row">
                        <label class="col-sm-2 col-form-label text-right">Password Pcare<strong><span
                                    class="text-danger">*</span></strong></label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input type="text" class="form-control" name="password_pcare" required
                                    value="{{$data == null ? '': $data->password_pcare}}">
                            </div>
                        </div>
                    </div>

                    <div class="input-group row">
                        <label class="col-sm-2 col-form-label text-right">Status</label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <span class="badge badge-danger">Not Connected</span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <button type="submit" class="btn btn-block btn-success"><i class="fas fa-save"></i>
                            Update</button>
                        <a href="/pengaturan/akun_bpjs/test_connection" class="btn btn-block btn-warning"><i
                                class="fas fa-recycle"></i>
                            Test Connection</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection

@push('addjs')

@endpush