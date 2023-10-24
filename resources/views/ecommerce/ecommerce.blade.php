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
                    <a href="{{ url('category') }}" class="nav-link active">
                      <img src="{{ URL('images/categoryIcons/smartphone.png') }}" alt="smartphone" class="catIcon"> Smartphones
                    </a>
                  </li>
                  <li class="nav-item navCat">
                    <a href="{{ url('category') }}" class="nav-link link-dark">
                      <img src="{{ URL('images/categoryIcons/gadget-accesory.png') }}" alt="gadget accesory" class="catIcon"> Gadget Accesories
                    </a>
                  </li>
                  <li class="nav-item navCat">
                    <a href="{{ url('category') }}" class="nav-link link-dark">
                      <i class="fa-solid fa-shirt"></i> Clothing
                    </a>
                  </li>
                  <li class="nav-item navCat">
                    <a href="{{ url('category') }}" class="nav-link link-dark">
                      <img src="{{ URL('images/categoryIcons/shoes.png') }}" alt="shoes" class="catIcon"> Shoes
                    </a>
                  </li>
                  <li class="nav-item navCat">
                    <a href="{{ url('category') }}" class="nav-link link-dark">
                      <img src="{{ URL('images/categoryIcons/beauty-care.png') }}" alt="beauty care" class="catIcon"> Beauty Care
                    </a>
                  </li>
                  <li class="nav-item navCat">
                    <a href="{{ url('category') }}" class="nav-link link-dark">
                      <img src="{{ URL('images/categoryIcons/bag.png') }}" alt="bag" class="catIcon"> Bags
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