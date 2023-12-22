<header class="bg-dark" id="header2">
    <div class="container-fluid d-flex flex-wrap mx-0">
      <span class="d-flex align-items-center mx-1 text-white"><i class="fas fa-phone-square-alt pe-1"></i>(+000)000-0000</span>
      <span class="d-flex align-items-center mx-1 text-white"><i class="fas fa-envelope-square pe-1"></i>compactore@email.com</span>
      <form class="d-flex align-items-center ms-auto" action="/logout" method="POST">
        @csrf
        <button class="btn btn-danger btn-sm">Log out</button>
      </form>
    </div>
  </header>
  <nav id="head1" class="navbar navbar-expand-lg bg-light navbar-light shadow">
    <div class="container">
      <a id="title" href="{{ url('/ecommerce') }}" class="navbar-brand">COMPACTORE <span style="font-family: 'Your Custom Font', sans-serif !important;">Seller Dashboard</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#compactoreMenu" aria-controls="#compactoreMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
  
      <div id="compactoreMenu" class="collapse navbar-collapse d-flex justify-content-end">
        <div class="" id="ulOptions">
          <ul class="navbar-nav ms-2 position-relative">
            <li class="nav-item mx-2 nav-bubble">
                <a href="#" class="nav-link fw-medium">Products</a>
                <div class="bubble-modal">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item" @mouseover="toggleClass" @mouseout="toggleClass">
                            <a href="{{ url('/myProduct') }}" class="nav-link link-dark fs-6 text-center" data-id="1">My Products</a>
                        </li>
                        <li class="nav-item" @mouseover="toggleClass" @mouseout="toggleClass">
                            <a href="{{ url('/addProduct') }}" class="nav-link link-dark fs-6 text-center" data-id="2">Add Products</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item mx-2">
              <a href="{{ url('/goto-addVoucher') }}" class="nav-link fw-medium">Add Store Voucher</a>
            </li>
            <li class="nav-item mx-2">
              @if ($shop)
              <a href="{{ url('/profile') }}" class="nav-link p-0"><img src="{{ asset('uploads/storeProfile/' . $shop->shopImg) }}" alt="dp" class="rounded-circle border" style="height:40px; width:40px; object-fit:contain;"></a>                        
              @else
              <a href="{{ url('/profile') }}" class="nav-link"><i class="fa-solid fa-user"></i></a>                        
              @endif
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>