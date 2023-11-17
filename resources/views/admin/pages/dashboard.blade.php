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
                                        <span class="text-secondary"><i
                                                class="fa fa-chevron-circle-up text-secondary me-1"></i> 3%</span> last
                                        month
                                    </p>
                                </div>
                                <div class="col col-auto">
                                    <div class="counter-icon bg-danger-gradient box-shadow-danger brround  ms-auto">
                                        <i class="icon icon-rocket text-white mb-5 "></i>
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
                                    <h6 class="">Total Profit</h6>
                                    <h3 class="mb-2 number-font">$42,567</h3>
                                    <p class="text-muted mb-0">
                                        <span class="text-success"><i
                                                class="fa fa-chevron-circle-down text-success me-1"></i> 0.5%</span> last
                                        month
                                    </p>
                                </div>
                                <div class="col col-auto">
                                    <div class="counter-icon bg-secondary-gradient box-shadow-secondary brround ms-auto">
                                        <i class="fe fe-dollar-sign text-white mb-5 "></i>
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
                                    <h6 class="">Total Cost</h6>
                                    <h3 class="mb-2 number-font">$34,789</h3>
                                    <p class="text-muted mb-0">
                                        <span class="text-danger"><i class="fa fa-chevron-circle-down text-danger me-1"></i>
                                            0.2%</span> last month
                                    </p>
                                </div>
                                <div class="col col-auto">
                                    <div class="counter-icon bg-success-gradient box-shadow-success brround  ms-auto">
                                        <i class="fe fe-briefcase text-white mb-5 "></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
