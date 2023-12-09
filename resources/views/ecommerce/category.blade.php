<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Compactore | Categories</title>
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
            <div class="col-2 p-4">
                <div class="d-flex flex-column flex-shrink-0 bg-light">
                    <h4 id="category-title">Categories</h4>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item navCat">
                            <a href="{{ url('category') }}" class="nav-link active">
                              <img src="{{ URL('images/categoryIcons/electronics.png') }}" alt="Electronics" class="catIcon"> Electronics
                            </a>
                          </li>
                          <li class="nav-item navCat">
                            <a href="{{ url('category') }}" class="nav-link link-dark">
                              <img src="{{ URL('images/categoryIcons/clothing-accessories.png') }}" alt="Clothing and Accessories" class="catIcon"> Clothing and Accessories
                            </a>
                          </li>
                          <li class="nav-item navCat">
                            <a href="{{ url('category') }}" class="nav-link link-dark">
                              <img src="{{ URL('images/categoryIcons/home-furniture.png') }}" alt="Home and Furniture" class="catIcon"> Home and Furniture
                            </a>
                          </li>
                          <li class="nav-item navCat">
                            <a href="{{ url('category') }}" class="nav-link link-dark">
                              <img src="{{ URL('images/categoryIcons/beauty-care.png') }}" alt="Beauty and Personal Care" class="catIcon"> Beauty and Personal Care
                            </a>
                          </li>
                          <li class="nav-item navCat">
                            <a href="{{ url('category') }}" class="nav-link link-dark">
                              <img src="{{ URL('images/categoryIcons/sports-outdoors.png') }}" alt="Sports and Outdoors" class="catIcon"> Sports and Outdoors
                            </a>
                          </li>
                          <li class="nav-item navCat">
                            <a href="{{ url('category') }}" class="nav-link link-dark">
                              <img src="{{ URL('images/categoryIcons/books.png') }}" alt="Books, Movies, and Music" class="catIcon"> Books, Movies, and Music
                            </a>
                          </li>
                          <li class="nav-item navCat">
                            <a href="{{ url('category') }}" class="nav-link link-dark">
                              <img src="{{ URL('images/categoryIcons/toys.png') }}" alt="Toys and Games" class="catIcon"> Toys and Games
                            </a>
                          </li>
                          <li class="nav-item navCat">
                            <a href="{{ url('category') }}" class="nav-link link-dark">
                              <img src="{{ URL('images/categoryIcons/health.png') }}" alt="Health and Wellness" class="catIcon"> Health and Wellness
                            </a>
                          </li>
                          <li class="nav-item navCat">
                            <a href="{{ url('category') }}" class="nav-link link-dark">
                              <img src="{{ URL('images/categoryIcons/jewelry-watch.png') }}" alt="Jewelry and Watches" class="catIcon"> Jewelry and Watches
                            </a>
                          </li>
                          <li class="nav-item navCat">
                            <a href="{{ url('category') }}" class="nav-link link-dark">
                              <img src="{{ URL('images/categoryIcons/automotive.png') }}" alt="Automotive" class="catIcon"> Automotive
                            </a>
                          </li>
                          <li class="nav-item navCat">
                            <a href="{{ url('category') }}" class="nav-link link-dark">
                              <img src="{{ URL('images/categoryIcons/arts.png') }}" alt="Art and Collectibles" class="catIcon"> Art and Collectibles
                            </a>
                          </li>
                          <li class="nav-item navCat">
                            <a href="{{ url('category') }}" class="nav-link link-dark">
                              <img src="{{ URL('images/categoryIcons/pet-supplies.png') }}" alt="Pet Supplies" class="catIcon"> Pet Supplies
                            </a>
                          </li>
                          <li class="nav-item navCat">
                            <a href="{{ url('category') }}" class="nav-link link-dark">
                              <img src="{{ URL('images/categoryIcons/office.png') }}" alt="Office" class="catIcon"> Office
                            </a>
                          </li>
                          <li class="nav-item navCat">
                            <a href="{{ url('category') }}" class="nav-link link-dark">
                              <img src="{{ URL('images/categoryIcons/school-supplies.png') }}" alt="School Supplies" class="catIcon"> School Supplies
                            </a>
                          </li>
                          <li class="nav-item navCat">
                            <a href="{{ url('category') }}" class="nav-link link-dark">
                              <img src="{{ URL('images/categoryIcons/food-drink.png') }}" alt="Food and Beverages" class="catIcon"> Food and Beverages
                            </a>
                          </li>
                    </ul>
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