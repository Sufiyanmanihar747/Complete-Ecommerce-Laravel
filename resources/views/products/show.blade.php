@extends('layouts.app')

@section('content')
  <div class="container my-5 bg-white rounded p-3 shadow-lg">
    {{-- @dump($product) --}}
    <div class="row">
      <div class="col-md-6">
        <div id="productCarousel" class="carousel slide" data-interval="false">
          <div class="carousel-inner">
            @php
              $imageArray = explode(',', $product->images);
            @endphp
            @foreach ($imageArray as $key => $image)
              <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                <img src="{{ isset($image) ? url('storage/images/' . $image) : 'null' }}" class="d-block w-100"
                  style="aspect-ratio: 2 / 2;" alt="{{ $image }}">
              </div>
            @endforeach
          </div>
          <a class="carousel-control-prev" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <div class="row justify-content-center">
          @foreach ($imageArray as $key => $image)
            <img src="{{ isset($image) ? url('storage/images/' . $image) : 'null' }}" width="125"
              style="width: 120px; height: 120px; object-fit: contain;max-width: 100%; max-height: 100%;"
              alt="{{ $image }}" onclick="updateCarousel({{ $key }})">
          @endforeach
        </div>
      </div>

      <div class="col-md-6 d-flex flex-column">
        <h2 class="">{{ $product->title }}</h2>
        <hr>
        <p class=""><b>Price: </b>&#8377;{{ $product->price }}</p>
        <p class=""><b>Brand: </b>{{ $product->company }}</p>
        <p class=""><b>Category: </b>{{ $product->categories->name }}</p>
        <p class=""><b>Description: </b>{{ $product->description }}</p>
        <div class="row mb-3">
          <div class="col d-flex flex-column align-items-center">
            <div>
              <img src="{{ asset('logos/service-icon-1.svg') }}" alt="Service icon">
            </div>
            <div>
              <p class="m-0">Free Delivery</p>
            </div>
          </div>
          <div class="col d-flex flex-column align-items-center">
            <div>
              <img src="{{ asset('logos/service-icon-2.svg') }}" alt="Service icon">
            </div>
            <div>
              <p class="m-0">Easy Returns</p>
            </div>
          </div>
          <div class="col d-flex flex-column align-items-center">
            <div>
              <img src="{{ asset('logos/service-icon-3.svg') }}" alt="Service icon">
            </div>
            <div>
              <p class="m-0">SecurePayment</p>
            </div>
          </div>
          <div class="col d-flex flex-column align-items-center">
            <div>
              <img src="{{ asset('logos/service-icon-4.svg') }}" alt="Service icon">
            </div>
            <div>
              <p class="m-0">Special Support</p>
            </div>
          </div>
        </div>
        <form action="{{ route('cart.store') }}" method="post">
          @csrf
          <input type="hidden" name="product_id" value="{{ $product->id }}">
          <input type="hidden" name="quantity" value="1">
          <button type="submit" class="btn btn-dark w-100">
            Add to Cart
          </button>
        </form>
        <br>
        <a href="#">
          <button class="btn btn-warning w-100">
            Buy Now
          </button>
        </a>
      </div>
    </div>
  </div>
@endsection
