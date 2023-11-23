@extends('index')
@section('css')
    <style>
        .highlight-blue {
            background-color: #007BFF;
            color: #fff;
            border-radius: 50%;
            padding: 3px;
        }
    </style>
@endsection
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
                                    <th>Name Event</th>
                                    <th>Makeup</th>
                                    <th>Type Makeup</th>
                                    <th>Tanggal Booking</th>
                                    <th>Waktu Booking</th>
                                    <th><strong>status</strong></th>
                                    <th><strong>Action</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($booking as $data)
                                    <tr>
                                        <td><strong>{{ $data->id_booking }}</strong></td>
                                        <td>{{ $data->name }}</td>
                                        <td class="text-center">{{ $data->getMakeup->name }}</td>
                                        <td class="text-center">{{ $data->getTypeMakeup->name }}</td>
                                        <td>{{ date('d F Y', strtotime($data->tanggal_booking)) }}</td>
                                        <td class="text-center">{{ $data->waktu_booking }}</td>
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
                                            <a class="btn btn-icon btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#EditModal{{ $data->id_booking }}"><i
                                                    class="fe fe-edit"></i></a>
                                            <button id="deletePasien" data-kode="{{ $data->id_customer }}"
                                                class="btn btn-danger ">
                                                <i class="fa fa-trash"></i>
                                            </button>
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
    @foreach ($booking as $edit)
        <div class="modal fade" id="EditModal{{ $edit->id_booking }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Edit Data
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="needs-validation was-validated" method="POST"
                        action="{{ url('/client/booking/' . $edit->id_customer) }}">
                        @method('PUT')
                        @csrf <!-- Fungsi Pengamanan -->
                        <div class="modal-body">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Nama Event</label>
                                    <input class="form-control  mb-4 is-valid state-valid" placeholder="Masukan Nama"
                                        required="" type="text" name="name" value="{{ $edit->name }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Makeup</label>
                                    <select name="makeup" class="form-control makeup" id="makeup">
                                        <option value="">- Pilih -</option>
                                        @foreach ($makeup as $item)
                                            <option value="{{ $item['id'] }}"
                                                {{ $item['id'] == $edit->getMakeup->name ? 'selected' : '' }}>
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
                                    <label class="form-label">Date</label>
                                    <input class="form-control" type="text" id="datepicker" name="date"
                                        value="{{ $edit->tanggal_booking }}" />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <button class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('js')
    <script type="text/javascript">
        @foreach ($booking as $edit)
            var tanggalEdit = new Date("{{ $edit->tanggal_booking }}"); // Mengambil tanggal dari $edit
        @endforeach

        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            },
            minDate: tanggalEdit, // Mengatur tanggal minimum ke tanggal dari $edit
            defaultDate: tanggalEdit, // Mengatur nilai default dari tanggal yang diambil dari $edit
            beforeShowDay: function(date) {
                // Tandai tanggal dengan bulatan biru jika sama dengan tanggal dari $edit
                if (date.getDate() === tanggalEdit.getDate() &&
                    date.getMonth() === tanggalEdit.getMonth() &&
                    date.getFullYear() === tanggalEdit.getFullYear()) {
                    return {
                        classes: 'highlight-blue',
                        tooltip: 'Pilihan Anda'
                    };
                }
                return {};
            }
        });
        $('#datepicker').val($.datepicker.formatDate('dd-mm-yy', tanggalEdit));
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
@endsection
