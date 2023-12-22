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
                            <a href="{{ url('/swapProfile') }}" class="nav-link fs-5 fw-medium active">
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
                            <a href="{{ url('/swapProfile') }}" class="nav-link link-dark">Reviews</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/swapMeBookmark') }}" class="nav-link active">Bookmarks</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="" class="nav-link link-dark">Post History</a>
                        </li> --}}
                    </ul>

                    {{-- content for each tabs --}}
                    <div class="mt-4">
                        <form action="/removeBookmarkSwapme" method="post" id="removeBookmark">@csrf<input type="number" name="bookmarkSwapmeId" v-model="bookMarkPost" style="display: none;"></form>
                        @if(isset($posts) && count($posts))
                            @foreach ($posts as $item)
                                <div class="row mb-3">
                                    <div class="col-2">
                                        @if ($swapmedia->has($item->id) && $swapmedia[$item->id]->isNotEmpty())
                                            <img class="float-end" style="height:100px; width:100px; object-fit: cover;" src="{{ asset($swapmedia[$item->id][0]->file_path . $swapmedia[$item->id][0]->file_name) }}" alt="First Media">
                                        @else
                                            <div class="float-end" style="height: 100px; width:100px; border:solid 1px">no Image Found</div>
                                        @endif
                                    </div>
                                    <div class="col-8">
                                        <div class="d-flex flex-column">
                                            <p class="mb-0">{{ $item['title'] }}</p>
                                            <p class="text-secondary fs-6 fst-italic">{{ $item['author']}}</p>
                                            <p class="text-light-emphasis fs-7 overflow-x-hidden mb-0">{{ $item['description'] }}</p>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="d-flex align-items-center">
                                            <button type="submit" class="btn btn-danger btn-sm" @click="removeBookmark({{ $item['id'] }})">Remove</button>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        @else
                            <div class="d-flex justify-content-center">
                                <p class="fw-normal fs-6">no bookmarked.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('includes/footer1')
    {{-- <script src="/js/ecommerce.js"></script> --}}
    <script src="/js/swapme.js"></script>
</body>
</html>