<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('includes/header1')
    <title>COMPACTORE | Login</title>
</head>
<body>
    <nav id="head1" class="navbar navbar-expand-lg bg-light navbar-light shadow-sm">
      <div class="container">
        <a id="title" href="#" @click="reloadPage" class="navbar-brand">COMPACTORE</a>
      </div>
    </nav>

    <div id="app" class="container">
      <div class="row">
        <div class="col-7">
          <img class="mt-6 mx-auto" src="{{ URL('images/woman-cart.jpg') }}" alt="woman in a cart" style="height:430px; width 430px">
        </div>

        @if ($errors->has('username') || $errors->has('email') || $errors->has('password'))

        <div v-if="isShown" class="col">
          <div class="card mt-6">
            <div class="card-body shadow" style="height: 430px">

              <h3 class="mb-4 mt-3 mx-3 fw-normal">Sign Up</h3>

              <form action="/register" method="POST" class="mx-3">
                @csrf
                <input type="text" name="username" class="form-control mb-3" placeholder="Username">
                
                @if($errors->has('username'))
                  <div class="alert alert-danger py-1 px-2 mt-2 mb-1">{{ $errors->first('username') }}</div>
                @endif
                
                <input type="email" name="email" class="form-control mb-3" placeholder="Email">
                
                @if($errors->has('email'))
                  <div class="alert alert-danger py-1 px-2 mt-2 mb-1">{{ $errors->first('email') }}</div>
                @endif
                
                <input type="password" id="password" name="password" class="form-control mb-3" placeholder="Password">
                
                @if($errors->has('password'))
                  <div class="alert alert-danger py-1 px-2 mt-2 mb-1">{{ $errors->first('password') }}</div>
                @endif
                
                <input type="password" id="confirmPassword" name="password_confirmation" class="form-control mb-3" placeholder="Confirm Password">
                
                <div class="d-grid">
                  <button class="btn btn-dark mb-3" type="submit">SIGN UP</button>
                </div>
              </form>

              <p class="mx-auto" style="width:150px">Old User? <a href="#" @click="change">Log in</a></p>
            </div>
          </div>
        </div>
        <div v-else class="col">
          <div class="card mt-6">
            <div class="card-body shadow" style="height: 430px">

              <h3 class="mb-4 mt-3 mx-3 fw-normal">Login</h3>

              <form action="/login" method="POST" class="mx-3">
                @csrf
                <input id="loginEmail" type="email" name="loginEmail" class="form-control" :class="{'mb-5':mbe}" placeholder="Email">
                
                @if($errors->has('loginEmail'))
                  <div id="errorLoginEmail" class="alert alert-danger py-1 px-2 mt-2 mb-1">{{ $errors->first('loginEmail') }}</div>
                @endif
                
                <input id="loginPassword" type="password" name="loginPassword" class="form-control" :class="{'mb-5':mbe}" placeholder="Password">
                
                @if($errors->has('loginPassword'))
                  <div id="errorLoginPassword" class="alert alert-danger py-1 px-2 mt-2 mb-2">{{ $errors->first('loginPassword') }}</div>
                @endif
                
                <div class="d-grid">
                  <button class="btn btn-dark mb-3" type="submit">LOGIN</button>
                </div>
              </form>

              <div class="row mx-2">
                <div class="col"><p class="fs-7"><a href="#">Forgot Password</a></p></div>
                <div class="col"><p class="fs-7"><a href="#">Login with Phone Number</a></p></div>
              </div>

              <p class="mx-auto" style="width:150px">New User? <a href="#" @click="change">Sign up</a></p>
            </div>
          </div>
        </div>

        @else

        <div v-if="isShown" class="col">
          <div class="card mt-6">
            <div class="card-body shadow" style="height: 430px">

              <h3 class="mb-4 mt-3 mx-3 fw-normal">Login</h3>

              <form action="/login" method="POST" class="mx-3">
                @csrf
                <input id="loginEmail" type="email" name="loginEmail" class="form-control" :class="{'mb-5':mbe}" placeholder="Email">
                
                @if($errors->has('loginEmail'))
                  <div id="errorLoginEmail" class="alert alert-danger py-1 px-2 mt-2 mb-1">{{ $errors->first('loginEmail') }}</div>
                @endif

                @if($incorrect)
                  <div id="errorLoginEmail" class="alert alert-danger py-1 px-2 mt-2 mb-1">{{ $incorrect }}</div>
                @endif
                
                <input id="loginPassword" type="password" name="loginPassword" class="form-control" :class="{'mb-5':mbe}" placeholder="Password">
                
                @if($errors->has('loginPassword'))
                  <div id="errorLoginPassword" class="alert alert-danger py-1 px-2 mt-2 mb-2">{{ $errors->first('loginPassword') }}</div>
                @endif

                @if($incorrect)
                  <div id="errorLoginEmail" class="alert alert-danger py-1 px-2 mt-2 mb-1">{{ $incorrect }}</div>
                @endif
                
                <div class="d-grid">
                  <button class="btn btn-dark mb-3" type="submit">LOGIN</button>
                </div>
              </form>

              <div class="row mx-2">
                <div class="col"><p class="fs-7"><a href="#">Forgot Password</a></p></div>
                <div class="col"><p class="fs-7"><a href="#">Login with Phone Number</a></p></div>
              </div>

              <p class="mx-auto" style="width:150px">New User? <a href="#" @click="change">Sign up</a></p>
            </div>
          </div>
        </div>
        <div v-else class="col">
          <div class="card mt-6">
            <div class="card-body shadow" style="height: 430px">

              <h3 class="mb-4 mt-3 mx-3 fw-normal">Sign Up</h3>

              <form action="/register" method="POST" class="mx-3">
                @csrf
                <input type="text" name="username" class="form-control mb-3" placeholder="Username">
                
                @if($errors->has('username'))
                  <div class="alert alert-danger py-1 px-2 mt-2 mb-1">{{ $errors->first('username') }}</div>
                @endif
                
                <input type="text" name="email" class="form-control mb-3" placeholder="Email">
                
                @if($errors->has('email'))
                  <div class="alert alert-danger py-1 px-2 mt-2 mb-1">{{ $errors->first('email') }}</div>
                @endif
                
                <input type="password" id="password" name="password" class="form-control mb-3" placeholder="Password">
                
                @if($errors->has('password'))
                  <div class="alert alert-danger py-1 px-2 mt-2 mb-1">{{ $errors->first('password') }}</div>
                @endif
                
                <input type="password" id="confirmPassword" name="password_confirmation" class="form-control mb-3" placeholder="Confirm Password">
                
                <div class="d-grid">
                  <button class="btn btn-dark mb-3" type="submit">SIGN UP</button>
                </div>
              </form>

              <p class="mx-auto" style="width:150px">Old User? <a href="#" @click="change">Log in</a></p>
            </div>
          </div>
        </div>

        @endif

        <div class="col-1"></div>
      </div>
    </div>
    @include('includes/footer1')
  <script src="/js/register.js"></script>
</body>
</html>