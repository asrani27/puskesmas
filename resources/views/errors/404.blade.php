@extends('layouts.default')

@push('addcss')

@endpush

@section('content')
<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <div class="alert alert-block alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                <i class="ace-icon fa fa-info"></i>
            </button>

            <i class="ace-icon fa fa-info red"></i>

            MODUL TIDAK DITEMUKAN
        </div>
        <a href="/home" class="btn btn-primary">Kembali Ke Home</a>
        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div>
@endsection

@push('addjs')
@endpush
