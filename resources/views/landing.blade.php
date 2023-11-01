<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sona Template">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sona | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    {{-- <script script src="{{ url('/assets') }}/js/jquery.min.js"></script> --}}


    <!-- Css Styles -->
    @include('layouts_landing.css.style_css')
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Section Begin -->
    {{-- <div class="offcanvas-menu-overlay"></div>
    <div class="canvas-open">
        <i class="icon_menu"></i>
    </div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="icon_close"></i>
        </div>
        <div class="search-icon  search-switch">
            <i class="icon_search"></i>
        </div>
        <div class="header-configure-area">
            <div class="language-option">
                <img src="{{ url('/layouts_landing') }}/img/flag.jpg" alt="">
                <span>EN <i class="fa fa-angle-down"></i></span>
                <div class="flag-dropdown">
                    <ul>
                        <li><a href="#">Zi</a></li>
                        <li><a href="#">Fr</a></li>
                    </ul>
                </div>
            </div>
            <a href="#" class="bk-btn">Booking Now</a>
        </div>
        <nav class="mainmenu mobile-menu">
            <ul>
                <li class="active"><a href="./index.html">Home</a></li>
                <li><a href="./rooms.html">Rooms</a></li>
                <li><a href="./about-us.html">About Us</a></li>
                <li><a href="./pages.html">Pages</a>
                    <ul class="dropdown">
                        <li><a href="./room-details.html">Room Details</a></li>
                        <li><a href="#">Deluxe Room</a></li>
                        <li><a href="#">Family Room</a></li>
                        <li><a href="#">Premium Room</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">News</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="top-social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-tripadvisor"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
        <ul class="top-widget">
            <li><i class="fa fa-phone"></i> (12) 345 67890</li>
            <li><i class="fa fa-envelope"></i> info.colorlib@gmail.com</li>
        </ul>
    </div> --}}
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    @include('layouts_landing.header.v_header')
    <!-- Header End -->

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero-text">
                        <h1>Sona A Luxury Hotel</h1>
                        <p>Here are the best hotel booking sites, including recommendations for international
                            travel and for finding low-priced hotel rooms.</p>
                        <a href="#" class="primary-btn">Discover Now</a>
                    </div>
                </div>
                @if (empty(Auth::user()->name))
                @else
                    <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                        <div class="booking-form">
                            <h3>Booking Your Makeup</h3>
                            <form action="{{ url('/booking') }}" method="post">
                                @csrf
                                <div class="check-date">
                                    <label for="name_event">Type Event</label>
                                    <input type="text" class="name-input" id="name" name="name_event">
                                    <i class="fa fa-user"></i>
                                </div>
                                <div class="check-date">
                                    <label for="date-input">Tanggal Event:</label>
                                    <input type="text" class="date-input" id="date-input" name="date">
                                    <i class="icon_calendar"></i>
                                </div>

                                <div class="select-option">
                                    <label for="makeup">Makeup:</label>
                                    <select name="makeup" class="form-control makeup" id="makeup">
                                        <option value="">- Pilih -</option>
                                        @foreach ($makeup as $item)
                                            <option value="{{ $item['id'] }}">
                                                {{ $item['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="select-option">
                                    <label for="type_makeup">Type Makeup:</label>
                                    <select name="type_makeup" class="form-control type_makeup" id="type_makeup">
                                        <option value="">- Pilih type Makeup -</option>
                                    </select>
                                </div>
                                <div class="input-field">
                                    <label for="date-input">Tanggal Event:</label>
                                    <input type="time" id="time" name="time">
                                    <i class="fa fa-clock"></i>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="hero-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="{{ url('/layouts_landing') }}/img/hero/hero-1.jpg"></div>
            <div class="hs-item set-bg" data-setbg="{{ url('/layouts_landing') }}/img/hero/hero-2.jpg"></div>
            <div class="hs-item set-bg" data-setbg="{{ url('/layouts_landing') }}/img/hero/hero-3.jpg"></div>
        </div>
    </section>

    {{-- @include('layouts_landing.hero.v_hero') --}}
    <!-- Hero Section End -->

    <!-- About Us Section Begin -->
    @include('layouts_landing.about us.v_about_us')
    <!-- About Us Section End -->

    <!-- Services Section End -->
    @include('layouts_landing.services.v_services')
    <!-- Services Section End -->

    <!-- Home Room Section Begin -->
    @include('layouts_landing.home.v_home')
    <!-- Home Room Section End -->

    <!-- Testimonial Section Begin -->
    @include('layouts_landing.testimonial.v_testimonial')
    <!-- Testimonial Section End -->

    <!-- Blog Section Begin -->
    @include('layouts_landing.blog.v_blog')
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
    @include('layouts_landing.footer.v_footer')
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
    @include('layouts_landing.js.style_js')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script script src="{{ url('/assets') }}/js/jquery.min.js"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}


    @include('sweetalert::alert')

    <script type="text/javascript">
        $(document).ready(function() {
            $("#makeup").change(function() {
                let makeup = $("#makeup").val();
                $.ajax({
                    url: "{{ url('/LandingGetDataType') }}",
                    type: "GET",
                    data: {
                        makeup: makeup
                    },
                    success: function(res) {
                        $("#type_makeup").html(res);
                    },
                    error: function() {
                        alert('Gagal mengambil data detail makeup.');
                    }
                });
            });
        });
    </script>
</body>

</html>
