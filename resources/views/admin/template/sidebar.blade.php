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
                        <h3>Payment</h3>
                    </li>
                    <a class="side-menu__item {{ Request::is('admin/payment_history*') ? 'active' : '' }}"
                        data-bs-toggle="slide" href="{{ url('/admin/payment_history') }}">
                        <i class="side-menu__icon fa fa-money"></i><span class="side-menu__label">Payment History</span></a>
                    <li class="sub-category">
                        <h3>Monitoring</h3>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item {{ Request::segment(2) == 'monitoring_makeup' || Request::segment(2) == 'monitoring_produk' ? 'active' : '' }}"
                            data-bs-toggle="slide" href="javascript:void(0);">
                            <i class="side-menu__icon fe fe-server"></i>
                            <span class="side-menu__label">Monitoring</span>
                            <i class="angle fa fa-angle-right"></i>
                        </a>
                        <ul class="slide-menu"
                            style="{{ Request::segment(2) == 'monitoring_makeup' || Request::segment(2) == 'monitoring_produk' ? 'display: block;' : 'display: none;' }}">
                            <li class="side-menu-label1"><a href="javascript:void(0)">Monitoring</a></li>
                            <li>
                                <a href="{{ url('/admin/monitoring_makeup') }}"
                                    class="slide-item {{ Request::segment(2) == 'monitoring_makeup' ? 'active' : '' }}">
                                    Monitoring Makeup
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/monitoring_produk') }}"
                                    class="slide-item {{ Request::segment(2) == 'monitoring_produk' ? 'active' : '' }}">
                                    Monitoring Produk
                                </a>
                            </li>
                        </ul>
                    </li>
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
                    <a class="side-menu__item {{ Request::is('mua/booking*') ? 'active' : '' }}" data-bs-toggle="slide"
                        href="{{ url('/mua/booking') }}">
                        <i class="side-menu__icon fe fe-book"></i><span class="side-menu__label">Make Up
                            Booking</span></a>
                    <li class="sub-category">
                        <h3>Master Data</h3>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item {{ Request::segment(2) == 'master' && (Request::segment(3) == 'type_makeup' || Request::segment(3) == 'makeup') ? 'active' : '' }}"
                            data-bs-toggle="slide" href="javascript:void(0);">
                            <i class="side-menu__icon fa fa-database"></i><span class="side-menu__label">Master
                                Data</span><i class="angle fa fa-angle-right"></i>
                        </a>
                        <ul class="slide-menu"
                            style="{{ in_array(Request::segment(3), ['type_makeup', 'makeup']) ? 'display: block;' : 'display: none;' }}">
                            <li class="side-menu-label1"><a href="javascript:void(0)">Pages</a></li>
                            <li>
                                <a href="{{ url('/mua/master/makeup') }}"
                                    class="slide-item {{ Request::segment(3) == 'makeup' ? 'active' : '' }}">
                                    Make Up
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/mua/master/type_makeup') }}"
                                    class="slide-item {{ Request::segment(3) == 'type_makeup' ? 'active' : '' }}">
                                    Type Make Up
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                @can('client')
                    <li class="sub-category">
                        <h3>List Booking</h3>
                    </li>
                    <a class="side-menu__item {{ Request::is('client/booking*') ? 'active' : '' }}"
                        data-bs-toggle="slide" href="{{ url('client/booking') }}">
                        <i class="side-menu__icon fe fe-book"></i><span class="side-menu__label">Booking</span>
                    </a>
                @endcan
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </aside>
</div>
