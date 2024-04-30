@extends('layouts.app')

@section('content')
  {{-- @dump($addresses) --}}
  <div class="container d-flex my-3 gap-4">

    <div class="container my-4 rounded p-3 shadow-lg background-transparent">
      <h5 class="mb-5 text-center">ORDER SUMMARY</h5>
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
              <div class="carousel slide" data-interval="false">
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
              <h5 class="">{{ $item->product->title }}</h5>
              <p class=""><b>Brand: </b>{{ $item->product->company }}</p>
              <div class="col-md-2 d-flex align-items-center justify-content-start p-0 my-2 ">
                <p class=""><b>Quantity: </b>{{$totalItems}}</p>
                <input type="hidden" class="product-id" value="{{ $item->id }}">
              </div>
            </div>

            <div class="col-md-2">
              <p style="font-size: 20px;"><b>&#8377;{{ $item->product->price }}</b></p>
            </div>
            <input type="hidden" class="quantity" value="{{ $item->quantity }}">
            <div style="border: 1px solid #d8d8d8;margin: 24px 0px;"></div>
          @endforeach
          <div class="d-flex justify-content-between">
          </div>
        </div>
      @endif
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
            {!! Form::text('cart', $cartItems, ['class' => 'd-none']) !!}
            <div class="form-group">
              {!! Form::label('old_address', 'Select Address:') !!}
              {!! Form::select('old_address', $addresses->pluck('address', 'id'), null, [
                  'class' => 'form-control',
                  'placeholder' => 'Select an address',
                  'id' => 'old_address_select',
              ]) !!}
            </div>
            <div class="form-group">
              {!! Form::label('delivery_address', 'Delivery Address:') !!}
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
              {!! Form::text('total_amount', $totalAmount, ['class' => 'd-none']) !!}
              <p class="d-flex font-weight-bold">Total Payable:&#8377;<span id="totalAmount">{{ $totalAmount }}</span>
              </p>
            </div>
            <hr>
            <div class="form-group">
              {!! Form::label('payment_method', 'Select Payment Method:') !!}
              {!! Form::select(
                  'payment_method',
                  [
                      '' => 'Select Payment Method',
                      'credit card' => 'Credit Card',
                      'paypal' => 'PayPal',
                      'bank transfer' => 'bank transfer',
                      'cash on delivery' => 'Cash on Delivery (COD)',
                  ],
                  null,
                  ['class' => 'form-control', 'id' => 'payment_method', 'required'],
              ) !!}
            </div>
            <div id="creditCardFields" style="display: none;">
              <div class="form-group">
                {!! Form::label('cardNumber', 'Card Number:') !!}
                {!! Form::text('cardNumber', null, [
                    'class' => 'form-control',
                    'id' => 'cardNumber',
                    'placeholder' => 'Enter your card number',
                ]) !!}
              </div>
              <div class="form-group">
                {!! Form::label('expiryDate', 'Expiry Date:') !!}
                {!! Form::text('expiryDate', null, [
                    'class' => 'form-control',
                    'id' => 'expiryDate',
                    'placeholder' => 'MM/YYYY',
                ]) !!}
              </div>
              <div class="form-group">
                {!! Form::label('cvv', 'CVV:') !!}
                {!! Form::text('cvv', null, ['class' => 'form-control', 'id' => 'cvv', 'placeholder' => 'CVV']) !!}
              </div>
              <div class="form-group">
                {!! Form::label('name', 'Name on Card:') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Enter your name']) !!}
              </div>
              {!! Form::text('status', 'pending', ['class' => 'd-none']) !!}
            </div>
            <div id="paypalFields" style="display: none;">
              <p>Redirecting to PayPal for payment...</p>
            </div>
            <div id="codFields" style="display: none;">
              <p>Please prepare cash for payment upon delivery.</p>
            </div>
            <hr>
            {!! Form::submit('Pay Now', ['class' => 'btn btn-primary', 'id' => 'order-success-btn']) !!}
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('jquery.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var orderForm = document.getElementById('order-form');

      orderForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        var formData = new FormData(orderForm);

        // send the form data
        fetch(orderForm.action, {
            method: 'POST',
            body: formData
          })
          .then(response => {
            if (response.ok) {
              // show alert for order success
              Swal.fire({
                title: 'Order Successful!',
                text: 'Thank you for your purchase.',
                icon: 'success',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                customClass: {
                  confirmButton: 'btn btn-primary'
                }
              }).then((result) => {
                // redirect to the order page
                if (result.isConfirmed) {
                  window.location.href =
                    '{{ route('order.index') }}';
                }
              });

              orderForm.reset();
            } else {
              // Handle errors or failed submissions here
              Swal.fire({
                title: 'Error',
                text: 'Failed to submit the order. Please try again later.',
                icon: 'error',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                customClass: {
                  confirmButton: 'btn btn-primary'
                }
              });
            }
          })
          .catch(error => {
            console.error('Error:', error);
            // Handle network errors or other exceptions here
            Swal.fire({
              title: 'Error',
              text: 'An error occurred while submitting the order. Please try again later.',
              icon: 'error',
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'OK',
              customClass: {
                confirmButton: 'btn btn-primary'
              }
            });
          });
      });
    });

    $(document).ready(function() {
      $('#paymentMethod').change(function() {
        var selectedMethod = $(this).val();

        $('#creditCardFields, #paypalFields, #codFields').hide();
        if (selectedMethod === 'creditCard') {
          $('#creditCardFields').show();
        } else if (selectedMethod === 'paypal') {
          $('#paypalFields').show();
        } else if (selectedMethod === 'cod') {
          $('#codFields').show();
        }
      });

      $('#paymentForm').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serializeArray();
        console.log(formData);
      });
    });

    //this is for diable the field
    $(document).ready(function () {
        $('#old_address_select').on('change', function () {
            var selectedOption = $(this).val();
            if (selectedOption !== '') {
                $('#deliveryAddress').prop('disabled', true); // Disable text area
            } else {
                $('#deliveryAddress').prop('disabled', false); // Enable text area
            }
        });
    });
  </script>
@endsection
