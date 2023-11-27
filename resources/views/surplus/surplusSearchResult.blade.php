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
        <h3>blabla search Result for "{{ $query }}"</h3>
    </div>    

    <div class="container mt-5 rounded shadow px-5">
        <div class="row align-items-center product">
            {{-- each items in search result --}}
            @if (isset($results))
                @foreach($results as $result)
                
                <div class="p-0 col-sm-6 col-lg-4 col-xl-3 my-5 rounded" @click="seeProduct({{ $result->id }})">
                    <div class="card mx-2 rounded" style="width: 16rem; height: 18rem;">
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