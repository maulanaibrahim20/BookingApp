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
    </div>
    <div class="row" id="user-profile">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="wideget-user">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xl-6">
                                <div class="wideget-user-desc d-sm-flex">
                                    <div class="wideget-user-img">
                                        <img class="" src="{{ url('/assets') }}/images/users/8.jpg" alt="img">
                                    </div>
                                    <div class="user-wrap">
                                        <h4>{{ Auth::user()->name }}</h4>
                                        <h6 class="text-muted mb-3">{{ Auth::user()->getAkses->nama }}</h6>
                                        <a href="javascript:void(0);" class="btn btn-primary mt-1 mb-1"><i
                                                class="fa fa-rss"></i> Follow</a>
                                        <a href="emailservices.html" class="btn btn-secondary mt-1 mb-1"><i
                                                class="fa fa-envelope"></i> E-mail</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-xl-6">
                                <div class="text-xl-right mt-4 mt-xl-0">
                                    <a href="{{ url('/admin/pengaturan/profile_saya/edit_profile') }}"
                                        class="btn btn-primary">Edit Profile</a>
                                </div>
                                <div class="mt-5">
                                    <div class="main-profile-contact-list float-lg-end d-lg-flex">
                                        <div class="me-5">
                                            <div class="media">
                                                <div class="media-icon bg-primary  me-3 mt-1">
                                                    <i class="fe fe-file-plus fs-20 text-white"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span class="text-muted">Posts</span>
                                                    <div class="fw-semibold fs-25">
                                                        328
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="me-5 mt-5 mt-md-0">
                                            <div class="media">
                                                <div class="media-icon bg-success me-3 mt-1">
                                                    <i class="fe fe-users  fs-20 text-white"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span class="text-muted">Followers</span>
                                                    <div class="fw-semibold fs-25">
                                                        937k
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="me-0 mt-5 mt-md-0">
                                            <div class="media">
                                                <div class="media-icon bg-orange me-3 mt-1">
                                                    <i class="fe fe-wifi fs-20 text-white"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span class="text-muted">Following</span>
                                                    <div class="fw-semibold fs-25">
                                                        2,876
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="wideget-user-tab">
                        <div class="tab-menu-heading">
                            <div class="tabs-menu1">
                                <ul class="nav">
                                    <li class=""><a href="#tab-51" class="active show"
                                            data-bs-toggle="tab">Profile</a></li>
                                    {{-- <li><a href="#tab-61" data-bs-toggle="tab" class="">Friends</a></li>
                                    <li><a href="#tab-71" data-bs-toggle="tab" class="">Gallery</a></li>
                                    <li><a href="#tab-81" data-bs-toggle="tab" class="">Followers</a></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane active show" id="tab-51">
                <div id="profile-log-switch">
                    <div class="card">
                        <div class="card-body">
                            <div class="media-heading">
                                <h5><strong>Informasi Pengguna</strong></h5>
                            </div>
                            <div class="table-responsive ">
                                <table class="table row table-borderless">
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                        <tr>
                                            <td><strong>Full Name :</strong> {{ Auth::user()->name }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Username :</strong> {{ Auth::user()->username }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email Address :</strong> {{ Auth::user()->email }}</td>
                                        </tr>
                                    </tbody>
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                        <tr>
                                            <td><strong>Alamat :</strong>{{ Auth::user()->alamat }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Phone :</strong> {{ Auth::user()->no_telp }} </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endsection
