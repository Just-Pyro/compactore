<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Name of searched item</title>
    <link rel="stylesheet" href="/customcss/ecommerce.css">
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
    @include('includes/header2')
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 p-3">
                <div class="d-flex flex-column">
                    <h5>By Category</h5>
                    <div class="form-check">
                        <input type="checkbox" id="forCategory" class="form-check-input">
                        <label for="forCategory" class="form-check-label">Category1</label>
                    </div>
                </div>
            </div>
            <div class="sidebar-divider"></div>
            <div class="col-9 py-3">
                @if(isset($results))
                    <h5>Search Results for "{{ $query }}"</h5>
                    @foreach($results as $result)
                        <div class="row align-items-center product">
                            <div class="col-sm-6 col-lg-4 col-xl-3 my-5" @click="seeProduct">
                                <div class="card mx-auto shadow" style="width: 16rem; height: 18rem;">
                                    @if($result->mediaFile->isNotEmpty())
                                        <img src="{{ asset($result->mediaFile->first()->file_path . $result->mediaFile->first()->file_name) }}" style="height:12rem; object-fit:cover;" class="card-img-top" :alt="">
                                    @else
                                        <img src="{{ asset('/compactoreCircleFav.png') }}" style="height:12rem; object-fit:cover;" class="card-img-top" alt="">
                                    @endif
                                    <div class="card-body bg-light" style="height: 10rem;">
                                        <p class="card-title productname" style="white-space:nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $result->productName }}</p>
                                        <p class="card-text text-danger price">{{$result->price}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="col"></div>
        </div>
    </div>
    @include('includes/footer1')
    <script src="/js/ecommerce.js"></script>
</body>
</html>