@extends('layouts.app')

@section('content')
  {{-- <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Login') }}</div>

          <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
              @csrf

              <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                <div class="col-md-6">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                <div class="col-md-6">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">

                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-6 offset-md-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                      {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                      {{ __('Remember Me') }}
                    </label>
                  </div>
                </div>
              </div>

              <div class="row mb-0">
                <div class="col-md-8 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                  </button>

                  @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                      {{ __('Forgot Your Password?') }}
                    </a>
                  @endif
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div> --}}

  <div class="login-container">
    <div class="card" id="login-card">
      <div class="card-header bg-success">
        <h3>{{ __('Login') }}</h3>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('login') }}" onsubmit="return validateForm()">
          @csrf

          <div class="form-group">
            <label for="email"><b>Email:</b></label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
              value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="password"><b>Password:</b></label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
              name="password" required autocomplete="current-password">
            @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="rememberMe" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="rememberMe"><b>{{ __('Remember Me') }}</b></label>
          </div>

          <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>

          @if (Route::has('password.request'))
            <a class="signup-link" href="{{ route('password.request') }}">
              {{ __('Forgot Your Password?') }}
            </a>
          @endif
        </form>
        <p class="signup-link">Don't have an account? <a href="{{ route('register') }}" class="text-primary"><b>Sign up here</b></a></p>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  <script>
    function validateForm() {
      var email = document.getElementById('email').value;
      var password = document.getElementById('password').value;

      if (password.length < 8) {
        document.getElementById('login-card').classList.add('shake');
        setTimeout(() => {
          document.getElementById('login-card').classList.remove('shake');
        }, 500);
        return false;
      } else {
        return true;
      }
    }
  </script>
  </body>

  </html>
@endsection
