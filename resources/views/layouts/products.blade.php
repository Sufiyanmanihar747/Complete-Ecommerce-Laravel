<section class="section product">
  <style>
    @media(max-width:545px) {
      .product {
        /* background-color: white; */
      }

      .product-list {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        /* Adjust the gap as needed */
      }

      .product-item {
        flex: 0 0 calc(50% - 10px);
        /* Two products per row with gap */
        max-width: calc(50% - 10px);
        /* Two products per row with gap */
        margin-bottom: 20px;
        /* Adjust spacing between rows */
      }
      .card-content h5{
        font-size: 18px;
      }
      .product .container{
        padding: 0;
      }
      .product ul{
        padding: 0;
      }
    }
  </style>
  {{-- @dump($products) --}}
  <div class="container">
    <h2 class="h2 section-title">Products of the week</h2>
    <ul class="filter-list p-0">
      <li>
        <button class="filter-btn  active">Best Seller</button>
      </li>
      <li>
        <button class="filter-btn">Hot Collection</button>
      </li>
      <li>
        <button class="filter-btn">Trendy</button>
      </li>
      <li>
        <button class="filter-btn">New Arrival</button>
      </li>
    </ul>

    <ul class="product-list">
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
    <div class="w-100 d-flex">
        <button class="btn btn-outline-dark text-center w-50">View All Products</button>
    </div>
  </div>
</section>
