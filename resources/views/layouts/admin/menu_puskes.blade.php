<ul class="navbar-nav">
  {{-- @foreach ($menu as $item)
  <li class="nav-item {{count($item->submenu) == 0 ? '' : 'dropdown'}}">

    @if(count($item->submenu) == 0)
    <a href="/{{$item->url}}" class="nav-link">{{$item->nama}}</a>
    @else
    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle">{{$item->nama}}</a>

    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
      @foreach ($item->submenu as $sub)
      @if(count($sub->submenu) == 0)
      <li><a href="/{{$sub->url}}" class="dropdown-item">{{$sub->nama}} </a></li>
      @else
      <li class="dropdown-submenu dropdown-hover">
        <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false" class="dropdown-item dropdown-toggle">{{$sub->nama}} </a>
        <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
          @foreach ($sub->submenu as $sub2)
          <li><a href="/{{$sub2->url}}" class="dropdown-item">{{$sub2->nama}}</a></li>
          @endforeach
        </ul>
      </li>
      @endif
      @endforeach
    </ul>
    @endif

  </li>
  @endforeach --}}
  <li class="nav-item dropdown">
    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
      class="nav-link dropdown-toggle">Pendaftaran</a>
    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
      <li><a href="/pendaftaran/pasien" class="dropdown-item">Pasien</a></li>
      <li><a href="/pendaftaran" class="dropdown-item">Pendaftaran</a></li>
      <li><a href="/rekam_medis" class="dropdown-item">Rekam Medis</a></li>
    </ul>
  </li>
  <li class="nav-item dropdown">
    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
      class="nav-link dropdown-toggle">Pelayanan</a>
    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
      <li><a href="{{url('/pelayanan/medis')}}" class="dropdown-item">Medis </a></li>
      <li><a href="/pelayanan/apotek" class="dropdown-item">Layanan Resep </a></li>
      {{-- <li><a href="#" class="dropdown-item">Laboratorium </a></li> --}}
    </ul>
  </li>
  <li class="nav-item dropdown">
    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
      class="nav-link dropdown-toggle">Laporan</a>
    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
      <li><a href="/laporankunjunganpasien" class="dropdown-item">Kunjungan Pasien </a></li>
      <li><a href="/laporanpelayananpasien" class="dropdown-item">Pelayanan Pasien </a></li>
      <li><a href="/laporanpemeriksaanmedis" class="dropdown-item">Pemeriksaan Medis </a></li>
      <li><a href="/laporanpelayananresep" class="dropdown-item">Pelayanan Resep </a></li>
      <li><a href="/laporanpengeluaranobat" class="dropdown-item">Pengeluaran Obat </a></li>
      {{-- <li><a href="#" class="dropdown-item">Pelayanan Laboratorium </a></li> --}}
      {{-- <li><a href="/laporanpelayananpasien" class="dropdown-item">Pelayanan Pasien </a></li>
      <li><a href="/laporankinerjapuskesmas" class="dropdown-item">Kinerja Puskesmas </a></li> --}}
      <li><a href="/laporansp3lb1" class="dropdown-item">SP3 LB1 </a></li>
      <li><a href="/laporansp3lb2" class="dropdown-item">SP3 LB2 </a></li>
      <li><a href="/laporansp3lb3" class="dropdown-item">SP3 LB3 </a></li>
      <li><a href="/laporansp3lb4" class="dropdown-item">SP3 LB4 </a></li>
      {{-- <li><a href="/generatekode" class="dropdown-item">generate kode </a></li>
      <li><a href="/tarikgambar" class="dropdown-item">tarik gambar dan simpan </a></li> --}}
    </ul>
  </li>
  <li class="nav-item dropdown">
    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
      class="nav-link dropdown-toggle">Pengaturan</a>
    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
      @if(Auth::user()->id == 'admin')
      <li><a href="/pengaturan/data_master" class="dropdown-item">Data Master</a></li>
      <li><a href="/pengaturan/data_master/editprofile" class="dropdown-item">Edit Profile</a></li>
      <li><a href="/pengaturan/akun_bpjs" class="dropdown-item">Akun BPJS</a></li>
      @else
      <li><a href="/pengaturan/data_master/user" class="dropdown-item">Ganti Password</a></li>
      @endif
    </ul>
  </li>
</ul>