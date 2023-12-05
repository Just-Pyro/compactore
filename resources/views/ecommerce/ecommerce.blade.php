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
      <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">></button>

    <div class="container px-lg-5" id="contentBody">
      <div class="row">
        <div class="offcanvas offcanvas-start " tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
          <div class="offcanvas-header my-3">
            <h4 id="category-title" class="m-auto">MENU</h4>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <div>
              <div class="d-flex flex-column flex-shrink-0">
                <h4 id="category-title" class="ms-3 mb-3">Categories</h4>
                <ul class="nav nav-pills flex-column mb-auto ">
                  <li class="nav-item navCat">
                    <a href="{{ url('category') }}" class="nav-link link-dark">
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
          </div>
        </div>
      </div>
    {{-- Carousel --}}
      <div class="container">
        <div class="carouselEcom d-flex justify-content-center">
          <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel" style="width: 100%;">
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
        {{-- Top Products --}}
        <div class="container my-5 pb-4 bg-light">
          <h3 class="d-flex justify-content-center py-3">Top Products</h3>
          <div class="d-flex cards-wrapper">
            
                <div @click="seeProduct">
                  <div class="card" style="height: 18rem;">
                      <img style="height:12rem; object-fit:cover;" class="card-img-top" :alt="">
                      <div class="card-body bg-light" style="height: 10rem;">
                          <p class="card-title productname">SAMPLE PRODUCT NAME</p>
                          <p class="card-text text-danger price">156126.00</p>
                      </div>
                  </div>
                </div>
                <div @click="seeProduct">
                  <div class="card" style="height: 18rem;">
                      <img style="height:12rem; object-fit:cover;" class="card-img-top" :alt="">
                      <div class="card-body bg-light" style="height: 10rem;">
                          <p class="card-title productname">SAMPLE PRODUCT NAME</p>
                          <p class="card-text text-danger price">156126.00</p>
                      </div>
                  </div>
                </div>
                <div @click="seeProduct">
                  <div class="card" style="height: 18rem;">
                      <img style="height:12rem; object-fit:cover;" class="card-img-top" :alt="">
                      <div class="card-body bg-light" style="height: 10rem;">
                          <p class="card-title productname">SAMPLE PRODUCT NAME</p>
                          <p class="card-text text-danger price">156126.00</p>
                      </div>
                  </div>
                </div>
                <div @click="seeProduct">
                  <div class="card" style="height: 18rem;">
                      <img style="height:12rem; object-fit:cover;" class="card-img-top" :alt="">
                      <div class="card-body bg-light" style="height: 10rem;">
                          <p class="card-title productname">SAMPLE PRODUCT NAME</p>
                          <p class="card-text text-danger price">156126.00</p>
                      </div>
                  </div>
                </div>
                <div @click="seeProduct">
                  <div class="card" style="height: 18rem;">
                      <img style="height:12rem; object-fit:cover;" class="card-img-top" :alt="">
                      <div class="card-body bg-light" style="height: 10rem;">
                          <p class="card-title productname">SAMPLE PRODUCT NAME</p>
                          <p class="card-text text-danger price">156126.00</p>
                      </div>
                  </div>
                </div>
                <div @click="seeProduct">
                  <div class="card" style="height: 18rem;">
                      <img style="height:12rem; object-fit:cover;" class="card-img-top" :alt="">
                      <div class="card-body bg-light" style="height: 10rem;">
                          <p class="card-title productname">SAMPLE PRODUCT NAME</p>
                          <p class="card-text text-danger price">156126.00</p>
                      </div>
                  </div>
                </div>

          </div>
        </div>

        {{-- Discover --}}
        <div class="container my-5 pb-4 bg-light">
          <h3 class="d-flex justify-content-center py-3">Discover</h3>
          <div class="cards">
            <div @click="seeProduct">
              <div class="card" style="height: 18rem;">
                  <img style="height:12rem; object-fit:cover;" class="card-img-top" :alt="">
                  <div class="card-body bg-light" style="height: 10rem;">
                      <p class="card-title productname">SAMPLE PRODUCT NAME</p>
                      <p class="card-text text-danger price">156126.00</p>
                  </div>
              </div>
            </div>
            
            <div @click="seeProduct">
              <div class="card" style="height: 18rem;">
                  <img style="height:12rem; object-fit:cover;" class="card-img-top" :alt="">
                  <div class="card-body bg-light" style="height: 10rem;">
                      <p class="card-title productname">SAMPLE PRODUCT NAME</p>
                      <p class="card-text text-danger price">156126.00</p>
                  </div>
              </div>
            </div>

            <div @click="seeProduct">
              <div class="card" style="height: 18rem;">
                  <img style="height:12rem; object-fit:cover;" class="card-img-top" :alt="">
                  <div class="card-body bg-light" style="height: 10rem;">
                      <p class="card-title productname">SAMPLE PRODUCT NAME</p>
                      <p class="card-text text-danger price">156126.00</p>
                  </div>
              </div>
            </div>

            <div @click="seeProduct">
              <div class="card" style="height: 18rem;">
                  <img style="height:12rem; object-fit:cover;" class="card-img-top" :alt="">
                  <div class="card-body bg-light" style="height: 10rem;">
                      <p class="card-title productname">SAMPLE PRODUCT NAME</p>
                      <p class="card-text text-danger price">156126.00</p>
                  </div>
              </div>
            </div>

            <div @click="seeProduct">
              <div class="card" style="height: 18rem;">
                  <img style="height:12rem; object-fit:cover;" class="card-img-top" :alt="">
                  <div class="card-body bg-light" style="height: 10rem;">
                      <p class="card-title productname">SAMPLE PRODUCT NAME</p>
                      <p class="card-text text-danger price">156126.00</p>
                  </div>
              </div>
            </div>

            <div @click="seeProduct">
              <div class="card" style="height: 18rem;">
                  <img style="height:12rem; object-fit:cover;" class="card-img-top" :alt="">
                  <div class="card-body bg-light" style="height: 10rem;">
                      <p class="card-title productname">SAMPLE PRODUCT NAME</p>
                      <p class="card-text text-danger price">156126.00</p>
                  </div>
              </div>
            </div>

            <div @click="seeProduct">
              <div class="card" style="height: 18rem;">
                  <img style="height:12rem; object-fit:cover;" class="card-img-top" :alt="">
                  <div class="card-body bg-light" style="height: 10rem;">
                      <p class="card-title productname">SAMPLE PRODUCT NAME</p>
                      <p class="card-text text-danger price">156126.00</p>
                  </div>
              </div>
            </div>

            <div @click="seeProduct">
              <div class="card" style="height: 18rem;">
                  <img style="height:12rem; object-fit:cover;" class="card-img-top" :alt="">
                  <div class="card-body bg-light" style="height: 10rem;">
                      <p class="card-title productname">SAMPLE PRODUCT NAME</p>
                      <p class="card-text text-danger price">156126.00</p>
                  </div>
              </div>
            </div>

            <div @click="seeProduct">
              <div class="card" style="height: 18rem;">
                  <img style="height:12rem; object-fit:cover;" class="card-img-top" :alt="">
                  <div class="card-body bg-light" style="height: 10rem;">
                      <p class="card-title productname">SAMPLE PRODUCT NAME</p>
                      <p class="card-text text-danger price">156126.00</p>
                  </div>
              </div>
            </div>

            <div @click="seeProduct">
              <div class="card" style="height: 18rem;">
                  <img style="height:12rem; object-fit:cover;" class="card-img-top" :alt="">
                  <div class="card-body bg-light" style="height: 10rem;">
                      <p class="card-title productname">SAMPLE PRODUCT NAME</p>
                      <p class="card-text text-danger price">156126.00</p>
                  </div>
              </div>
            </div>

            <div @click="seeProduct">
              <div class="card" style="height: 18rem;">
                  <img style="height:12rem; object-fit:cover;" class="card-img-top" :alt="">
                  <div class="card-body bg-light" style="height: 10rem;">
                      <p class="card-title productname">SAMPLE PRODUCT NAME</p>
                      <p class="card-text text-danger price">156126.00</p>
                  </div>
              </div>
            </div>

            <div @click="seeProduct">
              <div class="card" style="height: 18rem;">
                  <img style="height:12rem; object-fit:cover;" class="card-img-top" :alt="">
                  <div class="card-body bg-light" style="height: 10rem;">
                      <p class="card-title productname">SAMPLE PRODUCT NAME</p>
                      <p class="card-text text-danger price">156126.00</p>
                  </div>
              </div>
            </div>

            <div @click="seeProduct">
              <div class="card" style="height: 18rem;">
                  <img style="height:12rem; object-fit:cover;" class="card-img-top" :alt="">
                  <div class="card-body bg-light" style="height: 10rem;">
                      <p class="card-title productname">SAMPLE PRODUCT NAME</p>
                      <p class="card-text text-danger price">156126.00</p>
                  </div>
              </div>
            </div>

            <div @click="seeProduct">
              <div class="card" style="height: 18rem;">
                  <img style="height:12rem; object-fit:cover;" class="card-img-top" :alt="">
                  <div class="card-body bg-light" style="height: 10rem;">
                      <p class="card-title productname">SAMPLE PRODUCT NAME</p>
                      <p class="card-text text-danger price">156126.00</p>
                  </div>
              </div>
            </div>

            <div @click="seeProduct">
              <div class="card" style="height: 18rem;">
                  <img style="height:12rem; object-fit:cover;" class="card-img-top" :alt="">
                  <div class="card-body bg-light" style="height: 10rem;">
                      <p class="card-title productname">SAMPLE PRODUCT NAME</p>
                      <p class="card-text text-danger price">156126.00</p>
                  </div>
              </div>
            </div>

            <div @click="seeProduct">
              <div class="card" style="height: 18rem;">
                  <img style="height:12rem; object-fit:cover;" class="card-img-top" :alt="">
                  <div class="card-body bg-light" style="height: 10rem;">
                      <p class="card-title productname">SAMPLE PRODUCT NAME</p>
                      <p class="card-text text-danger price">156126.00</p>
                  </div>
              </div>
            </div>

            <div @click="seeProduct">
              <div class="card" style="height: 18rem;">
                  <img style="height:12rem; object-fit:cover;" class="card-img-top" :alt="">
                  <div class="card-body bg-light" style="height: 10rem;">
                      <p class="card-title productname">SAMPLE PRODUCT NAME</p>
                      <p class="card-text text-danger price">156126.00</p>
                  </div>
              </div>
            </div>

            <div @click="seeProduct">
              <div class="card" style="height: 18rem;">
                  <img style="height:12rem; object-fit:cover;" class="card-img-top" :alt="">
                  <div class="card-body bg-light" style="height: 10rem;">
                      <p class="card-title productname">SAMPLE PRODUCT NAME</p>
                      <p class="card-text text-danger price">156126.00</p>
                  </div>
              </div>
            </div>

          </div>          
        </div>
      </div>
    </div>
    
    @include('includes/footer1')
    <script src="/js/ecommerce.js"></script>
</body>
</html>