@extends('layouts.app')

@section('content')

    <body class="bg-gradient-primary">

      <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

          <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
              <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                  <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                  <div class="col-lg-6">
                    <div class="p-5">
                      <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                      </div>
                      <form method="POST" action="{{ route('login') }}">
                          @csrf
                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Email Address..." autofocus>

                                  @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                        </div>
                        <div class="form-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                          <div class="custom-control custom-checkbox small">
                              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                  <label class="form-check-label" for="remember">
                                      {{ __('Remember Me') }}
                                  </label>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            {{ __('Login') }}
                        </button>
                        <hr>
                        <a href="https://www.google.com/" class="btn btn-google btn-user btn-block">
                          <i class="fab fa-google fa-fw"></i> Login with Google
                        </a>
                        <a href="https://www.facebook.com/" class="btn btn-facebook btn-user btn-block">
                          <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                        </a>
                      </form>
                      <hr>
                      <div class="text-center">
                          @if (Route::has('password.request'))
                                      <a class="small" href="{{ route('password.request') }}">
                                          {{ __('Forgot Your Password?') }}
                                      </a>
                          @endif
                      </div>
                      <div class="text-center">
                        <a class="small" href="/register">Create an Account!</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>

      </div>

    </body>
@endsection
