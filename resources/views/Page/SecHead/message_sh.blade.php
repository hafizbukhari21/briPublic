@extends('index_sh')

@section('content')

@include('Component.navbar_sh') 
                <!-- Begin Page Content -->
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
                                            <th>Received</th>
                                            <th>Message</th>
                                            <th>level</th>
                                            <th>indikator</th>
                                            <th>Status</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Received</th>
                                            <th>Message</th>
                                            <th>level</th>
                                            <th>indikator</th>
                                            <th>status</th>
                                            <th>action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($messagePayload as $m)
                                            <tr>
                                                <td class="time{{$m->id}}">{{$m->created_at}}</td>
                                                <td class="nama_pekerjaan{{$m->id}}">{{$m->isi_pesan}}</td>
                                                <td>
                                                    @if ($m->urgent==1)
                                                        <span class="text-danger status{{$m->id}}">Urgent</span>
                                                    @elseif($m->urgent==2)
                                                        <span class="text-progress status{{$m->id}}">Regular</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($m->ReadedBySecHead==1)
                                                        <kbd class="bg-secondary">received</kbd>
                                                    @elseif($m->ReadedBySecHead==2)
                                                        <kbd class="bg-primary">read</kbd>
                                                    @elseif($m->ReadedBySecHead==3)
                                                        <kbd class="bg-primary">Done</kbd>
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
                                                    <button type="button" value="{{$m->id}}" data-toggle="modal" data-target="#openMsgModal" href="#" class="btn btn-secondary open">open</button>  
                                                    <!--
                                                        button disabled after cliked
                                                    -->

                                                    @if ($m->ReadedBySecHead==1)
                                                        <a href="/sechead/finalizeMessage/{{$m->id}}" class="btn btn-primary">done</a>
                                                    @elseif($m->ReadedBySecHead==2)
                                                        <a href="/sechead/finalizeMessage/{{$m->id}}" class="btn btn-primary">done</a>
                                                    @elseif($m->ReadedBySecHead==3)
                                                        Finalized
                                                    @endif
                                                    
                                                </td>

                                            </tr>
                                        @endforeach
                                       

                                        {{-- <tr>
                                            <td class="time2">12/12/2022 08:00</td>
                                            <td class="nama_pekerjaan2">membuat prakarya asdsad</td>
                                            <td><span class="text-danger status2">Urgent</span></td>
                                            <td>
                                                <kbd class="bg-secondary">received</kbd>
                                                <!--
                                                    received -> bg-secondary
                                                    read -> bg-primary
                                                    forward -> bg-success
                                                -->
                                            </td>
                                            <td>
                                                <kbd class="bg-warning">Progress sdsd</kbd>
                                            </td>
                                            <td>
                                                <button type="button" value="2" data-toggle="modal" data-target="#openMsgModal" href="#" class="btn btn-secondary open">open</button>  
                                                <!--
                                                    button disabled after cliked
                                                -->
                                                <a href="#" class="btn btn-primary">done</a>
                                            </td>
                                            
                                        </tr>

                                        <tr>
                                            <td class="time3">12/12/2022 18:00</td>
                                            <td class="nama_pekerjaan3">membuat prakarya asdsad</td>
                                            <td><span class="text-danger status3">Ursgent</span></td>
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
                                                <button type="button" value="3" data-toggle="modal" data-target="#openMsgModal" href="#" class="btn btn-secondary open">open</button>  
                                                <!--
                                                    button disabled after cliked
                                                -->
                                                <a href="#" class="btn btn-primary">done</a>
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
                        <div class="col-3"><label class="form-control border-0 ">Message</label></div>
                        <div class="col-9"><textarea class="form-control modal_nama_pekerjaan" readonly></textarea></div>
                    </div>
                    <div class="row p-1">
                        <div class="col-3"><label class="form-control border-0 ">Level</label></div>
                        <div class="col-9"><input type="text" class="form-control status_modal" readonly></div>
                    </div>
                </div>
                <form action="/sechead/markAsRead" method="POST">
                    @csrf
                <input type="hidden" name="idMessage" class="idMessage_">
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="submit" >Mark As Read</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        
         $(document).ready(function () {
        $(document).on('click', '.open', function(){
		let id=$(this).val();
        let nama_pekjeraan = $(".nama_pekerjaan"+id).text();
        let time = $(".time"+id).text()
        let status = $(".status"+id).text();
        
		

        $(".idMessage_").val(id);
        $(".modal_nama_pekerjaan").val(nama_pekjeraan);
        $(".time_modal").val(time);
        $(".status_modal").val(status);
        
	    });

    });
    </script>
@endsection
