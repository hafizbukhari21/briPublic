@extends('index_dh')



@section('content')

@include('Component.navbar_dh')
<div class="container-fluid">

                    
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
                            <th>Message</th>
                            <th>level</th>
                            <th>indikator</th>
                            <th>Fowarded To</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Time</th>
                            <th>Message</th>
                            <th>level</th>
                            <th>indikator</th>
                            <th>Fowarded To</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($message_payload as $m)
                            <tr>

                                <td width="8%" class="time{{$m->messageId}}">{{$m->message_createdTime}}</td>
                                <td width="8%" class="nama_pekerjaan{{$m->messageId}}">{{$m->isi_pesan}}</td>
                                <td>
                                    @if ($m->urgent==1)
                                        <span class="text-danger status{{$m->messageId}}">Urgent</span>
                                    @elseif($m->urgent==2)
                                        <span class="text-progress status{{$m->messageId}}">Regular</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($m->ReadedByDivHead==1)
                                        <kbd class="bg-secondary">received</kbd>
                                    @elseif($m->ReadedByDivHead==2)
                                        <kbd class="bg-primary">read</kbd>
                                    @elseif($m->ReadedByDivHead==3)
                                        <kbd class="bg-primary">Foward</kbd>
                                @endif
                                </td>
                                <td>
                                    @if ($m->idSecHead )
                                    {{$m->name}}
                                    @else
                                        --Belum di foward--
                                    @endif
                                </td>
                                <td>
                                    @if ($m->progress==1)
                                        <kbd class="bg-warning">Progress</kbd>
                                    @elseif($m->progress==2)
                                        <kbd class="bg-success">Done</kbd>
                                    @endif
                                </td>

                                <td>

                                    <button type="button" value="{{$m->messageId}}" data-toggle="modal" data-target="#openMsgModal" href="#" class="btn btn-secondary edit">open</button>

                                    <button type="button" value="{{$m->messageId}}" data-toggle="modal" data-target="#fwdMsgModal" href="#" class="btn btn-primary foward">forward</button>
                                    <!--
                                        button disabled after cliked
                                    -->
                                </td>
                            </tr>
                        @endforeach
                       

                        {{-- <tr>
                            
                            <td class="time1">12/12/2022 08:00</td>
                            <td class="nama_pekerjaan1">membuat prakarya asdsadsadsad</td>
                            <td><span class="text-danger status1">Urgent</span></td>
                            <td>
                                <kbd class="bg-secondary">received</kbd>
                                <!--
                                    received -> bg-secondary
                                    read -> bg-primary
                                    forward -> bg-success
                                -->
                            </td>
                            <td>
                                <kbd class="bg-warning">Progress</kbd>
                            </td>
                            
                            <td>

                                <button type="button" value="1" data-toggle="modal" data-target="#openMsgModal" href="#" class="btn btn-secondary edit">open</button>
                                
                                <button type="button" value="1" data-toggle="modal" data-target="#fwdMsgModal" href="#" class="btn btn-primary foward">forward</button>
                                <!--
                                    button disabled after cliked
                                -->
                            </td>
                        </tr> --}}
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="modal fade" id="openMsgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Received Message</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row p-1">
                    <div class="col-3"><label class="form-control border-0">Time</label></div>
                    <div class="col-9"><input type="text" class="form-control time_modal" readonly></div>
                </div>
                <div class="row p-1">
                    <div class="col-3"><label class="form-control border-0">Message</label></div>
                    <div class="col-9"><textarea class="form-control  modal_nama_pekerjaan" readonly></textarea></div>
                </div>
                <div class="row p-1">
                    <div class="col-3"><label class="form-control border-0">Level</label></div>
                    <div class="col-9"><input type="text" class="form-control status_modal" readonly></div>
                </div>
            </div>
            <form action="/divhead/markAsRead" method="POST">
                @csrf
                <input type="hidden" name="idMessage" class="idMessage">
                <div class="modal-footer">
                <button class="btn btn-secondary" type="submit">Mark As Read</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="fwdMsgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Forward Message</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="/divhead/fowardMessage" method="POST">
                @csrf
                <input type="hidden" name="idMessage" class="idMessage">
            <input style="display: none" type="text" name="idMessage_modal" class="idMessage_modal" >
            <div class="row">
                <div class="col-3"><label class="form-control border-0">To</label></div>
                <form action="">
                <div class="col-9">
                    <select class="form-control" name="userdivisi" >
                        @foreach ($userDivisi as $ud)
                            <option value="{{$ud->id}}">{{$ud->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-primary" type="submit" href="#">Forward</button>
        </div>
        </form>
        </form>
    </div>
</div>
</div>
 
<script>
    $(document).ready(function () {
        $(document).on('click', '.edit', function(){
		let id=$(this).val();
        let nama_pekjeraan = $(".nama_pekerjaan"+id).text();
        let time = $(".time"+id).text()
        let status = $(".status"+id).text();
        
		
        $(".idMessage").val(id);
        $(".modal_nama_pekerjaan").val(nama_pekjeraan);
        $(".time_modal").val(time);
        $(".status_modal").val(status);
        
	    });

        $(document).on('click','.foward', function () {
            let id=$(this).val();
            
            $(".idMessage").val(id);
            $(".idMessage_modal").val(id);
        });
    });
</script>

@endsection