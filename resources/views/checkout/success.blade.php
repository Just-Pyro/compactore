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
<body>
    @include('includes/header2')
    <div class="container">
        <div class="row mt-2 bg-white rounded">
            <p class="fw-normal text-center mt-2">{{ $details }}</p>
            <p class="fw-normal text-center mt-2">{{ $totalPrice }}</p>
            <p class="fw-normal text-center mt-2">{{ $paymentMethod }}</p>
            <p class="fw-normal text-center mt-2">{{ $shippingAddress }}</p>
            <h4 class="my-5 text-center fw-medium">Product Successfully Placed!</h4>
        </div>
        <div class="row mt-2 bg-white rounded">
            <a href="#" class="btn btn-success">Go back</a>
        </div>
    </div>
    @include('includes/footer1')
</body>
</html>