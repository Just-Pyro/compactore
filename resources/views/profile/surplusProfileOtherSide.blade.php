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
        @include('profile/upperProfileOtherSide')

        {{-- side tabs and content --}}
        <div class="row">
            {{-- side tabs --}}
            <div class="col-3 p-2">
                <div class="rounded bg-white p-3">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a href="{{ url('/swapProfile') }}" class="nav-link fs-5 fw-medium link-dark">
                                Swap Me
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/surplusProfile') }}" class="nav-link fs-5 fw-medium active">
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
                    <button class="btn btn-success btn-sm float-end" data-bs-toggle="modal" data-bs-target="#reviewUserSurplus">Add Review</button>
                    </ul>

                    {{-- content for each tabs --}}
                    <div class="mt-4">
                        @if (count($reviews) > 0)
                            @foreach ($reviews as $item)
                                <div class="row mb-3">
                                    <div class="col-1">
                                        @if ($item->profileImg != null)
                                            <img class="rounded-circle" height="50" width="50" style="object-fit: cover;" src="{{ asset('uploads/userprofile/' . $item->profileImg) }}" alt="">
                                        @else
                                            <div class="float-end rounded-circle" style="height: 50px; width:50px; border:solid 1px">sample Image</div>
                                        @endif
                                    </div>
                                    <div class="col-11">
                                        <div class="d-flex flex-column">
                                            <p class="fs-6 mb-0">{{ $item->username }}</p>
                                            <p class="fs-7">{{ $item->rating }}</p>
                                            <p class="fs-7 mb-1">{{ $item->reviewDetails }}</p>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        @else
                            <p class="text-center fw-6">no ratings yet</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modals/commentSurplus')

    @include('includes/footer1')
    <script src="/js/surplus.js"></script>
</body>
</html>