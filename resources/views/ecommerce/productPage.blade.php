<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Name of product</title>
    <link rel="stylesheet" href="/customcss/ecommerce.css">
    @include('includes/header1')
</head>
<body style="background: lightgray">
    @include('includes/header2')
    @if($product)
    <div class="container py-3">
        <div class="d-flex flex-column">
            <div class="row py-3">
                <div class="col-4 p-1 overflow-x-auto" style="max-height: 500px; background: black; white-space: nowrap">
                    @foreach ($images as $image)
                        @if($image)
                            <img src="{{ asset($image->file_path.$image->file_name) }}" alt="sampleImage" class="border" style="width: 450px; height: 450px; object-fit: contain;">
                        @else
                            <img src="{{ asset('/compactoreCircleFav.png') }}" alt="sampleImage" class="border" style="width: 450px; height: 450px; object-fit: contain;">
                        @endif
                    @endforeach
                </div>
                <div class="col-8 p-1" style=" background: white">
                    <div class="d-flex flex-column">
                        <div class="p-2">
                            <h5>{{ $product->productName }}</h5>
                        </div>
                        <div>
                            <div class="d-flex">
                                <div class="m-2">star</div>
                                <div class="m-2">rating</div>
                                <div class="m-2">sold</div>
                            </div>
                        </div>
                        <div class="p-2">Price P{{ $product->price }}.00</div>
                        <div class="p-2" style="height: 200px;">
                            shipping Info
                        </div>
                        
                        {{-- <form @submit.prevent="addToCart"> --}}
                        <form action="/add-to-cart" method="post">
                            @csrf
                            <div class="p-2">
                                <label>Quantity:</label>
                                <div style="width:70px">
                                    {{-- <input v-model="quantity" name="qty" min="1" max="100" type="number" class="form-control" value="1"> --}}

                                    <input name="qty" min="1" max="100" type="number" class="form-control" value="1">
                                </div>
                            </div>
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            {{-- <input type="hidden" v-model="productId" name="product_id" :value="product.id"> --}}
                            <div class="p-2">
                                <button type="submit" class="btn btn-outline-dark me-2">Add to Cart</button>
                                <button class="btn btn-dark">Buy Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3" style="background: white;">
            <div class="col-1 p-2">
                <div style="height:70px; border: solid 1px;">store Profile</div>
            </div>
            <div class="col-2 p-2 px-0">
                <div style="height:70px;border: solid 1px;">{{ $shop->shopName }}</div>
                
            </div>
            <div class="col-9 p-2">
                <div style="height:70px;border: solid 1px;">store info ratings blablabla</div>
            </div>
        </div>
        <div class="row p-0">
            <div class="d-flex flex-column mb-3" style="background: white;">
                <div class="p-2">
                    <h5>Product Specifications</h5>
                    <p>specification 1</p>
                </div>
                <div class="p-2">
                    <h5>Product Description</h5>
                    <p>{{ $product->description }}</p>
                </div>
            </div>
        </div>
        <div class="row mb-3" style="background: white;">
            <div class="d-flex flex-column">
                <div class="p-2">
                    <h3>Rating 5 out of 5 stars</h3>
                </div>
                <div class="d-flex">
                    <button class="btn btn-light m-2">All</button>
                    <button class="btn btn-light m-2">5 star</button>
                    <button class="btn btn-light m-2">4 star</button>
                    <button class="btn btn-light m-2">3 star</button>
                    <button class="btn btn-light m-2">2 star</button>
                    <button class="btn btn-light m-2">1 star</button>
                    <button class="btn btn-light m-2">with comment</button>
                    <button class="btn btn-light m-2">with media</button>
                </div>
                <hr>
                <div class="row mb-3">
                    <div class="col-1">
                        <div class="float-end" style="height: 50px; width:50px; border:solid 1px">sample Image</div>
                    </div>
                    <div class="col-11">
                        <div class="d-flex flex-column">
                            <div class="pt-2">Name</div>
                            <div class="pt-2">Rating</div>
                            <div class="pt-2">Date</div>
                            <div class="pt-2">Comment: This is a buyer rating</div>
                            <div class="pt-2">Media</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @include('includes/footer1')
    <script src="/js/ecommerce.js"></script>
</body>
</html>