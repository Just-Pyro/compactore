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
                <h5 style="display: inline-block;">Search Results for: </h5>
                <h5 id="searched_input" style="display:inline-block;">Product Name</h5>
                <div class="row align-items-center product">
                    <div class="col-sm-6 col-lg-4 col-xl-3 my-5" @click="seeProduct">
                        <div class="card mx-auto shadow" style="width: 16rem; height: 18rem;">
                            <img style="height:12rem; object-fit:cover;" class="card-img-top" :alt="">
                            <div class="card-body bg-light" style="height: 10rem;">
                                <p class="card-title productname">SAMPLE PRODUCT NAME</p>
                                <p class="card-text text-danger price">156126.00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
    @include('includes/footer1')
    <script src="/js/ecommerce.js"></script>
</body>
</html>