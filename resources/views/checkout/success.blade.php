<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/customcss/ecommerce.css">
    <title>Document</title>
    @include('includes/header1')
</head>
<body class="bg-body-secondary">
    @include('includes/header2')
    <div class="container">
        <div class="row mt-2">
            <div class="col"></div>
            <div class="col-4 bg-white rounded">
                <p class="fw-medium fs-2 text-start mt-2">Product:  {{ $details }}</p>
                <p class="fw-normal fs-5 text-start mt-2">{{ $shippingAddress }}</p>
                <p class="fw-normal fs-5 text-start mt-2">{{ $paymentMethod }}</p>
                <p class="fw-normal fs-5 text-start mt-2">P{{ $totalPrice }}</p>
                <hr>
                <h4 class="my-5 text-center fw-medium">Product Successfully Placed!</h4>
            </div>
            <div class="col"></div>
        </div>
        <div class="row mt-2 bg-transparent rounded">
            <div class="col"></div>
            <div class="col-4 d-flex justify-content-center">
                <a href="{{ url('/url') }}" class="btn btn-success">Go back</a>
            </div>
            <div class="col"></div>
        </div>
    </div>
    @include('includes/footer1')
</body>
</html>