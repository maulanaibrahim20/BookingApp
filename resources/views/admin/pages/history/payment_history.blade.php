@extends('index')
@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Payment History</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Payment History</li>
            </ol>
        </div>
    </div>
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Payment History</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom w-100" id="responsive-datatable">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">Order Id</th>
                                    <th class="wd-15p border-bottom-0">status</th>
                                    <th class="wd-20p border-bottom-0">Detail Transaksi</th>
                                </tr>
                            </thead>
                            @foreach ($payment as $data)
                                <tbody>
                                    <tr>
                                        <td>{{ $data->order_id }}</td>
                                        <td class="text-center">{{ $data->status }}</td>
                                        <td>
                                            <button type="button" class="btn btn-link" data-bs-toggle="modal"
                                                data-bs-target="#payloadModal{{ $data->id }}">
                                                Lihat detail Transaksi
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($payment as $data)
        <!-- Modal -->
        <div class="modal fade" id="payloadModal{{ $data->id }}" tabindex="-1" role="dialog"
            aria-labelledby="payloadModalLabel{{ $data->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="payloadModalLabel{{ $data->id }}">Detail Payload</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <pre>{{ json_encode(json_decode($data->payload), JSON_PRETTY_PRINT) }}</pre>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
