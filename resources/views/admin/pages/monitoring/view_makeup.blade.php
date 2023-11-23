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
                    <h3 class="card-title">Nama Owner : {{ $name }}</h3>
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
                                        <td>
                                            <form action="/admin/monitoring_makeup/changestatus" method="POST">
                                                @csrf
                                                <label class="custom-switch">
                                                    <input type="checkbox" name="custom-switch-checkbox"
                                                        class="custom-switch-input" data-product-id="{{ $data->id }}"
                                                        {{ $data->managementContent->active == 1 ? 'checked' : '' }}>
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                            </form>
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
@endsection

@section('js')
    <script>
        $('body').on('change', '.custom-switch-input', function() {
            let productId = $(this).data('product-id');
            let isChecked = $(this).prop('checked') ? 1 : 0;

            $.ajax({
                method: 'POST',
                url: '/admin/monitoring_makeup/changestatus',
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
