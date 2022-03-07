@extends('index_ceo')



@section('content')

@include('Component.navbar_ceo')
                
                <div class="container-fluid">

                   

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <!-- <div class="col-xl-2 col-md-6 mb-4"> -->
                        <div class="col mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah User</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlahUser->Total}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Task</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlahTask->Total}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Disposition
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
                        <div class="col mb-4">
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
                         <!-- Pending Requests Card Example -->
                         <div class="col mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Expired task</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlahExpiredTask->Expired}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-ban fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <div id="piechart" style="width: auto; height:500px"></div>
                        </div>

                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">
                            

                            <!-- Project Card Example -->
                            <!-- <div class="card shadow mb-4">
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

                                    <script>
                                        $(document).ready(function () {
                                            let data = @php
                                                            echo "[";
                                                            foreach($taskCopletion as $tp){
                                                                echo "`";
                                                                echo strval($tp->nama_divisi);
                                                                echo "`";
                                                                echo ",";
                                                            }
                                                            echo "]";
                                                       @endphp
                                            
                                            console.log(data)
                                        });
                                    </script>
                                    
                                    {{-- <h4 class="small font-weight-bold">Regional human capital bussiness partner department<span
                                            class="float-right">40%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Regional consumer loan factory team<span
                                            class="float-right">60%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: 60%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Regional legal team<span
                                            class="float-right">80%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Micro bussiness department <span
                                        class="float-right">20%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">BRILINK department <span
                                        class="float-right">20%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Ultra micro bussiness, social entrepreneurship & incubation department<span
                                            class="float-right">40%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Small Bussiness Department<span
                                            class="float-right">60%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: 60%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Regional transaction banking department<span
                                            class="float-right">80%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Medium bussiness department<span
                                            class="float-right">100%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Consumer bussiness department<span
                                        class="float-right">20%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Mass funding department<span
                                            class="float-right">40%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Retail payment & card department<span
                                            class="float-right">60%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: 60%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Logistic & general affair department<span
                                            class="float-right">80%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Operation, network & service department<span
                                            class="float-right">100%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Information technology & echannel department <span
                                        class="float-right">20%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Credit operation department<span
                                            class="float-right">40%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Risk management & compliance team<span
                                            class="float-right">60%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: 60%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Credit Risk Analyst team<span
                                            class="float-right">80%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Regional credit restructuring & recovery team<span
                                            class="float-right">Complete!</span></h4>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div> --}}
                                </div>
                            </div>-->

                            <!-- Color System -->
                            

                       

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Last Pending Task</h6>
                                </div>
                                <div class="card-body">
                                    <!-- last pending task-->
                                    @foreach ($lastPendingTask as $lp)
                                        <a href="#"><strong>{{$lp->jenis_pekerjaan}}</strong></a> - {{$lp->nama_divisi}} | 
                                        
                                        @if (date_diff(date_create(date('Y-m-d')),date_create($lp->deadline))->format("%R%a") < 0 && $lp->status!=4 )
                                            <kbd class="bg-danger">Expired</kbd>
                                        @else
                                            @if ($lp->status==1)
                                                <kbd class="bg-warning">Progress</kbd>
                                            @elseif($lp->status==2)
                                                <kbd class="bg-secondary">request</kbd>
                                            @elseif($lp->status==3)
                                                <kbd class="bg-success">Approval Section Head</kbd>
                                            @elseif($lp->status==4)
                                                <kbd class="bg-success">Done</kbd>
                                            @endif
                                        @endif
                                        
                                        <p>{{$lp->keterangan}}</p>
                                        <hr class="sidebar-divider">
                                    @endforeach
                                    
                                    {{-- <a href="#"><strong>Judul task</strong></a> - divisi | <kbd class="bg-success">done</kbd>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias reprehenderit minima reiciendis eligendi, rem error nam vero itaque facilis nobis cum.</p>
                                    <hr class="sidebar-divider"> --}}
                                    <!--end last task-->
                                </div>
                            </div>

                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Last Deliver Message</h6>
                                </div>
                                <div class="card-body">
                                    <!-- last send message-->
                                    
                                    @foreach ($lastDeliverMessage as $ldm)
                                        <a href="#"><strong>{{$ldm->isi_pesan}} - {{$ldm->name}}</strong></a>
                                        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias reprehenderit minima reiciendis eligendi, rem error nam vero itaque facilis nobis cum.</p> --}}
                                        - <span class="text-secondary" style="font-size:70%">{{$ldm->tglMessage}}</span>
                                        <hr class="sidebar-divider">
                                    @endforeach
                                    
                                    {{-- <a href="#"><strong>Judul pesan</strong></a>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias reprehenderit minima reiciendis eligendi, rem error nam vero itaque facilis nobis cum.</p>
                                    - <span class="text-secondary" style="font-size:70%">01/01/2022 08:00</span>
                                    <hr class="sidebar-divider">
                                    <a href="#"><strong>Judul</strong></a>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias reprehenderit minima reiciendis eligendi, rem error nam vero itaque facilis nobis cum.</p>
                                    - <span class="text-secondary" style="font-size:70%">01/01/2022 08:00</span>
                                    <hr class="sidebar-divider">
                                    <a href="#"><strong>Judul</strong></a> 
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias reprehenderit minima reiciendis eligendi, rem error nam vero itaque facilis nobis cum.</p>
                                    - <span class="text-secondary" style="font-size:70%">01/01/2022 08:00</span>
                                    <hr class="sidebar-divider"> --}}
                                    
                                    <!-- end last deliver message-->
                                </div>
                            </div>

                        </div>
                    </div>

                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
     


      $(document).ready(function () {
        let task = [
            
        ]

            $.ajax({
            type: "GET",
            url: "/ceo/taskCom",
            success: function (response) {
                
                response.task.map(res=>{
                    if(res.id!=1){
                        if(res.kelar) task.push([res.nama_divisi, res.kelar, customHtml(res)])
                        else task.push([res.nama_divisi, 0.1 , customHtml(res)])
                    }
                  
                      
                })

                function customHtml(res){
                    return `
                    <div class="card" style="width: 18rem;">
                      <div class="card-body">
                        <h5 class="card-title">`+res.nama_divisi+`</h5>

                        <p class="card-text">Total Task = `+res.total_task+`</p>
                        <p class="card-text">Complete Task = `+res.kelar+`</p>
                        <p class="card-text">Progress = `+res.Progress+`</p>
                        <p class="card-text">Expired Task = `+res.Expired+`</p>

                        


                      </div>
                    </div>`
                    
                }

            },
            complete(){
                console.log(task)
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {

        
                var data = new google.visualization.DataTable(task);
                data.addColumn('string', 'Divisi');
                data.addColumn('number', 'Complete');
                data.addColumn({type: 'string', role: 'tooltip','p': {'html': true}});
                data.addRows(
                    task
                )
                                
                var options = {
                  title: 'Department Progress Report',
                  focusTarget: 'category',
                    // Use an HTML tooltip.
                    tooltip: { isHtml: true },
                    sliceVisibilityThreshold:0
                };
                
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                
                chart.draw(data, options);
                }

            },
            error: function (jqXHR, exception){
                cosole.log(exception)
            }
        });
        });

      
    </script>

            <!-- End of Main Content -->

            @endsection