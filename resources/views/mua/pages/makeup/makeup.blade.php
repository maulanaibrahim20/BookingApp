@extends('index'),
@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Table</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page">Table</li>
            </ol>
        </div>
        <div class="ms-auto pageheader-btn">
            <a href="#modaldemo8" class="btn btn-success btn-icon text-white" data-bs-effect="effect-scale"
                data-bs-toggle="modal">
                <span>
                    <i class="fe fe-plus"></i>
                </span> Tambah Data
            </a>
        </div>
    </div>

    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Table Data MakeUp</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th style="width:80px;"><strong>No.</strong></th>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>Type</th>
                                    <th>Harga</th>
                                    <th>Gambar</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($makeup as $data)
                                    <tr>
                                        <td><strong>{{ $loop->iteration }}</strong></td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->description }}</td>
                                        <td>
                                            <ul>
                                                @foreach ($data->detailMakeup as $type)
                                                    <li>-- {{ $type->getType->name }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>{{ 'Rp ' . number_format($data->price, 0, ',', '.') }}</td>
                                        <td><img src="{{ asset('' . $data->image) }}" style="width:60px;height:60">
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-icon btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#EditModal{{ $data->id }}"
                                                data-id="{{ $data->id }}"><i class="fe fe-edit"></i></a>
                                            <button id="delete" data-id="{{ $data->id }}" class="btn btn-danger">
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

    {{-- START ADD DATA MODAL --}}
    <div class="modal fade" id="modaldemo8">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Edit Data
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="needs-validation was-validated" method="POST" action="{{ url('/mua/makeup') }}"
                    enctype="multipart/form-data">
                    @csrf <!-- Fungsi Pengamanan -->
                    <div class="modal-body">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Nama</label>
                                <input class="form-control   mb-4 is-valid state-valid" id="name"
                                    placeholder="Masukan Nama Makeup" required="" type="text" name="name">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Deskripsi</label>
                                <input class="form-control mb-4 is-valid state-valid" id="description"
                                    placeholder="Masukan Deskripsi Makeup" required="" type="text" name="description">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Harga</label>
                                <input class="form-control mb-4 is-valid state-valid" id="price"
                                    placeholder="Masukan Deskripsi Makeup" required="" type="number" name="price">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label mt-0">Masukan Gambar</label>
                                <input class="form-control is-valid state-valid" name="image" type="file">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group ">
                                <div class="form-label">Pilih Type</div>
                                <div class="custom-controls-stacked">
                                    @foreach ($tipe as $item)
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="type_makeup[]"
                                                value="{{ $item->id }}">
                                            <span class="custom-control-label">{{ $item->name }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="save" class="btn btn-primary">Save changes</button>
                        <button class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END ADD DATA MODAL --}}

    {{-- START Edit DATA MODAL --}}
    @foreach ($makeup as $oke)
        <div class="modal fade" id="EditModal{{ $oke->id }}">
            <div class="modal-dialog modal-lg">
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
                        action="{{ url('/mua/makeup/' . $oke->id) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf <!-- Fungsi Pengamanan -->
                        <div class="modal-body">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Nama</label>
                                    <input class="form-control mb-4 is-valid state-valid" id="name"
                                        placeholder="Masukan Nama Makeup" required="" type="text" name="name"
                                        value="{{ $oke->name }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Deskripsi</label>
                                    <input class="form-control mb-4 is-valid state-valid" id="description"
                                        placeholder="Masukan Deskripsi Makeup" required="" type="text"
                                        name="description" value="{{ $oke->description }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Harga</label>
                                    <input class="form-control mb-4 is-valid state-valid" id="price"
                                        placeholder="Masukan Deskripsi Makeup" required="" type="number"
                                        name="price" value="{{ $oke->price }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="image">Gambar</label>
                                    @if ($oke->image)
                                        <p>Nama File: {{ $oke->image }}</p>
                                        <img src="{{ asset('' . $oke->image) }}" alt="Current Image"
                                            style="max-height: 100px;">
                                    @else
                                        <p>No image available</p>
                                    @endif
                                    <input type="file" class="form-control" name="image" id="image">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group ">
                                    <div class="form-label">Pilih Type</div>
                                    <div class="custom-controls-stacked">
                                        @foreach ($tipe as $oke)
                                            <label class="custom-control custom-checkbox">
                                                <input id="checkboxDiv" type="checkbox" class="custom-control-input"
                                                    name="makeup_update[]" value="{{ $oke->id }}"
                                                    data-id="{{ $oke->id }}">{{ $oke->name }}
                                                <span class="custom-control-label"></span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="save" class="btn btn-primary">Save changes</button>
                            <button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    {{-- END Edit DATA MODAL --}}
@endsection


@section('js')
    <script>
        $('body').on('click', '#delete', function() {
            let id = $(this).data('id');

            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Untuk Menghapus Data Ini",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iyaa, Saya Yakin'
            }).then((result) => {
                if (result.isConfirmed) {
                    form_string =
                        "<form method=\"POST\" action=\"{{ url('/mua/makeup/') }}/" +
                        id +
                        "\" accept-charset=\"UTF-8\"><input name=\"_method\" type=\"hidden\" value=\"DELETE\"><input name=\"_token\" type=\"hidden\" value=\"{{ csrf_token() }}\"></form>"

                    form = $(form_string)
                    form.appendTo('body');
                    form.submit();
                } else {
                    Swal.fire('Konfirmasi Diterima!', 'Data Anda Masih Terdata', 'success');
                }
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $('.btn-warning').click(function() {
                var dataId = $(this).data('id');

                $.ajax({
                    url: '/mua/makeup/getDataType',
                    method: 'POST',
                    data: {
                        id: dataId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log(response.id_type_makeup);

                        $('input[name="makeup_update[]"]').prop('checked', false);

                        $.each(response, function(index, data) {
                            $('input[name="makeup_update[]"]').each(function() {
                                if ($(this).val() == data.id_type_makeup) {
                                    $(this).prop('checked', true);
                                }
                            });
                        });
                    },
                    error: function() {
                        alert('Gagal mengambil data detail makeup.');
                    }
                });
            });
        });
    </script>
@endsection
