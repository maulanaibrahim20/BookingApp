@extends('index')
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
                    <h3 class="card-title">Data Produk</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th style="width:80px;"><strong>No.</strong></th>
                                    <th>Name</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Gambar</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produk as $data)
                                    <tr>
                                        <td><strong>{{ $loop->iteration }}</strong></td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ Str::limit($data->description, 50) }}</td>
                                        <td>{{ $data->price }}</td>
                                        <td><img src="{{ asset('' . $data->image) }}" style="width:60px;height:60">
                                        </td>
                                        <td>
                                            <form action="/admin/master/data_produk/" method="POST">
                                                @csrf
                                                <label class="custom-switch">
                                                    <input type="checkbox" name="custom-switch-checkbox"
                                                        class="custom-switch-input" data-product-id="{{ $data->id }}"
                                                        {{ $data->active == 1 ? 'checked' : '' }}>
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                            </form>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-primary" data-bs-effect="effect-scale" data-bs-toggle="modal"
                                                data-bs-target="#modalView{{ $data->id }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="btn btn-icon btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#EditModal{{ $data->id }}"><i
                                                    class="fe fe-edit"></i></a>
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
                <form class="needs-validation was-validated" method="POST" action="{{ url('/admin/master/data_produk') }}"
                    enctype="multipart/form-data">
                    @csrf <!-- Fungsi Pengamanan -->
                    <div class="modal-body">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Nama</label>
                                <input class="form-control  mb-4 is-valid state-valid" placeholder="Masukan Nama Produk"
                                    required="" type="text" name="name">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Deskripsi</label>
                                <input class="form-control mb-4 is-valid state-valid" placeholder="Masukan Deskripsi Produk"
                                    required="" type="text" name="description">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Harga</label>
                                <input class="form-control mb-4 is-valid state-valid" placeholder="Masukan Harga"
                                    required="" type="text" name="price">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label mt-0">Masukan Gambar</label>
                                <input class="form-control is-valid state-valid" name="image" type="file">
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
    {{-- END ADD DATA MODAL --}}

    {{-- START EDIT DATA MODAL --}}
    @foreach ($produk as $edit)
        <div class="modal fade" id="EditModal{{ $edit->id }}">
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
                    <form class="needs-validation was-validated" method="POST" enctype="multipart/form-data"
                        action="{{ url('/admin/master/data_produk/' . $edit->id) }}">
                        @method('PUT')
                        @csrf <!-- Fungsi Pengamanan -->
                        <div class="modal-body">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Nama</label>
                                    <input class="form-control  mb-4 is-valid state-valid" placeholder="Masukan Nama"
                                        required="" type="text" name="name" value="{{ $edit->name }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Deskripsi</label>
                                    <input class="form-control mb-4 is-valid state-valid" required="" type="text"
                                        name="description" value="{{ $edit->description }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Harga</label>
                                    <input class="form-control mb-4 is-valid state-valid" required="" type="number"
                                        name="price" value="{{ $edit->price }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="image">Gambar</label>
                                    @if ($edit->image)
                                        <p>Nama File: {{ $edit->image }}</p>
                                        <img src="{{ asset('' . $edit->image) }}" alt="Current Image"
                                            style="max-height: 100px;">
                                    @else
                                        <p>No image available</p>
                                    @endif
                                    <input type="file" class="form-control" name="image" id="image">
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
    {{-- END EDIT EDIT DATA MODAL --}}

    {{-- START VIEW DATA MODAL --}}
    @foreach ($produk as $view)
        <div class="modal fade" id="modalView{{ $view->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal View Start -->
                    <div class="modal-header">
                        <h5 class="modal-title" th:text="${company.id != null} ? 'View Company' : 'View Company'"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <td> {{ $view->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Deskripsi</th>
                                        <td ="">{{ $view->description }}</td>
                                    </tr>
                                    <tr>
                                        <th>Harga</th>
                                        <td ="">{{ $view->price }}</td>
                                    </tr>
                                    <tr>
                                        <th>Gambar</th>
                                        <td><img src="{{ asset('' . $view->image) }}" style="width:60px;height:60">
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            @if ($view->active == 1)
                                                Active
                                            @else
                                                Not Active
                                            @endif
                                        </td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <!-- Modal View End -->
                </div>
            </div>
        </div>
    @endforeach
    {{-- END VIEW DATA MODAL --}}
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
                        "<form method=\"POST\" action=\"{{ url('/admin/master/data_produk/') }}/" +
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
        $('body').on('change', '.custom-switch-input', function() {
            let productId = $(this).data('product-id');
            let isChecked = $(this).prop('checked') ? 1 : 0;

            $.ajax({
                method: 'POST',
                url: '/admin/master/data_produk/updateStatus',
                data: {
                    productId: productId,
                    isChecked: isChecked,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr) {
                    console.error(xhr);
                }
            });
        });
    </script>
@endsection
