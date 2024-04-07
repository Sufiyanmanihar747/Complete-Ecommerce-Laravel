<section class="section product">
  {{-- @dump($products) --}}
  <div class="container">
    <h2 class="h2 section-title">Products of the week</h2>
    <ul class="filter-list">
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
        <li>
          <div class="product-card">
            <figure class="card-banner">
              <a href="">
                @php
                  $imageArray = explode(',', $product->images);
                @endphp
                <img src="{{ url('storage/images/' . $imageArray[0]) }}" alt="{{ $product->title }}" loading="lazy"
                  class="" style="width: 100%; height:100%; ">
              </a>
              <div class="card-badge red"> -25%</div>
              <div class="card-actions">
                <button class="card-action-btn" aria-label="Quick view">
                  <ion-icon name="eye-outline"></ion-icon>
                </button>
                <button class="card-action-btn cart-btn">
                  <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon>
                  <p style="margin: 0">Add to Cart</p>
                </button>
                <button class="card-action-btn" aria-label="Add to Whishlist">
                  <ion-icon name="heart-outline"></ion-icon>
                </button>
              </div>
            </figure>
            <div class="card-content">
              <h3 class="h4 card-title">
                <a href="#">{{ $product->title }}</a>
              </h3>
              <div class="card-price">
                <p style="font-weight: 100; margin:0">{{ $product->description }}</p>
              </div>
              <div class="card-price">
                <data value="">&#8377;{{ $product->price }}</data>
                <data value="">&#8377;65.00</data>
              </div>
            </div>
          </div>
        </li>
      @endforeach
    </ul>
    <button class="btn btn-outline">View All Products</button>
  </div>
</section>
