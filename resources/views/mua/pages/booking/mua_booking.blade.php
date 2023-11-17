@extends('index')
@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Dashboard 01</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard 01</li>
            </ol>
        </div>
        <div class="ms-auto pageheader-btn">
            <a href="javascript:void(0);" class="btn btn-primary btn-icon text-white me-2">
                <span>
                    <i class="fe fe-plus"></i>
                </span> Add Account
            </a>
            <a href="javascript:void(0);" class="btn btn-success btn-icon text-white">
                <span>
                    <i class="fe fe-log-in"></i>
                </span> Export
            </a>
        </div>
    </div>

    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Booking</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th style="width:80px;"><strong>Kode Booking</strong></th>
                                    <th>Name Pemesan</th>
                                    <th>Deskripsi Event</th>
                                    <th>Makeup</th>
                                    <th>Type Makeup</th>
                                    <th><strong>status</strong></th>
                                    <th class="text-center"><strong>Action</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($booking as $data)
                                    <tr>
                                        <td><strong>{{ $data->id_booking }}</strong></td>
                                        <td><strong>{{ $data->getCustomer->getCustomer->name }}</strong></td>
                                        <td>{{ $data->name }}</td>
                                        <td class="text-center">{{ $data->getMakeup->name }}</td>
                                        <td class="text-center">{{ $data->getTypeMakeup->name }}</td>
                                        <td>
                                            @if ($data->status == 0)
                                                <span class="badge rounded-pill bg-warning me-1 mb-1 mt-1">Pending</span>
                                            @elseif ($data->status == 1)
                                                <span class="badge rounded-pill bg-primary me-1 mb-1 mt-1">Diterima</span>
                                            @elseif ($data->status == 3)
                                                <span class="badge rounded-pill bg-danger me-1 mb-1 mt-1">Ditolak</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-primary" data-bs-effect="effect-scale" data-bs-toggle="modal"
                                                data-bs-target="#modalView{{ $data->id_booking }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($booking as $view)
        <div class="modal fade" id="modalView{{ $view->id_booking }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal View Start -->
                    <div class="modal-header">
                        <h5 class="modal-title">Booking View Detail</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama Pemesan</th>
                                        <td> {{ $view->getCustomer->getCustomer->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Deskripsi Event</th>
                                        <td> {{ $view->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Makeup</th>
                                        <td ="">{{ $view->getMakeup->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tipe Makeup</th>
                                        <td ="">{{ $view->getTypeMakeup->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Booking</th>
                                        <td ="">{{ $view->tanggal_booking }}</td>
                                    </tr>
                                    <tr>
                                        <th>Waktu Booking</th>
                                        <td ="">{{ date('d F Y', strtotime($view->tanggal_booking)) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            @if ($view->status == 0)
                                                <span class="badge rounded-pill bg-warning me-1 mb-1 mt-1">Pending</span>
                                            @elseif ($view->status == 1)
                                                <span class="badge rounded-pill bg-primary me-1 mb-1 mt-1">Diterima</span>
                                            @elseif ($view->status == 3)
                                                <span class="badge rounded-pill bg-danger me-1 mb-1 mt-1">Ditolak</span>
                                            @endif
                                        </td>
                                    </tr>
                                </thead>
                            </table>
                            @if ($view->status != 3)
                                <button id="tolak" data-id="{{ $view->id_booking }}"
                                    class="btn btn-danger">Tolak</button>
                                <button id="terima" data-id="{{ $data->id_booking }}"
                                    class="btn btn-primary">Terima</button>
                            @endif
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                    <!-- Modal View End -->
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#terima").on("click", function() {
                console.log('hallo terima');
                var id_booking = $(this).data("id");
                ubahStatus(id_booking, 1);
            });

            $("#tolak").on("click", function() {
                console.log('hallo tolak');
                var id_booking = $(this).data("id");
                ubahStatus(id_booking, 3);
            });

            function ubahStatus(id_booking, status) {
                $.ajax({
                    type: "POST",
                    url: "/mua/booking/changeStatus",
                    data: {
                        id_booking: id_booking,
                        status: status,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses!',
                                text: 'Status berhasil diubah',
                                showConfirmButton: true,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Ketika tombol "OK" diklik, lakukan pengalihan ke halaman yang sama
                                    location.reload();
                                }
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

        });
    </script>
@endsection
