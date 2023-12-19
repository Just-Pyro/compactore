<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Compactore | {{$cat}}</title>
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
            <div class="col-9 py-3">
                <h5 style="display: inline-block;">Products for {{ $cat }} Category</h5>
                {{-- <h5 id="searched_input" style="display:inline-block;"> Category</h5> --}}
                @if ($results->count() > 0)
                  <div class="row align-items-center product">
                  @foreach($results as $result)
                      <div class="col-sm-6 col-lg-4 col-xl-3 my-5" @click="seeProduct({{ $result->id }})">
                          <div class="card mx-auto shadow" style="width: 16rem; height: 18rem;">
                              @if($result->mediaFile->isNotEmpty())
                                  <img src="{{ asset($result->mediaFile->first()->file_path . $result->mediaFile->first()->file_name) }}" style="height:12rem; object-fit:cover;" class="card-img-top" :alt="">
                              @else
                                  <img src="{{ asset('/compactoreCircleFav.png') }}" style="height:12rem; object-fit:cover;" class="card-img-top" alt="">
                              @endif
                              <div class="card-body bg-light" style="height: 10rem;">
                                  <p class="card-title productname" style="white-space:nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $result->productName }}</p>
                                  <p class="card-text text-danger price">{{$result->price}}</p>
                              </div>
                          </div>
                      </div>
                  @endforeach
                  </div>
                @else
                  <p class="fw-medium mt-5 text-center">no products for this category.</p>
                @endif
            </div>
            <div class="col"></div>
        </div>
    </div>
    @include('includes/footer1')
    <script src="/js/ecommerce.js"></script>
</body>
</html>