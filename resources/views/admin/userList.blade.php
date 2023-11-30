<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('includes/header1')
    <link rel="stylessheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="stylesheet" href="/customcss/admin.css">
    <title>Document</title>
</head>
<body>
    <form id="logout-form" action="/logout" method="POST" style="display:none;">
        @csrf
    </form>

    <div id="wrapper">
        <div class="overlay"></div>
         
             <!-- Sidebar -->
        <nav class="navbar navbar-inverse fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <div class="sidebar-header">
                    <div class="sidebar-brand">
                        <a id="title" href="#" @click="location.reload()" class="navbar-brand">COMPACTORE | Admin</a>
                    </div>
                </div>
                <li><a href="{{ url('admin') }}">Moderator Lists</a></li>
                <li><a href="{{ url('adminUserList') }}">User Lists</a></li>
                <li><a href="{{ url('adminVoucher') }}">Vouchers</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle"  data-bs-toggle="dropdown">Reports <span class="caret"></span></a>
                    <ul class="dropdown-menu animated fadeInLeft" role="menu">
                        <div class="dropdown-header">Reports</div>
                        <li><a href="{{ url('adminUser') }}">User Reports</a></li>
                        <li><a href="{{ url('adminPost') }}">Post Reports</a></li>
                        <li><a href="{{ url('adminStore') }}">Store Reports</a></li>
                    </ul>
                </li>
                <li><a href="#logo-out" @click="logout">Log out</a></li>
            </ul>
        </nav>
             <!-- /#sidebar-wrapper -->
     
             <!-- Page Content -->
             <div id="page-content-wrapper">
                 <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
                     <span class="hamb-top"></span>
                     <span class="hamb-middle"></span>
                     <span class="hamb-bottom"></span>
                 </button>
                 <div class="container">
                     <div class="row">
                        <nav class="navbar navbar-light">
                            <div class="container-fluid">
                                <a class="navbar-brand fw-bolder fs-2">User Lists</a>
                                <form class="d-flex">
                                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                            </div>
                        </nav>
                        <div class="table" style="height: 60vh">
                            <table class="table table-striped table-hover">
                                <thead class="bg-light">
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Moderator Name</th>
                                    <th scope="col">Assigned Section</th>
                                    <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- <tr v-for="AdminUser in AdminUsers" :key="AdminUser.admin_id">
                                    <th scope="row">{{AdminUser.number}}</th>
                                    <td>{{AdminUser.admin_name}}</td>
                                    <td>{{AdminUser.assigned_section}}</td>
                                    <td><button class="btn btn-danger m-1" :disabled="AdminUser.disabled" @click="fnDisableModerator(AdminUser.admin_id)">disable</button></td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button class="btn btn-success ml-2 my-3" data-bs-toggle="modal" data-bs-target="#add-new-admin">Add Moderator</button>
                            </div>
                        </div>
                     </div>
                 </div>
             </div>
     
         </div>
    

    
    <!-- Scrollable modal -->
    <div class="modal fade" id="add-new-admin" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Moderator</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/addModerator" method="post">
                        @csrf 
                        <input name="moderatorEmail" type="email" class="form-control mb-2" placeholder="Moderator email">
                        @if($errors->has('moderatorEmail'))
                            <div class="alert alert-danger py-1 px-2 mt-2 mb-1">{{ $errors->first('moderatorEmail') }}</div>
                        @endif
                        <input name="moderatorPassword" type="password" class="form-control mb-2" placeholder="Moderator password">
                        @if($errors->has('moderatorPassword'))
                            <div class="alert alert-danger py-1 px-2 mt-2 mb-1">{{ $errors->first('moderatorPassword') }}</div>
                        @endif
                        <select name="assignment" class="form-select mb-2" aria-label="Default select example">
                            <option selected hidden>Assign a Section</option>
                            <option value="user">Reported Users</option>
                            <option value="post">Reported Posts</option>
                            <option value="store">Reported Stores</option>
                            <option value="voucher">Compactore Vouchers</option>
                        </select>
                        <div class="d-flex justify-content-end mt-3">
                            <button type="button" class="btn btn-secondary me-4 end-0" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary end-0">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('includes/footer1') 

    @if ($errors->has('moderatorEmail') || $errors->has('moderatorPassword'))
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                // Get the modal element
                var myModal = new bootstrap.Modal(document.getElementById('add-new-admin'));

                // Show the modal
                myModal.show();
            });
        </script>
    @endif

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var trigger = document.querySelector('.hamburger'),
                overlay = document.querySelector('.overlay'),
                isClosed = false;

                trigger.addEventListener("click", function () {
                hamburger_cross();      
                });

                function hamburger_cross() {

                if (isClosed == true) {          
                    overlay.style.display = "none";
                    trigger.classList.remove('is-open');
                    trigger.classList.add('is-closed');
                    isClosed = false;
                } else {   
                    overlay.style.display = "block";
                    trigger.classList.remove('is-closed');
                    trigger.classList.add('is-open');
                    isClosed = true;
                }
            }
            
            document.querySelector('[data-toggle="offcanvas"]').addEventListener("click", function () {
                document.querySelector('#wrapper').classList.toggle('toggled');
            }); 
        });
    </script>
    <script src="/js/admin.js"></script>
</body>
</html>