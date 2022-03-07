@extends('index_sh')

@section('content')

@include('Component.navbar_sh') 
<!-- Begin Page Content -->
<div class="container-fluid">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
    @endif
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Search Task</h6>
        </div>
        <form action="/sechead/taskMonitor" method="POST">
            @csrf
        <div class="card-body">
            <div class="row p-2">
                <div class="col-1">
                    Jenis Pekerjaan
                </div>
                <div class="col-11">
                    <input type="text" name="task" class="form-control">
                </div>
            </div>
            <div class="row p-2">
                <div class="col-1">
                    Status
                </div>
                <div class="col-11">
                    <select class="form-control" name="status">
                        <option value=""></option>
                        <option value="1">On Progress</option>
                        <option value="2">Request</option>
                        <option value="3">Approval Section Head</option>
                        <option value="4">Done</option>
                        <option value="5" s>Expired</option>
                    </select>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-1">
                    Waktu
                </div>
                <div class="col-11">
                    <div class="row">
                        <div class="col-1">
                            <label class="form-control border-0">start</label>
                        </div>
                        <div class="col-5">
                            <input name="timeAwal" type="date" value="2000-01-01" class="form-control">
                        </div>
                        <div class="col-1" >
                            <label class="form-control border-0">end</label>
                        </div>
                        <div class="col-5">
                            <input name="timeAkhir" value="{{date("Y-m-d")}}" type="date" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">search</button>
                </div>
            </div>
        </div>
        
        </div>
    </form>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Task List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th >Waktu input</th>
                            <th width="10%">PIC</th>
                            <th>Jenis Pekerjaan</th>
                            <th>Status</th>
                            <th width="5%">Keterangan</th>
                            <th>Job</th>
                            <th>Attachment</th>
                            <th>DeadLine</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Waktu input</th>
                            <th>PIC</th>
                            <th>Jenis Pekerjaan</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            <th>Job</th>
                            <th>Attachment</th>
                            <th>DeadLine</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody style="font-size:90%">
                        {{-- <tr>
                            <td>24/12/2022 08:00:00</td>
                            <td>SH 1</td>
                            <td>Memotong buah</td>
                            <td><kbd class="bg-warning">Progress</kbd></td>
                            <td><input type="text" class="form-control border-0"></td>
                            <td>
                                <a href="#" class="btn btn-white">Approve</a>
                                <a href="#" class="btn btn-danger">Reject</a>
                            </td>
                        </tr> --}}
                        @foreach ($task_payload as $t)
                        @php
                        $date1=date_create($t->deadline);
                        $date2=date_create(date('Y-m-d'));
                        $diff=date_diff($date2,$date1);
                        $beda= $diff->format("%R%a") ;
                        if($t->status!=4){
                            if ($beda <0){
                            echo '<tr class="bg-danger text-white">';
                            }else if($beda <=7){
                            echo '<tr class="bg-warning">';
                            }else{
                            echo '<tr>';       
                            }
                        }
                        else{
                            echo '<tr>';
                        }
                        @endphp
                            <td width="8%">{{$t->waktu_input}}</td>
                            <td width="5%">{{$t->penanggung_jawab}}</td>
                            <td width="80%">{{$t->jenis_pekerjaan}}</td>
                            <td>
                                @if ($t->status==1)
                                    <kbd class="bg-warning">Progress</kbd>
                                @elseif($t->status==2)
                                    <kbd class="bg-secondary">request</kbd>
                                @elseif($t->status==3)
                                    <kbd class="bg-success">Approval Section Head</kbd>
                                @elseif($t->status==4)
                                    <kbd class="bg-success">Done</kbd>
                               
                              
                                @endif
                            </td>
                            <form method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="idTask" value="{{$t->id}}">
                            <td style="width: 50%"><input type="text" name="keterangan" value="{{$t->keterangan}}" class="form-control border-0"></td>
                            <td>{{$t->job}}</td>
                            <td >
                                @if ($t->evidence)
                                    <a href="/{{$t->evidence}}">Lihat Attachment</a>
                                @else
                                  Not available
                                @endif
                            </td>
                            <td>
                                @php
                                    $date1=date_create($t->deadline);
                                    $date2=date_create(date('Y-m-d'));
                                    $diff=date_diff($date2,$date1);
                                    $beda= $diff->format("%R%a") ;
                                    if ($beda <0){
                                       echo '<kbd class="bg-danger">'.date_format(date_create($t->deadline),"d-m-Y").'</kbd>';
                                       echo 'Expired';
                                    }

                                    else if ($beda <=7){
                                       echo '<kbd class="bg-warning">'.date_format(date_create($t->deadline),"d-m-Y").'</kbd>';
                                    }
                                    else{
                                        echo '<kbd class="bg-success">'.date_format(date_create($t->deadline),"d-m-Y").'</kbd>';
                                    }
                                @endphp
                            </td>
                            <td>    
                                @if ($t->status==1)
                                  Masih dalam Progress

                                @elseif($t->status==2)
                                    @if (Session::get("sessionKey")["id"]==$t->idUserAsPic)
                                        <button type="submit" class="btn btn-success" formaction="/sechead/taskMonitor/approve">Approve</button>
                                        <button type="submit" class="btn btn-danger" formaction="/sechead/taskMonitor/reject">Reject</button>
                                     @else
                                     anda tidak punya akses
                                    @endif
                                @elseif($t->status==3)
                                    <kbd class="bg-success">Approval Section Head</kbd>
                                 @elseif($t->status==4)
                                    <kbd class="bg-success">Done</kbd>
                                @endif
                            </td>
                        </form>

                        </tr>
                       @endforeach
                </table>
            </div>
        </div>
    </div>
    @endsection