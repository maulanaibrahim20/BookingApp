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
                                <select name="makeup" class="form-select" id="makeup">
                                    @foreach ($makeup as $data)
                                        <option value="{{ $data->id }}">
                                            {{ $data->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="select-option">
                                <label for="makeup">Tipe Makeup:</label>
                                <select name="makeup" class="form-select" id="type">
                                    {{-- @foreach ($type as $data)
                                        <option value="{{ $data->getType->id }}">
                                            {{ $data->getType->name }}
                                        </option>
                                    @endforeach --}}
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

{{-- Start Modal --}}
{{-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Harga</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Gambar</th>
                                <td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                </td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div> --}}
{{-- End Modal --}}

@section('landing_js')
    <script>
        $(document).ready(function() {
            // Tangani perubahan pada dropdown 'makeup'
            $('#makeup').on('change', function() {
                console.log('hallo');
                var makeupId = $(this).val();

                // Lakukan permintaan Ajax untuk mengambil data 'type' yang sesuai
                // $.ajax({
                // type: 'GET',
                // url: '/get-types/' + makeupId, // Ganti URL sesuai dengan rute Anda
                // success: function(data) {
                // var typeDropdown = $('#type');
                // typeDropdown.empty();

                // // Isi dropdown 'type' dengan data yang diterima dari server
                // $.each(data, function(key, value) {
                // typeDropdown.append('<option value="' + value.type_id +
                //                 '">' + value.type_name + '
                <
                /option>');
                // });
                // },
                // error: function(error) {
                // console.log(error);
                // }
                // });
            });
        });
    </script>
@endsection
