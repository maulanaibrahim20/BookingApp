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
            <div class="card custom-card">
                <div class="card-body">
                    <div>
                        <h3 class="card-title mb-1">Simple Table</h3>
                        <p class="text-muted card-sub-title">Using the most basic table markup</p>
                    </div>
                    <div class="table-responsive">
                        <table class="table  border text-nowrap text-md-nowrap mg-b-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Salary</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Joan Powell</td>
                                    <td>Associate Developer</td>
                                    <td>$450,870</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Gavin Gibson</td>
                                    <td>Account manager</td>
                                    <td>$230,540</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Julian Kerr</td>
                                    <td>Senior Javascript Developer</td>
                                    <td>$55,300</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Cedric Kelly</td>
                                    <td>Accountant</td>
                                    <td>$234,100</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Samantha May</td>
                                    <td>Junior Technical Author</td>
                                    <td>$43,198</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
