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
                            <a href="{{ url('/profile') }}" class="nav-link fs-5 fw-medium active">
                                My Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/ecommerceProfile') }}" class="nav-link fs-5 fw-medium link-dark">
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
                            <a href="{{ url('/profile') }}" class="nav-link link-dark">Profile</a>
                        </li>
                        <li class="nav-item">
                            <span data-bs-toggle="modal" data-bs-target="#changeAddressModal" class="nav-link link-dark" style="cursor: pointer;">Delivery Addresses</span>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/set-gcash') }}" class="nav-link active">Gcash Account</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/changePassword') }}" class="nav-link link-dark">Change Password</a>
                        </li>
                    </ul>

                    {{-- content for each tabs --}}
                @if ($gcash)
                    <div class="row">
                        <div class="col-7">
                            <form action="/saveGcash" method="post" class="mt-4">
                                @csrf
                                <input name="gcashName" type="text" class="form-control mb-3" placeholder="Enter Gcash Full Name" value="{{ $gcash->fullname }}" required>
                                <input name="gcashEmail" type="email" class="form-control mb-3" placeholder="Enter Gcash Email" value="{{ $gcash->email }}" required>
                                <input name="gcashNumber" type="text" class="form-control mb-3" placeholder="Gcash Number" value="{{ $gcash->number }}" required>
                                <button class="btn btn-success">Save Account</button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-7">
                            <form action="/saveGcash" method="post" class="mt-4">
                                @csrf
                                <input name="gcashName" type="text" class="form-control mb-3" placeholder="Enter Gcash Full Name" required>
                                <input name="gcashEmail" type="email" class="form-control mb-3" placeholder="Enter Gcash Email" required>
                                <input name="gcashNumber" type="text" class="form-control mb-3" placeholder="Gcash Number" required>
                                <button class="btn btn-success">Save Account</button>
                            </form>
                        </div>
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
    @include('modals/changeDeliveryAddress')
    @include('includes/footer1')
    <script src="/js/ecommerce.js"></script>
    {{-- <script src="/js/profile.js"></script>s --}}
</body>
</html>