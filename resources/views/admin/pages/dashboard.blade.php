@extends('index')
@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Dashboard</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h6 class="">Total Owner</h6>
                                    <h3 class="mb-2 number-font">{{ $jumlah_owner }}</h3>
                                    <p class="text-muted mb-0">
                                        <span class="text-primary"><i class="fa fa-user text-primary me-1"></i>
                                            3%</span> last month
                                    </p>
                                </div>
                                <div class="col col-auto">
                                    <div class="counter-icon bg-primary-gradient box-shadow-primary brround ms-auto">
                                        <i class="fe fe-user text-white mb-5 "></i>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h6 class="">Total Makeup</h6>
                                    <h3 class="mb-2 number-font">{{ $jumlah_makeup }}</h3>
                                    <p class="text-muted mb-0">
                                        <span class="text-secondary"><i class="fa fa-paint-brush text-secondary me-1"></i>
                                            3%</span> last
                                        month
                                    </p>
                                </div>
                                <div class="col col-auto">
                                    <div class="counter-icon bg-danger-gradient box-shadow-danger brround  ms-auto">
                                        <i class="fa fa-paint-brush text-white mb-5 "></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h6 class="">Total Client</h6>
                                    <h3 class="mb-2 number-font">{{ $jumlah_client }}</h3>
                                    <p class="text-muted mb-0">
                                        <span class="text-success"><i
                                                class="fa fa-chevron-circle-down text-success me-1"></i> 0.5%</span> last
                                        month
                                    </p>
                                </div>
                                <div class="col col-auto">
                                    <div class="counter-icon bg-secondary-gradient box-shadow-secondary brround ms-auto">
                                        <i class="icon icon-people text-white mb-5 "></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h6 class="">Total Booking Makeup</h6>
                                    <h3 class="mb-2 number-font">{{ $jumlah_booking }}</h3>
                                    <p class="text-muted mb-0">
                                        <span class="text-danger"><i class="fa fa-chevron-circle-down text-danger me-1"></i>
                                            0.2%</span> last month
                                    </p>
                                </div>
                                <div class="col col-auto">
                                    <div class="counter-icon bg-success-gradient box-shadow-success brround  ms-auto">
                                        <i class="fe fe-book text-white mb-5 "></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12">
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title mb-0">Booking Status</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @if (count($booking) > 0)
                            <table id="data-table" class="table table-bordered text-nowrap mb-0">
                                <thead class="border-top">
                                    <tr>
                                        <th class="bg-transparent border-bottom-0 w-5">No</th>
                                        <th class="bg-transparent border-bottom-0">Order.No</th>
                                        <th class="bg-transparent border-bottom-0">Nama Owner</th>
                                        <th class="bg-transparent border-bottom-0">Name</th>
                                        <th class="bg-transparent border-bottom-0">Date</th>
                                        <th class="bg-transparent border-bottom-0">Makeup</th>
                                        <th class="bg-transparent border-bottom-0">Status</th>
                                    </tr>
                                </thead>
                                @foreach ($booking as $item)
                                    <tbody>
                                        <tr class="border-bottom">

                                            <td class="text-muted fs-15 fw-semibold text-center">{{ $loop->iteration }}</td>
                                            <td class="text-muted fs-15 fw-semibold text-center">
                                                {{ $item->id_booking }}</td>
                                            <td class="text-muted fs-15 fw-semibold text-center">
                                                {{ $item->getUserMakeup->getMakeup->name }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <span class="avatar avatar-md brround mt-1"
                                                        style="background-image: url(../assets/images/users/11.jpg)"></span>
                                                    <div class="ms-2 mt-0 mt-sm-2 d-block">
                                                        <h6 class="mb-0 fs-14 fw-semibold">
                                                            {{ $item->getCustomer->getCustomer->name }}</h6>
                                                        <span
                                                            class="fs-12 text-muted">{{ $item->getCustomer->getCustomer->email }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="ms-2 mt-0 mt-sm-2 d-block">
                                                        <h6 class="mb-0 fs-14 fw-semibold">
                                                            {{ \Carbon\Carbon::parse($item->tanggal_booking)->format('d-F-Y') }}
                                                        </h6>
                                                        <span class="fs-12 text-muted">{{ $item->waktu_booking }}
                                                            WIB</span>
                                                    </div>
                                                </div>

                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="ms-2 mt-0 mt-sm-2 d-block">
                                                        <h6 class="mb-0 fs-14 fw-semibold">
                                                            {{ $item->getMakeup->name }}</h6>
                                                        <span
                                                            class="fs-12 text-muted">{{ $item->getTypeMakeup->name }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-success fs-15 fw-semibold">
                                                @if ($item->status == 0)
                                                    <span class="text-primary fs-15 fw-semibold">Pending</span>
                                                @elseif ($item->status == 1)
                                                    <span class="text-success fs-15 fw-semibold">Diterima</span>
                                                @elseif ($item->status == 3)
                                                    <span class="text-danger fs-15 fw-semibold">Ditolak</span>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach

                            </table>
                        @else
                            <p class="text-center">Available</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- COL END -->
    </div>
@endsection
