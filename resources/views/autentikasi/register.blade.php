<!DOCTYPE html>
<html lang="en">

<head>
    <title>Booking App</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ url('/autentikasi') }}/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('/autentikasi') }}/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ url('/autentikasi') }}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('/autentikasi') }}/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('/autentikasi') }}/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('/autentikasi') }}/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('/autentikasi') }}/css/util.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/autentikasi') }}/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <a href="{{ url('/login') }}" class="back-button">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ url('/autentikasi') }}/images/img-01.png" alt="IMG">
                </div>
                <form class="login100-form validate-form" method="post" action="{{ url('/register') }}">
                    @csrf
                    <span class="login100-form-title">
                        Register
                    </span>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="name" placeholder="Nama">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="email" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="alamat" placeholder="Alamat">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="number" name="no_telp" placeholder="Nomor Telepon">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="pekerjaan" placeholder="Pekerjaan">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-book" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Register
                        </button>
                    </div>
                    <div class="text-center p-t-12">
                        <span class="txt1">
                            Booking
                        </span>
                        <span class="txt2">
                            App
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="{{ url('/autentikasi') }}/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{ url('/autentikasi') }}/vendor/bootstrap/js/popper.js"></script>
    <script src="{{ url('/autentikasi') }}/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{ url('/autentikasi') }}/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{ url('/autentikasi') }}/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="{{ url('/autentikasi') }}/js/main.js"></script>
    @include('sweetalert::alert')


</body>

</html>
