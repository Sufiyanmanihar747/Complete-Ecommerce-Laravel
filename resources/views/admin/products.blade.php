@extends('admin.index')

@section('content')
  <table id="myDataTable" class="display">
    <thead>
      <tr>
        <th class="text-center">Title</th>
        <th class="text-center">Price</th>
        <th class="text-center">Company</th>
        <th class="text-center">Category</th>
        <th class="text-center">Description</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $product)
        <tr>
          <td class="text-center"><a href="{{ route('admin.show', $product->id) }}">{{ $product->title }}</a></td>
          <td class="text-center">{{ $product->price }}</td>
          <td class="text-center">{{ $product->company }}</td>
          <td class="text-center">{{ $product->category }}</td>
          <td class="text-center">{{ $product->description }}</td>
          <td class="text-center d-flex gap-2">
            <a href="{{ route('admin.edit', [$product->id]) }}" class="btn btn-outline-success p-1 px-2">Edit</a>
            <form id="delete-form-{{ $product->id }}" action="{{ route('admin.destroy', $product->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <a href="#" class="btn btn-outline-danger delete-btn" data-admin-id="{{ $product->id }}">Delete</a>

            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
