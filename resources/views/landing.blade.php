<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Hotelier - Hotel HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ url('/landing') }}/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    @include('layouts_landing.lib.lib_style')

    {{-- css start --}}
    @include('layouts_landing.css.style_css')
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Header Start -->
        @include('layouts_landing.header.v_header')
        <!-- Header End -->


        <!-- Carousel Start -->
        @include('layouts_landing.carousel.v_carousel')
        <!-- Carousel End -->


        <!-- Booking Start -->
        @include('layouts_landing.booking.v_booking')
        <!-- Booking End -->


        <!-- About Start -->
        @include('layouts_landing.about.v_about')
        <!-- About End -->


        <!-- Room Start -->
        @include('layouts_landing.room.v_room')
        <!-- Room End -->


        <!-- Video Start -->
        @include('layouts_landing.video.v_video')
        <!-- Video End -->


        <!-- Service Start -->
        @include('layouts_landing.service.v_service')
        <!-- Service End -->


        <!-- Testimonial Start -->
        @include('layouts_landing.testimonial.v_testimonial')
        <!-- Testimonial End -->


        <!-- Team Start -->
        @include('layouts_landing.team.v_team')
        <!-- Team End -->


        <!-- Newsletter Start -->
        @include('layouts_landing.news.v_news')
        <!-- Newsletter Start -->


        <!-- Footer Start -->
        @include('layouts_landing.footer.v_footer')
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    @include('layouts_landing.js.style_js')
    @include('sweetalert::alert')
</body>

</html>
