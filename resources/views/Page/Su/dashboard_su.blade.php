@extends('index_su')



@section('content')

@include('Component.navbar_su')
<div class="container-fluid">

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah User</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlahUser->Total}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Task</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlahTask->Total}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Message
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlahMessage->Total}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                done task</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlahDoneTask->Total}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Task Completion</h6>
                                </div>
                                <div class="card-body">
                                    @foreach ($taskCopletion as $tp)
                                        <h4 class="small font-weight-bold">{{$tp->nama_divisi}} <span
                                            class="float-right">{{intval($tp->yang_kelar)}}%</span></h4>
                                        <div class="progress mb-4">
                                            <div class="progress-bar @php
                                                $item =["bg-warning", "bg-info", "bg-danger","bg-success"];
                                                echo $item[array_rand($item)];
                                            @endphp" role="progressbar" style="width: {{intval($tp->yang_kelar)}}%"
                                                aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Color System -->
                            

                        </div>

                        
                    </div>
@endsection