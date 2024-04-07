@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="shadow">
          <div class="card-header">{{ __('Register') }}</div>
          <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="d-flex justify-content-center gap-5">
                <div class="mb-4 w-100">
                  <label for="name" class="font-weight-bold">{{ __('Name') }}</label>
                  <div>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                      name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                <div class="mb-4 w-100">
                  <label for="email" class="font-weight-bold">{{ __('Email Address') }}</label>

                  <div>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                      name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="d-flex justify-content-center gap-5">
                <div class="mb-4 w-100">
                  <label for="password" class="font-weight-bold">{{ __('Password') }}</label>

                  <div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                      name="password" required autocomplete="new-password">

                    @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                <div class="mb-4 w-100">
                  <label for="password-confirm" class="font-weight-bold">{{ __('Confirm Password') }}</label>

                  <div class="">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                      required autocomplete="new-password">
                  </div>
                </div>
              </div>
              
              <div class="">
                <div class="">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                  </button>
                </div>
              </div>
              <p class="signup-link">Already have an account? <a href="{{ route('login') }}" class="text-primary"><b>Sign
                    in here</b></a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
