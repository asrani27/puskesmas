<ul class="nav nav-list">
    @foreach ($menu as $item)
    <li class="{{ (request()->is($item->url)) ? 'active' : '' }} hover">
        <a href="{{$item->url}}" class="{{count($item->submenu) == 0 ? '' : 'dropdown-toggle'}}">
            <i class="menu-icon fa {{$item->icon}}"></i>
            <span class="menu-text"> {{$item->nama}} </span>
            @if(count($item->submenu) == 0)
            @else
            <b class="arrow fa fa-angle-down"></b>
            @endif
        </a>

        <b class="arrow"></b>
        @if(count($item->submenu) == 0)

        @else
        <ul class="submenu">
            @foreach ($item->submenu as $sub)
            <li class="hover">
                <a href="{{$sub->url}}" class="{{count($sub->submenu) == 0 ? '' : 'dropdown-toggle'}}">
                    <i class="menu-icon fa fa-caret-right"></i>
                    
                    {{$sub->nama}}
                    
                    @if(count($sub->submenu) == 0)
                    @else
                    <b class="arrow fa fa-angle-down"></b>
                    @endif
                </a>

                <b class="arrow"></b>
                
                @if(count($sub->submenu) == 0)
                @else
                <ul class="submenu">
                    @foreach ($sub->submenu as $sub2)
                    <li class="hover">
                        <a href="{{$sub2->url}}">
                            <i class="menu-icon fa fa-leaf green"></i>
                            {{$sub2->nama}}
                        </a>

                        <b class="arrow"></b>
                    </li>
                    @endforeach
                </ul>
                @endif
            </li>
            @endforeach
        </ul>
        @endif
    </li>
    @endforeach
</ul>