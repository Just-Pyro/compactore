<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Compactore | Shop Online with voucher discounts</title>
    <link rel="stylesheet" href="/customcss/ecommerce.css">
    @include('includes/header1')
</head>
<body>
    @include('includes/header2')
    <div class="container-fluid" id="contentBody">
        <div class="row">
            <div class="col-2 p-4">
              <div class="d-flex flex-column flex-shrink-0 bg-light">
                <h4 id="category-title">Categories</h4>
                <ul class="nav nav-pills flex-column mb-auto">
                  <li class="nav-item navCat">
                    <a href="{{ url('category', ['category' => 'Electronics']) }}" class="nav-link link-dark">
                      <img src="{{ URL('images/categoryIcons/electronics.png') }}" alt="Electronics" class="catIcon"> Electronics
                    </a>
                  </li>
                  <li class="nav-item navCat">
                    <a href="{{ url('category', ['category' => 'Clothing and Accessories']) }}" class="nav-link link-dark">
                      <img src="{{ URL('images/categoryIcons/clothing-accessories.png') }}" alt="Clothing and Accessories" class="catIcon"> Clothing and Accessories
                    </a>
                  </li>
                  <li class="nav-item navCat">
                    <a href="{{ url('category', ['category' => 'Home and Furniture']) }}" class="nav-link link-dark">
                      <img src="{{ URL('images/categoryIcons/home-furniture.png') }}" alt="Home and Furniture" class="catIcon"> Home and Furniture
                    </a>
                  </li>
                  <li class="nav-item navCat">
                    <a href="{{ url('category', ['category' => 'Beauty and Personal Care']) }}" class="nav-link link-dark">
                      <img src="{{ URL('images/categoryIcons/beauty-care.png') }}" alt="Beauty and Personal Care" class="catIcon"> Beauty and Personal Care
                    </a>
                  </li>
                  <li class="nav-item navCat">
                    <a href="{{ url('category', ['category' => 'Sports and Outdoors']) }}" class="nav-link link-dark">
                      <img src="{{ URL('images/categoryIcons/sports-outdoors.png') }}" alt="Sports and Outdoors" class="catIcon"> Sports and Outdoors
                    </a>
                  </li>
                  <li class="nav-item navCat">
                    <a href="{{ url('category', ['category' => 'Books, Movies, and Music']) }}" class="nav-link link-dark">
                      <img src="{{ URL('images/categoryIcons/books.png') }}" alt="Books, Movies, and Music" class="catIcon"> Books, Movies, and Music
                    </a>
                  </li>
                  <li class="nav-item navCat">
                    <a href="{{ url('category', ['category' => 'Toys and Games']) }}" class="nav-link link-dark">
                      <img src="{{ URL('images/categoryIcons/toys.png') }}" alt="Toys and Games" class="catIcon"> Toys and Games
                    </a>
                  </li>
                  <li class="nav-item navCat">
                    <a href="{{ url('category', ['category' => 'Health and Wellness']) }}" class="nav-link link-dark">
                      <img src="{{ URL('images/categoryIcons/health.png') }}" alt="Health and Wellness" class="catIcon"> Health and Wellness
                    </a>
                  </li>
                  <li class="nav-item navCat">
                    <a href="{{ url('category', ['category' => 'Jewelry and Watches']) }}" class="nav-link link-dark">
                      <img src="{{ URL('images/categoryIcons/jewelry-watch.png') }}" alt="Jewelry and Watches" class="catIcon"> Jewelry and Watches
                    </a>
                  </li>
                  <li class="nav-item navCat">
                    <a href="{{ url('category', ['category' => 'Automotive']) }}" class="nav-link link-dark">
                      <img src="{{ URL('images/categoryIcons/automotive.png') }}" alt="Automotive" class="catIcon"> Automotive
                    </a>
                  </li>
                  <li class="nav-item navCat">
                    <a href="{{ url('category', ['category' => 'Art and Collectibles']) }}" class="nav-link link-dark">
                      <img src="{{ URL('images/categoryIcons/arts.png') }}" alt="Art and Collectibles" class="catIcon"> Art and Collectibles
                    </a>
                  </li>
                  <li class="nav-item navCat">
                    <a href="{{ url('category', ['category' => 'Pet Supplies']) }}" class="nav-link link-dark">
                      <img src="{{ URL('images/categoryIcons/pet-supplies.png') }}" alt="Pet Supplies" class="catIcon"> Pet Supplies
                    </a>
                  </li>
                  <li class="nav-item navCat">
                    <a href="{{ url('category', ['category' => 'Office']) }}" class="nav-link link-dark">
                      <img src="{{ URL('images/categoryIcons/office.png') }}" alt="Office" class="catIcon"> Office
                    </a>
                  </li>
                  <li class="nav-item navCat">
                    <a href="{{ url('category', ['category' => 'School Supplies']) }}" class="nav-link link-dark">
                      <img src="{{ URL('images/categoryIcons/school-supplies.png') }}" alt="School Supplies" class="catIcon"> School Supplies
                    </a>
                  </li>
                  <li class="nav-item navCat">
                    <a href="{{ url('category', ['category' => 'Food and Beverages']) }}" class="nav-link link-dark">
                      <img src="{{ URL('images/categoryIcons/food-drink.png') }}" alt="Food and Beverages" class="catIcon"> Food and Beverages
                    </a>
                  </li>
                  
                </ul>
              </div>
            </div>
            <div class="sidebar-divider"></div>
            <div class="col-9">
                <div class="carouselEcom d-flex justify-content-center my-4">
                    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel" style="width: 1000px;">
                        <div class="carousel-indicators">
                          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                          <div class="carousel-item active" data-bs-interval="10000">
                            <img src="{{ URL('images/carousel1.jpg') }}" class="d-block w-100 carouselItem" alt="...">
                          </div>
                          <div class="carousel-item" data-bs-interval="2000">
                            <img src="{{ URL('images/carousel2.png') }}" class="d-block w-100 carouselItem" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="{{ URL('images/carousel3.jpg') }}" class="d-block w-100 carouselItem" alt="...">
                          </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
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