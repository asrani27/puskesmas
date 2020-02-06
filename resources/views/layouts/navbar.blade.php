<div id="navbar" class="navbar navbar-default    navbar-collapse       h-navbar ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <div class="navbar-header pull-left">
            <a href="{{route('home')}}" class="navbar-brand">
                <small>
                    <i class="fa fa-plus"></i>
                    E-Puskesmas
                </small>
            </a>

            <button class="pull-right navbar-toggle navbar-toggle-img collapsed" type="button" data-toggle="collapse" data-target=".navbar-buttons,.navbar-menu">
                <span class="sr-only">Toggle user menu</span>

                <img src="/assets/assets/images/avatars/user.jpg" alt="Jason's Photo" />
            </button>

            <button class="pull-right navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#sidebar">
                <span class="sr-only">Toggle sidebar</span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>
            </button>
        </div>

        @if(Auth::user() == null)
        
        @else
        <div class="navbar-buttons navbar-header pull-right  collapse navbar-collapse" role="navigation">
            <ul class="nav ace-nav">
                <li class="purple dropdown-modal">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <b>
                                @if(Auth::user()->hasRole('superadmin'))
                                Superadmin
                                @else
                                Puskes : {{Auth::user()->puskes->first()->nama}}
                                @endif
                        </b>
                    </a>
                </li>
                <li class="light-blue dropdown-modal user-min">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="/assets/assets/images/avatars/user.jpg" alt="Jason's Photo" />
                        <span class="user-info">
                            <small>Selamat Datang,</small>
                            {{Auth::user()->name}}
                        </span>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>
                            <a href="/profile">
                                <i class="ace-icon fa fa-user"></i>
                                Profile
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="/logout">
                                <i class="ace-icon fa fa-power-off"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        @endif
        <nav role="navigation" class="navbar-menu pull-left collapse navbar-collapse">
        
			@if(Auth::user() == null)
				
			@else	
			    @if(Auth::user()->hasRole('superadmin'))		
                {{-- <ul class="nav navbar-nav">
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Pengaturan
                            <i class="ace-icon fa fa-angle-down bigger-110"></i>
                        </a>
    
                        <ul class="dropdown-menu dropdown-light-blue dropdown-caret">
                            <li>
                                <a href="#">
                                    <i class="ace-icon fa fa-eye bigger-110 blue"></i>
                                    Menu & Sub Menu
                                </a>
                            </li>
    
                            <li>
                                <a href="#">
                                    <i class="ace-icon fa fa-user bigger-110 blue"></i>
                                    Pengguna
                                </a>
                            </li>
    
                            <li>
                                <a href="#">
                                    <i class="ace-icon fa fa-cog bigger-110 blue"></i>
                                    Settings
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul> --}}
                @else
                
                @endif
			@endif
            
        </nav>
    </div>
</div>