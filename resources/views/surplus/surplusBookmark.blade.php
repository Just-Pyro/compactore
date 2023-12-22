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
                            <a href="{{ url('/surplusProfile') }}" class="nav-link link-dark">Reviews</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/surplusBookmarks') }}" class="nav-link active">Bookmarks</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link link-dark">Post History</a>
                        </li>
                    </ul>

                    {{-- content for each tabs --}}
                    <div class="mt-4">
                        <form action="/removeBookmarkSurplus" method="post" id="removeBookmark">@csrf<input type="number" name="bookmarkSurplusId" v-model="bookMarkPost" style="display: none;"></form>
                        @if(isset($posts) && count($posts) > 0)
                            @foreach ($posts as $item)
                                <div class="row mb-3">
                                    <div class="col-2">
                                        @if ($surplusmedia->has($item->id) && $surplusmedia[$item->id]->isNotEmpty())
                                            <img class="float-end" style="height:100px; width:100px; object-fit: cover;" src="{{ asset($surplusmedia[$item->id][0]->file_path . $surplusmedia[$item->id][0]->file_name) }}" alt="First Media">
                                        @else
                                            <div class="float-end" style="height: 100px; width:100px; border:solid 1px">no Image Found</div>
                                        @endif
                                    </div>
                                    <div class="col-8">
                                        <div class="d-flex flex-column">
                                            <p class="mb-0">{{ $item['productName'] }}</p>
                                            @foreach ($users as $user)
                                                @if ($user->user_id== $item->user_id)
                                                    <p class="text-secondary fs-7 fst-italic mb-0">{{ $user['username']}}</p>
                                                    <p class="text-light-emphasis fs-7 overflow-x-hidden mb-0">{{ $item['location'] }}</p>
                                                    @if ($user->phoneNumber == null)
                                                        <p class="text-light-emphasis fs-7 overflow-x-hidden mb-0 fst-italic">no phone number</p>
                                                    @else
                                                        <p class="text-light-emphasis fs-7 overflow-x-hidden mb-0">{{ $user['phoneNumber'] }}</p>
                                                    @endif
                                                @endif
                                            @endforeach
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
                        {{-- <hr> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('includes/footer1')
    {{-- <script src="/js/ecommerce.js"></script> --}}
    <script src="/js/surplus.js"></script>
</body>
</html>