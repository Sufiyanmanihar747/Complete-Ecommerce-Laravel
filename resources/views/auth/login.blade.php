@extends('layouts.app')

@section('content')
  <style>
    .ripple-background {
      position: absolute;
      width: 100%;
      height: 100%;
      overflow: hidden;
      z-index: -1;
    }

    .circle {
      position: absolute;
      border-radius: 50%;
      background: white;
      animation: ripple 15s infinite;
      box-shadow: 0px 0px 1px 0px #508fb9;
    }

    .small-circle {
      width: 200px;
      height: 200px;
      left: -100px;
      bottom: -100px;
    }

    .medium-circle {
      width: 400px;
      height: 400px;
      left: -200px;
      bottom: -200px;
    }

    .large-circle {
      width: 600px;
      height: 600px;
      left: -300px;
      bottom: -300px;
    }

    .xlarge-circle {
      width: 800px;
      height: 800px;
      left: -400px;
      bottom: -400px;
    }

    .xxlarge-circle {
      width: 1000px;
      height: 1000px;
      left: -500px;
      bottom: -500px;
    }

    .shade1 {
      opacity: 0.2;
    }

    .shade2 {
      opacity: 0.5;
    }

    .shade3 {
      opacity: 0.7;
    }

    .shade4 {
      opacity: 0.8;
    }

    .shade5 {
      opacity: 0.9;
    }

    @keyframes ripple {
      0% {
        transform: scale(0.8);
      }

      50% {
        transform: scale(1.2);
      }

      100% {
        transform: scale(0.8);
      }
    }
  </style>

  <div class="login-container my-5">
    <div class="ripple-background">
      <div class="circle xxlarge-circle shade1"></div>
      <div class="circle xlarge-circle shade2"></div>
      <div class="circle large-circle shade3"></div>
      <div class="circle medium-circle shade4"></div>
      <div class="circle small-circle shade5"></div>
    </div>
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
        <p class="signup-link">Don't have an account? <a href="{{ route('register') }}" class="text-primary"><b>Sign up
              here</b></a></p>
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
