@extends('layouts.admin.default')

@push('addcss')
<link rel="stylesheet" href="/admin/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<style>
  
.select2-selection__rendered {
    line-height: 20px !important;
    font-size:14px;
}
.select2-container .select2-selection--single {
    height: 31px !important;
    padding-bottom: 5px;
}
.select2-selection__arrow {
    height: 25px !important;
    padding-bottom: 5px;
}

.myFont{
  font-size:13px;
}
</style>

@endpush

@section('content-header')
<div class="content-header">
    <div class="row">
    </div>
</div>
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Resep</h3>
              <div class="card-tools">
                <a href="/pelayanan/medis/proses/{{$data->id}}" class="btn bg-gradient-danger btn-sm">Kembali</a>
              </div>
            </div>

            @include('puskes.pelayanan.medis.menu_gigi')

            <div class="row">
                <div class="col-md-3" style="padding-left: 15px; padding-top:15px; padding-right:15px;">
                    <!-- Form Element sizes -->
                    <div class="card card-success card-outline">
                      <div class="card-header">
                        <h3 class="card-title">Data Pasien</h3>
                      </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-sm" style="font-size:15px;">
                                <tbody>
                                  <tr>
                                    <td>ID Pelayanan</td>
                                    <td>{{$data->id}}</td>
                                  </tr>
                                  <tr>
                                    <td>Tanggal</td>
                                    <td>{{$data->tanggal}}</td>                            
                                  </tr>
                                  <tr>
                                    <td>Poli/Ruangan</td>
                                    <td>{{$data->ruangan->nama}}</td>     
                                  </tr>
                                  <tr>
                                    <td>No. eRM</td>
                                    <td>{{$data->pendaftaran->pasien->id}}</td>    
                                  </tr>
                                  <tr>
                                    <td>No RM Lama</td>
                                    <td>{{$data->pendaftaran->pasien->no_rm_lama}}</td>   
                                  </tr>
                                  <tr>
                                    <td>No Dokumen RM</td>
                                    <td>{{$data->pendaftaran->pasien->no_dok_rm}}</td>
                                  </tr>
                                  <tr>
                                    <td>NIK</td>
                                    <td>{{$data->pendaftaran->pasien->nik}}</td>
                                  </tr>
                                  <tr>
                                    <td>Nama KK</td>
                                    <td>-</td>
                                  </tr>
                                  <tr>
                                    <td>Nama</td>
                                    <td>{{$data->pendaftaran->pasien->nama}}</td>
                                  </tr>
                                  <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>{{$data->pendaftaran->pasien->jenis_kelamin}}</td>
                                  </tr>
                                  <tr>
                                    <td>Tempat & Tanggal Lahir</td>
                                    <td>{{$data->pendaftaran->pasien->tempat_lahir}}, {{\Carbon\Carbon::parse($data->pendaftaran->pasien->tanggal_lahir)->format('d M Y')}}</td>
                                  </tr>
                                  <tr>
                                    <td>Alamat</td>
                                    <td>{{$data->pendaftaran->pasien->alamat}}</td>
                                  </tr>
                                  <tr>
                                    <td>Umur</td>
                                    <td>{{hitungUmur($data->pendaftaran->pasien->tanggal_lahir)}}</td>
                                  </tr>
                                  <tr>
                                    <td>Asuransi</td>
                                    <td>{{$data->pendaftaran->pasien->asuransi->nama}}</td>
                                  </tr>
                                </tbody>
                            </table>
                        </div>
                      <div class="card-footer">
                          
                      </div>
                      <!-- /.card-body -->
                    </div>
                    
                    <div class="card card-success card-outline">
                      <div class="card-header">
                        <h3 class="card-title">Detail</h3>
                      </div>
                      <form method="POST" action="{{route('resep', ['id' => $data->id])}}">
                        @csrf
                      <div class="card-body">
                        <div class="input-group row">
                            <label class="col-sm-4 col-form-label text-right"><small>No Resep</small></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control form-control-sm" name="no_resep">
                            </div>
                        </div>
                        <div class="input-group row">
                            <label class="col-sm-4 col-form-label text-right"><small>Ruangan Tujuan</small></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control form-control-sm" name="ruangan_id" value="APOTEK">
                            </div>
                        </div>
                        <div class="input-group row">
                            <label class="col-sm-4 col-form-label text-right"><small>Tng. Medis 1</small><strong><span class="text-danger">*</span></strong></label>
                            <div class="col-sm-8">
                              <div class="form-group">
                                <select class="form-control form-control-sm select2" style="width: 100%;" name="dokter_id" required>
                                  @foreach ($dokter as $item)
                                    @if($data->anamnesa->dokter_id == $item->id)
                                    <option value="{{$item->id}}" selected>{{$item->nama}} / {{$item->nama_tenaga_medis}}</option>
                                    @else
                                    <option value="{{$item->id}}">{{$item->nama}} / {{$item->nama_tenaga_medis}}</option>
                                    @endif
                                  @endforeach
                                </select>
                              </div>
                            </div>
                        </div>
                        <div class="input-group row">
                            <label class="col-sm-4 col-form-label text-right"><small>Tng. Medis 2</small></label>
                            <div class="col-sm-8">
                              <div class="form-group">
                                <select class="form-control form-control-sm select2" style="width: 100%;" name="perawat_id">
                                  @if($data->anamnesa->perawat_id == null)
                                  <option value=""></option>
                                  @foreach ($perawat as $item)
                                    <option value="{{$item->id}}">{{$item->nama}} / {{$item->nama_tenaga_medis}}</option>
                                  @endforeach
                                  @else
                                  @foreach ($perawat as $item)
                                    @if($data->anamnesa->perawat_id == $item->id)
                                    <option value="{{$item->id}}" selected>{{$item->nama}} / {{$item->nama_tenaga_medis}}</option>
                                    @else
                                    <option value="{{$item->id}}">{{$item->nama}} / {{$item->nama_tenaga_medis}}</option>
                                    @endif
                                  @endforeach
                                  @endif
                                </select>
                              </div>
                            </div>
                        </div>
                      </div>
                      <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-md-9" style="padding-left: 15px; padding-top:15px; padding-right:15px;">
                    <div class="card card-success card-outline">
                      <div class="card-header">
                        <h3 class="card-title">Data Resep</h3>
                      </div>
                      <div class="card-body p-1 table-responsive">
                        <table id="example" class="table table-bordered table-sm" width="100%">
                          <thead>
                          <tr class="bg-gradient-primary" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                            <th>Nama Obat</th>
                            <th>Jml</th>
                            <th>Signa</th>
                            <th>Aturan Pakai</th>
                            <th>Keterangan</th>
                            <th></th>
                          </thead>
                          <tbody>
                            @if($data->resep == null)
                            @else
                            @foreach ($data->resep->resepdetail as $item)
                              <tr style="font-size:14px;">
                                <td>{{$item->obat->value}}</td>
                                <td>{{$item->obat_jumlah}}</td>
                                <td>{{$item->obat_signa}}</td>
                                <td>
                                  @if($item->aturan_pakai == null)
                                  @elseif($item->aturan_pakai == 1)
                                  Sebelum Makan
                                  @elseif($item->aturan_pakai == 2)
                                  Sesudah Makan
                                  @elseif($item->aturan_pakai == 3)
                                  Pemakaian Luar
                                  @elseif($item->aturan_pakai == 4)
                                  Jika Di Perlukan
                                  @endif
                                </td>
                                <td>{{$item->keterangan}}</td>
                                <td>
                                  <a href="/pelayanan/medis/proses/{{$data->id}}/umum/resep/{{$item->id}}" class="btn btn-xs btn-danger" onclick="return confirm('Yakin Ingin Menghapus Riwayat Resep?');"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>

                    <div class="card card-success card-outline">
                      <div class="card-header">
                        <h3 class="card-title">Tambah Resep</h3>
                        <div class="card-tools">
                          {{-- <a href="/pelayanan/medis/proses/{{$data->id}}" class="btn bg-gradient-primary btn-xs">Tambah Resep</a> --}}
                        </div>
                      </div>
                      <div class="card-body p-1 table-responsive">
                        <table id="example" class="table table-bordered table-sm">
                          <thead>
                          <tr class="bg-gradient-primary" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                            <th>Racikan</th>
                            <th>Jml<br>Permintaan</th>
                            <th>Nama Obat</th>
                            <th>Jumlah</th>
                            <th>Signa</th>
                            <th>Aturan Pakai</th>
                            <th>Keterangan</th>
                            <th></th>
                          </thead>
                          <tbody>
                              <tr>
                              <td>
                              <select name="racikan" class="form-control form-control-sm">
                                <option value="">-Pilih-</option>
                                <option value="R1">R1</option>
                                <option value="R2">R2</option>
                                <option value="R3">R3</option>
                                <option value="R4">R4</option>
                                <option value="R5">R5</option>
                              </select>
                              </td>    
                              <td><input type="text" class="form-control form-control-sm" name="obat_jumlah_permintaan"></td>
                              <td>
                                <select name="obat_id" class="form-control select2">
                                  @foreach ($obat as $item)
                                    <option value="{{$item->id}}">{{$item->id}} - {{$item->value}}</option>
                                  @endforeach
                                </select>
                              </td>  
                              <td><input type="text" class="form-control form-control-sm" name="obat_jumlah" required></td>
                              <td>
                                
                                <select name="obat_signa" class="form-control select2">
                                  @foreach ($signa as $item)
                                    <option value="{{$item->value}}">{{$item->value}}</option>
                                  @endforeach
                                </select>
                              </td>
                              <td>
                                <select name="aturan_pakai" class="form-control form-control-sm">
                                  <option value="">-Pilih-</option>
                                  <option value="1">Sebelum Makan</option>
                                  <option value="2">Sesudah Makan</option>
                                  <option value="3">Pemakaian Luar</option>
                                  <option value="4">Jika Diperlukan</option>
                                </select>
                              </td>
                              <td><input type="text" class="form-control form-control-sm" name="keterangan"></td>
                              <td>
                                <button type="submit" class="btn btn-sm btn-success shadow"><i class="fas fa-save"></i></button>
                              </td>
                              
                              </tr>
                          </tbody>
                        </table>
                      </div>
                      
                        <div class="card-footer">
                            <div class="text-right">
                                </div>
                        </div>
                    </div>
                    
                    {{-- <div class="card card-success card-outline">
                      <div class="card-header">
                        <h3 class="card-title">ALERGI OBAT</h3>
                      </div>
                      
                      <div class="row">
                          
                      </div>
                    </div> --}}
                </div>
              </form>
            </div>
            <div class="card-footer">
                {{-- <div class="text-right">
                    <a href="/pendaftaran/pasien/edit/" class="btn btn-sm btn-info shadow"><i class="fas fa-print"></i> Cetak Pengantar Rujukan</a>
                    <a href="/pendaftaran/pasien/delete/" class="btn btn-sm btn-info shadow"  onclick="return confirm('Yakin Menghapus Semua Data Tentang Pasien Ini?');"><i class="fas fa-trash"></i> Cetak</a>
                </div> --}}
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
    </div>
</section>
@endsection

@push('addjs')

<script src="/admin/plugins/select2/js/select2.full.min.js"></script>
<script>  
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2({ dropdownCssClass: "myFont" })
  
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    
  });
</script>

@endpush
