<div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-8" style="padding-left:15px; padding-top:15px">
        @if($menuAkses->contains('anamnesa') == true)
            <a href="/pelayanan/medis/proses/{{$data->id}}/anamnesa" class="btn bg-gradient-primary btn-sm">Anamnesa</a>
        @endif
        @if($menuAkses->contains('diagnosa') == true)
            <a href="/pelayanan/medis/proses/{{$data->id}}/diagnosa" class="btn bg-gradient-primary btn-sm">Diagnosa</a>
        @endif
        @if($menuAkses->contains('resep') == true)
            <a href="/pelayanan/medis/proses/{{$data->id}}/resep" class="btn bg-gradient-primary btn-sm">Resep</a>
        @endif
        @if($menuAkses->contains('odontogram') == true)
            <a href="/pelayanan/medis/proses/{{$data->id}}/odontogram" class="btn bg-gradient-primary btn-sm">Odontogram</a>
        @endif
        @if($menuAkses->contains('laboratorium') == true)
            <a href="/pelayanan/medis/proses/{{$data->id}}/laboratorium" class="btn bg-gradient-primary btn-sm">Laboratorium</a>
        @endif
        @if($menuAkses->contains('tindakan') == true)
            <a href="/pelayanan/medis/proses/{{$data->id}}/tindakan" class="btn bg-gradient-primary btn-sm">Tindakan</a>
        @endif
        @if($menuAkses->contains('mtbs') == true)
            <a href="/pelayanan/medis/proses/{{$data->id}}/mtbs" class="btn bg-gradient-primary btn-sm">Mtbs</a>
        @endif
        @if($menuAkses->contains('imunisasi') == true)
            <a href="/pelayanan/medis/proses/{{$data->id}}/imunisasi" class="btn bg-gradient-primary btn-sm">Imunisasi</a>
        @endif
        @if($menuAkses->contains('periksagizi') == true)
            <a href="/pelayanan/medis/proses/{{$data->id}}/periksagizi" class="btn bg-gradient-primary btn-sm">Periksa Gizi</a>
        @endif
      
    </div>
</div>