<header class="bg-dark" id="header2">
    <div class="container-fluid d-flex flex-wrap mx-0">
      <span class="d-flex align-items-center mx-1 text-white"><i class="fas fa-phone-square-alt pe-1"></i>(+000)000-0000</span>
      <span class="d-flex align-items-center mx-1 text-white"><i class="fas fa-envelope-square pe-1"></i>compactore@email.com</span>
      <a href="{{ route('register') }}" class="d-flex align-items-center ms-auto text-white"  id="logout">logout</a>
    </div>
  </header>
  <nav id="head1" class="navbar navbar-expand-lg bg-light navbar-light shadow">
    <div class="container">
        <a id="title" href="{{ url('/ecommerce') }}" class="navbar-brand">COMPACTORE
            <img src="{{ url('images/surplus.png') }}" style="width: 28px; height: 28px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#compactoreMenu" aria-controls="#compactoreMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
      </button>
  
      <div id="compactoreMenu" class="collapse navbar-collapse d-flex justify-content-end">
        <div class="flex-grow-1">
          <form class="flex-grow-1 mx-2" method="GET" action="{{ route('surplusSearchResult') }}">

            <div class="input-group">
              <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Choose Location</button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Luzon</a></li>
                <li><a class="dropdown-item" href="#">Visayas</a></li>
                <li><a class="dropdown-item" href="#">Mindanao</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">then there's cordova</a></li>
              </ul>
              <input type="search" class="form-control" aria-label="Text input with dropdown button" placeholder="Search surplus products">
            </div>
          </form>
        </div>
        <div class="" id="ulOptions">
          <ul class="navbar-nav ms-2">
            <li class="nav-item mx-2">
              <a class="nav-link" href="{{ url('/cart') }}"><i class="fa-solid fa-bookmark"></i></a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="{{ url('/profile') }}"><i class="fa-solid fa-user"></i></a>
            </li>
            <li id="forSwitch" class="nav-item mx-1" @mouseover="switchHover" @mouseout="switchUnHover">
              <a href="" class="nav-link"><i class="fa-solid fa-rotate" id="switch"></i></a>
              <div class="ms-1 me-2 hiddenIcons">
                  <a href="{{ url('/ecommerce') }}" class="mx-3 p-0 nav-link" style="display:inline-block !important;">
                    <img src="{{ url('images/store.png') }}" alt="store" style="object-fit: contain; height: 16.8px;">
                  </a>
                  <a href="{{ url('/swapme') }}" class="mx-2" style="display:inline-block !important;">
                      <img src="{{ URL('images/swapme.png') }}" alt="trade" id="trade" style="height: 16.8px;">
                  </a>
              </div>
            </li>        
          </ul>
        </div>
      </div>
    </div>
  </nav>