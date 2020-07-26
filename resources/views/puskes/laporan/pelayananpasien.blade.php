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
              <h3 class="card-title">Laporan Harian - Pelayanan Pasien</h3>
              {{-- <div class="card-tools">
               <a href="/rekam_medis" class="btn btn-danger btn-xs shadow"> <i class="fas fa-backward"></i> Kembali</a>
             </div> --}}
           </div>
            
            <!-- /.card-header -->
            <div class="card-body p-2">
            <form method="POST" action="/laporanpelayananpasien">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="card-body">
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Dari <span class="text-danger"><strong>*</strong></span></small></label>
                        <div class="col-sm-9">
                        <input type="text" id="datepicker" class="form-control form-control-sm"  name="dari" required value="{{\Carbon\Carbon::parse(old('dari'))->format('d-m-Y')}}">
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Sampai <span class="text-danger"><strong>*</strong></span></small></label>
                        <div class="col-sm-9">
                            <input type="text" id="datepicker2" class="form-control form-control-sm"  name="sampai" required value="{{\Carbon\Carbon::parse(old('sampai'))->format('d-m-Y')}}">
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Status Periksa</small></label>
                        <div class="col-sm-9"> 
                            <select class="form-control form-control-sm" name="search[status_periksa]" required>
                                <option value="0"> SEMUA </option>
                                <option value="1"> Belum Diperiksa </option>
                                <option value="2"> Sedang Diperiksa </option>
                                <option value="3"> Sudah Diperiksa </option>
                                <option value="4"> Batal Berobat </option>                            
                            </select>
                        </div>
                    </div> 
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Poli/Ruangan</small></label>
                        <div class="col-sm-9"> 
                            <select class="form-control form-control-sm" name="search[ruangan]" required>
                                <option value="0">SEMUA</option>
                                @foreach ($poli as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Jenis Kunjungan</small></label>
                        <div class="col-sm-9"> 
                            <select class="form-control form-control-sm" name="search[jenis_kunjungan]" >
                                <option value="0"> SEMUA </option>
                                <option value="baru"> Baru </option>
                                <option value="lama"> Lama </option>                         
                            </select>
                        </div>
                    </div>  
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-body">
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Kunjungan</small></label>
                        <div class="col-sm-9"> 
                            <select class="form-control form-control-sm" name="search[kunjungan]" >
                            <option value="0">SEMUA</option>
                            <option value="sakit">Sakit</option>
                            <option value="sehat">Sehat</option>
                        </select>
                        </div>
                    </div> 
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Asuransi</small></label>
                        <div class="col-sm-9"> 
                            <select class="form-control form-control-sm" name="search[asuransi]" >
                                <option value="0">SEMUA</option>
                                @foreach ($asuransi as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Jenis Kelamin</small></label>
                        <div class="col-sm-9"> 
                            <select class="form-control form-control-sm" name="search[jenis_kelamin]" >
                                <option value="semua">SEMUA</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div> 
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Wilayah</small></label>
                        <div class="col-sm-9"> 
                            <select class="form-control form-control-sm" name="search[wilayah]" >
                            <option value="semua">SEMUA</option>
                            <option value="dalam_kota">Dalam Kota</option>
                            <option value="luar_kota">Luar Kota</option>
                        </select>
                        </div>
                    </div> 
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Kecamatan</small></label>
                        <div class="col-sm-9"> 
                            <input type="text" class="form-control form-control-sm"  name="kecamatan" value="{{old('kecamatan')}}">
                        </div>
                    </div> 
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>Kelurahan</small></label>
                        <div class="col-sm-9"> 
                            <input type="text" class="form-control form-control-sm"  name="search[kelurahan]">
                        </div>
                    </div>  
                    <div class="input-group row">
                        <label class="col-sm-3 col-form-label text-right"><small>RT/RW</small></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control form-control-sm"  name="search[rt]" placeholder="RT">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control form-control-sm"  name="search[rw]" placeholder="RW">
                        </div>
                    
                    </div>  
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-body">
                        <div class="input-group row">
                            <label class="col-sm-3 col-form-label text-right"><small>Pekerjaan</small></label>
                            <div class="col-sm-9"> 
                                <input type="text" class="form-control form-control-sm"  name="search[pekerjaan]">
                            </div>
                        </div>  
                        <div class="input-group row">
                            <label class="col-sm-3 col-form-label text-right"><small>5 Kunjungan /Lebih</small></label>
                            <div class="col-sm-9"> 
                                <input type="text" class="form-control form-control-sm"  name="search[5kunjungan]">
                            </div>
                        </div>  
                        <div class="input-group row">
                            <label class="col-sm-3 col-form-label text-right"><small>Dokter</small></label>
                            <div class="col-sm-9"> 
                                <input type="text" class="form-control form-control-sm"  name="search[dokter]">
                            </div>
                        </div>  
                        <div class="input-group row">
                            <label class="col-sm-3 col-form-label text-right"><small>Diagnoasa</small></label>
                            <div class="col-sm-9"> 
                                <input type="text" class="form-control form-control-sm"  name="search[diagnosa]">
                            </div>
                        </div>  
                        <div class="input-group row">
                            <label class="col-sm-3 col-form-label text-right"><small>Tindakan</small></label>
                            <div class="col-sm-9"> 
                                <input type="text" class="form-control form-control-sm"  name="search[tindakan]">
                            </div>
                        </div>  
                        <div class="input-group row">
                            <label class="col-sm-3 col-form-label text-right"><small>Obat</small></label>
                            <div class="col-sm-9"> 
                                <input type="text" class="form-control form-control-sm"  name="search[obat]">
                            </div>
                        </div>  
                        <div class="input-group row">
                            <label class="col-sm-3 col-form-label text-right"><small>Umur</small></label>
                            <div class="col-sm-3"> 
                                <input type="text" class="form-control form-control-sm"  name="search[umurdari_thn]" placeholder="Thn">
                            </div>
                            <div class="col-sm-3"> 
                                <input type="text" class="form-control form-control-sm"  name="search[umurdari_bln]" placeholder="Bln">
                            </div>
                            <div class="col-sm-3"> 
                                <input type="text" class="form-control form-control-sm"  name="search[umurdari_hari]" placeholder="Hari">
                            </div>
                        </div>  
                        <div class="input-group row">
                            <label class="col-sm-3 col-form-label text-right"><small>Sampai Umur</small></label>
                            <div class="col-sm-3"> 
                                <input type="text" class="form-control form-control-sm"  name="search[umursampai_thn]" placeholder="Thn">
                            </div>
                            <div class="col-sm-3"> 
                                <input type="text" class="form-control form-control-sm"  name="search[umursampai_bln]" placeholder="Bln">
                            </div>
                            <div class="col-sm-3"> 
                                <input type="text" class="form-control form-control-sm"  name="search[umursampai_hari]" placeholder="Hari">
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="card-tools">&nbsp;&nbsp;&nbsp;&nbsp;
                <button type='submit' class="btn btn-sm btn-info shadow">Tampilkan</button>
                <button type="submit" value='export' name="export" class="btn btn-sm btn-info shadow">Export</button>
                <a href="/laporanpelayananpasien"  class="btn btn-sm btn-info shadow">Reset</a>
                </div>
            </div>
            </form>
            <hr>
                <center><b>LAPORAN HARIAN - PELAYANAN PASIEN</b></center>
                <br />
              <table id="example" class="table table-bordered table-sm table-responsive">
                <thead>
                <tr class="bg-gradient-primary" style="font-size:12px; font-family:'Arial Narrow';">
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Nama Pasien</th>
                  <th>No eRm.</th>
                  <th>NIK</th>
                  <th>No RM Lama</th>
                  <th>No Dok. Rm</th>
                  <th>J. Kelamin</th>
                  <th>Alamat</th>
                  <th>RT</th>
                  <th>RW</th>
                  <th>Pekerjaan</th>
                  <th>Tanggal Pemeriksaan</th>
                  <th>Kelurahan</th>
                  <th>Tempat & Tgl Lahir</th>
                  <th>Umur Thn</th>
                  <th>Umur Bln</th>
                  <th>Umur Hari</th>
                  <th>Nama Ayah</th>
                  <th>Nama Ibu</th>
                  <th>Jenis Kunjungan</th>
                  <th>Poli / Ruangan</th>
                  <th>Asuransi</th>
                  <th>No Asuransi</th>
                  <th>Dokter</th>
                  <th>Perawat</th>
                  <th>Keluhan Utama</th>
                  <th>Keluhan Tambahan</th>
                  <th>Lama Sakit</th>
                  <th>Merokok</th>
                  <th>Konsumsi Alkohol</th>
                  <th>Kurang Sayur/Buah</th>
                  <th>Terapi</th>
                  <th>Keterangan</th>
                  <th>RPS</th>
                  <th>RPD</th>
                  <th>RPK</th>
                  <th>Alergi</th>
                  <th>Kesadaran</th>
                  <th>Triage</th>
                  <th>Tinggi</th>
                  <th>Badan</th>
                  <th>Lingkar Perut</th>
                  <th>IMT</th>
                  <th>Hasil IMT</th>
                  <th>Sistole</th>
                  <th>Diastole</th>
                  <th>Nafas</th>
                  <th>Detak Nadi</th>
                  <th>Detak Jantung</th>
                  <th>Suhu</th>
                  <th>Aktifitas Fisik</th>
                  <th>Diagnosa</th>
                  <th>Jenis Kasus</th>
                  <th>Tindakan</th>
                  <th>Resep</th>
                  <th>Pendaftaran/Rujukan Internal</th>
                </thead>
                <small>
                    @php
                    $no = 1;
                    @endphp
                <tbody>
                  @foreach ($data as $item)
                      <tr style="font-size:12px; font-family:Arial, Helvetica, sans-serif;">
                        <td>{{$no++}}</td>
                        <td>{{\Carbon\Carbon::parse($item->tanggal)->format('d-m-Y h:i:s')}}</td>
                        <td>{{$item->pendaftaran->pasien->nama}}</td>
                        <td>{{substr($item->pendaftaran->pasien->id, -8)}}</td>
                        <td>{{$item->pendaftaran->pasien->nik}}</td>
                        <td>{{$item->pendaftaran->pasien->no_rm_lama}}</td>
                        <td>{{$item->pendaftaran->pasien->no_dok_rm}}</td>
                        <td>{{$item->pendaftaran->pasien->jenis_kelamin == 'L' ? 'Laki-Laki':'Perempuan'}}</td>
                        <td>{{$item->pendaftaran->pasien->alamat}}</td>
                        <td>{{$item->pendaftaran->pasien->rt}}</td>
                        <td>{{$item->pendaftaran->pasien->rw}}</td>
                        <td>{{$item->pendaftaran->pasien->pekerjaan == null ? '-' : $item->pendaftaran->pasien->pekerjaan->nama}}</td>
                        <td>{{\Carbon\Carbon::parse($item->anamnesa->tanggal)->format('d-m-Y h:i:s')}}</td>
                        <td>{{$item->pendaftaran->pasien->kelurahan == null ? '-' : $item->pendaftaran->pasien->kelurahan->nama}}</td>
                        <td>{{$item->pendaftaran->pasien->tempat_lahir}}, {{\Carbon\Carbon::parse($item->pendaftaran->pasien->tanggal_lahir)->format('d-m-Y')}}</td>
                        <td>{{$item->pendaftaran->umur_tahun}} Thn</td>
                        <td>{{$item->pendaftaran->umur_bulan}} Bln</td>
                        <td>{{$item->pendaftaran->umur_hari}} Hari</td>
                        <td>{{$item->pendaftaran->pasien->nama_ayah}}</td>
                        <td>{{$item->pendaftaran->pasien->nama_ibu}}</td>
                        <td>{{$item->pendaftaran->kunjungan}}</td>
                        <td>{{$item->ruangan->nama}}</td>
                        <td>{{$item->pendaftaran->pasien->asuransi->nama}}</td>
                        <td>{{$item->pendaftaran->pasien->no_asuransi}}</td>
                        <td>{{$item->anamnesa->dokter == null ? '-' : $item->anamnesa->dokter->nama}}</td>
                        <td>{{$item->anamnesa->perawat == null ? '-' : $item->anamnesa->perawat->nama}}</td>
                        <td>{{$item->anamnesa->keluhan_utama}}</td>
                        <td>{{$item->anamnesa->keluhan_tambahan}}</td>
                        <td>{{$item->anamnesa->lama_sakit_tahun}} thn,{{$item->anamnesa->lama_sakit_bulan}} bln,{{$item->anamnesa->lama_sakit_hari}} Hr </td>
                        
                        <td>{{$item->anamnesa->merokok == 0 ? 'Tidak' : 'Ya'}}</td>
                        <td>{{$item->anamnesa->konsumsi_alkohol == 0 ? 'Tidak' : 'Ya'}}</td>
                        <td>{{$item->anamnesa->kurang_sayur_buah == 0 ? 'Tidak' : 'Ya'}}</td>
                        <td>{{$item->anamnesa->terapi}}</td>
                        <td>{{$item->anamnesa->keterangan}}</td>
                        <td>{{count($item->anamnesa->rps) == 0 ? '': $item->anamnesa->rps->where('jenis_riwayat', 'Riwayat Penyakit Sekarang')->first()->value}}</td>
                        <td>{{count($item->anamnesa->rpd) == 0 ? '': $item->anamnesa->rpd->where('jenis_riwayat', 'Riwayat Penyakit Dulu')->first()->value}}</td>
                        <td>{{count($item->anamnesa->rpk) == 0 ? '': $item->anamnesa->rpk->where('jenis_riwayat', 'Riwayat Penyakit Keluarga')->first()->value}}</td>
                        <td>
                            <ul>
                            @foreach($item->anamnesa->obat as $alergi)
                            <li>{{$alergi->value}}</li>
                            @endforeach
                            </ul>
                        </td>
                        <td>{{$item->periksafisik->kesadaran}}</td>
                        <td>{{$item->periksafisik->triage}}</td>
                        <td>{{$item->periksafisik->tinggi}} Cm</td>
                        <td>{{$item->periksafisik->berat}} Kg</td>
                        <td>{{$item->periksafisik->lingkar_perut}}</td>
                        {{-- <td>{{number_format($item->periksafisik->berat / ($item->periksafisik->tinggi / 100) / ($item->periksafisik->tinggi / 100), 2)}}</td> --}}
                        <td>-</td>
                        <td>{{$item->periksafisik->sistole}}</td>
                        <td>{{$item->periksafisik->diastole}}</td>
                        <td>{{$item->periksafisik->nafas}}</td>
                        <td>{{$item->periksafisik->detak_nadi}}</td>
                        <td>{{$item->periksafisik->detak_jantung}}</td>
                        <td>{{$item->periksafisik->suhu}}</td>
                        <td>{{$item->periksafisik->aktifitas_fisik}}</td>
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
                        <td>
                            @foreach ($item->tindakan as $tindakan)
                            <ul>
                                <li>{{$tindakan->mtindakan->value}}</li>
                            </ul>
                            @endforeach
                        </td>
                        <td>
                            @if($item->resep != null)
                                @foreach ($item->resep->resepdetail as $resep)
                                <ul>
                                    <li>Obat : {{$resep->obat->value}} <br>
                                    Signa : {{$resep->obat_signa}}</li>
                                </ul>
                                @endforeach
                            @else
                            -
                            @endif
                        </td>
                        <td>Pendaftaran</td> 
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
