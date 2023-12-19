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
            transform: scale(1.01);
            cursor: pointer;
        }
    </style>
</head>
<body>
    @include('includes/header2')
    <button class="btn btn-light sticky-top" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"><ion-icon name="chevron-forward-outline"></ion-icon></button>

    <div class="container" id="contentBody">
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

      <div class="container">
        <div class="py-3 bg-danger">
          <h5 style="display: inline-block;">Search Results for: </h5>
          <h5 id="searched_input" style="display:inline-block;">Product Name</h5>
          <div class="cards">
              <div @click="seeProduct">
                <div class="card card-hover" style="height: 18rem;">
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
    @include('includes/footer2')
    @include('includes/footer1')
    <script src="/js/ecommerce.js"></script>
</body>
</html>