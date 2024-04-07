@extends('admin.index')

@section('content')
  <div class="container" style="margin-top: 3rem!important;">
    {!! Form::open([
        'url' => isset($product) ? route('admin.update', $product->id) : route('admin.store'),
        'files' => true,
        'method' => isset($product) ? 'PUT' : 'POST',
        'class' => 'bg-white shadow-lg mt-5 pt-2 pb-3 rounded px-4 mx-5',
        'enctype' => 'multipart/form-data',
    ]) !!}
    @csrf

    @if (isset($product))
      @method('PUT')
    @endif
    <div class="d-flex justify-content-between align-items-center mb-4">
      <a href="{{ url()->previous() }}" class="text-decoration-none fs-5">Back</a>
      <h2 class="text-center text-dark m-0 ">{{ isset($product) ? 'Edit Product' : 'Add Product' }}</h2>
      <div></div>
    </div>

    <div class="form-row justify-content-center">
      <div class="row" id="imagePreviews" style="gap: 10px">
        @if (isset($product))
          @php
            $imageArray = explode(',', $product->images);
          @endphp

          <div class="image-gallery">
            @if (isset($product))
              @foreach ($imageArray as $image)
                <img src="{{ isset($image) ? url('storage/images/' . $image) : 'null' }}"
                  width="125"style="width: 120px; height: 120px; object-fit: contain; max-width: 100%; max-height: 100%;"
                  alt="Profile Image">
              @endforeach
            @else
              <div class="row" id="imagePreviews" style="gap: 10px">
              </div>
            @endif
          </div>
        @endif
      </div>
    </div>

    <div class="form-row justify-content-center" style="gap: 35px">
      <div class="form-group col-md-5 ">
        <label class="font-weight-bold m-0" for="title">Title:</label>
        <span class="text-danger">
          @error('title')
            {{ $message }}
          @enderror
        </span>
        {!! Form::text('title', isset($product) ? $product->title : null, [
            'class' => 'form-control h-75',
            'placeholder' => 'Enter title',
            'style' => 'text-transform: capitalize;',
        ]) !!}
      </div>

      <div class="form-group col-md-5 ">
        <label class="font-weight-bold m-0" for="price">Price:</label>
        <span class="text-danger">
          @error('price')
            {{ $message }}
          @enderror
        </span>
        {!! Form::number('price', isset($product) ? $product->price : null, [
            'class' => 'form-control h-75',
            'placeholder' => 'Enter Price',
            'required' => 'required',
            'step' => '0.01',
            'min' => '0.01',
        ]) !!}
      </div>
    </div>

    <div class="form-row justify-content-center" style="gap: 35px">
      <div class="form-group col-md-5 ">
        <label class="font-weight-bold m-0" for="company">Company:</label>
        <span class="text-danger">
          @error('company')
            {{ $message }}
          @enderror
        </span>
        {!! Form::text('company', isset($product) ? $product->company : null, [
            'class' => 'form-control h-75',
            'placeholder' => 'Enter your company',
        ]) !!}
      </div>

      <div class="form-group col-md-5  ">
        <label class="font-weight-bold m-0" for="year">Category:</label>
        <span class="text-danger">
          @error('category')
            {{ $message }}
          @enderror
        </span>
        {{-- {!! Form::select('category_id', $categories, isset($product) ? $product->category_id : null, [
            'class' => 'form-control h-75',
            'placeholder' => 'Select category',
            'required' => 'required',
        ]) !!} --}}
        @if (isset($product))
          {!! Form::select('category_id', $categories, $product->category_id, [
              'class' => 'form-control h-75',
              'placeholder' => 'Select category',
              'required' => 'required',
          ]) !!}
        @else
          {!! Form::select('category_id', $categories, null, [
              'class' => 'form-control h-75',
              'placeholder' => 'Select category',
              'required' => 'required',
          ]) !!}
        @endif

      </div>
    </div>

    <div class="form-row justify-content-center" style="gap: 35px">
      <div class="form-group col-md-5 ">
        <label class="font-weight-bold m-0" for="phone">Description:</label>
        <span class="text-danger">
          @error('description')
            {{ $message }}
          @enderror
        </span>
        {!! Form::tel('description', isset($product) ? $product->description : null, [
            'class' => 'form-control h-75',
            'placeholder' => 'Enter your description',
        ]) !!}
      </div>

      <div class="form-group col-md-5">
        <label class="font-weight-bold m-0" for="images[]">Upload Image:</label>
        <i class="bi bi-info-circle" title="To select multiple ctrl+click"></i>
        {!! Form::file('images[]', [
            'class' => 'form-control h-75 image-input',
            'accept' => 'image/*',
            'multiple' => true,
            'id' => 'imageInput',
        ]) !!}
        {{-- <span>{{ isset($product) ? $product->images : null }}</span> --}}
      </div>
    </div>

    <div class="form-row justify-content-center" style="gap: 35px">
      <button type="submit"
        class="btn btn-outline-dark mt-3 col-md-5 ">{{ isset($product) ? 'Update' : 'Submit' }}</button>
    </div>
    {!! Form::close() !!}
  </div>
@endsection
