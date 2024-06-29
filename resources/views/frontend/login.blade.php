<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>NewsBit | Portal Berita Online</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!--Favicon-->
    <link rel="shortcut icon" href="/template-frontend/theme/images//favicon.ico" type="image/x-icon" />
    <link rel="icon" href="/template-frontend/theme/images//favicon.ico" type="image/x-icon" />
    <link
      rel="apple-touch-icon"
      sizes="180x180"
      href="/template-frontend/theme/images//apple-touch-icon.png"
    />

    <!-- THEME CSS
	================================================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/template-frontend/theme/plugins//bootstrap/css/bootstrap.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- FontAwesome -->
    <link
      rel="stylesheet"
      href="/template-frontend/theme/plugins//font-awesome/css/font-awesome.min.css"
    />
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="/template-frontend/theme/plugins//slick-carousel/slick.css" />
    <link rel="stylesheet" href="/template-frontend/theme/plugins//slick-carousel/slick-theme.css" />
    <!-- manin stylesheet -->
    <link rel="stylesheet" href="/template-frontend/theme/css//style.css" />
  </head>
  <body style="margin-top: 100px; margin-bottom: 100px;">
    <section class="login-signup section-padding">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-lg-7">
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if(session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session('loginError') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="login">
              <div class="text-center">
                <a href="/"
                  ><img src="/template-frontend/theme/images//logos/logo.png" alt="" class="img-fluid"
                /></a>
              </div>

              <h3 class="mt-4">Login Here</h3>
              <p class="mb-5">Enter your valid mail & password</p>
              <form action="/login" method="post" class="login-form row">
                @csrf
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="loginemail">Email</label>
                    <input
                      type="text"
                      id="email"
                      class="form-control @error('email') is-invalid @enderror"
                      name="email"
                      placeholder="Enter mail"
                      autofocus
                      required
                      value='{{ old('email') }}'
                    />
                    @error('email')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="loginPassword">Password</label>
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="Password"
                      required
                    />
                  </div>
                </div>
                <div class="col-md-12">
                  <button class="btn btn-primary" type="submit">Login</button>

                  <p class="mt-5 mb-0">
                    Not a member yet? <a href="/register">Register Here</a>
                  </p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- THEME JAVASCRIPT FILES
================================================== -->
    <!-- initialize jQuery Library -->
    <script src="/template-frontend/theme/plugins//jquery/jquery.js"></script>
    <!-- Bootstrap jQuery -->
    <script src="/template-frontend/theme/plugins//bootstrap/js/bootstrap.min.js"></script>
    <!-- Slick Slider -->
    <script src="/template-frontend/theme/plugins//slick-carousel/slick.min.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script src="/template-frontend/theme/plugins//google-map/gmap.js"></script>
    <!-- main js -->
    <script src="/template-frontend/theme/js//custom.js"></script>
    <!-- Bootstrap v5.3 js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  </body>
</html>
