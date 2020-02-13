<ul class="navbar-nav">
    @foreach ($menu as $item)
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
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">{{$sub->nama}} </a>
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
    @endforeach
    {{-- <li class="nav-item dropdown">
      <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Dropdown</a>
      <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
        <li><a href="#" class="dropdown-item">Some action </a></li>
        <li><a href="#" class="dropdown-item">Some other action</a></li>
        <li class="dropdown-divider"></li>
        <!-- Level two dropdown-->
        <li class="dropdown-submenu dropdown-hover">
          <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Hover for action</a>
          <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
            <li>
              <a tabindex="-1" href="#" class="dropdown-item">level 2</a>
            </li>

            <!-- Level three dropdown-->
            <li class="dropdown-submenu">
              <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">level 2</a>
              <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                <li><a href="#" class="dropdown-item">3rd level</a></li>
                <li><a href="#" class="dropdown-item">3rd level</a></li>
              </ul>
            </li>
            <!-- End Level three -->

            <li><a href="#" class="dropdown-item">level 2</a></li>
            <li><a href="#" class="dropdown-item">level 2</a></li>
          </ul>
        </li>
        <!-- End Level two -->
      </ul>
    </li> --}}
  </ul>