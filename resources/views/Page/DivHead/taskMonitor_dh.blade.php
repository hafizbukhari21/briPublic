@extends('index_dh')



@section('content')

@include('Component.navbar_dh')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Search Task</h6>
        </div>
        <form action="/divhead/taskMonitor" method="POST">
            @csrf
        <div class="card-body">
            <div class="row p-2">
                <div class="col-2">
                    Jenis Pekerjaan
                </div>
                <div class="col-10">
                    <input type="text" class="form-control" name="task">
                </div>
            </div>
            <div class="row p-2">
                <div class="col-2">
                    Status
                </div>
                <div class="col-10">
                    <select class="form-control" name="status">
                        <option value=""></option>
                        <option value="1">On Progress</option>
                        <option value="2">Request</option>
                        <option value="3">Approval Section Head</option>
                        <option value="4">Approval Departemen Head</option>
                        <option value="5" >Expired</option>
                    </select>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-2">
                    Waktu
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-1">
                            <label class="form-control border-0" style="font-size:90%">start</label>
                        </div>
                        <div class="col-5">
                            <input type="date" value="2000-01-01" name="timeAwal" class="form-control">
                        </div>
                        <div class="col-1">
                            <label class="form-control border-0">end</label>
                        </div>
                        <div class="col-5">
                            <input type="date" name="timeAkhir" value="{{date("Y-m-d")}}" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">search</button>
                </div>
            </div>
        </div>
        </form>
    </div>
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
                            <th>Waktu input</th>
                            <th>PIC</th>
                            <th>Jenis Pekerjaan</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            <th>job</th>
                            <th>Attachment</th>
                            <th>Deadline</th>
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
                            <th>job</th>
                            <th>Attachment</th>
                            <th>Deadline</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody style="font-size:90%">
                        
                        @foreach ($task_payload as $t)
                        @php
                        $date1=date_create($t->deadline);
                        $date2=date_create(date('Y-m-d'));
                        $diff=date_diff($date2,$date1);
                        $beda= $diff->format("%R%a") ;
                        if ($beda <0){
                         echo '<tr class="bg-danger text-white">';
                        }else if($beda <=7){
                         echo '<tr class="bg-warning">';
                        }else{
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
                            <form method="POST">
                                @csrf
                                <input type="hidden" name="idTask" value="{{$t->id}}">
                            <td><input type="text" name="keterangan" value="{{$t->keterangan}}" class="form-control border-0"></td>
                            <td>{{$t->job}}</td>
                            <td>
                                @if ($t->evidence)
                                    <a href="/{{$t->evidence}}">Lihat Attachment</a>
                                @else
                                    tidak tersedia
                                @endif
                            </td>
                            <td> 
                                @php
                                    
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
                                    Menunggu Approval Section Head
                                @elseif($t->status==3)
                                    <button type="submit" class="btn btn-success" formaction="/divhead/taskMonitor/approve">Approve</button>
                                 @elseif($t->status==4)
                                    <kbd class="bg-success">Done</kbd>
                                @endif
                            </td>
                        </form>

                        </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection