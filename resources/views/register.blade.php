<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('includes/header1')
    <link rel="stylesheet" href="/customcss/register.css">
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

              <h3 class="mb-4 mt-4 mx-3 fw-normal d-flex justify-content-center">Login</h3>

              <form action="/login" method="POST" class="mx-3">
                @csrf
                <div id="emailWarning" class="border rounded-3 mb-4 inputsize">
                  <input id="loginEmail" type="text" name="loginEmail" class="form-control py-2" :class="{'is-valid':okEmail, 'is-invalid':conEmail, 'mb-5':mbe}" placeholder="Email" required>
                  <div id="emailFeedback" class="invalid-feedback mb-2">
                    Please provide a valid email.
                  </div>
                </div>

                @error('loginEmail')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div id="passWarning" class="position-relative border rounded-3 inputsize" :class="{'mb-5':mbp}">
                  <input id="loginPassword" type="password" name="loginPassword" class="form-control py-2 " :class="{'is-valid':okPass, 'is-invalid':conPassword}" placeholder="Password" required>
                  <div class="position-absolute top-50 end-0 translate-middle-y me-2 " @click="passToggle">
                    <i class="fa-regular fa-eye-slash" style="color: #4e5155;" id="eyeicon"></i>
                  </div>

                </div>
                <div id="passwordFeedback" class="invalid-feedback mb-2">
                  Please provide a valid password (at least 8 characters).
                </div>
                <div class="d-grid">
                  <button id="loginBtn" class="btn btn-dark mb-3" type="submit" @click="checkInputs($event)">LOGIN</button>
                </div>
              </form>

              <div class="row mx-2">
                <div class="col"><p class="fs-7"><a href="#">Forgot Password</a></p></div>
                <div class="col"><p class="fs-7"><a href="#">Login with Phone Number</a></p></div>
              </div>
              <div class="d-flex justify-content-center">
                <p class="text-center" style="width:150px">New User? <a href="#" @click="change">Sign up</a></p>
              </div>
            </div>
          </div>
        </div>
        <div v-else class="col">
          <div class="card mt-6">
            <div class="card-body shadow" style="height: 430px">

              <h3 class="mb-4 mt-3 mx-3 fw-normal d-flex justify-content-center">Sign Up</h3>

              <form action="/register" method="POST" class="mx-3" id="registerForm">
                @csrf
                <input type="text" name="username" class="form-control mb-3" placeholder="Username">
                <input type="text" name="email" class="form-control mb-3" placeholder="Email">
                <div class="position-relative">
                  <input type="password" id="password" name="password" class="form-control mb-3" placeholder="Password">
                  <div class="position-absolute top-50 end-0 translate-middle-y me-2 " @click="passToggle">
                    <i class="fa-regular fa-eye-slash" style="color: #4e5155;" id="eyeicon"></i>
                  </div>
                </div>
                <div class="position-relative">
                  <input type="password" id="confirmPassword" name="confirmpassword" class="form-control mb-3 " placeholder="Confirm Password">
                  <div class="position-absolute top-50 end-0 translate-middle-y me-2 " @click="passToggle">
                    <i class="fa-regular fa-eye-slash" style="color: #4e5155;" id="eyeicon"></i>
                  </div>
                </div>
                <div class="d-grid">
                  <button class="btn btn-dark mb-3" type="button" @click="checkPassword">SIGN UP</button>
                </div>
              </form>
              <div class="d-flex justify-content-center">
                <p class="text-center" style="width:150px">Old User? <a href="#" @click="change">Log in</a></p>
              </div>
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