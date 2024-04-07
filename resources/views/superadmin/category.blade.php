@extends('superadmin.index')

@section('content')
  <div class="d-flex justify-content-end">
    <a href="{{ route('category.create') }}" class="btn btn-success">Add Category</a>
  </div>
  <div class="row category-list ">
    @foreach ($categories as $category)
      <div class="col-md-3 category-item mt-4">
        <figure class="category-banner d-flex justify-content-center">
          <img src="{{ url('storage/images/' . $category->image) }}" alt="{{ $category->name }}" loading="lazy" class="w-75"
            style="height: 135px; object-fit: contain; max-width: 100%; max-height: 100%;">
        </figure>
        <div class="font-weight-bold text-center m-3">
          {{ $category->name }}
        </div>
        <div class="d-flex justify-content-center gap-2">
          <a href="{{ route('category.edit', $category->id) }}" class="btn btn-outline-success font-weight-bold">
            Edit
          </a>
          <form id="delete-form-{{ $category->id }}" action="{{ route('category.destroy', $category->id) }}"
            method="POST">
            @csrf
            @method('DELETE')
            <a href="#" class="btn btn-outline-danger delete-btn font-weight-bold" data-admin-id="{{ $category->id }}">Delete</a>
          </form>
        </div>

      </div>
    @endforeach
  </div>
@endsection
