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
@elseif($data->ruangan->id == 2)
{{-- Menu Untuk Poli KIA --}}
@include('puskes.pelayanan.medis.menu_ugd')
@elseif($data->ruangan->id == 3)
{{-- Menu Untuk Poli KIA --}}
@include('puskes.pelayanan.medis.menu_ugd')
@elseif($data->ruangan->id == 9)
{{-- Menu Untuk Poli KIA --}}
@include('puskes.pelayanan.medis.menu_ugd')
@elseif($data->ruangan->id == 39)
{{-- Menu Untuk Poli PUSTU --}}
@include('puskes.pelayanan.medis.menu_umum')
@elseif($data->ruangan->id == 40)
{{-- Menu Untuk Poli PUSTU --}}
@include('puskes.pelayanan.medis.menu_umum')
@elseif($data->ruangan->id == 41)
{{-- Menu Untuk Poli PUSTU --}}
@include('puskes.pelayanan.medis.menu_umum')
@elseif($data->ruangan->id == 42)
{{-- Menu Untuk Poli PUSTU --}}
@include('puskes.pelayanan.medis.menu_umum')
@elseif($data->ruangan->id == 43)
{{-- Menu Untuk Poli PUSTU --}}
@include('puskes.pelayanan.medis.menu_umum')
@endif