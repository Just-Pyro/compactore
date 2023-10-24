<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('includes/header1')
    <title>COMPACTORE | ChangePassword</title>
</head>
<body>
    <nav id="head1" class="navbar navbar-expand-lg bg-dark navbar-dark">
      <div class="container">
        <a id="title" href="{{ url('/ecommerce') }}" class="navbar-brand">COMPACTORE <p id="titleChangePass" style="font-family: 'Fallback Font', sans-serif; display: inline-block; margin: 0;">| Change Password</p></a>
      </div>
    </nav>

    <div id="app" class="container">
      <div class="row">
        <div class="col-7 d-flex justify-content-center">
          <img class="mt-6 mx-auto" src="{{ URL('images/changePassword.png') }}" alt="padlock" style="height:430px; width 430px">
        </div>

        <div v-if="isShown" class="col">
          <div class="card mt-6">
            <div class="card-body shadow" style="height: 430px">
                <div class="mt-5">
                    <h3 class="mb-4 mt-3 mx-3 fw-normal text-center"><i class="fa-solid fa-shield-halved"></i> Security Check</h3>
                    <form action="" method="POST" class="mx-3">
                        @csrf
                        <label for="userPass" class="mb-2">Verify Password</label>
                        <input type="password" class="form-control mb-5" placeholder="Password" id="userPass">
                        <div class="d-grid">
                            <button class="btn btn-dark mb-3" type="submit">Verify Password</button>
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </div>
        <div v-else class="col">
          <div class="card mt-6">
            <div class="card-body shadow" style="height: 430px">

              <h3 class="mb-4 mt-3 mx-3 fw-normal">Sign Up</h3>

              <form action="#" method="POST" class="mx-3">
                @csrf
                <input type="text" class="form-control mb-3" placeholder="Username">
                <input type="text" class="form-control mb-3" placeholder="Email">
                <input type="password" class="form-control mb-3" placeholder="Password">
                <input type="password" class="form-control mb-3" placeholder="Confirm Password">
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