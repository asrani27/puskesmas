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
              <h3 class="card-title">Laporan Harian - Kunjungan Pasien</h3>
              {{-- <div class="card-tools">
               <a href="/rekam_medis" class="btn btn-danger btn-xs shadow"> <i class="fas fa-backward"></i> Kembali</a>
             </div> --}}
           </div>
            
            <!-- /.card-header -->
            <div class="card-body p-2 table-responsive">
            <form method="POST" action="/laporankunjunganpasien/search">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="card-body">
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Dari <span class="text-danger"><strong>*</strong></span></small></label>
                        <div class="col-sm-9">
                        <input type="text" id="datepicker" class="form-control form-control-sm"  name="dari" required value="{{\Carbon\Carbon::today()->format('d-m-Y')}}">
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Sampai <span class="text-danger"><strong>*</strong></span></small></label>
                        <div class="col-sm-9">
                            <input type="text" id="datepicker2" class="form-control form-control-sm"  name="sampai" required value="{{\Carbon\Carbon::today()->format('d-m-Y')}}">
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Jenis Laporan</small></label>
                        <div class="col-sm-9"> 
                            <select class="form-control form-control-sm" name="jenis_laporan" required>
                            <option value="semua">Semua</option>
                            <option value="kunjungan">Kunjungan</option>
                            <option value="pasien">Pasien</option>
                        </select>
                        </div>
                    </div> 
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Kunjungan</small></label>
                        <div class="col-sm-9"> 
                            <select class="form-control form-control-sm" name="kunjungan" required>
                            <option value="semua">Semua</option>
                            <option value="sakit">Sakit</option>
                            <option value="sehat">Sehat</option>
                        </select>
                        </div>
                    </div> 
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-body">
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Jenis Kunjungan</small></label>
                        <div class="col-sm-9"> 
                            <select class="form-control form-control-sm" name="jenis_kunjungan" required>
                            <option value="semua">Semua</option>
                            <option value="baru">Baru</option>
                            <option value="lama">Lama</option>
                        </select>
                        </div>
                    </div> 
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Jenis Kelamin</small></label>
                        <div class="col-sm-9"> 
                            <select class="form-control form-control-sm" name="jenis_kelamin" required>
                            <option value="semua">Semua</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        </div>
                    </div> 
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-body">
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Asuransi</small></label>
                        <div class="col-sm-9"> 
                            <select class="form-control form-control-sm" name="asuransi" required>
                            <option value="semua">Semua</option>
                            <option value="0000">Umum</option>
                            <option value="0001">BPJS</option>
                        </select>
                        </div>
                    </div> 
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Wilayah</small></label>
                        <div class="col-sm-9"> 
                            <select class="form-control form-control-sm" name="wilayah" required>
                            <option value="semua">Semua</option>
                            <option value="dalam_kota">Dalam Kota</option>
                            <option value="luar_kota">Luar Kota</option>
                        </select>
                        </div>
                    </div> 
                    </div>
                </div>
                <div class="card-tools">&nbsp;&nbsp;&nbsp;&nbsp;
                <button type='submit' class="btn btn-sm btn-info shadow">Tampilkan</button>
                <a href="/laporankunjunganpasien/export/today"  class="btn btn-sm btn-info shadow disabled">Export</a>
                <a href="/laporankunjunganpasien"  class="btn btn-sm btn-info shadow">Reset</a>
                </div>
            </div>
            </form>
            <hr>
                <center><b>LAPORAN HARIAN - KUNJUNGAN PASIEN</b></center>
                <table style="font-size:13px; font-family:Arial, Helvetica, sans-serif; font-weight:bold">
                    <tr>
                        <td>Puskesmas</td>
                        <td style="padding-right:100px">: Pekauman</td>
                        <td>Kunjungan</td>
                        <td>: Semua</td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>: {{\Carbon\Carbon::today()->format('d-m-Y')}} - {{\Carbon\Carbon::today()->format('d-m-Y')}}</td>
                        <td>Jenis Kunjungan</td>
                        <td>: Semua</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>: Semua</td>
                        <td>Asuransi</td>
                        <td>: Semua</td>
                    </tr>
                    <tr>
                        <td>Wilayah</td>
                        <td>: Semua</td>
                        <td>Total</td>
                        <td>: {{$data->count()}} Pengunjung</td>
                    </tr>
                </table>
                <br />
              <table id="example" class="table table-bordered table-sm">
                <thead>
                <tr class="bg-gradient-primary" style="font-size:12px; font-family:Arial, Helvetica, sans-serif; font-weight:bold">
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Nama Pasien</th>
                  <th>No eRm.</th>
                  <th>NIK</th>
                  <th>No RM Lama</th>
                  <th>No Dok. Rm</th>
                  <th>J. Kelamin</th>
                  <th>Tempat & Tgl Lahir</th>
                  <th>Umur</th>
                  <th>Pekerjaan</th>
                  <th>Alamat</th>
                  <th>Kelurahan</th>
                  <th>Nama Ayah</th>
                  <th>Jenis Kunjungan</th>
                  <th>Kunjungan</th>
                  <th>Poli/Ruangan</th>
                  <th>Asuransi</th>
                  <th>No. Asuransi</th>
                  <th>Diagnosa</th>
                  <th>Jenis Kasus</th>
                </thead>
                <small>
                    @php
                    $no = 1;
                    @endphp
                <tbody>
                    {{dd($data)}}
                  @foreach ($data as $item)
                      <tr style="font-size:12px; font-family:Arial, Helvetica, sans-serif;">
                        <td>{{$no++}}</td>
                        <td>{{\Carbon\Carbon::parse($item->tanggal)->format('d-m-Y')}}</td>
                        <td>{{$item->pendaftaran->pasien->nama}}</td>
                        <td>{{substr($item->pendaftaran->pasien->id, -8)}}</td>
                        <td>{{$item->pendaftaran->pasien->nik}}</td>
                        <td>{{$item->pendaftaran->pasien->no_rm_lama}}</td>
                        <td>{{$item->pendaftaran->pasien->no_dok_rm}}</td>
                        <td>{{$item->pendaftaran->pasien->jenis_kelamin == 'L' ? 'Laki-Laki':'Perempuan'}}</td>
                        <td>{{$item->pendaftaran->pasien->tempat_lahir}}, {{\Carbon\Carbon::parse($item->pendaftaran->pasien->tanggal_lahir)->format('d-m-Y')}}</td>
                        <td>{{hitungUmur($item->pendaftaran->pasien->tanggal_lahir)}}</td>
                        <td>{{$item->pendaftaran->pasien->pekerjaan == null ? '-' : $item->pendaftaran->pasien->pekerjaan->nama}}</td>
                        <td>{{$item->pendaftaran->pasien->alamat}}</td>
                        <td>{{$item->pendaftaran->pasien->kelurahan->nama}}</td>
                        <td>{{$item->pendaftaran->pasien->nama_ayah}}</td>
                        <td>{{$item->pendaftaran->kunjungan}}</td>
                        <td>{{$item->pendaftaran->status}}</td>
                        {{-- <td>{{$item->ruangan->nama}}</td>
                        <td>{{$item->pendaftaran->pasien->asuransi->nama}}</td> --}}
                        <td>{{$item->pendaftaran->pasien->no_asuransi}}</td>
                        <td>
                            @foreach ($item->diagnosa as $diagnosa)
                            <ul>
                                <li>{{$diagnosa->diagnosa_id}} - {{$diagnosa->mdiagnosa->value}}</li>
                            </ul>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($item->diagnosa as $diagnosa)
                            <ul>
                                <li>{{$diagnosa->diagnosa_kasus}}</li>
                            </ul>
                            @endforeach
                        </td>
                      </tr>
                  @endforeach
                <tbody>
                </small> 
              </table>
            </div>
            
            <div class="card-footer">
                {{-- {{ $data->onEachSide(1)->links() }} --}}
            </div>
        </div>
    </div>
</div>
@endsection

@push('addjs')
<script src="/admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="/admin/js/bootstrap-datepicker.min.js"></script>
<script>
  $(function () {
      
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy',
    })
    
    $('#datepicker2').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy',
    })
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
@endpush
