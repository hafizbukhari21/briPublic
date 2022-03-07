@extends('index_dh')



@section('content')

@include('Component.navbar_dh')

<!-- Begin Page Content -->
<div class="container-fluid">

   

    <!-- Content Row -->
    

    <!-- Content Row -->

    

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Task Completion</h6>
                </div>
                <div class="card-body">
                    @foreach ($taskCopletion as $tp)

                    @if ($tp->id == session()->get("sessionKey")["idDivisi"] )
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
                    @endif
                    {{-- <h4 class="small font-weight-bold">{{$tp->nama_divisi}} <span
                        class="float-right">{{intval($tp->yang_kelar)}}%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar @php
                            $item =["bg-warning", "bg-info", "bg-danger","bg-success"];
                            echo $item[array_rand($item)];
                        @endphp" role="progressbar" style="width: {{intval($tp->yang_kelar)}}%"
                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div> --}}
                    @endforeach
                    
                </div>
            </div>

            <!-- Color System -->
            

        </div>

        <div class="col-lg-6 mb-4">

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
                    {{-- <a href="#"><strong>Judul task</strong></a> - Regional credit restructuring & recovery team | <kbd class="bg-success">done</kbd>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias reprehenderit minima reiciendis eligendi, rem error nam vero itaque facilis nobis cum.</p>
                    <hr class="sidebar-divider"> --}}
                    <!--end last task-->
                </div>
            </div>

            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Last Received Message</h6>
                </div>
                <div class="card-body">
                    <!-- last send message-->
                    @foreach ($lastReceivedMessage as $ldm)
                        <a href="#"><strong>{{$ldm->isi_pesan}} </strong></a>
                        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias reprehenderit minima reiciendis eligendi, rem error nam vero itaque facilis nobis cum.</p> --}}
                        - <span class="text-secondary" style="font-size:70%">{{$ldm->tglMessage}}</span>
                        <hr class="sidebar-divider">
                    @endforeach 
                    
                    <!-- end last deliver message-->
                </div>
                
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Last Forwarded Message</h6>
                </div>
                <div class="card-body">
                    <!-- last send message-->
                    @foreach ($lastFowardedMessage as $ldm)
                    <a href="#"><strong>{{$ldm->isi_pesan}} to {{$ldm->name}}</strong></a>
                    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias reprehenderit minima reiciendis eligendi, rem error nam vero itaque facilis nobis cum.</p> --}}
                    - <span class="text-secondary" style="font-size:70%">{{$ldm->tglMessage}}</span>
                    <hr class="sidebar-divider">
                    @endforeach
                    
                    <!-- end last deliver message-->
                </div>
                
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection