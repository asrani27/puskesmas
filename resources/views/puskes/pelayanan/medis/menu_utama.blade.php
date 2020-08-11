<div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-8" style="padding-left:15px; padding-top:15px">
    <a href="/pelayanan/medis/proses/{{$data->id}}/anamnesa" class="btn bg-gradient-primary btn-sm {{$menuAkses->contains('anamnesa') == true ? 'visible' : 'invisible'}} ">Anamnesa</a>
        <a href="/pelayanan/medis/proses/{{$data->id}}/diagnosa" class="btn bg-gradient-primary btn-sm {{$menuAkses->contains('diagnosa') == true ? 'visible' : 'invisible'}} ">Diagnosa</a>
        <a href="/pelayanan/medis/proses/{{$data->id}}/resep" class="btn bg-gradient-primary btn-sm {{$menuAkses->contains('resep') == true ? 'visible' : 'invisible'}} ">Resep</a>
        <a href="/pelayanan/medis/proses/{{$data->id}}/odontogram" class="btn bg-gradient-primary btn-sm {{$menuAkses->contains('odontogram') == true ? 'visible' : 'invisible'}} ">Odontogram</a>
        <a href="/pelayanan/medis/proses/{{$data->id}}/laboratorium" class="btn bg-gradient-primary btn-sm {{$menuAkses->contains('laboratorium') == true ? 'visible' : 'invisible'}} ">Laboratorium</a>
        <a href="/pelayanan/medis/proses/{{$data->id}}/tindakan" class="btn bg-gradient-primary btn-sm {{$menuAkses->contains('tindakan') == true ? 'visible' : 'invisible'}} ">Tindakan</a>
        <a href="/pelayanan/medis/proses/{{$data->id}}/mtbs" class="btn bg-gradient-primary btn-sm {{$menuAkses->contains('mtbs') == true ? 'visible' : 'invisible'}} ">MTBS</a>
        <a href="/pelayanan/medis/proses/{{$data->id}}/imunisasi" class="btn bg-gradient-primary btn-sm {{$menuAkses->contains('imunisasi') == true ? 'visible' : 'invisible'}} ">Imunisasi</a>
        <a href="/pelayanan/medis/proses/{{$data->id}}/periksagizi" class="btn bg-gradient-primary btn-sm {{$menuAkses->contains('periksagizi') == true ? 'visible' : 'invisible'}} ">Periksa Gizi</a>
    </div>
</div>