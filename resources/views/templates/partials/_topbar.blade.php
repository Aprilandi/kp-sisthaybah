<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header border-right">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            <a class="navbar-brand" href="{{ route('admin.index') }}">
                <!-- Logo icon -->
                <b class="logo-icon">
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <img src="{{ asset('assets/images/logos/thaybah.png') }}" alt="homepage" class="dark-logo" width="50px" />
                    <!-- Light Logo icon -->
                    <h4 class="dark-logo"><b>SIST</b>haybah.id</h4>
                    {{-- <img src="{{ asset('assets/images/logos/logo-light-icon.png') }}" alt="homepage" class="light-logo" /> --}}
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                {{-- <span class="logo-text">
                     <!-- dark Logo text -->
                     <img src="{{ asset('assets/images/logos/thaybah-icon.png') }}" alt="homepage" class="dark-logo" />
                     <!-- Light Logo text -->    
                     <img src="{{ asset('assets/images/logos/logo-light-text.png') }}" class="light-logo" alt="homepage" />
                </span> --}}
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-left mr-auto">

            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-right">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('assets/images/users/1.jpg') }}" alt="user" class="rounded-circle" width="36">
                        <span class="ml-2 font-medium">{{Auth::user()->username}}</span><span class="fas fa-angle-down ml-2"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                        <div class="d-flex no-block align-items-center p-3 mb-2 border-bottom">
                            <div class=""><img src="{{ asset('assets/images/users/1.jpg') }}" alt="user" class="rounded" width="80"></div>
                            <div class="ml-2">

                                <h4 class="mb-0">{{Auth::user()->username}}</h4>

                                <p class=" mb-0 text-muted">{{Auth::user()->email}}</p>
                                <a href="javascript:void(0)" class="btn btn-sm btn-danger text-white mt-2 btn-rounded">View Profile</a>
                            </div>
                        </div>
                        <a class="dropdown-item" href="{{ route('profil/index') }}"><i class="ti-user mr-1 ml-1"></i> My Profile</a>
                        <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet mr-1 ml-1"></i> My Balance</a>
                        <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email mr-1 ml-1"></i> Inbox</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings mr-1 ml-1"></i> Account Setting</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                        document.getElementById('formLogout').submit();">
                            <i class="fa fa-power-off mr-1 ml-1"></i> Logout
                        </a>
                    </div>
                </li>

                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
            </ul>
        </div>
    </nav>
</header>