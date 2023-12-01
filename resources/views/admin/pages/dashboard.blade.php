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
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-9">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Total Transactions</h3>
                </div>
                <div class="card-body pb-0">
                    <div id="chartArea" class="chart-donut"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-3">
            <div class="card custom-card ">
                <div class="card-header">
                    <h3 class="card-title">Recent Orders</h3>
                </div>
                <div class="card-body pt-0 ps-0 pe-0">
                    <div id="recentorders" class="apex-charts ht-150"></div>
                    <div class="row sales-product-infomation pb-0 mb-0 mx-auto wd-100p mt-6">
                        <div class="col-md-6 col justify-content-center text-center">
                            <p class="mb-0 d-flex justify-content-center"><span class="legend bg-primary"></span>Delivered
                            </p>
                            <h3 class="mb-1 fw-bold">5238</h3>
                            <div class="d-flex justify-content-center ">
                                <p class="text-muted mb-0">Last 6 months</p>
                            </div>
                        </div>
                        <div class="col-md-6 col text-center float-end">
                            <p class="mb-0 d-flex justify-content-center "><span
                                    class="legend bg-background2"></span>Cancelled</p>
                            <h3 class="mb-1 fw-bold">3467</h3>
                            <div class="d-flex justify-content-center ">
                                <p class="text-muted mb-0">Last 6 months</p>
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
                                        <th class="bg-transparent border-bottom-0">Payment Status</th>
                                    </tr>
                                </thead>
                                @foreach ($booking as $item)
                                    <tbody>
                                        <tr class="border-bottom">

                                            <td class="text-muted fs-15 fw-semibold text-center">{{ $loop->iteration }}
                                            </td>
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
                                            <td class="text-success fs-15 fw-semibold">
                                                @if ($item->payment_status == 'paid')
                                                    <span class="text-success fs-15 fw-semibold">Paid</span>
                                                @elseif ($item->payment_status == 'unpaid')
                                                    <span class="text-primary fs-15 fw-semibold">Unpaid</span>
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
@section('js')
    <script>
        function chartArea() {

            /*-----echart1-----*/
            var options = {
                chart: {
                    height: 320,
                    type: "line",
                    stacked: false,
                    toolbar: {
                        show: true,
                        tools: {
                            download: true,
                            selection: false,
                            zoom: false,
                            zoomin: true,
                            zoomout: true,
                            pan: false,
                            reset: true | '<img src="/static/icons/reset.png" width="20">'
                        },
                    },
                    dropShadow: {
                        enabled: true,
                        opacity: 0.1,
                    },
                },
                colors: [myVarVal, "#f99433", 'rgba(119, 119, 142, 0.05)'],
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: "smooth",
                    width: [3, 3, 0],
                    dashArray: [0, 4],
                    lineCap: "round"
                },
                grid: {
                    padding: {
                        left: 0,
                        right: 0
                    },
                    strokeDashArray: 3
                },
                markers: {
                    size: 0,
                    hover: {
                        size: 0
                    }
                },
                series: [{
                    name: "Total Orders",
                    type: 'line',
                    data: [0, 45, 30, 75, 15, 94, 40, 115, 30, 105, 65, 110]

                }, {
                    name: "Total Sales",
                    type: 'line',
                    data: [0, 60, 20, 130, 75, 130, 75, 140, 64, 130, 85, 120]
                }, {
                    name: "",
                    type: 'area',
                    data: [0, 105, 70, 175, 85, 154, 90, 185, 120, 145, 185, 130]
                }],
                xaxis: {
                    type: "month",
                    categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    axisBorder: {
                        show: false,
                        color: 'rgba(119, 119, 142, 0.08)',
                    },
                    labels: {
                        style: {
                            color: '#8492a6',
                            fontSize: '12px',
                        },
                    },
                },
                yaxis: {
                    labels: {
                        style: {
                            color: '#8492a6',
                            fontSize: '12px',
                        },
                    },
                    axisBorder: {
                        show: false,
                        color: 'rgba(119, 119, 142, 0.08)',
                    },
                },
                fill: {
                    gradient: {
                        inverseColors: false,
                        shade: 'light',
                        type: "vertical",
                        opacityFrom: 0.85,
                        opacityTo: 0.55,
                        stops: [0, 100, 100, 100]
                    }
                },
                tooltip: {
                    show: false
                },
                legend: {
                    position: "top",
                    show: true
                }
            }
            document.querySelector("#chartArea").innerHTML = "";
            var chart = new ApexCharts(document.querySelector("#chartArea"), options);
            chart.render();
        }
        chartArea();

        function recentOrders() {
            var options = {
                chart: {
                    height: 305,
                    type: 'radialBar',
                    responsive: 'true',
                    offsetX: 0,
                    offsetY: 10,
                },
                plotOptions: {
                    radialBar: {
                        startAngle: -135,
                        endAngle: 135,
                        size: 120,
                        imageWidth: 50,
                        imageHeight: 50,
                        track: {
                            strokeWidth: "80%",
                        },
                        dropShadow: {
                            enabled: false,
                            top: 0,
                            left: 0,
                            bottom: 0,
                            blur: 3,
                            opacity: 0.5
                        },
                        dataLabels: {
                            name: {
                                fontSize: '16px',
                                color: undefined,
                                offsetY: 30,
                            },
                            hollow: {
                                size: "60%"
                            },
                            value: {
                                offsetY: -10,
                                fontSize: '22px',
                                color: undefined,
                                formatter: function(val) {
                                    return val + "%";
                                }
                            }
                        }
                    }
                },
                colors: ['#ff5d9e'],
                fill: {
                    type: "gradient",
                    gradient: {
                        shade: "gradient",
                        type: "horizontal",
                        shadeIntensity: .5,
                        gradientToColors: [myVarVal],
                        inverseColors: !0,
                        opacityFrom: 1,
                        opacityTo: 1,
                        stops: [0, 100]
                    }
                },
                stroke: {
                    dashArray: 4
                },
                series: [83],
                labels: [""]
            };

            document.querySelector("#recentorders").innerHTML = "";
            var chart = new ApexCharts(document.querySelector("#recentorders"), options);
            chart.render();
        }
        recentOrders();
    </script>
@endsection
