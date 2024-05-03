@extends('admin.index')

@section('content')
{{-- @dd($orderedProductIds) --}}
<table id="myDataTable" class="display">
    <thead>
      <tr>
        <th class="text-center">Product name</th>
        <th class="text-center">Order id</th>
        <th class="text-center">Quantity</th>
        <th class="text-center">Price</th>
        <th class="text-center">Order Date</th>
        <th class="text-center">Payment method</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($orderedProductIds as $details)
        <tr>
          <td class="text-center text-capitalize"><a href="{{ route('admin.show', $details->product_id) }}">{{ $details->title }}</a></td>
          <td class="text-center">{{ $details->order_id }}</td>
          <td class="text-center">{{ $details->quantity }}</td>
          <td class="text-center">{{ $details->price }}</td>
          <td class="text-center">{{ $details->created_at }}</td>
          <td class="text-center text-capitalize">{{ $details->payment_method }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

@endsection
