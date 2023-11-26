<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
    <link rel="stylesheet" href="/customcss/ecommerce.css">
    @include('includes/header1')
</head>
<body style="background: lightgray;">
    @include('includes/header2')
    <div class="container">
        <div class="p-3 my-3 bg-white">
            <h5 class="fw-normal mb-3"><i class="fa-solid fa-location-dot"></i> Delivery Address</h5>
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control me-3" value="sample, location, blablabla" disabled readonly>
                </div>
                <div class="col-1 d-flex">
                    <span id="changeAddress" data-bs-toggle="modal" data-bs-target="#changeAddressModal" class="align-self-center">Edit</span>
                </div>
            </div>
        </div>
        <div class="p-3 bg-white border-bottom">
            <div class="row">
                <div class="col">
                    <h5>Products Ordered</h5>
                </div>
                <div class="col-2">
                    <h6 class="fw-normal text-black-50">Units Price</h6>
                </div>
                <div class="col-2">
                    <h6 class="fw-normal text-black-50">Quantity</h6>
                </div>
                <div class="col-2">
                    <h6 class="fw-normal text-black-50">Item Subtotal</h6>
                </div>
            </div>
        </div>
        {{-- for one product different store --}}
        @if($forCheckout)
            @foreach ($forCheckout as $item => $innerItem)
                <div class="p-3 bg-white border-bottom">
                    {{-- same store different product --}}
                    <div class="row">
                        <div class="col">
                            <div class="d-flex">
                                @foreach ($images as $image => $innerImage)
                                    @if ($innerImage['product_id'] == $innerItem['product_id'])
                                        <img src="{{ asset($innerImage['file_path'] . $innerImage['file_name']) }}" class="ms-5" style="width: 80px; height: 80px; border: solid 1px; display: inline-block; object-fit:cover;" class="card-img-top" :alt="">
                                    @endif
                                @endforeach
                                <span class="align-self-start fw-medium mx-3 productName" @click="seeProduct">{{ $innerItem['productName'] }}</span>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="p-2 d-flex">
                                <span class="align-self-center">{{ $innerItem['price'] }}</span>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="col-1 p-2 d-flex">
                                <span class="align-self-center">{{ $innerItem['quantity'] }}</span>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="col-1 p-2 d-flex">
                                <span class="align-self-center">{{ $innerItem['totalPrice'] }}</span>
                                @php
                                    $Subtotal += $innerItem['totalPrice'];
                                @endphp
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        {{-- Shop Voucher --}}
        <div class="p-3 py-1 bg-white border-bottom">
            <div class="row">
                <div class="col"></div>
                <div class="col d-flex flex-column">
                    <div>
                        <h6 class="fw-normal" style="display: inline-block;"><img src="{{ url('images/otherIcons/voucherIcon.png') }}" alt="voucher" style="height: 20px; object-fit: contain;"> Shop Vouchers</h6>
                        <span id="selectShopVoucher" data-bs-toggle="modal" data-bs-target="#selectShopVoucherModal">Select Voucher</span>
                    </div>
                </div>
            </div>
        </div>
        {{-- shipping fee per store --}}
        <div class="p-3 mb-3 bg-white">
            <div class="row">
                <div class="col">
                    <h6 class="fw-normal">Delivery Option:</h6>
                </div>
                <div class="col-4">
                    <h6 class="fw-normal">Standard Delivery</h6>
                </div>
                <div class="col-1">
                    <h6 class="">P120</h6>
                </div>
            </div>
        </div>
        <div class="p-3 bg-white">
            <div class="row">
                <div class="col p-2 border-end border-2 border-dark-subtle d-flex">
                    <h5 class="col fw-normal mb-3 d-inline">Payment Method</h5>
                    <div class="col-4">
                        <h6 id="paymentMethod" class="fw-normal d-inline">Cash on Delivery</h6>
                        <span id="changePaymentMethod" data-bs-toggle="modal" data-bs-target="#changePaymentMethodModal">Change</span>
                    </div>
                </div>
                <div class="col d-flex flex-column p-2">
                    <div>
                        <h5 class="fw-normal mb-3" style="display: inline-block;"><img src="{{ url('images/otherIcons/voucherIcon.png') }}" alt="voucher" style="height: 20px; object-fit: contain;"> Compactore Vouchers</h5>
                        <span id="selectVoucher" data-bs-toggle="modal" data-bs-target="#selectVoucherModal">Select Voucher</span>
                    </div>
                </div>
            </div>
        </div>
        {{-- total details --}}
        <div class="p-3 bg-light border-top">
            <div class="row">
                <div class="col"></div>
                <div class="col-2">
                    <p>Subtotal:</p>
                    <p>Shipping Total:</p>
                    <p>Shipping Discount</p>
                    <p>Total:</p>
                </div>
                <div class="col-1">
                    <p class="text-end">{{ $Subtotal }}</p>
                    <p class="text-end">P120</p>
                    <p class="text-end">-P40</p>
                    <p class="fw-bold fs-5 text-end">P285.96</p>
                </div>
            </div>
        </div>
        {{-- place order button --}}
        <div class="p-3 mb-3 bg-white border-top">
            <div class="row">
                <div class="col"></div>
                <div class="col"></div>
                <div class="col-2">
                    <button class="btn btn-orange">Place Order Now</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modals --}}
    @include('modals/changeDeliveryAddress')
    {{-- Modal for Compactore Voucher --}}
    @include('modals/compactoreVoucher')
    {{-- Modal for Shop Voucher --}}
    @include('modals/shopVoucher')
    @include('includes/footer1')
    <script src="/js/ecommerce.js"></script>
</body>
</html>