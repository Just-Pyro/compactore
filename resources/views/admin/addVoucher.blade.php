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
                @if ($role == 'admin')
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
                @else
                    <li><a href="{{ url('adminVoucher') }}">Vouchers</a></li>
                @endif
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
                                <a class="navbar-brand fw-bolder fs-2">Compactore Vouchers</a>
                                {{-- <form class="d-flex">
                                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form> --}}
                            </div>
                        </nav>
                        <div class="table" style="height: 60vh">
                            <table class="table table-striped table-hover">
                                <thead class="bg-light fs-6">
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Discount amt</th>
                                    <th scope="col">Max usage limit</th>
                                    <th scope="col">Usage Count</th>
                                    <th scope="col">Expiration</th>
                                    <th scope="col">Applicable to</th>
                                    <th scope="col">Claimable</th>
                                    <th scope="col">Monthly distribution limit</th>
                                    <th scope="col">Monthly usage limit</th>
                                    <th scope="col">Last monthly reset</th>
                                    <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($vouchers->count() > 0)
                                        @php
                                            $counter = 1;
                                        @endphp
                                        @foreach ($vouchers as $item)
                                        
                                            <tr>
                                                <td>{{ $counter }}</td>
                                                <td>{{ $item->code }}</td>
                                                <td>{{ $item->type }}</td>
                                                <td>{{ $item->discount_amount }}</td>
                                                <td>{{ $item->max_usage_limit }}</td>
                                                <td>{{ $item->usage_count }}</td>
                                                <td>{{ $item->expires_at }}</td>
                                                <td>{{ $item->applicable_to }}</td>
                                                <td>{{ $item->is_claimable }}</td>
                                                <td>{{ $item->monthly_distribution_limit }}</td>
                                                <td>{{ $item->monthly_usage_limit }}</td>
                                                <td>{{ $item->last_monthly_reset }}</td>
                                                <td><button class="btn btn-danger">Disable</button> <button class="btn btn-danger">Delete</button></td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <p class="fw-normal text-center">No vouchers created yet.</p>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button class="btn btn-success ml-2 my-3" data-bs-toggle="modal" data-bs-target="#add-new-voucher">Create Voucher</button>
                            </div>
                        </div>
                     </div>
                 </div>
             </div>
     
         </div>
    
    <!-- Scrollable modal -->
    <div class="modal fade" id="add-new-voucher" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Voucher</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/addVoucher" method="post" class="py-3" enctype="multipart/form-data">
                        @csrf
                        <div class="flex-column">
                            <div class="row">
                                <div class="col">
                                    <label for="voucher_code">Enter Code</label>
                                    <input name="code" type="text" class="form-control mb-3" placeholder="(e.g. SUMMER20)" required>
                                </div>
                                <div class="col">
                                    <label>Type of Voucher:</label>
                                    <select name="voucher_type"class="form-select mb-3" required>
                                        <option selected hidden>-- --</option>
                                        <option value="Percentage">Percentage</option>
                                        <option value="Fixed Amount">Fixed Amount</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label>Discount Amount</label>
                                    <input name="discount_amount" type="number" class="form-control mb-3" placeholder="0.00" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>Max Usage Limit:</label>
                                    <input name="usage_limit" type="number" class="form-control mb-3" value="1" required>
                                </div>
                                <div class="col">
                                    <label>Expiration Date:</label>
                                    <input name="expiration" type="date" class="form-control mb-3">
                                </div>
                                <div class="col">
                                    <label>Applicable to:</label>
                                    <select name="applicable_to"class="form-select mb-3" required>
                                        <option hidden selected>Choose Category or Product</option>
                                        {{-- kung c shop ang maghimo og voucher. mawala ni ang kaning applicable_to sa html. pero i set cya daan sa controller
                                            as if all products cya. since dapat ang voucher nga hinimo ni shop is para sa iyang shop. --}}
                                        <option value="all_products">All Products</option>
                                        <option value="Electronics">Electronics</option>
                                        <option value="Clothing and Accessories">Clothing and Accessories</option>
                                        <option value="Home and Furniture">Home and Furniture</option>
                                        <option value="Beauty and Personal Care">Beauty and Personal Care</option>
                                        <option value="Sports and Outdoors">Sports and Outdoors</option>
                                        <option value="Books, Movies, and Music">Books, Movies, and Music</option>
                                        <option value="Toys and Games">Toys and Games</option>
                                        <option value="Health and Wellness">Health and Wellness</option>
                                        <option value="Jewelry and Watches">Jewelry and Watches</option>
                                        <option value="Automotive">Automotive</option>
                                        <option value="Art and Collectibles">Art and Collectibles</option>
                                        <option value="Pet Supplies">Pet Supplies</option>
                                        <option value="Office">Office</option>
                                        <option value="School Supplies">School Supplies</option>
                                        <option value="Food and Beverages">Food and Beverages</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>Monthly Distribution Limit:</label>
                                    <input placeholder="0" name="monthly_distribution_limit" type="number" class="form-control mb-3" required>
                                </div>
                                <div class="col">
                                    <label>Monthly Usage Limit:</label>
                                    <input placeholder="0" name="monthly_usage_limit" type="number" class="form-control mb-3" required>
                                </div>
                                <div class="col">
                                    <label>Monthly Reset:</label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="monthly_reset" id="monthlyResetTrue" value="True">
                                        <label class="form-check-label" for="monthlyResetTrue">True</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="monthly_reset" id="monthlyResetFalse" value="False">
                                        <label class="form-check-label" for="monthlyResetFalse">False</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <label>Is Claimable:</label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="isClaimable" id="claimableTrue" value="True" required>
                                        <label class="form-check-label" for="claimableTrue">True</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="isClaimable" id="claimableFalse" value="False" required>
                                        <label class="form-check-label" for="claimableFalse">False</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success">Add Voucher</button>
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