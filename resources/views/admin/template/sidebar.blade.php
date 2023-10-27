<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="index.html">
                <img src="{{ url('/assets') }}/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
                <img src="{{ url('/assets') }}/images/brand/logo-1.png" class="header-brand-img toggle-logo"
                    alt="logo">
                <img src="{{ url('/assets') }}/images/brand/logo-2.png" class="header-brand-img light-logo"
                    alt="logo">
                <img src="{{ url('/assets') }}/images/brand/logo-3.png" class="header-brand-img light-logo1"
                    alt="logo">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3>Main</h3>
                </li>
                @if (Auth::user()->role_id == 1)
                    <a class="side-menu__item {{ Request::segment(2) == 'dashboard' ? 'active' : '' }}"
                        data-bs-toggle="slide" href="{{ url('/admin/dashboard') }}">
                    @elseif(Auth::user()->role_id == 2)
                        <a class="side-menu__item {{ Request::segment(2) == 'dashboard' ? 'active' : '' }}"
                            data-bs-toggle="slide" href="{{ url('/mua/dashboard') }}">
                        @elseif(Auth::user()->role_id == 3)
                            <a class="side-menu__item {{ Request::segment(2) == 'dashboard' ? 'active' : '' }}"
                                data-bs-toggle="slide" href="{{ url('/') }}">
                @endif
                <i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a>


                @can('admin')
                    <li class="sub-category">
                        <h3>Pages</h3>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item {{ Request::segment(3) == 'mua' || Request::segment(3) == 'client' ? 'active' : '' }}"
                            data-bs-toggle="slide" href="javascript:void(0;">
                            <i class="side-menu__icon ti ti-user"></i><span class="side-menu__label">Daftar Akun</span><i
                                class="angle fa fa-angle-right"></i>
                        </a>
                        <ul class="slide-menu"
                            style="{{ Request::segment(2) == 'reg' && (Request::segment(3) == 'mua' || Request::segment(3) == 'client') ? 'display: block;' : 'display: none;' }}">
                            <li class="side-menu-label1"><a href="javascript:void(0)">Pages</a></li>
                            <li><a href="{{ url('/admin/reg/mua') }}"
                                    class="slide-item {{ Request::segment(3) == 'mua' ? 'active' : '' }}"> MUA</a></li>
                            <li><a href="{{ url('/admin/reg/client') }}"
                                    class="slide-item {{ Request::segment(3) == 'client' ? 'active' : '' }}"> Client</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sub-category">
                        <h3>Master Data</h3>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item {{ Request::segment(2) == 'master' && Request::segment(3) == 'data_produk' ? 'active' : '' }}"
                            data-bs-toggle="slide" href="javascript:void(0;">
                            <i class="side-menu__icon fa fa-database"></i><span class="side-menu__label">Master
                                Data</span><i class="angle fa fa-angle-right"></i>
                        </a>
                        <ul class="slide-menu"
                            style="{{ Request::segment(3) == 'data_produk' ? 'display: block;' : 'display: none;' }}">
                            <li class="side-menu-label1"><a href="javascript:void(0)">Pages</a></li>
                            <li>
                                <a href="{{ url('/admin/master/data_produk') }}"
                                    class="slide-item {{ Request::segment(3) == 'data_produk' ? 'active' : '' }}"> Master
                                    Data Produk</a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('mua')
                    <li class="sub-category">
                        <h3>Main</h3>
                    </li>
                    <a class="side-menu__item {{ Request::is('mua/makeup*') ? 'active' : '' }}" data-bs-toggle="slide"
                        href="{{ url('/mua/makeup') }}">
                        <i class="side-menu__icon fe fe-feather"></i><span class="side-menu__label">Make Up
                            Kategori</span></a>
                    <li class="sub-category">
                        <h3>Master Data</h3>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item {{ Request::segment(2) == 'master' && Request::segment(3) == 'type_makeup' ? 'active' : '' }}"
                            data-bs-toggle="slide" href="javascript:void(0;">
                            <i class="side-menu__icon fa fa-database"></i><span class="side-menu__label">Master
                                Data</span><i class="angle fa fa-angle-right"></i>
                        </a>
                        <ul class="slide-menu"
                            style="{{ Request::segment(3) == 'type_makeup' ? 'display: block;' : 'display: none;' }}">
                            <li class="side-menu-label1"><a href="javascript:void(0)">Pages</a></li>
                            <li>
                                <a href="{{ url('/mua/master/type_makeup') }}"
                                    class="slide-item {{ Request::segment(3) == 'type_makeup' ? 'active' : '' }}"> Master
                                    Type Make Up</a>
                            </li>
                        </ul>
                    </li>
                @endcan
                @can('client')
                    <li class="sub-category">
                        <h3>Main</h3>
                    </li>
                    <a class="side-menu__item {{ Request::is('/client/makeup*') ? 'active' : '' }}" data-bs-toggle="slide"
                        href="{{ url('/client/makeup') }}">
                        <i class="side-menu__icon fe fe-feather"></i><span class="side-menu__label">Make Up
                            Kategori</span></a>
                    <li class="sub-category">
                        <h3>Master Data</h3>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item {{ Request::segment(2) == 'master' && Request::segment(3) == 'type_makeup' ? 'active' : '' }}"
                            data-bs-toggle="slide" href="javascript:void(0;">
                            <i class="side-menu__icon fa fa-database"></i><span class="side-menu__label">Master
                                Data</span><i class="angle fa fa-angle-right"></i>
                        </a>
                        <ul class="slide-menu"
                            style="{{ Request::segment(3) == 'type_makeup' ? 'display: block;' : 'display: none;' }}">
                            <li class="side-menu-label1"><a href="javascript:void(0)">Pages</a></li>
                            <li>
                                <a href="{{ url('/mua/master/type_makeup') }}"
                                    class="slide-item {{ Request::segment(3) == 'type_makeup' ? 'active' : '' }}"> Master
                                    Type Make Up</a>
                            </li>
                        </ul>
                    </li>
                @endcan
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </aside>
</div>
