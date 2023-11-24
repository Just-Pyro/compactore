<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="/customcss/ecommerce.css">
    @include('includes/header1')
</head>
<body style="background: lightgray;">
    @include('includes/header2')
    <div class="container">
        <div class="d-flex flex-column">
            {{-- top part label --}}
            <div class="row mt-2" style="background: white;">
                <div class="col p-2">
                    <div class="form-check">
                        <input type="checkbox" id="allProduct" class="form-control-check">
                        <label class="form-check-label ms-5" for="allProduct">Product</label>
                    </div>
                </div>
                <div class="col-1 p-2">Unit Price</div>
                <div class="col-1 p-2">Quantity</div>
                <div class="col-1 p-2">Total Price</div>
                <div class="col-1 p-2">Action</div>
            </div>
            {{-- @if ($cart) --}}
                {{-- <div class="row mt-2" style="background: white;"> --}}
                    {{-- 1 item --}}
                    {{-- <div class="col p-2 d-flex flex-column">
                        <div class="pt-2 px-0">
                            <div class="form-check">
                                <input type="checkbox" id="shop" class="form-control-check">
                                <label class="form-check-label ms-5" for="shop">{{ $shop->shopName }}</label>
                            </div>
                        </div>
                        <hr> --}}
                        {{-- 1 product same store --}}
                        {{-- <div class="row pt-2">
                            <div class="col p-2">
                                <div class="form-check m-1 d-flex">
                                    <input type="checkbox" id="product" class="form-control-check"> --}}
                                    {{-- @if($images->isNotEmpty()) --}}
                                        {{-- <img src="{{ asset($images[0]->file_path . $images[0]->file_name) }}" class="ms-5" style="border: solid 1px; display: inline-block; height:12rem; object-fit:cover;" class="card-img-top" :alt=""> --}}
                                    {{-- @else --}}
                                        {{-- <img src="{{ asset('/compactoreCircleFav.png') }}" class="ms-5" style="border: solid 1px; display: inline-block; height:12rem; object-fit:cover;" class="card-img-top" :alt=""> --}}
                                    {{-- @endif --}}
                                    {{-- <span class="align-self-start fw-medium mx-3 productName" @click="seeProduct">{{ $cart->productName }}</span> --}}
                                {{-- </div>
                            </div>
                            <div class="col-1 p-2 d-flex">
                                <span class="align-self-center">P{{ $cart->price }}</span>
                            </div>
                            <div class="col-1 p-2 d-flex">
                                <div class="align-self-center" style="width: 50px;">
                                    <input min="1" max="100" type="number" class="form-control" value="{{ $cart->quantity }}">
                                </div>
                            </div>
                            <div class="col-1 p-2 d-flex">
                                <span class="align-self-center">P{{ $cart->totalPrice }}</span>
                            </div>
                            <div class="col-1 p-2 d-flex">
                                <a href="#" class="align-self-center">Delete</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
            {{-- @else --}}
                {{-- <p>No product added yet</p> --}}
            {{-- @endif --}}
            
            @if ($products)
                {{-- Loop through each product --}}
                @foreach ($products as $key => $product)
                <div class="row mt-2" style="background: white;">
                    <div class="col p-2 d-flex flex-column">
                        <div class="pt-2 px-0">
                            <div class="form-check">
                                <input type="checkbox" id="shop{{ $key }}" class="form-control-check">
                                <label class="form-check-label ms-5" for="shop{{ $key }}">{{ $product->shop->shopName }}</label>
                            </div>
                        </div>
                        <hr>
                        {{-- Display product details --}}
                        <div class="row pt-2">
                            <div class="col p-2">
                                <div class="form-check m-1 d-flex">
                                    <input type="checkbox" id="product{{ $key }}" class="form-control-check">
                                    {{-- Check if images for the product exist --}}
                                    @if(isset($images[$product->id]) && $images[$product->id]->isNotEmpty())
                                        <img src="{{ asset($images[$product->id][0]->file_path . $images[$product->id][0]->file_name) }}" class="ms-5" style="border: solid 1px; display: inline-block; height:12rem; object-fit:cover;" class="card-img-top" alt="">
                                    @else
                                        <img src="{{ asset('/compactoreCircleFav.png') }}" class="ms-5" style="border: solid 1px; display: inline-block; height:12rem; object-fit:cover;" class="card-img-top" alt="">
                                    @endif
                                    <span class="align-self-start fw-medium mx-3 productName" @click="seeProduct">{{ $product->productName }}</span>
                                </div>
                            </div>
                            <div class="col-1 p-2 d-flex">
                                <span class="align-self-center">P{{ $product->price }}</span>
                            </div>
                            <div class="col-1 p-2 d-flex">
                                <div class="align-self-center" style="width: 50px;">
                                    <input min="1" max="100" type="number" class="form-control" value="{{ $product->quantity }}">
                                </div>
                            </div>
                            <div class="col-1 p-2 d-flex">
                                <span class="align-self-center">P{{ $product->totalPrice }}</span>
                            </div>
                            <div class="col-1 p-2 d-flex">
                                <a href="#" class="align-self-center">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            @else
                <p>No product added yet</p>
            @endif

        </div>
    </div>
    {{-- sticky checkout --}}
    <div class="row mx-auto p-3" style="background: white; position: fixed; bottom: 0; left:0; right: 0; width:85%;" id="checkOut">
        <div class="col p-2 border-end border-2 border-dark-subtle">
            <h5 class="fw-normal mb-3"><i class="fa-solid fa-location-dot"></i> Location</h5>
            <input type="text" class="form-control me-3" value="sample, location, blablabla" disabled readonly>
        </div>
        <div class="col d-flex flex-column p-2">
            <div>
                <h5 class="fw-normal mb-3" style="display: inline-block;"><img src="{{ url('images/otherIcons/voucherIcon.png') }}" alt="voucher" style="height: 20px; object-fit: contain;"> Vouchers</h5>
                <span id="selectVoucher" data-bs-toggle="modal" data-bs-target="#selectVoucherModal">Select Voucher</span>
            </div>
            <div class="d-grid">
                <button class="btn btn-outline-warning" @click="showCheckOut">Check Out</button>
            </div>
        </div>
    </div>
    <!-- Modals -->
    {{-- Modal for Compactore Voucher --}}
    @include('modals/compactoreVoucher')
    @include('includes/footer1')
    <script src="/js/ecommerce.js"></script>
</body>
</html>