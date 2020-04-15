<div class="card card-info card-outline">
    <div class="card-header">
      <h3 class="card-title">PEMBERIAN IMUNISASI & PEMERIKSAAN KESEHATAN ANAKK</h3>
    </div>
    <form method="POST" action="{{route('updateImunisasiAnak', ['id' => $data->id, 'imunisasi_id' => $checkImun->id])}}">
      @csrf
    <div class="row">
      <div class="col-md-6">
          <div class="card-body">
          <div class="input-group row">
              <label class="col-sm-3 col-form-label text-right"><small>Tanggal</small></label>
              <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" name="umur_bulan" readonly value="{{\Carbon\Carbon::parse($checkImun->tanggal)->format('d-m-Y h:i:s')}}">
              </div>
          </div>
          <div class="input-group row">
              <label class="col-sm-3 col-form-label text-right"><small>Umur Bulan</small></label>
              <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" id="datepicker" name="umur_bulan" readonly value="{{$checkImun->umur_bulan}}">
              </div>
          </div>
          </div>
      </div>
      <div class="col-md-6">
          <div class="card-body">
            <div class="input-group row">
                <label class="col-sm-3 col-form-label text-right"><small>Dokter</small></label>
                <div class="col-sm-9">
                    <select class="form-control select2 form-control-sm" id="dokter_id" name="dokter_id">
                        <option value="">-Pilih-</option>
                        @foreach ($dokter as $item)
                            @if($checkImun->dokter_id == $item->id)
                            <option value="{{$item->id}}" selected>{{$item->nama}} / {{$item->nama_tenaga_medis}}</option>
                            @else
                            <option value="{{$item->id}}">{{$item->nama}} / {{$item->nama_tenaga_medis}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="input-group row">
                <label class="col-sm-3 col-form-label text-right"><small>Perawat</small></label>
                <div class="col-sm-9">
                    <select class="form-control select2 form-control-sm" id="perawat_id" name="perawat_id">
                        <option value="">-Pilih-</option>
                        @foreach ($perawat as $item)
                            @if($checkImun->perawat_id == $item->id)
                            <option value="{{$item->id}}" selected>{{$item->nama}} / {{$item->nama_tenaga_medis}}</option>
                            @else
                            <option value="{{$item->id}}">{{$item->nama}} / {{$item->nama_tenaga_medis}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
          </div>
      </div>   
    </div>
    <div class="row">
      <div class="col-md-12">
          <div class="card-body  table-responsive">
            <strong>DATA IMUNISASI</strong><br/>
          <table class="table table-bordered table-sm" width="100%">
              @foreach ($imun as $item)
              <tr>
                  @foreach ($item as $value)
                    @if($checkImun->imunisasidetail->first() == null)
                        <td><input type="checkbox" name="data_imun[]" value="{{$value->imunisasi_kode}}"> {{$value->imunisasi_nama}}</td>
                    @else
                        <td><input type="checkbox" name="data_imun[]" value="{{$value->imunisasi_kode}}" {{$checkImun->imunisasidetail->where('imunisasi_kode', $value->imunisasi_kode)->first() == null ? '' : 'checked'}}> {{$value->imunisasi_nama}}</td>
                    @endif
                  @endforeach
              </tr>
              @endforeach
          </table>
          </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
          <div class="card-body">
            <strong>PEMERIKSAAN KESEHATAN ANAK</strong><br/>
            <small>Note : Harap Isi anamnesa dan diagnosa terlebih dahulu</small>
            <div class="input-group row">
                <label class="col-sm-3 col-form-label text-right"><small>Berat Badan</small></label>
                <div class="col-sm-9">
                <input type="text" class="form-control form-control-sm" name="bb" readonly value="{{$checkImun->bb}}">
                </div>
            </div>
            <div class="input-group row">
                <label class="col-sm-3 col-form-label text-right"><small>Panjang Badan</small></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control form-control-sm" name="pb" readonly value="{{$checkImun->pb}}">
                </div>
            </div>
            <div class="input-group row">
                <label class="col-sm-3 col-form-label text-right"><small>Gejala</small></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control form-control-sm" name="gejala" readonly value="{{$checkImun->gejala}}">
                </div>
            </div>
            <div class="input-group row">
                <label class="col-sm-3 col-form-label text-right"><small>Diagnosa</small></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control form-control-sm" name="diagnosa" readonly value="{{$checkImun->diagnosa}}">
                </div>
            </div>
            <div class="input-group row">
                <label class="col-sm-3 col-form-label text-right"><small>Keterangan</small></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control form-control-sm" name="keterangan" readonly value="BARU"  value="{{$checkImun->keterangan}}">
                </div>
            </div>
          </div>
      </div>
      <div class="col-md-6">
          <div class="card-body">
            <strong></strong><br/>
            <div class="input-group row">
                <label class="col-sm-3 col-form-label text-right"><small>Kepandaian</small></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control form-control-sm" name="kepandaian"  value="{{$checkImun->kepandaian}}">
                </div>
            </div>
            <div class="input-group row">
                <label class="col-sm-3 col-form-label text-right"><small>Makanan Anak</small></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control form-control-sm" name="makanan" value="{{$checkImun->makanan}}">
                </div>
            </div>
            <div class="input-group row">
                <label class="col-sm-3 col-form-label text-right"><small>Pengobatan</small></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control form-control-sm" name="pengobatan" value="{{$checkImun->pengobatan}}">
                </div>
            </div>
            <div class="input-group row">
                <label class="col-sm-3 col-form-label text-right"><small>Nasihat</small></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control form-control-sm" name="nasehat" value="{{$checkImun->nasehat}}">
                </div>
            </div>
          </div>
      </div>
    </div>
    <div class="card-footer">
        <div class="text-right">
            <button type="submit" class="btn btn-sm btn-primary">Update</a>
        </div>
    </div>
    </form>
</div>