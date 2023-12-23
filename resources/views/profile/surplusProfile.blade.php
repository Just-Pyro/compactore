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
                            <a href="{{ url('/surplusProfile', ['' => 'id']) }}" class="nav-link fs-5 fw-medium active">
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
                            <a href="{{ url('/surplusProfile') }}" class="nav-link active">Reviews</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/surplusBookmarks') }}" class="nav-link link-dark">Bookmarks</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="" class="nav-link link-dark">Post History</a>
                        </li> --}}
                    </ul>

                    {{-- content for each tabs --}}
                    <div class="mt-4">
                        <div class="row mb-3">
                            <div class="col-1">
                                <div class="float-end" style="height: 50px; width:50px; border:solid 1px">sample Image</div>
                            </div>
                            <div class="col-11">
                                <div class="d-flex flex-column">
                                    <div class="">Kyle</div>
                                    <div class="">4.8</div>
                                    <div class="">Date w/ her</div>
                                    <div class="pt-2">Comment: This is surplus seller is very accomodating and gives a very detailed and honest information that I need to know about the item</div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('includes/footer1')
    <script src="/js/ecommerce.js"></script>
</body>
</html>