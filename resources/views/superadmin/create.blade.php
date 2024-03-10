@extends('superadmin.index')

@section('content')
  <div class="container" style="margin-top: 3rem!important;">
    {!! Form::open([
        'url' => isset($user) ? route('superadmin.update', $user->id) : route('superadmin.store'),
        'files' => true,
        'method' => isset($user) ? 'PUT' : 'POST',
        'class' => 'bg-white shadow-lg mt-5 pt-2 pb-3 rounded px-4 mx-5',
        'enctype' => 'multipart/form-data',
    ]) !!}
    @csrf

    @if (isset($user))
      @method('PUT')
    @endif
    <div class="d-flex justify-content-between align-items-center mb-4">
      <a href="{{ url()->previous() }}" class="text-decoration-none fs-5">Back</a>
      <h2 class="text-center text-dark m-0 ">{{ isset($user) ? 'Edit Admin' : 'Add Admin' }}</h2>
      <div></div>
    </div>

    <div class="form-row justify-content-center" style="gap: 35px">

      <div class="form-group col-md-5 ">
        <label for="name" class="font-weight-bold m-0">{{ __('Name') }}</label>
        <input id="name" type="text" class="h-75 form-control @error('name') is-invalid @enderror" name="name"
          value="{{ isset($user) ? $user->name : null }}" required autocomplete="name" autofocus
          placeholder="Enter admin name">
        @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>

      <div class="form-group col-md-5 ">
        <label for="email" class="font-weight-bold m-0">{{ __('Email Address') }}</label>

        <input id="email" type="email" class="h-75 form-control @error('email') is-invalid @enderror" name="email"
          value="{{ isset($user) ? $user->email : null }}" required autocomplete="email" placeholder="Enter admin email">

        @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>

    <div class="form-row justify-content-center mt-2" style="gap: 35px">

      <div class="form-group col-md-5">
        <label for="password" class="font-weight-bold m-0">{{ __('Password') }}</label>
        <input id="password" type="password" class="h-75 form-control @error('password') is-invalid @enderror"
          name="password" required autocomplete="new-password" placeholder="Enter admin password"
          value="{{ isset($user) ? $user->password : null }}">

        @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>

      <div class="form-group col-md-5">
        <label class="font-weight-bold m-0" for="password_confirmation">Confirm Password:</label>
        {!! Form::password('password_confirmation', [
            'class' => 'form-control h-75',
            'placeholder' => 'Confirm password',
        ]) !!}
      </div>
    </div>

    <div class="form-row justify-content-center" style="gap: 0px">
      <div class="form-group col-md-10">
        <label class="font-weight-bold m-0" for="gender">Role:</label>
        {!! Form::select(
            'role',
            ['superadmin' => 'Super Admin', 'admin' => 'Admin', 'user' => 'User'],
            isset($user) ? $user->role : null,
            [
                'class' => 'form-control h-75',
                'placeholder' => 'Select Role',
            ],
        ) !!}
      </div>
    </div>
    <div class="form-row justify-content-center" style="gap: 35px">
      <button type="submit"
        class="btn btn-outline-dark mt-3 col-md-5 ">{{ isset($user) ? 'Update' : 'Submit' }}</button>
    </div>

    {!! Form::close() !!}
  </div>
@endsection
