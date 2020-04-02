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
          <form method="POST" action="/pendaftaran/pasien/create/{{$data->id}}">
            @csrf
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
                            <input type="hidden" name="tanggal" value="{{\Carbon\Carbon::now()}}">
                            <input type="hidden" name="pasien_id" value="{{$data->id}}"> 
                          </tr>
                          <tr>
                            <td>
                                Data Pasien <br />
                                (eRM : {{$data->id}})
                            </td>
                            <td>
                                No. RM Lama : {{$data->no_rm_lama}} <br />
                                No. Dok. RM : {{$data->no_dok_rm}} <br />
                                NIK : {{$data->nik}} <br />
                                Nama : {{$data->nama}} <br />
                                JK : {{$data->jenis_kelamin == 'L'  ? 'Laki-Laki' : 'Perempuan'}} <br />
                                Lahir : {{$data->tanggal_lahir == null  ? null : \Carbon\Carbon::parse($data->tanggal_lahir)->format('d-M-Y')}} <br />
                                Kelurahan : {{$data->kelurahan == null  ? '-' : $data->kelurahan->nama}} <br />
                            </td>
                          </tr>
                          <tr>
                            <td>Umur <span class="text-danger"><b>*</b></span></td>
                            <td>{{hitungUmur($data->tanggal_lahir)}}</td>
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
                                <input type="radio" name="kunjungan" value="BARU" checked> BARU &nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kunjungan" value="LAMA"> LAMA
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
                                <input type="radio" name="status" value="SAKIT" checked> KUNJUNGAN SAKIT <br />
                                <input type="radio" name="status" value="SEHAT"> KUNJUNGAN SEHAT
                            </td>
                          </tr>
                          <tr>
                            <td>Tenaga Medis</td>
                            <td><input type="text" class="form-control form-control-sm"></td>
                          </tr>
                          <tr>
                            <td>No Asuransi</td>
                            <td><input type="text" class="form-control form-control-sm" name="no_asuransi" value="{{$data->no_asuransi}}"></td>
                          </tr>
                          <tr>
                            <td>Tarif Pendaftaran</td>
                            <td><input type="text" class="form-control form-control-sm" value="0" name="tarif"></td>
                          </tr>
                        </tbody>
                      </table>
                      <br />
                      <strong>Penanggung Jawab Pasien :</strong>
                      
                      <table class="table table-sm table-bordered">
                        <tbody>
                          <tr>
                            <td>Nama</td>
                            <td><input type="text" class="form-control form-control-sm" name="penanggung_jawab"></td>
                          </tr>
                          <tr>
                            <td>Hubungan</td>
                            <td><input type="text" class="form-control form-control-sm" name="hubungan"></td>
                          </tr>
                          <tr>
                            <td>No HP</td>
                            <td><input type="text" class="form-control form-control-sm" name="no_hp_penanggung"></td>
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
                          <td>Rujukan Dari</td>
                          <td><input type="text" class="form-control form-control-sm" name="rujukan_dari"></td>
                        </tr>
                        <tr>
                          <td>Nama Perujuk</td>
                          <td><input type="text" class="form-control form-control-sm" name="nama_perujuk"></td>
                        </tr>
                        <tr>
                          <td>Catatan</td>
                          <td><input type="text" class="form-control form-control-sm" name="catatan"></td>
                        </tr>
                      </tbody>
                    </table>
                    <br />
                    <strong>Data Skrinning :</strong>
                      <table class="table table-sm table-bordered">
                        <thead>
                          <tr style="font-size:13px;" class="bg-gradient-blue">
                            <th style="width: 10px;">No</th>
                            <th>Skrinning</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                        </tbody>
                      </table>
                      <br />
                    <strong>Penyakit Khusus :</strong>
                      <table class="table table-sm table-bordered">
                        <thead>
                          <tr style="font-size:13px;" class="bg-gradient-blue">
                            <th style="width: 10px;">No</th>
                            <th>Warna</th>
                            <th>ICDX</th>
                            <th>Penyakit</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                        </tbody>
                      </table>
                      <br />
                    <strong>Riwayat Pendaftaran Hari Ini :</strong>
                      <table class="table table-sm table-bordered">
                        <thead>
                          <tr style="font-size:13px;" class="bg-gradient-blue">
                            <th style="width: 10px;">No</th>
                            <th>Tanggal</th>
                            <th>Poli / Ruangan</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                        </tbody>
                      </table>
                      <br />
                      
                    <table class="table table-sm table-bordered">
                      <tbody>
                        <tr>
                          <td>Instalasi</td>
                          <td><input type="text" class="form-control form-control-sm" readonly></td>
                        </tr>
                        <tr>
                          <td>Pilih Poli <span class="text-danger"><strong>*</strong></span></td>
                          <td>
                            <select class="form-control form-control-sm" name="ruangan_id">
                              <option>-Pilih-</option>
                              @foreach ($ruangan as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                              @endforeach
                            </select>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  
                </div>
              </div>
            <div class="card-footer">
                <div class="text-right">
                    <button type="submit" class="btn btn-sm btn-success shadow"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </div>
          </form>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection

@push('addjs')


@endpush
