<section class="rooms-area section-padding-100-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6">
                <div class="section-heading text-center">
                    <div class="line-"></div>
                    <h2>Choose a Makeup</h2>
                    <p>Tentukan Pilihan Makeup Anda Untuk Segala Jenis Muka Anda!</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">

            <!-- Single Rooms Area -->
            @foreach ($manage as $data)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-rooms-area wow fadeInUp" data-wow-delay="100ms">
                        <!-- Thumbnail -->
                        <div class="bg-thumbnail bg-img"
                            style="background-image: url({{ url('' . $data->getMakeup->image) }});">
                        </div>
                        <!-- Price -->
                        <p class="price-from">Rp.{{ number_format($data->getMakeup->price, 0, ',', '.') }}</p>
                        <!-- Rooms Text -->
                        <div class="rooms-text">
                            <div class="line"></div>
                            <h4>{{ $data->getMakeup->name }}</h4>
                            <p>{{ $data->getMakeup->description }}.</p>
                            <p><strong>Makeup Type:</strong></p>
                            @foreach ($data->getMakeup->detailMakeup as $type)
                                <p>-- {{ $type->getType->name }}</p>
                            @endforeach
                        </div>
                        <!-- Book Room -->
                        <a href="{{ Auth::check() ? '#makeupModal' . $data->getMakeup->id : url('/login') }}"
                            class="book-room-btn btn palatin-btn"
                            @if (Auth::check()) data-toggle="modal" data-target="#makeupModal{{ $data->getMakeup->id }}"
                        @else
                            onclick="event.preventDefault(); document.getElementById('login-form').submit();" @endif>
                            Book A Makeup
                        </a>

                        @if (!Auth::check())
                            <form id="login-form" action="{{ url('/login') }}">
                            </form>
                        @endif

                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Start Modal --}}
    @foreach ($manage as $edit)
        <div class="modal fade" id="makeupModal{{ $edit->getMakeup->id }}" tabindex="-1" role="dialog"
            aria-labelledby="makeupModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="makeupModalLabel">Book A Makeup</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/client/booking') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">Nama</label>
                                <input class="form-control   mb-4 is-valid state-valid" id="name"
                                    placeholder="Masukan Nama Makeup" required="" type="text" name="name">
                            </div>
                            <div class="form-group">
                                <label for="name">Name Makeup</label>
                                <input type="hidden" name="makeup" value="{{ $edit->getMakeup->id }}">
                                <input type="text" class="form-control" value="{{ $edit->getMakeup->name }}"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <input type="text" class="form-control" value="{{ $edit->getMakeup->description }}"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="description">Harga</label>
                                <input type="text" class="form-control"
                                    value="Rp.{{ number_format($edit->getMakeup->price, 0, ',', '.') }}" readonly>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="form-label">Type Makeup</label>
                                    <select name="type_makeup" class="form-control type_makeup" id="type_makeup">
                                        <option value="">- Pilih -</option>
                                        @foreach ($edit->getMakeup->detailMakeup as $item)
                                            <option value="{{ $item->getType->id }}">
                                                {{ $item->getType->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="appointmentDate">Tanggal Booking</label>
                                <input type="date" class="form-control" name="date" required>
                            </div>
                            <div class="form-group">
                                <label for="appointmentDate">Waktu</label>
                                <input type="time" class="form-control" name="waktu" required />
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Booking</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- End Modal --}}
</section>
