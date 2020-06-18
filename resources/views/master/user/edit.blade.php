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
              <h3 class="card-title">Edit Data Jenis Pegawai</h3>
              <div class="card-tools">
                <a href="/pengaturan/data_master/jenispegawai" class="btn bg-gradient-danger btn-sm"><i class="fas fa-chevron-left"></i> Kembali</a>
              </div>
            </div>
            
            <form action="{{route('editJenisPegawai', ['id' => $data->id])}}" method="POST">
                @csrf  
                <div class="card-body p-2 table-responsive">
                    <div class="input-group row">
                        <label class="col-sm-2 col-form-label text-right">Nama<strong><span class="text-danger">*</span></strong></label>
                        <div class="col-sm-8">
                        <div class="form-group">
                        <input type="text" class="form-control" name="nama" required value="{{$data->nama}}">
                        </div>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-2 col-form-label text-right">Kelompok<strong><span class="text-danger">*</span></strong></label>
                        <div class="col-sm-8">
                        <div class="form-group">
                            <select class="form-control form-control" style="width: 100%;" name="kelompok_pegawai" required>
                            <option value="TENAGA MEDIS" {{$data->kelompok_pegawai == 'TENAGA MEDIS' ? 'selected':''}}>TENAGA MEDIS</option>
                            <option value="TENAGA KEPERAWATAN" {{$data->kelompok_pegawai == 'TENAGA KEPERAWATAN' ? 'selected':''}}>TENAGA KEPERAWATAN</option>
                            <option value="TENAGA KETEKNISIAN MEDIS" {{$data->kelompok_pegawai == 'TENAGA KETEKNISIAN MEDIS' ? 'selected':''}}>TENAGA KETEKNISIAN MEDIS</option>
                            <option value="TENAGA KEFARMASIAN" {{$data->kelompok_pegawai == 'TENAGA KEFARMASIAN' ? 'selected':''}}>TENAGA KEFARMASIAN</option>
                            <option value="NON MEDIS" {{$data->kelompok_pegawai == 'NON MEDIS' ? 'selected':''}}>NON MEDIS</option>
                            <option value="TENAGA KESEHATAN MASYARAKAT" {{$data->kelompok_pegawai == 'TENAGA KESEHATAN MASYARAKAT' ? 'selected':''}}>TENAGA KESEHATAN MASYARAKAT</option>
                            <option value="TENAGA GIZI" {{$data->kelompok_pegawai == 'TENAGA GIZI' ? 'selected':''}}>TENAGA GIZI</option>
                            <option value="TENAGA KETERAMPILAN FISIK" {{$data->kelompok_pegawai == 'TENAGA KETERAMPILAN FISIK' ? 'selected':''}}>TENAGA KETERAMPILAN FISIK</option>
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
