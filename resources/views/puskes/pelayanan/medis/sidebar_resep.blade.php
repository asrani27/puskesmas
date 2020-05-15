<div class="col-md-4" style="padding-left: 15px; padding-top:15px; padding-right:15px;">
    <div class="card card-success card-outline">
      <div class="card-header">
        <h3 class="card-title">Detail</h3>
      </div>
      <form method="POST" action="{{route('resep2', ['id' => $data->id])}}">
        @csrf
      <div class="card-body">
        <div class="input-group row">
            <label class="col-sm-4 col-form-label text-right"><small>No Resep</small></label>
            <div class="col-sm-8">
              <input type="text" class="form-control form-control-sm" name="no_resep">
            </div>
        </div>
        <div class="input-group row">
            <label class="col-sm-4 col-form-label text-right"><small>Ruangan Tujuan</small></label>
            <div class="col-sm-8">
              <input type="text" class="form-control form-control-sm" name="ruangan_id" value="APOTEK">
            </div>
        </div>
        <div class="input-group row">
            <label class="col-sm-4 col-form-label text-right"><small>Tng. Medis 1</small><strong><span class="text-danger">*</span></strong></label>
            <div class="col-sm-8">
              <div class="form-group">
                <select class="form-control form-control-sm select2" style="width: 100%;" name="dokter_id" required>
                  @foreach ($dokter as $item)
                    @if($data->anamnesa->dokter_id == $item->id)
                    <option value="{{$item->id}}" selected>{{$item->nama}} / {{$item->nama_tenaga_medis}}</option>
                    @else
                    <option value="{{$item->id}}">{{$item->nama}} / {{$item->nama_tenaga_medis}}</option>
                    @endif
                  @endforeach
                </select>
              </div>
            </div>
        </div>
        <div class="input-group row">
            <label class="col-sm-4 col-form-label text-right"><small>Tng. Medis 2</small></label>
            <div class="col-sm-8">
              <div class="form-group">
                <select class="form-control form-control-sm select2" style="width: 100%;" name="perawat_id">
                  @if($data->anamnesa->perawat_id == null)
                  <option value=""></option>
                  @foreach ($perawat as $item)
                    <option value="{{$item->id}}">{{$item->nama}} / {{$item->nama_tenaga_medis}}</option>
                  @endforeach
                  @else
                  @foreach ($perawat as $item)
                    @if($data->anamnesa->perawat_id == $item->id)
                    <option value="{{$item->id}}" selected>{{$item->nama}} / {{$item->nama_tenaga_medis}}</option>
                    @else
                    <option value="{{$item->id}}">{{$item->nama}} / {{$item->nama_tenaga_medis}}</option>
                    @endif
                  @endforeach
                  @endif
                </select>
              </div>
            </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
</div>