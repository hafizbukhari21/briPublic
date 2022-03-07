@extends('index_su')



@section('content')

@include('Component.navbar_su')
<div class="container-fluid">
  

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4">

            <!-- Project Card Example -->
            

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Activity Log</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>username</th>
                                    <th>TimeStamp</th>
                                    <th>Activity</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>username</th>
                                    <th>TimeStamp</th>
                                    <th>Activity</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($logs as $l)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$l->name}}</td>
                                        <td>{{$l->username}}</td>
                                        <td>{{$l->logCreate}}</td>
                                        <td>{{$l->messageLog}}</td>
                                    </tr>
                                @endforeach            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Color System -->
            

        </div>

        
    </div>

</div>
<!-- edit Modal-->
<div class="modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" >
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Division</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="row p-1">
                <div class="col-2">
                    <label class="form-control border-0">Division Name</label>
            </div>
            <form action="/su/divisiUpdate" method="POST">
                @csrf
            <div class="col-10">
                    <input type="hidden" name="idDivisi" class="divisiId" id="">
                    <input type="text" name="nama_divisi" class="form-control divisiModal" >
                </div>
            </div>
            
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" href="#">Save</button>
            </div>
            </form>
        </div>
    </div>
    </div>
    
    <!-- Delete Modal-->
    <div class="modal" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="row p-2">
                    <div class="col">
                        Apakah anda yakin menghapus divisi<p style="font-weight: bold" class="divisidel"><p style="font-weight: bold"> 
                    </div>
                </div>
                <form action="/su/divisiDelete" method="POST">
                    @csrf
                    <input type="hidden" name="idDivisi" class="deleteId">
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger" href="#">Delete</button>
                </div>
                </form>
            </div>
        </div>
        </div>


      

@endsection