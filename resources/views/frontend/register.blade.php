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
    <link rel="shortcut icon" href="/template-frontend/theme/images/favicon.ico" type="image/x-icon" />
    <link rel="icon" href="/template-frontend/theme/images/favicon.ico" type="image/x-icon" />
    <link
      rel="apple-touch-icon"
      sizes="180x180"
      href="/template-frontend/theme/images/apple-touch-icon.png"
    />

    <!-- THEME CSS
	================================================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/template-frontend/theme/plugins/bootstrap/css/bootstrap.min.css" />
    <!-- FontAwesome -->
    <link
      rel="stylesheet"
      href="/template-frontend/theme/plugins/font-awesome/css/font-awesome.min.css"
    />
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="/template-frontend/theme/plugins/slick-carousel/slick.css" />
    <link rel="stylesheet" href="/template-frontend/theme/plugins/slick-carousel/slick-theme.css" />
    <!-- manin stylesheet -->
    <link rel="stylesheet" href="/template-frontend/theme/css/style.css" />
  </head>
  <body style='margin-top:150px; margin-bottom:150px;'>
    <section class="login-signup section-padding">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-lg-7">
            <div class="signup">
              <div class="text-center">
                <a href="/"
                  ><img src="/template-frontend/theme/images/logos/logo.png" alt="" class="img-fluid"
                /></a>
              </div>
              <h3 class="mt-4">Sign Up Here</h3>
              <p class="mb-5">Join with us and feel better</p>
              <form action="/register" method='post' class="signup-form row">
                @csrf
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="f-name">Full Name</label>
                    <input
                      type="text"
                      class="form-control @error('name') is-invalid @enderror"
                      id="name"
                      name="name"
                      placeholder="Full Name"
                      required
                      value='{{ old('name') }}''
                    />
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="email-address">Email</label>
                    <input
                      type="email"
                      class="form-control @error('email') is-invalid @enderror"
                      name="email"
                      id="email"
                      placeholder="Enter a valid mail"
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
                    <label for="password-s">Password</label>
                    <input
                      type="password"
                      class="form-control @error('password') is-invalid @enderror"
                      id="password"
                      name="password"
                      placeholder="A strong password"
                    />
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-12">
                  <button class="btn btn-primary" type="submit">Sign Up</button>
                  <p class="mt-5 mb-0">
                    Already a member? <a href="/login">Log in</a>
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
    <script src="/template-frontend/theme/plugins/jquery/jquery.js"></script>
    <!-- Bootstrap jQuery -->
    <script src="/template-frontend/theme/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Slick Slider -->
    <script src="/template-frontend/theme/plugins/slick-carousel/slick.min.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script src="/template-frontend/theme/plugins/google-map/gmap.js"></script>
    <!-- main js -->
    <script src="/template-frontend/theme/js/custom.js"></script>
  </body>
</html>
