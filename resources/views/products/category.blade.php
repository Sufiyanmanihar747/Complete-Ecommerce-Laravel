@extends('layouts.app')

@section('content')
  <div class="mt-5">
    @if ($products->isEmpty())
    <div class="alert  p-5 display-6 text-center">
        Comming Soon....
      </div>
    @else
      <ul class="product-list p-0">
        @foreach ($products as $product)
          <li class="product-item bg-white p-3 shadow">
            <div class="product-card">
              <figure class="card-banner flex-column justify-content-center">
                <a href="{{ route('home.show', [$product->id]) }}">
                  @php
                    $imageArray = explode(',', $product->images);
                  @endphp
                  <img src="{{ url('storage/images/' . $imageArray[0]) }}" alt="{{ $product->title }}" loading="lazy"
                    class="" style="width: 100%; height:100%; ">
                </a>
                {{-- <div class="card-badge red"> -25%</div> --}}
                <div class="card-actions">
                  <button class="card-action-btn" aria-label="Quick view">
                    <ion-icon name="eye-outline"></ion-icon>
                  </button>
                  <form action="{{ route('cart.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" class="d-flex align-items-center h-100 btn-outline-dark p-1">
                      <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon>
                      <p style="margin: 0">Add to Cart</p>
                    </button>
                  </form>
                  <button class="card-action-btn" aria-label="Add to Whishlist">
                    <ion-icon name="heart-outline"></ion-icon>
                  </button>
                </div>
                </a>
              </figure>
              <div class="card-content">
                <h3 class="h4 card-title">
                  <h5 class="text-capitalize">{{ $product->title }}</h5>
                </h3>
                {{-- <div class="card-price">
              <p style="font-weight: 100; margin:0">{{ $product->description }}</p>
            </div> --}}
                <div class="card-price">
                  <data value="">&#8377;{{ $product->price }}</data>
                  <data value="">&#8377;65.00</data>
                </div>
              </div>
            </div>
          </li>
        @endforeach
      </ul>
    @endif
  </div>
@endsection
