@extends('layouts.app')

@section('content')
  {{-- @dd($product) --}}
  <div class="container d-flex my-3 gap-4">
    <div class="container my-4 rounded p-3 shadow-lg background-transparent">
      <h5 class="mb-5 text-center">ORDER SUMMARY</h5>

      <div class="row">
        @php
          $totalItems = 1;
        @endphp
        <div class="col-md-2" style="align-self: center">
          <div class="carousel slide" data-interval="false">
            <div class="carousel-inner">
              @php
                $imageArray = explode(',', $product->images);
              @endphp
              <img src="{{ isset($imageArray[0]) ? url('storage/images/' . $imageArray[0]) : 'null' }}" class="w-100"
                alt="{{ $imageArray[0] }}">
            </div>
          </div>
        </div>

        <div class="col-md-8 d-flex flex-column">
          <h5 class="">{{ $product->title }}</h5>
          <p class=""><b>Brand: </b>{{ $product->company }}</p>
          <div class="col-md-2 d-flex align-items-center justify-content-start p-0 my-2 ">
            <p class=""><b>Quantity: </b>{{ $totalItems }}</p>
            <input type="hidden" class="product-id" value="{{ $product->id }}">
          </div>
        </div>

        <div class="col-md-2">
          <p style="font-size: 20px;"><b>&#8377;{{ $product->price }}</b></p>
        </div>
        <input type="hidden" class="quantity" value="{{ $product->quantity }}">
        <div style="border: 1px solid #d8d8d8;margin: 24px 0px;"></div>
        <div class="d-flex justify-content-between">
        </div>
      </div>
    </div>
    <div class="my-4">
      <div style="position: sticky;top: 80px;">
        <div class="card background-transparent">
          <div class="card-body">
            <h5 class="mb-5 text-center">PAYMENT METHODS</h5>

            {!! Form::open([
                'url' => route('order.store'),
                'method' => 'POST',
                'id' => 'order-form',
            ]) !!}
            @csrf
            {!! Form::text('id', $product->id, ['class' => 'd-none']) !!}
            <div class="form-group">
              {!! Form::label('old_address', 'Select Address:') !!}
              {!! Form::select('old_address', $addresses->pluck('address', 'id'), null, [
                  'class' => 'form-control',
                  'placeholder' => 'Select an address',
                  'id' => 'old_address_select',
              ]) !!}
            </div>
            <div class="form-group">
              {!! Form::label('new_address', 'New Address:') !!}
              {!! Form::textarea('new_address', null, [
                  'class' => 'form-control',
                  'id' => 'deliveryAddress',
                  'rows' => 3,
                  'placeholder' => 'Enter your delivery address',
              ]) !!}
            </div>
            <div class="form-group">
              <p class="d-flex font-weight-bold">Total Items: <span id="totalItems"> {{ $totalItems }}</span></p>
            </div>
            <div class="form-group">
              {!! Form::text('total_amount', $product->price, ['class' => 'd-none']) !!}
              <p class="d-flex font-weight-bold">Total Payable:&#8377;<span id="totalAmount">{{ $product->price }}</span>
              </p>
            </div>
            {!! Form::submit('Pay Now', ['class' => 'btn btn-primary', 'id' => 'order-success-btn']) !!}
            <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="rzp_test_khi1E543xQPo9C"
              data-amount="{{ $product->price }}00" data-currency="INR" data-name="Pay to Trendbazaar" data-description="Rozerpay"
              data-image="{{ asset('logos/trendbazaar-high-resolution-logo-transparent.png') }}" data-theme.color="#4848ff">
            </script>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
