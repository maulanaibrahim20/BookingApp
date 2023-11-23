<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="{{ url('/booking') }}/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet"
        media="all">
    <link href="{{ url('/booking') }}/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{ url('/booking') }}/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="{{ url('/booking') }}/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ url('/booking') }}/css/main.css" rel="stylesheet" media="all">
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Detail Booking</h2>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Nama Event</label>
                                <input class="input--style-4" type="text" value="{{ $booking->name }}"
                                    name="name"">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Nama Makeup</label>
                                <input class="input--style-4" type="hidden" name="makeup"
                                    value="{{ $booking->getMakeup->id }}">
                                <input class="input--style-4" type="text" value="{{ $booking->getMakeup->name }}"
                                    readonly>
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <label class="label">Deskripsi Makeup</label>
                        <input class="input--style-4" type="text" name="description"
                            value="{{ $booking->getMakeup->description }}" readonly>
                    </div>
                    <div class="row row-space">
                        <div class="col-1">
                            <div class="input-group">
                                <label class="label">Harga</label>
                                <input class="input--style-4" type="text" name="price"
                                    value="Rp.{{ number_format($booking->getMakeup->price, 0, ',', '.') }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="rs-select2 js-select-simple select--no-search">
                            <div class="input-group">
                                <label class="label">Type Makeup</label>
                                <input class="input--style-4" type="text" name="price"
                                    value="{{ $booking->getTypeMakeup->name }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Tanggal</label>
                                <div class="input-group-icon">
                                    <input class="input--style-4 js-datepicker" type="text"
                                        value="{{ \Carbon\Carbon::parse($booking->tanggal_booking)->format('d F Y') }}"
                                        readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Waktu</label>
                                <input class="input--style-4" type="time" value="{{ $booking->waktu_booking }}"
                                    name="waktu" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="p-t-15">
                        <a href="{{ url('/') }}" class="btn btn--radius-2 btn--danger" type="submit">Kembali</a>
                        <button class="btn btn--radius-2 btn--danger" id="pay-button">Bayar Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="{{ url('/booking') }}/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="{{ url('/booking') }}/vendor/select2/select2.min.js"></script>
    <script src="{{ url('/booking') }}/vendor/datepicker/moment.min.js"></script>
    <script src="{{ url('/booking') }}/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="{{ url('/booking') }}/js/global.js"></script>
    @include('sweetalert::alert')
    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    alert("payment success!");
                    console.log(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        });
    </script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
