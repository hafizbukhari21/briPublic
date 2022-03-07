@extends('index_su')



@section('content')

@include('Component.navbar_su')
<div class="container-fluid">
    
@if (session('select_cred'))
    <div class="modal fade" tabindex="0" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Status</h5>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">X</button>
        </div>
        <div class="modal-body">
          <form action="/registerRegHead" method="POST">
              <input type="hidden" name="idUser"  value="{{session('select_cred')}}">
              @csrf
            @foreach ($divisi as $d)
                <div class="form-check">
                    <input class="form-check-input" name="{{$d->id}}" type="checkbox" value={{$d->id}} id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      {{$d->nama_divisi}}
                    </label>
                </div>
            @endforeach
           
            <div class="col-2 ">
                <label class="form-control border-0">&nbsp;</label>
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus-square"></i> Add</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  <script >
    window.onload= () => {
      var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
      keyboard: false
      })
      myModal.show()
  
    }
  </script>
@endif
    

    
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">User Register</h6>
                </div>
                <div class="card-body">
                    <form action="/registerUser" method="POST">
                        @csrf
                    <div class="row">
                        <div class="col-2">
                            <label class="form-control border-0">username/nip</label>
                            <input name="username" type="text" class="form-control" placeholder="ketik usernama...">
                        </div>
                        <div class="col-2">
                            <label class="form-control border-0">Password</label>
                            <input name="password" type="password" class="form-control" placeholder="ketik Password...">
                        </div>
                        <div class="col-2">
                            <label class="form-control border-0">Nama lengkap</label>
                            <input name="name" type="text" class="form-control" placeholder="ketik Nama Lengkap...">
                        </div>
                        <div class="col-2">
                            <label class="form-control border-0">Departemen</label>
                            <select name="idDivisi" id="" class="form-control">
                                @foreach ($divisi as $d)
                                <option value={{$d->id}}>{{$d->nama_divisi}}</option>
                                @endforeach
                                
                              
                            </select>
                        </div>
                        <div class="col-2">
                            <label class="form-control border-0">Role</label>
                            <select name="role" id="" class="form-control">
                                <option value="1">CEO</option>
                                <option value="2">Regional Head</option>
                                <option value="3">Departement Head</option>
                                <option value="4">Section Head</option>
                                <option value="5">Staff</option>
                                <option value="6">Super User</option>
                            </select>
                        </div>
                      
                   
                        <div class="col-2 ">
                            <label class="form-control border-0">&nbsp;</label>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus-square"></i> Add</button>
                        </div>
                    </form>
                    </div>
                    
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">User Register</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Username</th>
                                    <th>Nama Lengkap</th>
                                    <th>Departemen</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>Username</th>
                                    <th>Nama Lengkap</th>
                                    <th>Departemen</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($payload as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td class="usernameS{{$data->id}}">{{$data->username}}</td>
                                    <td class="name{{$data->id}}">{{$data->name}}</td>
                                    <td>{{$data->nama_divisi}}</td>
                                    <td class="role{{$data->id}}">@php
                                         switch($data->role){
                                               case '1':
                                                   echo "CEO";
                                                   break;
                                               case '2':
                                                   echo "Regional Head";
                                                   break;
                                               case '3':
                                                   echo "Division Head";
                                                   break;
                                               case '4':
                                                   echo "Section Head";
                                                   break;
                                               case '5':
                                                   echo "Staff";
                                                   break;
                                               case '6':
                                                   echo "Super User";
                                                   break;
                                               default:
                                                   echo "error";
                                           };
                                    @endphp</td>
                                    <td style="font-size: 80%">
                                        <button type="button"  value={{$data->id}} class="btn btn-primary update" data-toggle="modal" data-target="#editModal">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button  type="button" value={{$data->id}} class="btn btn-danger delete" data-toggle="modal" data-target="#deleteModal">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
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
            <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="/updateUser" method="POST">
            @csrf
        <div class="row p-1">
            <div class="col-2">
                <label class="form-control border-0">Username</label>
        </div>
        <div class="col-10">
                <input type="text"  name="username" class="form-control formUsername"  readonly>
            </div>
        </div>
        <div class="row p-1">
            <div class="col-2">
                <label class="form-control border-0">Password</label>
            </div>
            <div class="col-10">
                <input type="text" name="password" class="form-control" placeholder="type if you want to change..." required>
            </div>
        </div>
        <div class="row p-1">
            <div class="col-2">
                <label class="form-control border-0">Nama</label>
            </div>
            <div class="col-10">
                <input type="text" name="name" class="form-control formNama" value="">
            </div>
        </div>
        <div class="row p-1">
            <div class="col-2">
                <label class="form-control border-0">Divisi</label>
            </div>
            <div class="col-10">
                <select name="divisiId" id="" class="form-control">
                    <option></option>
                    @foreach ($divisi as $d)
                        <option value="{{$d->id}}">{{$d->nama_divisi}}</option>
                    @endforeach
                    
                    {{-- <option>Regional human capital bussiness partner department</option>
                    <option>Regional consumer loan factory team</option>
                    <option>Regional legal team</option>
                    <option>Micro bussiness department</option>
                    <option>BRILINK department</option> --}}
                </select>
            </div>
        </div>
        <div class="row p-1">
            <div class="col-2">
                <label class="form-control border-0">Role</label>
            </div>
            <div class="col-10">
                <select name="role" id="" class="form-control formRole">
                    <option></option>
                    <option value="1">CEO</option>
                    <option value="2">Regional Head</option>
                    <option value="3">Departement Head</option>
                    <option value="4">Section Head</option>
                    <option value="5">Staff</option>
                    <option value="6">Super User</option>
                </select>
            </div>
        </div>
        
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button type="save" class="btn btn-primary" href="#">Save</button>
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
                    Apakah anda yakin menghapus user <strong class="namaUser"></strong>&nbsp;?
                </div>
            </div>
            <form action="/deleteUser" method="GET">
                @csrf
                <input type="text" name="idMessage" class="idMessage_">
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger" >Delete</button>
            </div>
            </form>
        </div>
    </div>
    </div>

    <script>
        $(document).ready(function () {
            
            $(document).on('click', '.delete', function(){
                
		        let id=$(this).val();
                let person= $(".name"+id).text();
                let username =$(".usernameS"+id).text();
                console.log(username)
                
                $(".namaUser").append(person);
                $(".idMessage_").val(username);

	        });


            $(document).on('click', '.update', function(){
                let id = $(this).val();
                let divisi= $(".divisi"+id).text();
                let username =$(".usernameS"+id).text();
                

                $(".formNama").val(name);
                $(".formUsername").val(username);
            });
        });
    </script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script> --}}

@endsection