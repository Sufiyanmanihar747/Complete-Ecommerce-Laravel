@extends('admin.index')

@section('content')
  <div id="page-content-wrapper pl-0">
    <div class="container-fluid">
      <h2>Main Content</h2>
      <div class="row">
        <div class="col-md-3 mb-4">
          <div class="box" id="box-1">
            <h4>Orders</h4>
            <p class="box-value" id="box-value-1">123</p>
          </div>
        </div>
        <div class="col-md-3 mb-4">
          <div class="box" id="box-2">
            <h4>Total Products</h4>
            <p class="box-value" id="box-value-2">{{DB::table('products')->count();
            }}</p>
          </div>
          
        </div>
        <div class="col-md-3 mb-4">
          <div class="box" id="box-3">
            <h4>Revenue</h4>
            <p class="box-value" id="box-value-3">789</p>
          </div>
        </div>
        <div class="col-md-3 mb-4">
          <div class="box" id="box-4">
            <h4></h4>
            <p class="box-value" id="box-value-4">101</p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
