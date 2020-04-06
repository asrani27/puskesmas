@extends('layouts.admin.default')

@push('addcss')
  <link rel="stylesheet" href="/admin/js/bootstrap-datepicker.min.css">
  <!-- Select2 -->
<link rel="stylesheet" href="/admin/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <style>
      .myFont{
        font-size:12px;
        }
  </style>
@endpush

@section('content-header')
<br>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
               <h3 class="card-title">Edit Data Pasien Baru</h3>
               <div class="card-tools">
                <a href="/pendaftaran/pasien" class="btn btn-danger btn-xs shadow">Kembali</a>
              </div>
            </div>
        <form method="POST" action="/pendaftaran/pasien/update/{{$data->id}}">
                @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="card-body">
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Asuransi</small></label>
                        <div class="col-sm-9">
                            <select class="form-control form-control-sm" id="asuransi_id" name="asuransi_id" onchange="changetextbox();" >
                                @foreach ($asuransi as $item)
                                    @if($data->asuransi_id == $item->id)
                                    <option value="{{$item->id}}" selected>{{$item->nama}}</option>
                                    @else
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>No. Asuransi</small></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" id="no_asuransi" name="no_asuransi" readonly value="{{$data->no_asuransi}}">
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>No. KK</small></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" name="no_kk" maxlength="16" value="{{$data->no_kk}}" onkeypress="return hanyaAngka(event)"/>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>NIK</small></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" name="nik" maxlength="16" value="{{$data->nik}}" onkeypress="return hanyaAngka(event)"/>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Nama *</small></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" name="nama" required value="{{$data->nama}}">
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Jenis Kelamin *</small></label>
                        <div class="col-sm-9"> 
                            <select class="form-control form-control-sm" name="jenis_kelamin" required>
                                @if($data->jenis_kelamin == 'L')
                                <option value="L" selected>Laki-Laki</option>
                                <option value="P">Perempuan</option>
                                @else
                                <option value="L">Laki-Laki</option>
                                <option value="P" selected>Perempuan</option>
                                @endif
                        </select>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Tanggal Lahir</small></label>
                        <div class="col-sm-9">
                            <input type="text" id="datepicker" class="form-control form-control-sm"  value="{{\Carbon\Carbon::parse($data->tanggal_lahir)->format('d/m/Y')}}" name="tanggal_lahir">
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Tempat Lahir</small></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" name="tempat_lahir" value="{{$data->tempat_lahir}}">
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>No Dok. RM</small></label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control form-control-sm" name="no_dok_rm" value="{{$data->no_dok_rm}}">
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>No. RM Lama</small></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" name="no_rm_lama" value="{{$data->no_rm_lama}}">
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-body">
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Golongan Darah</small></label>
                        <div class="col-sm-9">
                            <select class="form-control form-control-sm"  name="goldarah_id">
                                <option value="">-Pilih-</option>
                                @foreach ($goldarah as $item)
                                    @if($data->gol_darah == $item->value)
                                    <option value="{{$item->value}}" selected>{{$item->value}}</option>
                                    @else
                                    <option value="{{$item->value}}">{{$item->value}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>E-mail</small></label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control form-control-sm" name="email" value="{{$data->email}}">
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>No. HP</small></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" name="no_hp" maxlength="16"  value="{{$data->no_hp}}" onkeypress="return hanyaAngka(event)"/>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small></small></label>
                        <div class="col-sm-9">
                           <strong> ALAMAT TEMPAT TINGGAL :</strong>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Provinsi</small></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" readonly>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Kota</small></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" readonly>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Kecamatan</small></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" readonly>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Kelurahan</small></label>
                        <div class="col-sm-9">
                            <select id="e2" class="form-control form-control-sm select2" name="kelurahan_id">
                                <option value="">-Pilih-</option>
                                @foreach ($kelurahan as $item)
                                    @if($data->kelurahan_id == $item->id)
                                    <option value="{{$item->id}}" selected>{{$item->nama}}</option>
                                    @else
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Alamat</small></label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control form-control-sm" name="alamat"  value="{{$data->alamat}}" >
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>RT</small></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm"  name="rt"  value="{{$data->rt}}" maxlength="3" onkeypress="return hanyaAngka(event)"/>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>RW</small></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm"  name="rw" maxlength="3"  value="{{$data->rw}}" onkeypress="return hanyaAngka(event)"/>
                        </div>
                    </div>
                    </div>
                </div>              
                <div class="col-md-4">
                    <div class="card-body">
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Pekerjaan</small></label>
                        <div class="col-sm-9">
                            <select class="form-control form-control-sm select2" id="e3" name="pekerjaan_id">
                                <option value="">-Pilih-</option>
                                @foreach ($pekerjaan as $item)
                                    @if($data->pekerjaan_id == $item->id)
                                    <option value="{{$item->id}}" selected>{{$item->nama}}</option>
                                    @else
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Agama</small></label>
                        <div class="col-sm-9">
                            <select class="form-control form-control-sm select2" id="e3" name="agama_id">
                                <option value="">-Pilih-</option>
                                @foreach ($agama as $item)
                                    @if($data->agama == $item->value)
                                    <option value="{{$item->value}}" selected>{{$item->value}}</option>
                                    @else
                                    <option value="{{$item->value}}">{{$item->value}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Pendidikan</small></label>
                        <div class="col-sm-9">
                            <select class="form-control form-control-sm select2" id="e3" name="pendidikan_id">
                                <option value="">-Pilih-</option>
                                @foreach ($pendidikan as $item)
                                    @if($data->pendidikan == $item->value)
                                    <option value="{{$item->value}}" selected>{{$item->value}}</option>
                                    @else
                                    <option value="{{$item->value}}">{{$item->value}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Status Kawin</small></label>
                        <div class="col-sm-9">
                            <select class="form-control form-control-sm select2" id="e3" name="status_kawin_id">
                                <option value="">-Pilih-</option>
                                @foreach ($statuskawin as $item)
                                    @if($data->status_perkawinan == $item->value)
                                    <option value="{{$item->value}}" selected>{{$item->value}}</option>
                                    @else
                                    <option value="{{$item->value}}">{{$item->value}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Status Keluarga</small></label>
                        <div class="col-sm-9">
                            <select class="form-control form-control-sm select2" id="e3" name="status_keluarga_id">
                                <option value="">-Pilih-</option>
                                @foreach ($statuskeluarga as $item)
                                    @if($data->status_keluarga == $item->value)
                                    <option value="{{$item->value}}" selected>{{$item->value}}</option>
                                    @else
                                    <option value="{{$item->value}}">{{$item->value}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Warga Negara</small></label>
                        <div class="col-sm-9">
                            <select class="form-control form-control-sm" name="warganegara">
                                @if($data->warganegara == 'INDONESIA')
                                <option value="INDONESIA" selected>INDONESIA</option>
                                <option value="ASING">ASING</option>
                                @else
                                <option value="INDONESIA" >INDONESIA</option>
                                <option value="ASING" selected>ASING</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Nama Ayah</small></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" name="nama_ayah" value="{{$data->nama_ayah}}">
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Nama Ibu</small></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" name="nama_ibu" value="{{$data->nama_ibu}}">
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-right">
                    <button type="submit" class="btn btn-sm btn-success shadow">Update</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('addjs')

<!-- Select2 -->
<script src="/admin/plugins/select2/js/select2.full.min.js"></script>
<script src="/admin/js/bootstrap-datepicker.min.js"></script>
<script>
$(function() {
    $('.select2').select2()
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy',
    })
    $("#e2").select2({ dropdownCssClass: "myFont" })
    $("#e3").select2({ dropdownCssClass: "myFont" })
});
</script>
<script type="text/javascript">  
    function changetextbox() {
        console.log(document.getElementById("asuransi_id").value);  
        if(document.getElementById("asuransi_id").value == 2)  
        {      
          document.getElementById("no_asuransi").disabled = '';  
        } else {  
          document.getElementById("no_asuransi").value = '';
          document.getElementById("no_asuransi").disabled = 'true'; 
        }  
    }
    
    function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
		    return false;
		  return true;
	} 
</script>  
@endpush
