@extends('index_staff')



@section('content')

@include('Component.navbar_staff')

<!-- Begin Page Content -->
<div class="container-fluid">

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
            <h6 class="m-0 font-weight-bold text-primary">Task Input</h6>
        </div>
        <form action="/tambahTask" method="POST">
            @csrf
            <div class="card-body">
                <div class="row p-2">
                    <div class="col-2">
                        <label class="form-control border-0">Atasan</label>
                        <select class="js-example-basic-single form-control" name="nama_user">
                            @foreach ($dataUser as $du)
                                <option>{{$du->name}}</option>
                            @endforeach
                                
                          </select>
                          
                        
                    </div>
                    <div class="col-2">
                        <label class="form-control border-0">PIC</label>
                        <select class="js-example-basic-single form-control" name="penanggung_jawab">
                            @foreach ($dataUser as $du)
                                <option>{{$du->name}}</option>
                            @endforeach
                            <option >{{session()->get("sessionKey")["name"]}}</option>
                          </select>
                          
                        
                    </div>
                    <div class="col-4">
                        <label class="form-control border-0">Jenis Pekerjaan</label>
                        <!--<input name="jenis_pekerjaan" type="text" class="form-control">-->
                        <textarea name="jenis_pekerjaan" class="form-control" rows="1"></textarea>
                    </div>
                    <div class="col-1">
                        <label class="form-control border-0">Job</label>
                        <select class="form-control" name="job">
                            <option value="Main Job">Main Job</option>
                            <option value="Additional Job">Additional Job</option>
                        </select>
                    </div>
                    <div class="col-2">
                        <label class="form-control border-0">Deadline</label>
                        <input name="deadline" type="date" class="form-control">
                    </div>
                    <div class="col-1">
                        <label class="form-control border-0"></label>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-envelope"></i></button>
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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size:90%; overflow: scrollX;">
                    <thead>
                        <tr>
                            <th >Waktu input</th>
                            <th >Atasan</th>
                            <th >PIC</th>
                            <th >Jenis Pekerjaan</th>
                            <th >Status</th>
                            <th >Ket</th>
                            <th >Job</th>
                            <th >Deadline</th>
                            <th >Attachment</th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Waktu input</th>
                            <th >Atasan</th>
                            <th>PIC</th>
                            <th>Jenis Pekerjaan</th>
                            <th>Status</th>
                            <th>Ket</th>
                            <th>Job</th>
                            <th>Deadline</th>
                            <th>Attachment</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($task as $t)
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
                            <td>{{$t->waktu_input}}</td>
                            
                            {{-- Atasan --}}
                            <td>{{$t->name}}</td>

                            {{-- PIC --}}
                            <td>{{$t->penanggung_jawab}}</td>
                            <form action="/editTask" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="idTask" value="{{$t->id}}"/>
                                <td><input value="{{$t->jenis_pekerjaan}}" type="text" name="jenis_pekerjaan" id="" class="form-control border-0" style="font-size:100%"></td>
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
                                <td>
                                        <input value="{{$t->keterangan}}"  name="keterangan" type="text" class="form-control border-0">
                                    
                                </td>
                                <td>{{$t->job}}</td>
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
                                    @if ($t->evidence)
                                        <a href="/{{$t->evidence}}" style="font-size:70%">Lihat Attachment</a>
                                    @else
                                        <input type="file" name="evidence" id="" class="form-control" style="font-size:70%">
                                    @endif
                                    
                                </td>
                                <td>
                                    @if ($t->status==1)
                                        <button type="submit" class="btn btn-primary" style="font-size:70%"><i class="fa fa-edit"></i></button>
                                    @elseif($t->status==2)
                                        Waiting..
                                    @elseif($t->status==3)
                                        <kbd class="bg-success" style="font-size:70%">Approval Section Head</kbd>
                                    @elseif($t->status==4)
                                        <kbd class="bg-success" style="font-size:70%">Approval Department Head</kbd>
                                    @endif
                                    
                                </td>
                            </form>
                           
                        </tr>
                        @endforeach
                        {{-- <tr>
                            <td>24/12/2022 08:00:00</td>
                            <td>SH 1</td>
                            <td>Memotong buah</td>
                            <form action="">
                                @csrf
                                <input type="hidden" name="idTask"/>
                                <td><kbd class="bg-warning">Progress</kbd></td>
                                <td><input name="keterangan" type="text" class="form-control border-0"></td>
                                <td>
                                    <a href="#" class="btn btn-primary">Done</a>
                                </td>
                            </form>
                           
                        </tr>
                        <tr>
                            <td>24/12/2022 08:00:00</td>
                            <td>SH 1</td>
                            <td>Memotong buah</td>
                            <td><kbd class="bg-success">Done</kbd></td>
                            <td><input type="text" class="form-control border-0"></td>
                            <td>
                                <a href="#" class="btn btn-white">Done</a>
                            </td>
                        </tr>
                        <tr>
                            <td>24/12/2022 08:00:00</td>
                            <td>SH 1</td>
                            <td>Memotong buah</td>
                            <td><kbd class="bg-secondary">request</kbd></td>
                            <td><input type="text" class="form-control border-0"></td>
                            <td>
                                <a href="#" class="btn btn-primary">Done</a>
                            </td>
                        </tr> --}}
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
<!-- /.container-fluid -->
