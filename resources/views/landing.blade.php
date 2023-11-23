<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>The Palatin - Hotel &amp; Resort Template</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{ url('/layouts_landing') }}/style.css">

</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="cssload-container">
            <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    @include('layouts_landing.header.v_header')
    <!-- ##### Header Area End ##### -->

    {{-- modal reservation start --}}
    @if (Auth::check())
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ url('/client/booking') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Nama</label>
                                    <input class="form-control mb-4 is-valid state-valid" id="name"
                                        placeholder="Masukan Nama Makeup" required="" type="text" name="name">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Makeup</label>
                                    <select name="makeup" class="form-control makeup" id="makeup">
                                        <option value="">- Pilih -</option>
                                        @foreach ($makeup as $item)
                                            <option value="{{ $item['id'] }}">
                                                {{ $item['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Type Makeup</label>
                                    <select name="type_makeup" class="form-control type_makeup" id="type_makeup">
                                        <option value="">- Pilih -</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="appointmentDate">Tanggal Booking</label>
                                    <input type="date" class="form-control" name="date" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="waktu">Waktu</label>
                                    <input type="time" class="form-control" name="waktu" required />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
    {{-- modal reservation end --}}

    <!-- ##### Hero Area Start ##### -->
    @include('layouts_landing.hero.v_hero')
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Book Now Area Start ##### -->
    @include('layouts_landing.booking.v_booking')
    <!-- ##### Book Now Area End ##### -->

    <!-- ##### About Us Area Start ##### -->
    @include('layouts_landing.about_us.v_about_us')
    <!-- ##### About Us Area End ##### -->

    <!-- ##### Pool Area Start ##### -->
    @include('layouts_landing.pool.v_pool')
    <!-- ##### Pool Area End ##### -->

    <!-- ##### Rooms Area Start ##### -->
    @include('layouts_landing.rooms.v_rooms')
    <!-- ##### Rooms Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
    @include('layouts_landing.contact.v_contact')
    <!-- ##### Contact Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    @include('layouts_landing.footer.v_footer')
    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Script ##### -->
    @include('layouts_landing.js.js_style')
    @include('sweetalert::alert')
    <script>
        var hariIni = new Date();

        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            },
            minDate: hariIni,
            defaultDate: hariIni,
        });
        $('#datepicker').val($.datepicker.formatDate('dd-mm-yy', hariIni));
    </script>

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
