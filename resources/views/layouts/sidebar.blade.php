<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="/" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/logo-dark-sm.png') }}" alt="" height="45">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/logo-dark.png') }}" alt="" height="60">
            </span>
        </a>

        <a href="/" class="logo logo-light">
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/logo-light.png') }}" alt="" height="60">
            </span>
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/logo-light-sm.png') }}" alt="" height="45">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn">
        <i class="bx bx-menu align-middle"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->

                <ul class="metismenu list-unstyled" id="side-menu">
                    @auth()
                    <li class="menu-title" data-key="t-menu">Dashboard</li>

                    <li>
                        <a href="{{ route('dashboard') }}">
                            <i class="bx bx-home-alt icon nav-icon"></i>
                            <span class="menu-item" data-key="t-dashboard">Dashboard</span>
                        </a>
                    </li>
                    @endauth
                    @guest()
                        <li class="menu-title" data-key="t-applications">Tamu</li>

                        <li>
                            <a href="{{ route('bukutamu') }}">
                                <i class="bx bx-file-find icon nav-icon"></i>
                                <span class="menu-item" data-key="t-filemanager">Buku Tamu</span>
                            </a>
                        </li>
                        <li class="menu-title" data-key="t-applications">Departement</li>
                        <li>
                            <a href="{{ route('department') }}">
                                <i class="fas fa-building icon nav-icon"></i>
                                <span class="menu-item" data-key="t-filemanager">Departement</span>
                            </a>
                        </li>
                    @endguest
                    @auth()
                        <li class="menu-title" data-key="t-applications">Admin</li>

                        <li>
                            <a href="{{ route('datatamu') }}">
                                <i class="bx bx-file-find icon nav-icon"></i>
                                <span class="menu-item" data-key="t-filemanager">Data Buku Tamu</span>
                            </a>
                        </li>

                    </ul>
                @endauth
            </div>
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->
