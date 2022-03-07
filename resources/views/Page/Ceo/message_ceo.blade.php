@extends('index_ceo')



@section('content')

@include('Component.navbar_ceo')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Message</h6>
                        </div>
                        <form action="/ceo/sendMessage" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="card-body">
                            <div class="row p-2">
                                <div class="col-2">
                                    <label class="form-control border-0">Send To</label>
                                    <select class="js-example-basic-single form-control" name="idUser_asRegHead">
                                        @foreach ($reghead_payload as $rp)
                                            <option value={{$rp->id}}>{{$rp->name}}</option>
                                        @endforeach
                                      </select>
                                    {{-- <select class="form-control" name="idReghead">
                                        @foreach ($reghead_payload as $rp)
                                            <option value={{$rp->id}}>{{$rp->name}}</option>
                                        @endforeach
                                    </select> --}}
                                </div>
                                <div class="col-4">
                                    <label class="form-control border-0">Message</label>
                                    <input type="text" class="form-control" name="message">
                                </div>
                                <div class="col-2">
                                    <label class="form-control border-0">Level</label>
                                    <select class="form-control" name="urgent">
                                        <option value="1">Urgent</option>
                                        <option value="2">Reguler</option>
                                        
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label class="form-control border-0">Attachment</label>
                                    <input type="file" class="form-control" name="attachment">
                                </div>

                                <div class="col-2">
                                    <label class="form-control border-0"></label>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-envelope"></i> send</button>
                                </div>
                            </div>
                            </form>
                            
                        </div>
                    </div>
                    <!-- Message list -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Message list</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Time</th>
                                            <th>Send to</th>
                                            <th>Message</th>
                                            <th>level</th>
                                            <th>Attachment</th>
                                            <th>indikator</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Time</th>
                                            <th>Send to</th>
                                            <th>Message</th>
                                            <th>level</th>
                                            <th>Attachment</th>
                                            <th>indikator</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        @foreach ($message_payload as $m)
                                        <tr>
                                            <td width="10%">{{$m->tanggalMessageDibuat}}</td>
                                            <td width="10%">{{$m->name}}</td>
                                            <td width="50%">{{$m->isi_pesan}}</td>
                                            <td>
                                                @if ($m->urgent==1)
                                                    <span class="text-danger">Urgent</span>
                                                @elseif($m->urgent==2)
                                                    <span class="text-progress">Regular</span>
                                                @endif
                                                
                                            </td>
                                            <th>
                                                <a href="/{{$m->attachment}}">{{$m->attachment}}</a>
                                            </th>
                                            <td>
                                                @if ($m->progress==1)
                                                    <kbd class="bg-warning">Progress</kbd>
                                                @elseif($m->progress==2)
                                                    <kbd class="bg-success">Done</kbd>
                                                @endif
                                                
                                            </td>
                                            <td> 
                                                @php
                                                    if($m->progress!=2){
                                                        if($m->ReadedByRegHead==1){
                                                            echo '<kbd class="bg-primary">Send</kbd>';
                                                        }
                                                        else if($m->ReadedByRegHead==2 || $m->ReadedByRegHead==3){
                                                            echo '<kbd class="bg-success">Read by RegHead</kbd>';
                                                        }
                                                    } else{
                                                        echo '<kbd class="bg-success">Done</kbd>';
                                                    }
                                                @endphp
                                            
                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                        {{-- <tr>
                                            <td>12/12/2022 08:00</td>
                                            <td>RH 1</td>
                                            <td>membuat prakarya</td>
                                            <td><span class="text-danger">Urgent</span></td>
                                            <td>
                                                <kbd class="bg-warning">Progress</kbd>
                                            </td>
                                            <td><kbd class="bg-primary">Send</kbd></td>
                                        </tr>
                                        <tr>
                                            <td>12/12/2022 08:00</td>
                                            <td>RH 2</td>
                                            <td>membuat musik</td>
                                            <td><span class="text-primary">Reguler</span></td>
                                            <td>
                                                <kbd class="bg-warning">Progress</kbd>
                                            </td>
                                            <td><kbd class="bg-secondary">Read</kbd></td>
                                        </tr>
                                        <tr>
                                            <td>12/12/2022 08:00</td>
                                            <td>RH 3</td>
                                            <td>membuat musik</td>
                                            <td><span class="text-primary">Reguler</span></td>
                                            <td>
                                                <kbd class="bg-warning">Progress</kbd>
                                            </td>
                                            <td><kbd class="bg-success">Forward</kbd></td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

         
            @endsection