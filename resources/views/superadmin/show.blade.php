@extends('superadmin.index')

@section('content')
  <div class="container" style="margin-top: 3rem!important;">
    {!! Form::open([
        'class' => 'bg-white shadow-lg mt-5 pt-2 pb-3 rounded px-4 mx-5',
        'enctype' => 'multipart/form-data',
    ]) !!}
    @csrf

    <div class="d-flex justify-content-between align-items-center mb-4">
      <a href="{{ url()->previous() }}" class="text-decoration-none fs-5">Back</a>
      <h2 class="text-center text-dark m-0 ">Admin</h2>
      <div><a href="{{ route('superadmin.edit', $admin->id) }}">
          <i class="bi bi-pencil-square" style="font-size: 24px"></i></a></div>
    </div>

    <div class="form-row justify-content-center" style="gap: 35px">

      <div class="form-group col-md-5 ">
        <label for="name" class="font-weight-bold m-0">{{ __('Name') }}</label>
        <input id="name" type="text" class="h-75 form-control @error('name') is-invalid @enderror" name="name"
          value="{{ $admin->name }}" required autocomplete="name" autofocus placeholder="Enter admin name" disabled>
        @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>

      <div class="form-group col-md-5 ">
        <label for="email" class="font-weight-bold m-0">{{ __('Email Address') }}</label>

        <input id="email" type="email" class="h-75 form-control @error('email') is-invalid @enderror" name="email"
          value="{{ $admin->email }}" required autocomplete="email" placeholder="Enter admin email" disabled>

        @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>

    <div class="form-row justify-content-center" style="gap: 35px">

      <div class="form-group col-md-5">
        <label class="font-weight-bold m-0" for="gender">Role:</label>
        {!! Form::select('role', ['superadmin' => 'Super Admin', 'admin' => 'Admin', 'user' => 'User'], $admin->role, [
            'class' => 'form-control h-75',
            'placeholder' => 'Select Role',
            'disabled' => true,
        ]) !!}
      </div>

      <div class="form-group col-md-5 ">
        <label for="company" class="font-weight-bold m-0">Company</label>
        <input id="company" type="text" class="h-75 form-control" name="company" value="{{ $admin->company }}"
          required autocomplete="name" autofocus disabled>
      </div>
    </div>
    {!! Form::close() !!}
  </div>
@endsection
