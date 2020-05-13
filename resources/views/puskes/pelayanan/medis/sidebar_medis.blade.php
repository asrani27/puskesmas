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
          <button class="btn btn-default btn-block" style="font-size:12px;"><span class="fa fa-book"></span> PEKAUMAN <br> {{$rw->tanggal}} / {{$rw->pelayanan == null ? '' : $rw->pelayanan->ruangan->nama}}</button>
        @endforeach
      </div>
      <!-- /.card-body -->
    </div>
</div>
