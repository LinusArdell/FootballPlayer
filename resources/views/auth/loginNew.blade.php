<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>The Souccer</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets1/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets1/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets1/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/little one.png') }}">
    <!-- This page CSS -->
  </head>
  <body>

    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img style="margin-left: 30%"  src="{{ asset('assets/images/as no bg.png') }}">
                </div>
                <h4>Hello! How's your life? Good?</h4>
                <h6 class="font-weight-light">Sign in untuk Gacor.</h6>

            <x-auth-session-status class="mb-4" :status="session('status')" />


            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- email --}}
                  <div class="form-group">
                    <x-text-input id="email" class="form-control form-control-lg" type="email" name="email" :value="old('email')" placeholder="Email" required autofocus autocomplete="username" />
                    {{-- <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email"> --}}
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                  </div>
                  {{-- password --}}
                  <div class="form-group">
                    <x-text-input id="password" class="form-control form-control-lg" placeholder="Password"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    {{-- <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password"> --}}
                  </div>
                  {{-- sign in --}}
                  <x-primary-button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                    {{ __('Log in') }}
                </x-primary-button>

                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="block mt-4">
                    <label for="remember_me" class="form-check-label text-muted">
                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="auth-link text-black" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
                </div>




                  {{-- <div class="mt-3">
                    <a class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" href="{{ url('dashboard') }}">SIGN IN</a>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                    </div>
                    <a href="#" class="auth-link text-black">Forgot password?</a>
                  </div> --}}

                  <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="register.html" class="text-primary">Create</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('assets1/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <!-- endinject -->
  </body>
</html>
