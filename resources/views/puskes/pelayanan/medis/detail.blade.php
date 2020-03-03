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
<section class="content">
    <div class="container-fluid">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Detail Pelayanan Medis</h3>
              <div class="card-tools">
                <a href="/medis" class="btn bg-gradient-info btn-sm">Lihat Semua</a>
              </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-8" style="padding-left:15px; padding-top:15px">
                    <a href="/medis" class="btn bg-gradient-primary btn-sm">Anamnesa</a>
                    <a href="/medis" class="btn bg-gradient-primary btn-sm">Diagnosa</a>
                    <a href="/medis" class="btn bg-gradient-primary btn-sm">Resep</a>
                    <a href="/medis" class="btn bg-gradient-primary btn-sm">Laboratorium</a>
                    <a href="/medis" class="btn bg-gradient-primary btn-sm">Tindakan</a>
                    <a href="/medis" class="btn bg-gradient-primary btn-sm">Keur</a>
                    <a href="/medis" class="btn bg-gradient-primary btn-sm">Caten</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4" style="padding-left: 15px; padding-top:15px; padding-right:15px;">
                    <!-- Form Element sizes -->
                    <div class="card card-success card-outline">
                      <div class="card-header">
                        <h3 class="card-title">Pasien Pulang</h3>
                      </div>
                      <div class="card-body">
                        <div class="input-group row">
                            <label class="col-sm-3 col-form-label text-right"><small>Status Pulang</small></label>
                            <div class="col-sm-9">
                                <select class="form-control form-control-sm" id="statuspulang_id" name="statuspulang_id" onchange="changetextbox();">
                                <option>-Pilih-</option>
                                <option>Berobat jalan</option>
                                <option>Rujuk Internal</option>
                                <option>Rujuk Lanjut</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-group row">
                            <label class="col-sm-3 col-form-label text-right"><small>Tgl Mulai</small></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="input-group row">
                            <label class="col-sm-3 col-form-label text-right"><small>Tgl Selesai</small></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="input-group row">
                            <label class="col-sm-3 col-form-label text-right"><small>Tgl Rencana Kontrol</small></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                      </div>
                      <div class="card-footer">
                          
                        <button type="submit" class="btn btn-warning btn-sm float-right">Mulai</button>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    
                    <div class="card card-success card-outline">
                      <div class="card-header">
                        <h3 class="card-title">Riwayat Pasien</h3>
                      </div>
                      <div class="card-body">
                          
                      </div>
                      <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-md-8" style="padding-left: 15px; padding-top:15px; padding-right:15px;">
                    <div class="card card-info card-outline">
                      <div class="card-header">
                        <h3 class="card-title">Detail Pasien</h3>
                      </div>
                      <div class="card-body table-responsive p-0">
                        <table class="table table-sm">
                            <tbody>
                              <tr>
                                <td>ID Pelayanan</td>
                                <td>23421</td>
                                <td>NIK</td>
                                <td>432456764543432</td>
                              </tr>
                              <tr>
                                <td>No Antrean</td>
                                <td>0004</td>
                                <td>Nama Pasien</td>
                                <td>Asrani</td>
                              </tr>
                              <tr>
                                <td>Instalasi</td>
                                <td>Rawat jalan</td>
                                <td>Nama Ibu</td>
                                <td></td>
                              </tr>
                              <tr>
                                <td>Poli/Ruangan</td>
                                <td>Umum</td>
                                <td>No eRM</td>
                                <td>0023</td>
                              </tr>
                              <tr>
                                <td>Kamar/Bed</td>
                                <td>-</td>
                                <td>No RM Lama</td>
                                <td>0021</td>
                              </tr>
                              <tr>
                                <td>Tgl Pelayanan</td>
                                <td>-</td>
                                <td>No Dokumen RM</td>
                                <td>0029</td>
                              </tr>
                              <tr>
                                <td>Tgl Mulai</td>
                                <td>-</td>
                                <td>Jenis Kelamin</td>
                                <td>0029</td>
                              </tr>
                              <tr>
                                <td>Tgl Selesai</td>
                                <td>-</td>
                                <td>Tempat/Tgl Lahir</td>
                                <td>0029</td>
                              </tr>
                              <tr>
                                <td>ID Pendaftaran</td>
                                <td>-</td>
                                <td>Umur</td>
                                <td>0029</td>
                              </tr>
                              <tr>
                                <td>Tgl Pendaftaran</td>
                                <td>-</td>
                                <td>Alamat</td>
                                <td>0029</td>
                              </tr>
                              <tr>
                                <td>Asuransi</td>
                                <td>-</td>
                                <td>Catatan</td>
                                <td>0029</td>
                              </tr>
                              <tr>
                                <td>Perujuk</td>
                                <td>-</td>
                                <td>Catatan Perujuk</td>
                                <td>0029</td>
                              </tr>
                            </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    
                    <div class="card card-info card-outline">
                      <div class="card-header">
                        <h3 class="card-title">Penyakit Khusus Pasien</h3>
                      </div>
                      <div class="card-body table-responsive p-0">
                          
                      </div>
                    </div>
                </div>
            </div>
              {{-- <div class="row">
                <div class="col-md-4">
                    <div class="card-body">
                      <table class="table table-sm table-bordered">
                        <tbody>
                          <tr>
                            <td>Puskesmas</td>
                            <td>{{Auth::user()->puskes->first()->nama}}</td>
                          </tr>
                          <tr>
                            <td>Asuransi</td>
                            <td>{{$data->asuransi->nama}}</td>
                          </tr>
                          <tr>
                            <td>No Asuransi</td>
                            <td>{{$data->no_asuransi}}</td>
                          </tr>
                          <tr>
                            <td>No KK</td>
                            <td>{{$data->no_kk}}</td>
                          </tr>
                          <tr>
                            <td>NIK</td>
                            <td>{{$data->nik}}</td>
                          </tr>
                          <tr>
                            <td>Nama</td>
                            <td>{{$data->nama}}</td>
                          </tr>
                          <tr>
                            <td>Jenis Kelamin</td>
                            <td>{{$data->jkel == 'L' ? 'Laki-Laki' : 'Perempuan'}}</td>
                          </tr>
                          <tr>
                            <td>Tempat Dan Tanggal Lahir</td>
                            <td>{{$data->tempat_lahir}} / {{$data->tgl_lahir == null ? null : \Carbon\Carbon::parse($data->tgl_lahir)->format('d-M-Y')}}</td>
                          </tr>
                          <tr>
                            <td>No. Dokumen RM</td>
                            <td>{{$data->no_dok_rm}}</td>
                          </tr>
                          <tr>
                            <td>No RM Lama</td>
                            <td>{{$data->no_rm_lama}}</td>
                          </tr>
                          <tr>
                            <td>Golongan Darah</td>
                            <td>{{$data->goldarah == null ? '-' : $data->goldarah->nama }}</td>
                          </tr>
                          <tr>
                            <td>Email</td>
                            <td>{{$data->email}}</td>
                          </tr>
                          <tr>
                            <td>No HP</td>
                            <td>{{$data->no_hp}}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-body">
                      <table class="table table-sm table-bordered">
                        <tbody>
                          <tr>
                            <td>Provinsi</td>
                            <td>{{$data->kelurahan == null ? '-' : $data->kelurahan->kecamatan->kota->provinsi->nama }}</td>
                          </tr>
                          <tr>
                            <td>Kota</td>
                            <td>{{$data->kelurahan == null ? '-' : $data->kelurahan->kecamatan->kota->nama }}</td>
                          </tr>
                          <tr>
                            <td>Kecamatan</td>
                            <td>{{$data->kelurahan == null ? '-' : $data->kelurahan->kecamatan->nama }}</td>
                          </tr>
                          <tr>
                            <td>Kelurahan</td>
                            <td>{{$data->kelurahan == null ? '-' : $data->kelurahan->nama }}</td>
                          </tr>
                          <tr>
                            <td>Alamat</td>
                            <td>{{$data->nik}}</td>
                          </tr>
                          <tr>
                            <td>RT/RW</td>
                            <td>{{$data->rt}}/{{$data->rw}}</td>
                          </tr>
                          <tr>
                            <td>Pekerjaan</td>
                            <td>{{$data->pekerjaan == null ? '': $data->pekerjaan->nama}}</td>
                          </tr>
                          <tr>
                            <td>Agama</td>
                            <td>{{$data->agama == null ? '': $data->agama->nama}}</td>
                          </tr>
                          <tr>
                            <td>Pendidikan</td>
                            <td>{{$data->pendidikan == null ? '': $data->pendidikan->nama}}</td>
                          </tr>
                          <tr>
                            <td>Status Perkawinan</td>
                            <td>{{$data->statuskawin == null ? '': $data->statuskawin->nama}}</td>
                          </tr>
                          <tr>
                            <td>Status Keluarga</td>
                            <td>{{$data->statuskeluarga == null ? '': $data->statuskeluarga->nama}}</td>
                          </tr>
                          <tr>
                            <td>Warga Negara</td>
                            <td>{{$data->warganegara}}</td>
                          </tr>
                          <tr>
                            <td>Nama Ayah</td>
                            <td>{{$data->nama_ayah}}</td>
                          </tr>
                          <tr>
                            <td>Nama Ibu</td>
                            <td>{{$data->nama_ibu}}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                </div>         
                <div class="col-md-4">
                    <div class="card-body">
                      <strong>Riwayat Pendaftaran :</strong>
                      <table class="table table-sm table-bordered">
                        <thead>
                          <tr style="font-size:13px;" class="bg-gradient-blue">
                            <th style="width: 10px;">No</th>
                            <th>Tgl Daftar</th>
                            <th>Instalasi</th>
                            <th>Poli / Ruangan</th>
                            <th style="width: 40px">Skrinning</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1.</td>
                            <td>2 Des 2019</td>
                            <td>Rawat Jalan</td>
                            <td>Umum</td>
                            <td></td>
                          </tr>
                        </tbody>
                      </table>
                      <br />
                      
                      <strong>Data Keluarga :</strong>
                      <table class="table table-sm table-bordered">
                        <thead>
                          <tr style="font-size:13px;" class="bg-gradient-blue">
                            <th style="width: 10px;">No</th>
                            <th>Nama</th>
                            <th>Status Keluarga</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1.</td>
                            <td>Siti</td>
                            <td>Anak</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                </div>
              </div> --}}
            <div class="card-footer">
                <div class="text-right">
                    <a href="/pendaftaran/pasien/edit/" class="btn btn-sm btn-info shadow"><i class="fas fa-print"></i> Cetak Pengantar Rujukan</a>
                    <a href="/pendaftaran/pasien/delete/" class="btn btn-sm btn-info shadow"  onclick="return confirm('Yakin Menghapus Semua Data Tentang Pasien Ini?');"><i class="fas fa-trash"></i> Cetak</a>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
    </div>
</section>
@endsection

@push('addjs')


@endpush
