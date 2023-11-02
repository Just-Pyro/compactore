<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Swap Me | Compactore</title>
    <link rel="stylesheet" href="/customcss/ecommerce.css">
    <link rel="stylesheet" href="/customcss/swapme.css">
    @include('includes/header1')
</head>
<body>
    @include('includes/header4')
    <div class="container" style="margin-top: 100px; position: relative;">
        {{-- post something --}}
        {{-- <div class="card sticky-div border rounded mt-5" style="height: 100px;">
            <div class="card-body">

            </div>
        </div> --}}

        <div class="card border rounded mt-3 shadow-sm" style="height: 100px;">
            <div class="card-body">
                this is a post
            </div>
        </div>


        {{-- Post Item --}}
        <div class="border shadow-sm rounded p-2" id="postBtn">
            <img src="{{ url('images/otherIcons/writePostIcon.png') }}" alt="postIcon" id="postIcon">
            Post Item
        </div>
    </div>
    @include('includes/footer1')
    <script src="js/swapme.js"></script>
</body>
</html>