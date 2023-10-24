<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Profile</title>
    <link rel="stylesheet" href="/customcss/ecommerce.css">
    @include('includes/header1')
</head>
<body class="bg-body-secondary">
    @include('includes/header2')
    <div class="container" id="forProfile">
        {{-- User Pic and Bio --}}
        @include('profile/upperProfile')

        {{-- side tabs and content --}}
        <div class="row">
            {{-- side tabs --}}
            <div class="col-3 p-2">
                <div class="rounded bg-white p-3">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a href="{{ url('/profile') }}" class="nav-link fs-5 fw-medium link-dark">
                                My Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/ecommerceProfile') }}" class="nav-link fs-5 fw-medium active">
                                E-commerce
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/swapProfile') }}" class="nav-link fs-5 fw-medium link-dark">
                                Swap Me
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/surplusProfile') }}" class="nav-link fs-5 fw-medium link-dark">
                                Surplus
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            {{-- content --}}
            <div class="col p-2">
                <div class="rounded bg-white p-3">
                    {{-- head tabs --}}
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="" class="nav-link active">All</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link link-dark">To Pay</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link link-dark">To Ship</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link link-dark">To Receive</a>
                        </li>
                    </ul>

                    {{-- content for each tabs --}}
                    <div class="row mt-2 bg-white border-bottom">
                        <div class="col p-2">
                            <p class="fw-bold ms-5">Purchased Item History</p>
                        </div>
                        <div class="col-2 p-2">Unit Price</div>
                        <div class="col-2 p-2">Quantity</div>
                        <div class="col-2 p-2">Total Price</div>
                    </div>
                    <div class="row pt-2">
                        <div class="col p-2 d-flex">
                            <div class="ms-5" style="width: 80px; height: 80px; border: solid 1px; display: inline-block;">product Image</div>
                            <span class="align-self-start fw-medium mx-3">Product Name blablabla...</span>
                        </div>
                        <div class="col-2 p-2 d-flex">
                            <span class="align-self-center">P102.98</span>
                        </div>
                        <div class="col-2 p-2 d-flex">
                            <div class="align-self-center" style="width: 50px;">
                                <input min="1" max="100" type="number" class="form-control" value="2" disabled>
                            </div>
                        </div>
                        <div class="col-2 p-2 d-flex">
                            <span class="align-self-center">P205.96</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('includes/footer1')
    <script src="/js/ecommerce.js"></script>
</body>
</html>