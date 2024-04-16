@extends('layouts.app')

@section('content')
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="shadow bg-white rounded">
          <div class="card-header bg-success"><h3>{{ __('Register') }}</h3></div>
          <div class="card-body">
            <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate>
              @csrf
              <div class="row mb-4">
                <div class="col-md-6">
                  <label for="name" class="form-label">{{ __('Name') }}</label>
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                  @error('name')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="col-md-6">
                  <label for="email" class="form-label">{{ __('Email Address') }}</label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email">
                  @error('email')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>

              <div class="row mb-4">
                <div class="col-md-6">
                  <label for="password" class="form-label">{{ __('Password') }}</label>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">
                  @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="col-md-6">
                  <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                    required autocomplete="new-password">
                </div>
              </div>

              <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
              </div>
              <p class="text-center">Already have an account? <a href="{{ route('login') }}" class="text-primary"><b>Sign
                    in here</b></a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
