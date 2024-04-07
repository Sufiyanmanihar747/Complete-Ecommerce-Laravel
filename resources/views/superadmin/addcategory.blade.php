@extends('superadmin.index')

@section('content')
  <div class="container" style="margin-top: 3rem!important;">
    {!! Form::open([
        'url' => isset($category) ? route('category.update', $category->id) : route('category.store'),
        'files' => true,
        'method' => isset($category) ? 'PUT' : 'POST',
        'class' => 'bg-white shadow-lg mt-5 pt-2 pb-3 rounded px-4 mx-5',
    ]) !!}
    @csrf

    @if (isset($category))
      @method('PUT')
    @endif
    <div class="d-flex justify-content-between align-items-center mb-4">
      <a href="{{ url()->previous() }}" class="text-decoration-none fs-5">Back</a>
      <h2 class="text-center text-dark m-0 ">{{ isset($category) ? 'Edit Category' : 'Add Category' }}</h2>
      <div></div>
    </div>
    @if (isset($category))
      <div class="row justify-content-center" id="imagePreviews" style="gap: 10px">
        <img src="{{ asset('storage/images/' . $category->image) }}" style="width: 200px" alt="">
      </div>
    @else
      <div class="row justify-content-center" id="imagePreviews" style="gap: 10px">
      </div>
    @endif
    <div class="form-row justify-content-center" style="gap: 35px">
      <div class="form-group col-md-5 ">
        <label for="name" class="font-weight-bold m-0">{{ __('Title') }}</label>
        <input id="name" type="text" class="h-75 form-control" name="name"
          value="{{ isset($category) ? $category->name : null }}" required autocomplete="name" autofocus
          placeholder="Enter category">
      </div>

      <div class="form-group col-md-5 ">
        <label for="file" class="font-weight-bold m-0">{{ __(' Image') }}</label>
        <input type="file" class="h-75 form-control" id="imageInput" accept="image/*" name="image">
      </div>
    </div>

    <div class="form-row justify-content-center" style="gap: 35px">
      <button type="submit"
        class="btn btn-outline-dark mt-3 col-md-5 ">{{ isset($category) ? 'Update Category' : 'Add Category' }}</button>
    </div>
    {!! Form::close() !!}
  </div>
@endsection
