@if($data->ruangan->id == 1)
{{-- Menu Untuk Poli Umum --}}
@include('puskes.pelayanan.medis.menu_umum')
@elseif($data->ruangan->id == 6)
{{-- Menu Untuk Poli GIGI --}}
@include('puskes.pelayanan.medis.menu_gigi')
@elseif($data->ruangan->id == 10)
{{-- Menu Untuk Poli ANAK --}}
@include('puskes.pelayanan.medis.menu_anak')
@elseif($data->ruangan->id == 29)
{{-- Menu Untuk Poli MTBS --}}
@include('puskes.pelayanan.medis.menu_mtbs')
@elseif($data->ruangan->id == 8)
{{-- Menu Untuk Poli KIA --}}
@include('puskes.pelayanan.medis.menu_kia')
@elseif($data->ruangan->id == 11)
{{-- Menu Untuk Poli KIA --}}
@include('puskes.pelayanan.medis.menu_tb')
@elseif($data->ruangan->id == 14)
{{-- Menu Untuk Poli KIA --}}
@include('puskes.pelayanan.medis.menu_pkpr')
@elseif($data->ruangan->id == 15)
{{-- Menu Untuk Poli KIA --}}
@include('puskes.pelayanan.medis.menu_umum')
@elseif($data->ruangan->id == 12)
{{-- Menu Untuk Poli KIA --}}
@include('puskes.pelayanan.medis.menu_gizi')
@elseif($data->ruangan->id == 4)
{{-- Menu Untuk Poli KIA --}}
@include('puskes.pelayanan.medis.menu_gizi')
@elseif($data->ruangan->id == 30)
{{-- Menu Untuk Poli KIA --}}
@include('puskes.pelayanan.medis.menu_imunisasi_bcg')
@endif