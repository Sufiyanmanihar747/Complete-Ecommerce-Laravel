@extends('layouts.app')

@section('content')
  <div class="container my-5 bg-white rounded p-3 shadow-lg">
    {{-- @dump($cartItems) --}}
    @if ($cartItems->isEmpty())
      <div class="alert alert-info p-5 display-6 text-center">
        Your cart is empty.
      </div>
    @else
      <div class="row">
        @php
          $totalItems = 0;
          $totalAmount = 0;
        @endphp
        @foreach ($cartItems as $item)
          @php
            $totalItems += $item->quantity;
            $totalAmount += $item->quantity * $item->product->price;
          @endphp

          <div class="col-md-2" style="align-self: center">
            <div id="productCarousel" class="carousel slide" data-interval="false">
              <div class="carousel-inner">
                @php
                  $imageArray = explode(',', $item->product->images);
                @endphp
                <img src="{{ isset($imageArray[0]) ? url('storage/images/' . $imageArray[0]) : 'null' }}" class="w-100"
                  alt="{{ $imageArray[0] }}">
              </div>
            </div>
          </div>

          <div class="col-md-8 d-flex flex-column">
            <h2 class="">{{ $item->product->title }}</h2>
            <p class=""><b>Brand: </b>{{ $item->product->company }}</p>
            <p class=""><b>Category: </b>{{ $item->product->categories->name }}</p>
            <p class=""><b>Description: </b>{{ $item->product->description }}</p>
            <div class="col-md-2 d-flex align-items-center justify-content-start p-0 my-2 ">
              <button class="btn btn-dark counter-btn decrement">-</button>
              <span class="mx-2 counter" style="font-size: x-large;">{{ $item->quantity }}</span>
              <button class="btn btn-dark counter-btn increment">+</button>
              <input type="hidden" class="product-id" value="{{ $item->id }}">
            </div>
          </div>

          <div class="col-md-2">
            <p style="font-size: 25px;"><b>&#8377;{{ $item->product->price }}</b></p>
            <form action="{{ route('cart.destroy', [$item->id]) }}" method="post">
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-outline-dark">Remove</button>
            </form>
          </div>
          <input type="hidden" class="quantity" value="{{ $item->quantity }}">
          <div style="border: 1px solid #d8d8d8;margin: 24px 0px;"></div>
        @endforeach
        <div class="d-flex justify-content-between">
          <h4 class="d-flex">Total Items: <span id="totalItems">{{ $totalItems }}</span></h4>
          <h4 class="d-flex">Total Amount: &#8377;<span id="totalAmount">{{ $totalAmount }}</span></h4>
        </div>
        <div class="mt-3">
          <a href="">
            <button class="btn btn-warning w-100">
              Proceed to Buy
            </button>
          </a>
        </div>
      </div>
    @endif
  </div>
@endsection
