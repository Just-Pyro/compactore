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
    <nav id="head1" class="navbar navbar-expand-lg bg-dark navbar-dark">
      <div class="container">
        <a id="title" href="#" @click="reloadPage" class="navbar-brand">COMPACTORE</a>
      </div>
    </nav>

    <div id="app" class="container">
      <div class="row">
        <div class="col-7">
          <img class="mt-6 mx-auto" src="{{ URL('images/woman-cart.jpg') }}" alt="woman in a cart" style="height:430px; width 430px">
        </div>

        <div v-if="isShown" class="col">
          <div class="card mt-6">
            <div class="card-body shadow" style="height: 430px">

              <h3 class="mb-4 mt-3 mx-3 fw-normal">Login</h3>

              <form action="/login" method="POST" class="mx-3">
                @csrf
                <input id="loginEmail" type="text" name="loginEmail" class="form-control" :class="{'is-valid':okEmail, 'is-invalid':conEmail, 'mb-5':mbe}" placeholder="Email" required>
                <div id="emailFeedback" class="invalid-feedback mb-4">
                  Please provide a valid email.
                </div>
                @error('loginEmail')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input id="loginPassword" type="password" name="loginPassword" class="form-control" :class="{'is-valid':okPass, 'is-invalid':conPassword, 'mb-5':mbp }" placeholder="Password" required>
                <div id="passFeedback" class="invalid-feedback mb-4">
                  Please provide a valid password (at least 8 characters).
                </div>
                <div class="d-grid">
                  <button class="btn btn-dark mb-3" type="submit" @click="checkInputs($event)">LOGIN</button>
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
                <input type="text" name="email" class="form-control mb-3" placeholder="Email">
                <input type="password" name="password" class="form-control mb-3" placeholder="Password">
                <input type="password" name="confirmpassword" class="form-control mb-3" placeholder="Confirm Password">
                <div class="d-grid">
                  <button class="btn btn-dark mb-3" type="submit">SIGN UP</button>
                </div>
              </form>

              <p class="mx-auto" style="width:150px">Old User? <a href="#" @click="change">Log in</a></p>
            </div>
          </div>
        </div>
        <div class="col-1"></div>
      </div>
    </div>
    @include('includes/footer1')
  <script src="/js/register.js"></script>
</body>
</html>