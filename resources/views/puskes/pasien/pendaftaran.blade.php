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
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Buat Pendaftaran Baru</h3>
              <div class="card-tools">
                <a href="/pendaftaran/pasien/view/{{$data->id}}" class="btn bg-gradient-secondary btn-sm">Kembali</a>
                <a href="/pendaftaran" class="btn bg-gradient-info btn-sm">Lihat Semua</a>
                <a href="/pendaftaran/pasien" class="btn bg-gradient-info btn-sm">Lihat Data Pasien</a>
                <a href="/pendaftaran/pasien/add" class="btn bg-gradient-info btn-sm">Buat data Pasien</a>
              </div>
            </div>
              <div class="row">
                <div class="col-md-4">
                    <div class="card-body">
                      <table class="table table-sm table-bordered">
                        <tbody>
                          <tr>
                            <td>Tanggal Pendaftaran</td>
                            <td>{{\Carbon\Carbon::now()}}</td>
                          </tr>
                          <tr>
                            <td>
                                Data Pasien <br />
                                (ID : {{$data->id}})
                            </td>
                            <td>
                                No. RM Lama : {{$data->no_rm_lama}} <br />
                                No. Dok. RM : {{$data->no_dok_rm}} <br />
                                NIK : {{$data->nik}} <br />
                                Nama : {{$data->nama}} <br />
                                JK : {{$data->jkel == 'L'  ? 'Laki-Laki' : 'Perempuan'}} <br />
                                Lahir : {{$data->tgl_lahir == null  ? null : \Carbon\Carbon::parse($data->tgl_lahir)->format('d-M-Y')}} <br />
                                Kelurahan : {{$data->kelurahan == null  ? '-' : $data->kelurahan->nama}} <br />
                            </td>
                          </tr>
                          <tr>
                            <td>Umur <span class="text-danger"><b>*</b></span></td>
                            <td>{{hitungUmur($data->tgl_lahir)}}</td>
                          </tr>
                          <tr>
                            <td>No HP  <span class="text-danger"><b>*</b></span></td>
                            <td><input type="text" class="form-control form-control-sm" value="{{$data->no_hp == null ? 0 : $data->no_hp}}"></td>
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
                            <td>Kunjungan</td>
                            <td>
                                <input type="radio" name="kunjungan" checked> BARU &nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kunjungan"> LAMA
                            </td>
                          </tr>
                          <tr>
                            <td>Keadaan / Kelainan Pasien</td>
                            <td>
                                <input type="checkbox" name="keadaan"> Handaya <br />
                                <input type="checkbox" name="keadaan"> Difabel <br />
                                <input type="checkbox" name="keadaan"> Lansia <br />
                            </td>
                          </tr>
                          <tr>
                            <td>Status</td>
                            <td>
                                <input type="radio" name="status" checked> KUNJUNGAN SAKIT <br />
                                <input type="radio" name="status"> KUNJUNGAN SEHAT
                            </td>
                          </tr>
                          <tr>
                            <td>Tenaga Medis</td>
                            <td><input type="text" class="form-control form-control-sm"></td>
                          </tr>
                          <tr>
                            <td>No Asuransi</td>
                            <td><input type="text" class="form-control form-control-sm" value="{{$data->no_asuransi}}"></td>
                          </tr>
                          <tr>
                            <td>Tarif Pendaftaran</td>
                            <td><input type="text" class="form-control form-control-sm" value="0"></td>
                          </tr>
                        </tbody>
                      </table>
                      <br />
                      <strong>Penanggung Jawab Pasien :</strong>
                      
                      <table class="table table-sm table-bordered">
                        <tbody>
                          <tr>
                            <td>Nama</td>
                            <td><input type="text" class="form-control form-control-sm"></td>
                          </tr>
                          <tr>
                            <td>Hubungan</td>
                            <td><input type="text" class="form-control form-control-sm"></td>
                          </tr>
                          <tr>
                            <td>No HP</td>
                            <td><input type="text" class="form-control form-control-sm"></td>
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
              </div>
            <div class="card-footer">
                <div class="text-right">
                    <a href="/pendaftaran/pasien/edit/{{$data->id}}" class="btn btn-sm btn-success shadow"><i class="fas fa-save"></i> Simpan</a>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection

@push('addjs')


@endpush
