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
            @foreach ($makeup as $data)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-rooms-area wow fadeInUp" data-wow-delay="100ms">
                        <!-- Thumbnail -->
                        <div class="bg-thumbnail bg-img" style="background-image: url({{ url('' . $data->image) }});">
                        </div>
                        <!-- Price -->
                        <p class="price-from">Rp.{{ number_format($data->price, 0, ',', '.') }}</p>
                        <!-- Rooms Text -->
                        <div class="rooms-text">
                            <div class="line"></div>
                            <h4>{{ $data->name }}</h4>
                            <p>{{ $data->description }}.</p>
                        </div>
                        <!-- Book Room -->
                        <a href="#" class="book-room-btn btn palatin-btn" data-toggle="modal"
                            data-target="#makeupModal{{ $data->id }}">Book A Makeup</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Start Modal --}}
    @foreach ($makeup as $edit)
        <div class="modal fade" id="makeupModal{{ $edit->id }}" tabindex="-1" role="dialog"
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
                        <!-- Form makeup booking -->
                        <form action="" method="" enctype="">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="name">Your Name:</label>
                                <input type="text" class="form-control" id="name" value="{{ $edit->name }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="email">Your Email:</label>
                                <input type="email" class="form-control" id="email"
                                    value="{{ $edit->description }}" required>
                            </div>
                            <div class="form-group">
                                <label for="appointmentDate">Preferred Date:</label>
                                <input type="date" class="form-control" id="appointmentDate" required>
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
