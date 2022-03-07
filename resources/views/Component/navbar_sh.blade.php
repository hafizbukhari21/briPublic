 <!-- Topbar -->
 <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Division Navbar -->
    <span class="h5 text-secondary showDivisi"></span>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small"
                            placeholder="Search for..." aria-label="Search"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter taskCounter"></span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Alerts Center
                </h6>
                <div class="taskAlert"></div>
            </div>
        </li>

        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter messageCounter"></span>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                    Message Center
                </h6>
                <div class="message"></div>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{session()->get("sessionKey")["name"]}}</span>
                <img class="img-profile rounded-circle"
                    src="../../img/undraw_profile.svg">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#profileModal">
                    <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>

<script>
    $(document).ready(function () {
        totalmessage=0
        totalTask=0
        $(".messageCounter").hide();
        $('.taskCounter').hide();
        $.ajax({
            type: "GET",
            url: "/staff/navbar",
            success: function (response) {
                
                $(".showDivisi").append(response.userData.nama_divisi);
            },
            error: function (jqXHR, exception){
                cosole.log(exception)
            }
        });


        $.ajax({
            type: "GET",
            url: "/sechead/messageNavbar",
            success: function (response) {
                console.log(response)
                response.map(res=>{
                    $('.message').append(`<a href='/sechead/message' class="dropdown-item d-flex align-items-center" href="#">
                        
                        <div>
                            <div class="text-truncate">`+res.isi_pesan+`</div>
                            <div class="small text-gray-500">`+res.name+` · `+res.tglMessage+`</div>
                        </div>
                    </a>`);
                    totalmessage++;
                })
            },
            complete(){
                
                if(totalmessage>0){
                    $(".messageCounter").show();
                    $(".messageCounter").append(totalmessage);
                }
            },
            error: function (jqXHR, exception){
                cosole.log(exception)
            }
        });


        $.ajax({
            type: "GET",
            url: "/sechead/taskNavbar",
            success: function (response) {
                console.log(response)
                response.map(res=>{
                    $('.taskAlert').append(` <a class="dropdown-item d-flex align-items-center" href="/sechead/taskMonitor">
                        <div class="mr-3">
                            <div class="icon-circle bg-primary">
                                <i class="fas fa-file-alt text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">`+res.waktuTask+`</div>
                            <span class="font-weight-bold">`+res.jenis_pekerjaan+`</span>
                            <br/><span class="font-weight-bold"> Deadline. `+res.deadline+`</span>
                        </div>
                    </a>`);
                    totalTask++;
                })
            },
            complete(){
                
                if(totalTask>0){
                    $(".taskCounter").show();
                    $(".taskCounter").append(totalTask);
                }
            },
            error: function (jqXHR, exception){
                cosole.log(exception)
            }
        });

    });
</script>
<!-- End of Topbar -->