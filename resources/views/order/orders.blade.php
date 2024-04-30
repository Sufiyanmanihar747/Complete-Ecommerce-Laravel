@extends('layouts.app')

@section('content')
  {{-- @dd($allOrders) --}}

  @if ($allOrders->isEmpty())
    <div class="p-5 display-6 text-center">
      You have no orders.
    </div>
  @else
    @foreach ($allOrders as $order)
      @php
        $totalItems = 0;
      @endphp
      <div class="container my-5 background-transparent rounded p-3 shadow-lg">
        <div class="d-flex justify-content-between">
          <div>
            <p><b>Delivery Address:</b>
              {{ $order->address->address }}
            </p>
            <p><b>Status: </b>{{ $order->status }}</p>
          </div>
          <div>
            <p><b>Payment: </b>{{ $order->payment_method }}</p>
            <p><b>Order ID: </b>{{ $order->id }}</p>
          </div>
        </div>
        <div style="border: 1px solid #d8d8d8;margin: 5px 0px;"></div>
        <div class="row">
          @foreach ($order->orderItems as $item)
            @php
              $totalItems += $item->quantity;
            @endphp

            <div class="col-md-1" style="align-self: center">
              <div class="carousel slide" data-interval="false">
                <div class="carousel-inner">
                  @php
                    $imageArray = explode(',', $item->product->images);
                  @endphp
                  <img src="{{ isset($imageArray[0]) ? url('storage/images/' . $imageArray[0]) : 'null' }}" class="w-75"
                    alt="{{ $imageArray[0] }}">
                </div>
              </div>
            </div>

            <div class="col-md-8 d-flex flex-column">
              <h5 class="">{{ $item->product->title }}</h5>
              <p class=""><b>Brand: </b>{{ $item->product->company }}</p>
            </div>

            <div class="col-md-2">
              <p style="font-size: 15px;"><b>&#8377;{{ $item->price }}</b></p>
              <p style="font-size: 15px;"><b>Quantity: </b>{{ $item->quantity }}</p>
            </div>
            <input type="hidden" class="quantity" value="{{ $order->quantity }}">
            <div style="border: 1px solid #d8d8d8;margin: 5px 0px;"></div>
          @endforeach
        </div>

        <div class="d-flex justify-content-between align-items-center">
          <div>
            <p><b>Total Items: </b>{{ $totalItems }}</p>
            <p><b>Total Amount: </b> &#8377;{{ $order->total_amount }}</p>
          </div>
          <div>
            <form id="cancelOrder-{{ $order->id }}" action="{{ route('order.destroy', [$order->id]) }}"
              method="post">
              @method('DELETE')
              @csrf
              <button type="button" class="btn btn-danger" onclick="deleteOrder({{ $order->id }})">Cancel
                Order</button>
            </form>
          </div>
        </div>
      </div>
    @endforeach
  @endif
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    //cancel order
    function deleteOrder(orderId) {
      Swal.fire({
        title: 'Are you sure?',
        text: 'You will not be able to recover this order!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, cancel Order!',
        customClass: {
          confirmButton: 'btn btn-danger',
          cancelButton: 'btn btn-outline-secondary'
        }
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('cancelOrder-' + orderId).submit();
        }
      });
    }
  </script>
@endsection
