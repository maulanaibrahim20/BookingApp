<header class="header-area">
    <!-- Navbar Area -->
    <div class="palatin-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="palatinNav">

                    <!-- Nav brand -->
                    <a href="index.html" class="nav-brand"><img
                            src="{{ url('/layouts_landing') }}/img/core-img/gaweayu1.png" alt=""
                            style="width: 250px; height: 55px;"></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- close btn -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li class="active"><a href="index.html">Home</a></li>
                                <li><a href="about-us.html">About Us</a></li>
                                {{-- <li><a href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="about-us.html">About Us</a></li>
                                        <li><a href="services.html">Services</a></li>
                                        <li><a href="rooms.html">Rooms</a></li>
                                        <li><a href="blog.html">News</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                        <li><a href="elements.html">Elements</a></li>
                                    </ul>
                                </li> --}}
                                <li><a href="services.html">Services</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>

                            <!-- Button -->
                            <div class="menu-btn">
                                @if (Auth::check() && Auth::user()->role_id == 3)
                                    <button type="button" class="btn palatin-btn" data-toggle="modal"
                                        data-target="#exampleModal"><span class="fa fa-book">Book Now</span>
                                    </button>
                                @endif
                            </div>
                            <div class="menu-btn">
                                @if (empty(Auth::user()->name))
                                    <a href="{{ url('/login') }}" class="btn palatin-btn fa fa-sign-in">Login</a>
                                @else
                                    <a href="{{ url('/login') }}" class="btn palatin-btn fa fa-sign-in">Dashboard</a>
                                @endif
                            </div>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
