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
               <h3 class="card-title">Buat Data Pasien Baru</h3>
               <div class="card-tools">
                <a href="/pendaftaran/pasien" class="btn btn-danger btn-xs shadow"> <i class="fas fa-backward"></i> Kembali</a>
              </div>
            </div>
            <form method="POST" action="/pendaftaran/pasien/add">
                @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="card-body">
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Asuransi</small></label>
                        <div class="col-sm-9">
                            <select class="form-control form-control-sm" id="asuransi_id" name="asuransi_id" onchange="changetextbox();" >
                                @foreach ($asuransi as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>No. Asuransi</small></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" id="no_asuransi" maxlength="16"  name="no_asuransi" disabled>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>No. KK</small></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" name="no_kk" maxlength="16" onkeypress="return hanyaAngka(event)"/>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>NIK</small></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" name="nik" maxlength="16" onkeypress="return hanyaAngka(event)"/>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Nama *</small></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" name="nama" required>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Jenis Kelamin *</small></label>
                        <div class="col-sm-9"> 
                            <select class="form-control form-control-sm" name="jkel" required>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Tanggal Lahir <span class="text-danger"><strong>*</strong></span></small></label>
                        <div class="col-sm-9">
                            <input type="text" id="datepicker" class="form-control form-control-sm"  name="tgl_lahir" required>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Tempat Lahir</small></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" name="tempat_lahir">
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>No Dok. RM</small></label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control form-control-sm" name="no_dok_rm">
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>No. RM Lama</small></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" name="no_rm_lama">
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
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>E-mail</small></label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control form-control-sm" name="email">
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>No. HP</small></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" name="no_hp" maxlength="16" onkeypress="return hanyaAngka(event)"/>
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
                            <input type="text"  id="provinsi" class="form-control form-control-sm" readonly>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Kota</small></label>
                        <div class="col-sm-9">
                            <input type="text"  id="kota" class="form-control form-control-sm" readonly>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Kecamatan</small></label>
                        <div class="col-sm-9">
                            <input type="text" id="kecamatan" class="form-control form-control-sm" readonly>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Kelurahan</small></label>
                        <div class="col-sm-9">
                            <select id="e2" class="form-control form-control-sm select2 pilih-kelurahan" name="kelurahan_id">
                                <option value="0">-Pilih-</option>
                                @foreach ($kelurahan as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Alamat</small></label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control form-control-sm" name="alamat">
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>RT</small></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm"  name="rt" maxlength="3" onkeypress="return hanyaAngka(event)"/>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>RW</small></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm"  name="rw" maxlength="3" onkeypress="return hanyaAngka(event)"/>
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
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
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
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
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
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
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
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Status Keluarga</small></label>
                        <div class="col-sm-9">
                            <select class="form-control form-control-sm select2" id="e3" name="status_keluarga_id">
                                <option value="0">-Pilih-</option>
                                @foreach ($statuskeluarga as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Warga Negara</small></label>
                        <div class="col-sm-9">
                            <select class="form-control form-control-sm" name="warganegara">
                                <option value="">-Pilih-</option>
                                <option value="INDONESIA">INDONESIA</option>
                                <option value="ASING">ASING</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Nama Ayah</small></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" name="nama_ayah">
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Nama Ibu</small></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" name="nama_ibu">
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-right">
                    <button type="submit" class="btn btn-sm btn-success shadow"><i class="fas fa-save"></i> Simpan</button>
                    <a href="/pendaftaran/pasien/add" class="btn btn-sm btn-warning shadow"><i class="fas fa-sync-alt"></i> Reset</a>
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
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    $('.pilih-kelurahan').change(function () {
        var selectedKelurahan = $(this).children("option:selected").val();
        axios.get('/getkelurahan/'+selectedKelurahan)
        .then(function (response) {
            kecamatan = response.data[0].nama;
            kota      = response.data[1].nama;
            provinsi  = response.data[2].nama
            $("#kecamatan").val(kecamatan);
            $("#kota").val(kota);
            $("#provinsi").val(provinsi);
        })
        .catch(function (error) {
            $("#kecamatan").val("");
            $("#kota").val("");
            $("#provinsi").val("");
            console.log(error);
        })
        .then(function () {
            
        });
    });
</script>
<script>
$(function() {
    $('.select2').select2()
    $('#datepicker').datepicker({
      autoclose: true
    })
    $("#e2").select2({ dropdownCssClass: "myFont" })
    $("#e3").select2({ dropdownCssClass: "myFont" })
});
</script>
<script type="text/javascript">  
    function changetextbox() {
        //console.log(document.getElementById("asuransi_id").value);  
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
