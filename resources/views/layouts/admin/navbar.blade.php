
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-sm shadow navbar-dark navbar-lightblue ">
    <a href="/home" class="navbar-brand">
      <img src="/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><strong>Puskesmas</strong></span>
    </a>
    
    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      <!-- Left navbar links -->
      @include('layouts.admin.menu_puskes')
    </div>

    <!-- Right navbar links -->
    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" href="#">
            <button class="btn btn-default btn-xs"><strong> <i class="fas fa-user"></i> &nbsp; {{strtoupper(Auth::user()->name)}} </strong></button>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/download_panduan">
            <button class="btn btn-default btn-xs"><strong> <i class="fas fa-book"></i>  DOWNLOAD PANDUAN </strong></button>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/logout" onclick="return confirm('Apakah anda yakin ingin Keluar?');">
            <button class="btn btn-default btn-xs"><strong> <i class="fas fa-power-off"></i>  </strong></button>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fas fa-th-large"></i></a>
      </li> --}}
    </ul>
</nav>
<!-- /.navbar -->