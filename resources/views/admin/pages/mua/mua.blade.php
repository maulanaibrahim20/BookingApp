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
                    <h3 class="card-title">Basic Datatable</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th style="width:80px;"><strong>No.</strong></th>
                                    <th>Name</th>
                                    <th>username</th>
                                    <th>email</th>
                                    <th>alamat</th>
                                    <th>No Telepon</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $data)
                                    <tr>
                                        <td><strong>{{ $loop->iteration }}</strong></td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->username }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->alamat }}</td>
                                        <td>{{ $data->no_telp }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-icon btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#EditModal{{ $data->id }}"><i
                                                    class="fe fe-edit"></i></a>
                                            <a href="{{ url('/admin/reg/mua/' . $data->id) }}"
                                                class="btn btn-icon btn-danger" data-confirm-delete="true">
                                                <i class="fa fa-trash"></i>
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
                <form class="needs-validation was-validated" method="POST" action="{{ url('/admin/reg/mua') }}">
                    @csrf <!-- Fungsi Pengamanan -->
                    <div class="modal-body">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Nama</label>
                                <input class="form-control  mb-4 is-valid state-valid" placeholder="Masukan Nama"
                                    required="" type="text" name="name">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Alamat</label>
                                <input class="form-control mb-4 is-valid state-valid" placeholder="Masukan Alamat"
                                    required="" type="text" name="alamat">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input class="form-control mb-4 is-valid state-valid" placeholder="Masukan Email"
                                    required="" type="email" name="email">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Nomer Telepon</label>
                                <input class="form-control mb-4 is-valid state-valid" placeholder="Masukan Nomer Telepon"
                                    required="" type="text" name="no_telp">
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
    @foreach ($users as $edit)
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
                    <form class="needs-validation was-validated" method="POST"
                        action="{{ url('/admin/reg/mua/' . $edit->id) }}">
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
                                    <label class="form-label">Alamat</label>
                                    <input class="form-control mb-4 is-valid state-valid" placeholder="Masukan Alamat"
                                        required="" type="text" name="alamat" value="{{ $edit->alamat }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input class="form-control mb-4 is-valid state-valid" placeholder="Masukan Email"
                                        required="" type="email" name="email" value="{{ $edit->email }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Nomer Telepon</label>
                                    <input class="form-control mb-4 is-valid state-valid"
                                        placeholder="Masukan Nomer Telepon" required="" type="text" name="no_telp"
                                        value="{{ $edit->no_telp }}">
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
@endsection

{{-- @section('js')
    <script>
        $(document).ready(function() {
            $('body').on('click', '.delete-button', function() {
                let id = $(this).data('id');
                console.log('hhalo');

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
                        let url = "{{ url('/admin/reg/mua/') }}";
                        url = url.replace(':id', id);

                        form = $('<form method="POST" action="' + url +
                            '" accept-charset="UTF-8"></form>');
                        form.append('{{ method_field('DELETE') }}');
                        form.append('{{ csrf_field() }}');
                        form.appendTo('body');
                        form.submit();
                    } else {
                        Swal.fire('Konfirmasi Diterima!', 'Data Anda Masih Terdata', 'success');
                    }
                });
            });
        });
    </script>
@endsection --}}
