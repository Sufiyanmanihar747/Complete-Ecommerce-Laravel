@extends('admin.index')

@section('content')
  <div class="container" style="margin-top: 3rem!important;">
    {!! Form::open([
        'files' => 'true',
        'class' => 'bg-white shadow-lg pt-2 pb-3 rounded px-4 mx-5',
        'enctype' => 'multipart/form-data',
    ]) !!}

    <div class="d-flex justify-content-between align-items-center mb-4">
      <div><a href="{{ url()->previous() }}" class="text-decoration-none fs-5">Back</a>
      </div>
      <h2 class="text-center text-dark m-0 ">Product</h2>
      <div></div>
    </div>
    {{-- @dd($product); --}}
    <div class="form-row justify-content-center">
      <div class="row" id="imagePreviews" style="gap: 10px">
        @if ($product->images)
          @php
            $imageArray = explode(',', $product->images);
          @endphp

          <div class="image-gallery">
            @foreach ($imageArray as $image)
              <img src="{{ isset($image) ? url('storage/images/' . $image) : 'null' }}" width="125"
                style="width: 120px; height: 120px; object-fit: contain; max-width: 100%; max-height: 100%;"
                alt="Product Image">
            @endforeach
          </div>
        @else
          <p>No images available</p>
        @endif
      </div>
    </div>
    <div class="form-row justify-content-center" style="gap: 35px">
      <div class="form-group col-md-5 ">
        <label class="font-weight-bold m-0" for="title">Title:</label>
        {!! Form::text('title', $product->title, [
            'class' => 'form-control h-75',
            'placeholder' => 'Enter title',
            'style' => 'text-transform: capitalize;',
            'disabled' => true,
        ]) !!}
      </div>
      <div class="form-group col-md-5 ">
        <label class="font-weight-bold m-0" for="price">Price:</label>
        {!! Form::number('price', $product->price, [
            'class' => 'form-control h-75',
            'placeholder' => 'Enter Price',
            'required' => 'required',
            'step' => '0.01',
            'min' => '0.01',
            'disabled' => true,
        ]) !!}

      </div>
    </div>
    <div class="form-row justify-content-center" style="gap: 35px">
      <div class="form-group col-md-5 ">
        <label class="font-weight-bold m-0" for="company">Company:</label>
        {!! Form::text('company', $product->company, [
            'class' => 'form-control h-75',
            'placeholder' => 'Enter your company',
            'disabled' => true,
        ]) !!}
      </div>

      <div class="form-group col-md-5  ">
        <label class="font-weight-bold m-0" for="year">Category:</label>
        {!! Form::select(
            'category',
            [
                '1st year' => '1st Year',
                '2nd year' => '2nd Year',
                '3rd year' => '3rd Year',
                '4th year' => '4th Year',
            ],
            $product->category,
            [
                'class' => 'form-control h-75',
                'placeholder' => 'Select category',
                'required' => 'required',
                'disabled' => true,
            ],
        ) !!}
      </div>
    </div>
    <div class="form-row justify-content-center" style="gap: 35px">
      <div class="form-group col-md-10">
        <label class="font-weight-bold m-0" for="phone">Description:</label>
        {!! Form::tel('description', $product->description, [
            'class' => 'form-control h-100',
            'placeholder' => 'Enter your description',
            'disabled' => true,
        ]) !!}
      </div>
      <div class="form-group">

      </div>
    </div>
    {!! Form::close() !!}
  </div>
@endsection
