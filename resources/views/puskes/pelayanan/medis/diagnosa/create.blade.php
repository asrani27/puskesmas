@extends('layouts.admin.default')

@push('addcss')
<link rel="stylesheet" href="/admin/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<style>
.select2-selection__rendered {
    line-height: 17px !important;
    font-size:12px;
}
.select2-container .select2-selection--single {
    height: 25px !important;
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
              <h3 class="card-title">Buat Baru Diagnosa</h3>
              <div class="card-tools">
                <a href="/pelayanan/medis/proses/{{$data->id}}" class="btn bg-gradient-danger btn-sm">Kembali</a>
              </div>
            </div>

            @include('puskes.pelayanan.medis.menu_utama')
        
            <div class="row">
              
            @include('puskes.pelayanan.medis.sidebar_medis')
                {{-- <div class="col-md-4" style="padding-left: 15px; padding-top:15px; padding-right:15px;">
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
                        <h3 class="card-title">Riwayat</h3>
                      </div>
                      <div class="card-body">
                          
                      </div>
                      <!-- /.card-body -->
                    </div>
                </div> --}}
                <div class="col-md-8" style="padding-left: 15px; padding-top:15px; padding-right:15px;">
                    <div class="card card-success card-outline">
                      <div class="card-header">
                        <h3 class="card-title">Riwayat Penyakit</h3>
                      </div>
                      <div class="card-body p-1 table-responsive">
                        <table id="example" class="table table-bordered table-sm" width="100%">
                          <thead>
                          <tr class="bg-gradient-primary" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                            <th>Tanggal</th>
                            <th>Dokter /Tenaga Medis</th>
                            <th>Perawat / Bidan</th>
                            <th>ICD-X / Diagnosa</th>
                            <th>Jenis</th>
                            <th>Kasus</th>
                            <th></th>
                          </thead>
                          <tbody>
                            @foreach ($data->diagnosa as $item)
                              <tr style="font-size:13px;">
                                <td>{{$item->tanggal}}</td>
                                <td>{{strtoupper($item->dokter->nama)}}</td>
                                <td>{{strtoupper($item->perawat->nama)}}</td>
                                <td>{{strtoupper($item->diagnosa_id)}} / {{strtoupper($item->mdiagnosa->value)}}</td>
                                <td>{{$item->diagnosa_jenis}}</td>
                                <td>{{$item->diagnosa_kasus}}</td>
                                <td>
                                  <a href="/pelayanan/medis/proses/{{$data->id}}/diagnosa/delete/{{$item->id}}" class="btn btn-xs btn-danger" onclick="return confirm('Yakin Ingin Menghapus Riwayat Diagnosa?');"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    
                    <div class="card card-success card-outline">
                      <div class="card-header">
                        <h3 class="card-title">DIAGNOSA</h3>
                        <div class="card-tools">
                        </div>
                      </div>
                      <div class="card-body p-1 table-responsive">
                        <table id="example" class="table table-bordered table-sm" width="100%">
                          <thead>
                          <tr class="bg-gradient-primary" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                            <th>Dokter /Tenaga Medis</th>
                            <th>Perawat / Bidan</th>
                            <th>ICD-X / Diagnosa</th>
                            <th>Jenis</th>
                            <th>Kasus</th>
                            <th>Aksi</th>
                          </thead>
                          <form method="POST" action="{{route('diagnosa2', ['id' => $data->id])}}">
                            @csrf
                          <tbody>
                              <tr>
                                  <td>
                                    @if($data->anamnesa == null)
                                    <select name="dokter_id" class="form-control form-control-sm select2">
                                      @foreach ($dokter as $item)
                                      <option value="{{$item->id}}">{{strtoupper($item->nama)}}</option>
                                      @endforeach
                                    </select>
                                    @else
                                    <select name="dokter_id" class="form-control form-control-sm select2">
                                      @foreach ($dokter as $item)
                                        @if($item->id == $data->anamnesa->dokter_id)
                                        <option value="{{$item->id}}" selected>{{strtoupper($item->nama)}}</option>
                                        @else
                                        <option value="{{$item->id}}">{{strtoupper($item->nama)}}</option>
                                        @endif
                                      @endforeach
                                    </select>
                                    @endif
                                  </td>
                                  <td>
                                    @if($data->anamnesa == null)
                                    <select name="perawat_id" class="form-control form-control-sm select2">
                                      @foreach ($perawat as $item)
                                      <option value="{{$item->id}}">{{strtoupper($item->nama)}}</option>
                                      @endforeach
                                    </select>
                                    @else
                                    <select name="perawat_id" class="form-control form-control-sm select2">
                                      @foreach ($perawat as $item)
                                        @if($item->id == $data->anamnesa->perawat_id)
                                        <option value="{{$item->id}}" selected>{{strtoupper($item->nama)}}</option>
                                        @else
                                        <option value="{{$item->id}}">{{strtoupper($item->nama)}}</option>
                                        @endif
                                      @endforeach
                                    </select>
                                    @endif
                                  </td>
                                  {{-- <td>
                                    <select name="perawat_id" class="form-control form-control-sm select2">
                                      @foreach ($perawat as $item)
                                      <option value="{{$item->id}}">{{strtoupper($item->nama)}}</option>
                                      @endforeach
                                    </select>
                                  </td> --}}
                                  <td>
                                    <select id="selDiagnosa" name="diagnosa_id" class="form-control select2" style="width: 250px">
                                      {{-- @foreach ($diagnosa as $item)
                                      <option value="{{$item->id}}">{{strtoupper($item->id)}} / {{strtoupper($item->value)}}</option>
                                      @endforeach --}}
                                    </select>
                                  </td>
                                  <td>
                                    <select name="diagnosa_jenis" class="form-control select2">
                                      <option value="PRIMER">PRIMER</option>
                                      <option value="SEKUNDER">SEKUNDER</option>
                                      <option value="KOMPLIKASI">KOMPLIKASI</option>
                                    </select>
                                  </td>
                                  <td>
                                    <select name="diagnosa_kasus" class="form-control form-control-sm select2">
                                      <option value="BARU">BARU</option>
                                      <option value="LAMA">LAMA</option>
                                    </select>
                                  </td>
                                  <td>
                                      <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-save"></i></button>
                                  </td>
                              </tr>
                          </tbody>
                          </form>
                        </table>
                      </div>
                    </div>
                </div>
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
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
$(document).ready(function(){
     $('.select2').select2({ dropdownCssClass: "myFont" })
     $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
      
     $("#selDiagnosa").select2({
        placeholder: 'Cari..',
        ajax: { 
        url: '/pendaftaran/pasien/getDiagnosa',
        type: "post",
        dataType: 'json',
        delay: 250,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: function (params) {
            return {
            searchTerm: params.term // search term
            };
        },
        processResults: function (response) {
            var data_array = [];
                    response.forEach(function(value,key){
            		data_array.push({id:value.id,text:value.id+'/'+value.value})
            });
            return {
                results: data_array
            };
        },
        cache: true
        }
    });
});
</script>
{{-- <script>  
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2({ dropdownCssClass: "myFont" })
  
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    
  });
</script> --}}

@include('puskes.pelayanan.medis.sidebar_riwayat')

@endpush
