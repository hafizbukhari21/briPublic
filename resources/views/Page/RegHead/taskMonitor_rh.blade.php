@extends('index_rh')



@section('content')

@include('Component.navbar_rh') 
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Search Task</h6>
        </div>
        <form action="/reghead/taskMonitor" method="POST">
            @csrf
            <div class="card-body">
            <div class="row p-2">
                <div class="col-1" style="font-size:8pt">
                    Task
                </div>
                <div class="col-11">
                    <input name="task" type="text" class="form-control">
                </div>
            </div>
            <div class="row p-2">
                <div class="col-1" style="font-size:8pt">
                    Departement
                </div>
                <div class="col-11">
                    <select name="idDivisi" class="form-control">
                        <option value=""></option>
                        @foreach ($divisi_payload as $d)
                            <option value="{{$d->id}}" style="font-size:8pt">{{$d->nama_divisi}}</option>
                        @endforeach
                      
                       
                    </select>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-1" style="font-size:8pt">
                    Status
                </div>
                <div class="col-11">
                    <select name="status" class="form-control">
                        <option value="" style="font-size:8pt"></option>
                        <option value="1" style="font-size:8pt">On Progress</option>
                        <option value="2" style="font-size:8pt">Request</option>
                        <option value="3" style="font-size:8pt">Approval Section Head</option>
                        <option value="4" style="font-size:8pt">Done</option>
                        <option value="5" style="font-size:8pt">Expired</option>
                    </select>
                </div>
            </div>
        </form>
            <div class="row p-2">
                <div class="col-12">
                    <button class="btn btn-primary">search</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Task List -->
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
                            <th>Departemen</th>
                            <th>PIC</th>
                            <th>Jenis Pekerjaan</th>
                            <th>Keterangan</th>
                            <th>job</th>
                            <th>Attachment</th>
                            <th>Deadline</th>
                            <th>Status</th>
                            
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Waktu input</th>
                            <th>Departemen</th>
                            <th>PIC</th>
                            <th>Jenis Pekerjaan</th>
                            <th>Keterangan</th>
                            <th>job</th>
                            <th>Attachment</th>
                            <th>Deadline</th>
                            <th>Status</th>
                            
                        </tr>
                    </tfoot>
                    <tbody style="font-size:90%">
                        
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
                             <td width="5%">{{$t->nama_divisi}}</td>
                             <td width="5%">{{$t->penanggung_jawab}}</td>
                             <td width="75%">{{$t->jenis_pekerjaan}}</td>
                             <td>{{$t->keterangan}}</td>
                             <td>{{$t->job}}</td>
                             <td>
                                @if ($t->evidence)
                                    <a href="/{{$t->evidence}}">Lihat attachment</a>
                                @else
                                    tidak tersedia
                                @endif
                             </td>
                             <td> @php
                                
                                if($t->deadline){
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
                                }
                               
                                @endphp
                            </td>
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

                         </tr>
                        @endforeach
                    </tbody>
                </table>
               
                
            </div>
            
        </div>
    </div>
    
@endsection

