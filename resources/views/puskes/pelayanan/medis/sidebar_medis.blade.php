<div class="col-md-4" style="padding-left: 15px; padding-top:15px; padding-right:15px;">
    <!-- Form Element sizes -->
    <div class="card card-success card-outline">
      <div class="card-header">
        <h3 class="card-title">Pasien Pulang</h3>
      </div>
      <form method="post" action="/pelayanan/medis/proses/{{$data->id}}">
        @csrf
      <div class="card-body">
        <div class="input-group row">
            <label class="col-sm-3 col-form-label text-right"><small>Status Pulang</small></label>
            <div class="col-sm-9">
                <select class="form-control form-control-sm" id="statuspulang_id" name="statuspulang_id" onchange="changetextbox();">
                <option value="">-Pilih-</option>
                @foreach ($sp as $item)
                @if($item->id == $data->statuspulang_id)
                  <option value="{{$item->id}}" selected>{{$item->nama}}</option>
                @else
                  <option value="{{$item->id}}">{{$item->nama}}</option>
                @endif
                @endforeach
                </select>
            </div>
        </div>
        <div class="input-group row">
            <label class="col-sm-3 col-form-label text-right"><small>Tgl Mulai</small></label>
            <div class="col-sm-9">
                <input type="text" class="form-control form-control-sm"  name="tgl_mulai" value="{{$data->tanggal}}">
            </div>
        </div>
        <div class="input-group row">
            <label class="col-sm-3 col-form-label text-right"><small>Tgl Selesai</small></label>
            <div class="col-sm-9">
            <input type="text" class="form-control form-control-sm" name="tgl_selesai" value="{{\Carbon\Carbon::now()}}">
            </div>
        </div>
        <div class="input-group row">
            <label class="col-sm-3 col-form-label text-right"><small>Tgl Rencana Kontrol</small></label>
            <div class="col-sm-9">
                <input type="text" class="form-control form-control-sm" id="datepicker" name="rencana_kontrol">
            </div>
        </div>
      </div>
      <div class="card-footer">
          
        <a href="#" class="btn btn-primary btn-sm">Panggil</a>
        @if($data->pendaftaran->status_periksa == 0)
        <a href="/pelayanan/medis/proses/{{$data->id}}/mulai" class="btn btn-success btn-sm">Mulai Periksa</a>
        @elseif($data->pendaftaran->status_periksa == 1)
        <button type="submit" class="btn btn-danger btn-sm">Selesai Periksa</button>
        @elseif($data->pendaftaran->status_periksa == 2)
        <a href="/pelayanan/medis/proses/{{$data->id}}/mulai" class="btn btn-success btn-sm">Mulai Periksa</a>
        @else
        @endif  
      </div>
      </form>
      <!-- /.card-body -->
    </div>

    <div class="card card-success card-outline">
        <div class="card-header">
          <h3 class="card-title">Data Pasien</h3>
        </div>
          <div class="card-body table-responsive p-0">
              <table class="table table-sm" style="font-size:13px;">
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
        <h3 class="card-title">Riwayat Pasien</h3>
      </div>
      <div class="card-body">
        @foreach ($riwayat as $rw)
            @if($rw->pelayanan == null)
            @else
            <button type="button" data-pendaftaran="{{$rw}}" data-anamnesa="{{$rw->pelayanan->anamnesa}}"  data-diagnosa="{{$rw->pelayanan->diagnosa}}" data-periksafisik="{{$rw->pelayanan->periksafisik}}" class="btn btn-default btn-block open-modal" style="font-size:12px;"><span class="fa fa-book"></span> PEKAUMAN <br> {{$rw->tanggal}} / {{$rw->pelayanan == null ? '' : $rw->pelayanan->ruangan->nama}}</button>
            @endif
        @endforeach
      </div>
      <!-- /.card-body -->
    </div>
</div>

<div class="modal fade show" id="modal-xl" style="display: none; padding-right: 16px;" aria-modal="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detail Riwayat</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="col-12 col-sm-12 col-lg-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Pasien</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Anamnesa</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Diagnosa</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                      <div class="card-body table-responsive p-0">
                        <table class="table table-sm" style="font-size:13px;">
                            <tbody>
                              <tr>
                                <td>ID Pelayanan</td>
                                <td id="id_pelayanan"></td>
                                <td>NIK</td>
                                <td id="nik_pasien"></td>
                              </tr>
                              <tr>
                                <td>No Antrean</td>
                                <td>-</td>
                                <td>Nama Pasien</td>
                                <td id="nama_pasien"></td>                              
                              </tr>
                              <tr>
                                <td>Instalasi</td>
                                <td id="instalasi"></td>    
                                <td>Nama Ibu</td>
                                <td id="nama_ibu"></td>   
                              </tr>
                              <tr>
                                <td>Poli/Ruangan</td>
                                <td id="poli"></td>   
                                <td>No eRM</td>
                                <td id="no_erm"></td>   
                              </tr>
                              <tr>
                                <td>Kamar/Bed</td>
                                <td>-</td>
                                <td>No RM Lama</td>
                                <td id="no_rm_lama"></td>   
                              </tr>
                              <tr>
                                <td>Tgl Pelayanan</td>
                                <td id="tgl_pelayanan"></td>   
                                <td>No Dokumen RM</td>
                                <td id="no_dok_rm"></td>   
                              </tr>
                              <tr>
                                <td>Tgl Mulai</td>
                                <td>-</td>
                                <td>Jenis Kelamin</td>
                                <td id="jkel"></td>   
                              </tr>
                              <tr>
                                <td>Tgl Selesai</td>
                                <td>-</td>
                                <td>Tempat/Tgl Lahir</td>
                                <td id="tempat_lahir"></td>   
                              </tr>
                              <tr>
                                <td>ID Pendaftaran</td>
                                <td id="id_pendaftaran"></td>
                                <td>Umur</td>
                                <td>{{hitungUmur($data->pendaftaran->pasien->tanggal_lahir)}}</td>
                              </tr>
                              <tr>
                                <td>Tgl Pendaftaran</td>
                                <td id="tanggal_daftar"></td>
                                <td>Alamat</td>
                                <td id="alamat"></td>
                              </tr>
                              <tr>
                                <td>Asuransi</td>
                                <td id="asuransi"></td>
                                <td>Catatan</td>
                                <td>-</td>
                              </tr>
                              <tr>
                                <td>Rujukan Dari</td>
                                <td></td>
                                <td>Nama Perujuk</td>
                                <td></td>
                              </tr>
                            </tbody>
                        </table>
                      </div>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-sm" style="font-size:13px;">
                            <tbody>
                              <tr>
                                <td>ID Anamnesa</td>
                                <td id="id_anamnesa"></td>
                                <td>Tanggal</td>
                                <td id="tanggal_anamnesa"></td>
                              </tr>
                              <tr>
                                <td>Dokter/Tenaga Medis</td>
                                <td id="dokter_anamnesa"></td>
                                <td>Perawat</td>
                                <td id="perawat_anamnesa"></td>                           
                              </tr>
                              <tr>
                                <td>Keluhan Utama</td>
                                <td id="keluhan_utama"></td>    
                                <td>Keluhan Tambahan</td>
                                <td id="keluhan_tambahan"></td>    
                              </tr>
                              <tr>
                                <td>Lama Sakit</td>
                                <td id="lama_sakit">{{$data->anamnesa->lama_sakit_tahun}} Thn,{{$data->anamnesa->lama_sakit_bulan}} Bln,{{$data->anamnesa->lama_sakit_hari}} Hr,</td>   
                                <td>Status</td>
                                <td></td>   
                              </tr>
                              <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                              </tr>
                              <tr>
                                <td>ID Periksa Fisik</td>
                                <td id="id_periksafisik"></td>   
                                <td></td>
                                <td></td>   
                              </tr>
                              <tr>
                                <td>Kesadaran</td>
                                <td id="kesadaran"></td>   
                                <td>Detak Nadi</td>
                                <td id="detak_nadi"></td>   
                              </tr>
                              <tr>
                                <td>Sistole</td>
                                <td id="sistole"></td>
                                <td>Nafas</td>
                                <td id="nafas"></td>   
                              </tr>
                              <tr>
                                <td>Diastole</td>
                                <td id="diastole"></td>
                                <td>Suhu</td>
                                <td id="suhu"></td>   
                              </tr>
                              <tr>
                                <td>Tinggi Badan</td>
                                <td id="tinggi_badan"></td>
                                <td>Aktivitas Fisik</td>
                                <td id="aktifitas_fisik"></td>
                              </tr>
                              <tr>
                                <td>Berat Badan</td>
                                <td id="berat"></td>
                                <td>Detak Jantung</td>
                                <td id="detak_jantung"></td>
                              </tr>
                              <tr>
                                <td>Lingkar Perut</td>
                                <td id="lingkar_perut"></td>
                                <td>Triage</td>
                                <td id="triage"></td>
                              </tr>
                              <tr>
                                <td>IMT</td>
                                <td id="imt"></td>
                                <td>Skala Nyeri</td>
                                <td id="skala_nyeri"></td>
                              </tr>
                              <tr>
                                <td>Hasil IMT</td>
                                <td id="hasil_imt"></td>
                                <td>Status</td>
                                <td id="status"></td>
                              </tr>
                              <tr>
                                <td><strong>Lainnya</strong></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td>Edukasi</td>
                                <td id="edukasi"></td>
                                <td>Merokok</td>
                                <td id="merokok"></td>
                              </tr>
                              <tr>
                                <td>Terapi</td>
                                <td id="terapi"></td>
                                <td>Konsumsi Alkohol</td>
                                <td id="konsumsi_alkohol"></td>
                              </tr>
                              <tr>
                                <td>Rencana</td>
                                <td id="rencana"></td>
                                <td>Kurang Sayur Buah</td>
                                <td id="kurang_sayur_buah"></td>
                              </tr>
                              <tr>
                                <td>Observasi</td>
                                <td id="observasi"></td>
                                <td>Biopsikososial</td>
                                <td id="biopsikososial"></td>
                              </tr>
                            </tbody>
                        </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-sm" style="font-size:13px;" id="tableDiagnosa">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tanggal</th>
                                    <th>Dokter</th>
                                    <th>Perawat</th>
                                    <th>ICDX</th>
                                    <th>Diagnosa</th>
                                    <th>Jenis</th>
                                    <th>Kasus</th>
                                </tr>
                            </thead>
                            <tbody>
                              <tr>
                                  <td></td>
                              </tr>
                            </tbody>
                        </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

