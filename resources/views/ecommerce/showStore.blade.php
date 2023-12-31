<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop</title>
    <link rel="stylesheet" href="/customcss/ecommerce.css">
    @include('includes/header1')
    <style>
        .card {
            transition: 0.15s;
            cursor: pointer;
        }
        .card:hover{
            transform:scale(1.05);
        }
    </style>
</head>
<body class="bg-body-secondary">
    @include('includes/header2')

    <div class="py-5 w-100 bg-white" style="padding-left: 100px;">
        <div class="d-flex overflow-hidden">
            <div class="overflow-hidden rounded-1 py-3 px-5" style="width: 400px; height: 150px; background: radial-gradient(circle at 10% 20%, rgb(98, 114, 128) 0%, rgb(52, 63, 51) 90.1%);">
                @if ($shop->shopImg != null)
                    <img style="height:70px; width: 70px; object-fit: cover;" class="rounded-circle me-4" src="{{ asset('uploads/storeProfile/' . $shop->shopImg) }}">
                @else
                    <div style="height:70px; width: 70px; border: solid 1px;" class="rounded-circle d-inline-block align-top me-4">store Profile</div>
                @endif
                <p class="fs-5 fw-bold d-inline text-white">{{ $shop->shopName }}</p>
                <div class="stars">
                    <p class="fs-2 fw-medium d-inline-block mb-0 mt-1 text-white">0.0</p>
                    <form action="" style="width: 220px;" class="d-inline">
                        <input class="star star-5" id="star-5" type="radio" name="star" value="5"/>
                        <label class="star star-5" for="star-5"></label>
                        <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
                        <label class="star star-4" for="star-4"></label>
                        <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
                        <label class="star star-3" for="star-3"></label>
                        <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
                        <label class="star star-2" for="star-2"></label>
                        <input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
                        <label class="star star-1" for="star-1"></label>
                    </form>
                </div>
            </div>
            <div class="flex-1 d-flex ps-1 align-items-start" style="flex-wrap: wrap;">
                <p class="ms-3 fs-6 fw-normal" style="flex-basis: 50%">Items: </p>
                <p class="ms-3 fs-6 fw-normal" style="flex-basis: 50%">Bio: </p>
                <button class="ms-3 btn btn-danger btn-sm" style="flex-basis: 50%" data-bs-toggle="modal" data-bs-target="#reportStore">Report</button>
            </div>
        </div>
    </div>
    <div class="container pt-3">
        @if (isset($products) && count($products) > 0)
            <div class="row align-items-center product">
            @foreach($products as $product)
                <div class="w-20" style="flex-basis: 20%;" @click="seeProduct({{ $product->id }})">
                    <div class="card mx-auto shadow" style="height: 18rem;">
                        @if(count($mediaFiles) > 0)
                            @foreach($mediaFiles as $mediaFile)
                                @if($mediaFile[0]->product_id == $product->id)
                                    <img src="{{ asset($mediaFile[0]->file_path . $mediaFile[0]->file_name) }}" style="height:12rem; object-fit:cover;" class="card-img-top" :alt="">
                                    @break
                                @endif
                            @endforeach
                        @else
                            <img src="{{ asset('/compactoreCircleFav.png') }}" style="height:12rem; object-fit:cover;" class="card-img-top" alt="">
                        @endif
                        <div class="card-body bg-light" style="height: 10rem;">
                            <p class="card-title productname" style="white-space:nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $product->productName }}</p>
                            <p class="card-text text-danger price">P{{$product->price}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        @else
            <p class="fw-medium mt-5 text-center">no products for this shop.</p>
        @endif
    </div>
    @include('modals/reportStore')
    @include('includes/footer1')
    <script src="/js/ecommerce.js"></script>
</body>
</html>