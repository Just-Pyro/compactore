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

        {{-- display post per row --}}
        <div class="row">
            {{-- per single post --}}
            <div class="col">
                <div class="card border rounded mt-3 shadow-sm">
                    <div class="card-body px-2">
                        <div class="flex-column py-1">
                            <button class="btn btn-outline-info float-end">Offer</button>
                            <h5 class="fw-medium m-0">
                                poster's name
                            </h5>
                            <p class="fw-normal">date</p>
                            <p class="fw-medium m-0">Product Name</p>
                            <p class="fw-normal">post description</p>
                            <div class="border" style="height: 400px;">image</div>
                            {{-- <img src="" alt=""> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border rounded mt-3 shadow-sm">
                    <div class="card-body px-2">
                        <div class="flex-column py-1">
                            <button class="btn btn-outline-info float-end">Offer</button>
                            <h5 class="fw-medium m-0">
                                poster's name
                            </h5>
                            <p class="fw-normal">date</p>
                            <p class="fw-medium m-0">Product Name</p>
                            <p class="fw-normal">post description</p>
                            <div class="border" style="height: 400px;">image</div>
                            {{-- <img src="" alt=""> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- Post Item --}}
        <div class="border shadow-sm rounded p-2" id="postBtn" data-bs-toggle="modal" data-bs-target="#postItem">
            <img src="{{ url('images/otherIcons/writePostIcon.png') }}" alt="postIcon" id="postIcon">
            Post Item
        </div>

        {{-- Modal for posting item form --}}
        @include('modals/postItemSwapme')
    </div>
    @include('includes/footer1')
    <script src="js/swapme.js"></script>
</body>
</html>