<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surplus | Compactore - Search Result</title>
    <link rel="stylesheet" href="/customcss/ecommerce.css">
    <link rel="stylesheet" href="/customcss/surplus.css">
    @include('includes/header1')

    <style>
        .card {
            transition: transform 0.3s;
        }
        .card:hover {
            transform: scale(1.1);
            cursor: pointer;
        }
    </style>
</head>
<body>
    @include('includes/header3')

    <div class="container mt-5">
        @if ($location == "")
            <h3>blabla search Result for "{{ $query }}"</h3>
        @else
            <h3>blabla search Result for "{{ $query }}" in "{{ $location }}"</h3>
        @endif
    </div>    

    <div class="container mt-5 rounded shadow px-5">
        <div class="row align-items-center product">
            {{-- @php
                dump($location);
            @endphp --}}
            <form action="/surplusBookmark" method="post" id="saveBookMarkForm">@csrf<input type="number" name="postIdBookmark" v-model="bookMarkPost" style="display: none;"><input type="text" name="passQuery" value="{{ $query }}" style="display: none;"><input type="text" name="passlocation" value="{{ $location }}" style="display: none;"></form>
            <form action="/surplusUnBookmark" method="post" id="unBookMarkForm">@csrf<input type="number" name="postIdBookmark" v-model="bookMarkPost" style="display: none;"><input type="text" name="passQuery" value="{{ $query }}" style="display: none;"><input type="text" name="passlocation" value="{{ $location }}" style="display: none;"></form>
            {{-- each items in search result --}}
            @if (!$results)
                <div class="row mt-2 bg-white rounded">
                    <p class="my-5 text-center fw-medium">No product found.</p>
                </div>
            @else
                @foreach($results as $result)
                <div class="p-0 col-sm-6 col-lg-4 col-xl-3 my-5 rounded" @click="seeProduct({{ $result->id }})">
                    <div class="card mx-2 rounded position-relative" style="width: 16rem; height: 18rem;">
                        {{-- @php
                            echo $result['id'];
                        @endphp --}}
                        @if ($surplus->count()>0)
                            @foreach ($surplus as $item)
                            {{-- @php
                                echo $result['id'];
                                echo $item['surplus_id'];
                            @endphp --}}
                                @if ($item['surplus_id'] == $result['id'])
                                    <span class="mx-3 fs-5 position-absolute top-0 end-0 text-warning" style="cursor:pointer; z-index: 1000;" @click="unbookMark({{ $result['id'] }})"><i class="fa-solid fa-bookmark"></i></span>
                                    @php
                                        $breakLoop = true;
                                    @endphp
                                    @break
                                @endif
                                @php
                                    $breakLoop = false;
                                @endphp
                            @endforeach
                            @if(isset($breakLoop))
                                @if (!$breakLoop)
                                    <span class="mx-3 fs-5 position-absolute top-0 end-0 next" style="cursor:pointer; z-index: 1000;" @click="bookMark({{ $result['id'] }})"><i class="fa-regular fa-bookmark"></i></span>
                                @endif
                            @endif
                        @else
                            <span class="mx-3 fs-5 position-absolute top-0 end-0 firstelse" style="cursor:pointer; z-index: 1000;" @click="bookMark({{ $result['id'] }})"><i class="fa-regular fa-bookmark"></i></span>
                        @endif

                        @if($result->surplusMedia->isNotEmpty())
                            <img src="{{ asset($result->surplusMedia->first()->file_path . $result->surplusMedia->first()->file_name) }}" style="height:12rem; object-fit:cover;" class="card-img-top rounded-top border" :alt="">
                        @else
                            <img src="{{ asset('/compactoreCircleFav.png') }}" style="height:12rem; object-fit:cover;" class="card-img-top rounded-top border" alt="">
                        @endif
                        <div class="card-body bg-light rounded-bottom" style="height: 10rem;">
                            <p class="card-title productname">{{ $result->productName }}</p>
                            <p class="card-text text-danger price">{{ $result->price }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>

    {{-- Post Item --}}
    <div class="border shadow-sm rounded p-2" id="postBtn" data-bs-toggle="modal" data-bs-target="#postItem">
        <img src="{{ url('images/otherIcons/writePostIcon.png') }}" alt="postIcon" id="postIcon">
        Post Surplus
    </div>

    {{-- Modal for posting item form in surplus --}}
    @include('modals/postItemSurplus')

    @include('includes/footer1')
    <script src="js/surplus.js"></script>
</body>
</html>