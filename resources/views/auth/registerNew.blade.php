<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register The Souccer</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets1/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets1/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject --><!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets1/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/little one.png') }}">
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
                <h4>New here?</h4>
                <h6 class="font-weight-light">Daftar  Disini !</h6>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                  <div class="form-group">

                    <x-text-input id="name" class="form-control form-control-lg" type="text" name="name" :value="old('name')" required autofocus autocomplete="Username" placeholder="Username" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    {{-- <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Username"> --}}
                  </div>
                  <div class="form-group">

                    <x-text-input id="email" class="form-control form-control-lg" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    {{-- <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email"> --}}
                  </div>

                  <div class="form-group">


                    <x-text-input id="password" class="form-control form-control-lg" placeholder="Password"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    {{-- <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password"> --}}
                  </div>
                  <div class="mt-4">


                    <x-text-input id="password_confirmation" class="form-control form-control-lg" placeholder="Confirm Password"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                  <div class="mb-4">
                    <div class="my-2 d-flex justify-content-between align-items-center">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input">
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">I agree to all Terms & Conditions</span> </label>
                    </div>
                  </div>
                  <div class="mt-3">
                    <x-primary-button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" href="{{ asset('dashboard') }}">Register</a>
                    </x-primary-button>
                  </div>

                  <div class="text-center mt-4 font-weight-light"> Already have an account? <a href={{ route('login') }} lass="text-primary" class="font-weight-light">Login</a>

                    {{-- <x-primary-button class="ml-4">
                        {{ __('Register') }}
                    </x-primary-button> --}}

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
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>
