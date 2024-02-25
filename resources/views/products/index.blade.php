@extends('layouts.app')

@section('content')
  <article>

    <section class="hero" id="home"
      style="background-image: url('{{ asset('storage/waldemar-Db4d6MRIXJc-unsplash.jpg') }}')">
      <div class="container">

        <div class="hero-content">
          <p class="hero-subtitle">Fashion Everyday</p>
          <h2 class="h1 hero-title">Unrivalled Fashion House</h2>
          <button class="btn btn-primary">Shop Now</button>
        </div>

      </div>
    </section>

    @yield('section')

    <section class="section category">
      <div class="container">

        <ul class="category-list">

          <li class="category-item">
            <figure class="category-banner">
              <img src="{{ asset('images/sunglasses.jpg') }}" alt="Sunglass & eye" loading="lazy" width="510"
                height="600" class="w-100">
            </figure>

            <a href="#" class="btn btn-secondary">Sunglass & Eye</a>
          </li>

          <li class="category-item">
            <figure class="category-banner">
              <img src="{{ asset('images/category-2.jpg') }}" alt="Active & outdoor" loading="lazy" width="510"
                height="600" class="w-100">
            </figure>

            <a href="#" class="btn btn-secondary">Active & Outdoor</a>
          </li>

          <li class="category-item">
            <figure class="category-banner">
              <img src="{{ asset('images/category-3.jpg') }}" alt="Winter wear" loading="lazy" width="510"
                height="600" class="w-100">
            </figure>

            <a href="#" class="btn btn-secondary">Winter Wear</a>
          </li>

          <li class="category-item">
            <figure class="category-banner">
              <img src="{{ asset('images/category-4.jpg') }}" alt="Exclusive footwear" loading="lazy" width="510"
                height="600" class="w-100">
            </figure>

            <a href="#" class="btn btn-secondary">Exclusive Footwear</a>
          </li>

          <li class="category-item">
            <figure class="category-banner">
              <img src="{{ asset('images/category-5.jpg') }}" alt="Jewelry" loading="lazy" width="510" height="600"
                class="w-100">
            </figure>

            <a href="#" class="btn btn-secondary">Jewelry</a>
          </li>

          <li class="category-item">
            <figure class="category-banner">
              <img src="{{ asset('images/category-6.jpg') }}" alt="Sports cap" loading="lazy" width="510"
                height="600" class="w-100">
            </figure>

            <a href="#" class="btn btn-secondary">Sports Cap</a>
          </li>

        </ul>

      </div>
    </section>

    <!--
            - #PRODUCT
          -->

    <section class="section product">
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

          <li>
            <div class="product-card">

              <figure class="card-banner">

                <a href="#">
                  <img src="{{ asset('images/product-1.jpg') }}" alt="Varsi Leather Bag" loading="lazy" width="800"
                    height="1034" class="w-100">
                </a>

                <div class="card-badge red"> -25%</div>

                <div class="card-actions">

                  <button class="card-action-btn" aria-label="Quick view">
                    <ion-icon name="eye-outline"></ion-icon>
                  </button>

                  <button class="card-action-btn cart-btn">
                    <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon>

                    <p>Add to Cart</p>
                  </button>

                  <button class="card-action-btn" aria-label="Add to Whishlist">
                    <ion-icon name="heart-outline"></ion-icon>
                  </button>

                </div>

              </figure>

              <div class="card-content">
                <h3 class="h4 card-title">
                  <a href="#">Varsi Leather Bag</a>
                </h3>

                <div class="card-price">
                  <data value="48.75">&pound;48.75</data>

                  <data value="65.00">&pound;65.00</data>
                </div>
              </div>

            </div>
          </li>

          <li>
            <div class="product-card">

              <figure class="card-banner">

                <a href="#">
                  <img src="{{ asset('images/product-2.jpg') }}" alt="Fit Twill Shirt for Woman" loading="lazy"
                    width="800" height="1034" class="w-100">
                </a>

                <div class="card-badge green"> New</div>

                <div class="card-actions">

                  <button class="card-action-btn" aria-label="Quick view">
                    <ion-icon name="eye-outline"></ion-icon>
                  </button>

                  <button class="card-action-btn cart-btn">
                    <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon>

                    <p>Add to Cart</p>
                  </button>

                  <button class="card-action-btn" aria-label="Add to Whishlist">
                    <ion-icon name="heart-outline"></ion-icon>
                  </button>

                </div>

              </figure>

              <div class="card-content">
                <h3 class="h4 card-title">
                  <a href="#">Fit Twill Shirt for Woman</a>
                </h3>

                <div class="card-price">
                  <data value="62.00">&pound;62.00</data>
                </div>
              </div>

            </div>
          </li>

          <li>
            <div class="product-card">

              <figure class="card-banner">

                <a href="#">
                  <img src="{{ asset('images/product-3.jpg') }}" alt="Grand Atlantic Chukka Boots" loading="lazy"
                    width="800" height="1034" class="w-100">
                </a>

                <div class="card-actions">

                  <button class="card-action-btn" aria-label="Quick view">
                    <ion-icon name="eye-outline"></ion-icon>
                  </button>

                  <button class="card-action-btn cart-btn">
                    <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon>

                    <p>Add to Cart</p>
                  </button>

                  <button class="card-action-btn" aria-label="Add to Whishlist">
                    <ion-icon name="heart-outline"></ion-icon>
                  </button>

                </div>

              </figure>

              <div class="card-content">
                <h3 class="h4 card-title">
                  <a href="#">Grand Atlantic Chukka Boots</a>
                </h3>

                <div class="card-price">
                  <data value="32.00">&pound;32.00</data>
                </div>
              </div>

            </div>
          </li>

          <li>
            <div class="product-card">

              <figure class="card-banner">

                <a href="#">
                  <img src="{{ asset('images/product-4.jpg') }}" alt="Women's Faux-Trim Shirt" loading="lazy"
                    width="800" height="1034" class="w-100">
                </a>

                <div class="card-actions">

                  <button class="card-action-btn" aria-label="Quick view">
                    <ion-icon name="eye-outline"></ion-icon>
                  </button>

                  <button class="card-action-btn cart-btn">
                    <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon>

                    <p>Add to Cart</p>
                  </button>

                  <button class="card-action-btn" aria-label="Add to Whishlist">
                    <ion-icon name="heart-outline"></ion-icon>
                  </button>

                </div>

              </figure>

              <div class="card-content">
                <h3 class="h4 card-title">
                  <a href="#">Women's Faux-Trim Shirt</a>
                </h3>

                <div class="card-price">
                  <data value="84.00">&pound;84.00</data>
                </div>
              </div>

            </div>
          </li>

          <li>
            <div class="product-card">

              <figure class="card-banner">

                <a href="#">
                  <img src="{{ asset('images/product-5.jpg') }}" alt="Soft Touch Interlock Polo" loading="lazy"
                    width="800" height="1034" class="w-100">
                </a>

                <div class="card-actions">

                  <button class="card-action-btn" aria-label="Quick view">
                    <ion-icon name="eye-outline"></ion-icon>
                  </button>

                  <button class="card-action-btn cart-btn">
                    <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon>

                    <p>Add to Cart</p>
                  </button>

                  <button class="card-action-btn" aria-label="Add to Whishlist">
                    <ion-icon name="heart-outline"></ion-icon>
                  </button>

                </div>

              </figure>

              <div class="card-content">
                <h3 class="h4 card-title">
                  <a href="#">Soft Touch Interlock Polo</a>
                </h3>

                <div class="card-price">
                  <data value="45.00">&pound;45.00</data>
                </div>
              </div>

            </div>
          </li>

          <li>
            <div class="product-card">

              <figure class="card-banner">

                <a href="#">
                  <img src="{{ asset('images/product-6.jpg') }}" alt="TrendBazaar Smart Watch" loading="lazy"
                    width="800" height="1034" class="w-100">
                </a>

                <div class="card-actions">

                  <button class="card-action-btn" aria-label="Quick view">
                    <ion-icon name="eye-outline"></ion-icon>
                  </button>

                  <button class="card-action-btn cart-btn">
                    <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon>

                    <p>Add to Cart</p>
                  </button>

                  <button class="card-action-btn" aria-label="Add to Whishlist">
                    <ion-icon name="heart-outline"></ion-icon>
                  </button>

                </div>

              </figure>

              <div class="card-content">
                <h3 class="h4 card-title">
                  <a href="#">TrendBazaar Smart Watch</a>
                </h3>

                <div class="card-price">
                  <data value="30.00">&pound;30.00</data>

                  <data value="38.00">&pound;38.00</data>
                </div>
              </div>

            </div>
          </li>

          <li>
            <div class="product-card">

              <figure class="card-banner">

                <a href="#">
                  <img src="{{ asset('images/product-7.jpg') }}" alt="TrendBazaar Smart Glass" loading="lazy"
                    width="800" height="1034" class="w-100">
                </a>

                <div class="card-actions">

                  <button class="card-action-btn" aria-label="Quick view">
                    <ion-icon name="eye-outline"></ion-icon>
                  </button>

                  <button class="card-action-btn cart-btn">
                    <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon>

                    <p>Add to Cart</p>
                  </button>

                  <button class="card-action-btn" aria-label="Add to Whishlist">
                    <ion-icon name="heart-outline"></ion-icon>
                  </button>

                </div>

              </figure>

              <div class="card-content">
                <h3 class="h4 card-title">
                  <a href="#">TrendBazaar Smart Glass</a>
                </h3>

                <div class="card-price">
                  <data value="25.00">&pound;25.00</data>

                  <data value="39.00">&pound;39.00</data>
                </div>
              </div>

            </div>
          </li>

          <li>
            <div class="product-card">

              <figure class="card-banner">

                <a href="#">
                  <img src="{{ asset('images/product-8.jpg') }}" alt="Cotton Shirt for Men" loading="lazy"
                    width="800" height="1034" class="w-100">
                </a>

                <div class="card-actions">

                  <button class="card-action-btn" aria-label="Quick view">
                    <ion-icon name="eye-outline"></ion-icon>
                  </button>

                  <button class="card-action-btn cart-btn">
                    <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon>

                    <p>Add to Cart</p>
                  </button>

                  <button class="card-action-btn" aria-label="Add to Whishlist">
                    <ion-icon name="heart-outline"></ion-icon>
                  </button>

                </div>

              </figure>

              <div class="card-content">
                <h3 class="h4 card-title">
                  <a href="#">Cotton Shirt for Men</a>
                </h3>

                <div class="card-price">
                  <data value="85.00">&pound;85.00</data>

                  <data value="99.00">&pound;99.00</data>
                </div>
              </div>

            </div>
          </li>

          <li>
            <div class="product-card">

              <figure class="card-banner">

                <a href="#">
                  <img src="{{ asset('images/product-9.jpg') }}" alt="Double-breasted Blazer" loading="lazy"
                    width="800" height="1034" class="w-100">
                </a>

                <div class="card-actions">

                  <button class="card-action-btn" aria-label="Quick view">
                    <ion-icon name="eye-outline"></ion-icon>
                  </button>

                  <button class="card-action-btn cart-btn">
                    <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon>

                    <p>Add to Cart</p>
                  </button>

                  <button class="card-action-btn" aria-label="Add to Whishlist">
                    <ion-icon name="heart-outline"></ion-icon>
                  </button>

                </div>

              </figure>

              <div class="card-content">
                <h3 class="h4 card-title">
                  <a href="#">Double-breasted Blazer</a>
                </h3>

                <div class="card-price">
                  <data value="32.00">&pound;32.00</data>
                </div>
              </div>

            </div>
          </li>

          <li>
            <div class="product-card">

              <figure class="card-banner">

                <a href="#">
                  <img src="{{ asset('images/product-10.jpg') }}" alt="Ribbed Cotton Bodysuits" loading="lazy"
                    width="800" height="1034" class="w-100">
                </a>

                <div class="card-badge green">New</div>

                <div class="card-actions">

                  <button class="card-action-btn" aria-label="Quick view">
                    <ion-icon name="eye-outline"></ion-icon>
                  </button>

                  <button class="card-action-btn cart-btn">
                    <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon>

                    <p>Add to Cart</p>
                  </button>

                  <button class="card-action-btn" aria-label="Add to Whishlist">
                    <ion-icon name="heart-outline"></ion-icon>
                  </button>

                </div>

              </figure>

              <div class="card-content">
                <h3 class="h4 card-title">
                  <a href="#">Ribbed Cotton Bodysuits</a>
                </h3>

                <div class="card-price">
                  <data value="71.00">&pound;71.00</data>
                </div>
              </div>

            </div>
          </li>

        </ul>

        <button class="btn btn-outline">View All Products</button>

      </div>
    </section>

    <section class="section newsletter">
      <div class="container">

        <div class="newsletter-card" style="background-image: url('{{ asset('images/newsletter-bg.png') }}')">

          <h2 class="card-title">Subscribe Newsletter</h2>

          <p class="card-text">
            Enter your email below to be the first to know about new collections and product launches.
          </p>

          <form action="" class="card-form">

            <div class="input-wrapper">
              <ion-icon name="mail-outline"></ion-icon>

              <input type="email" name="emal" placeholder="Enter your email" required class="input-field">
            </div>

            <button type="submit" class="btn btn-primary w-100">
              <span>Subscribe</span>

              <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
            </button>

          </form>

        </div>

      </div>
    </section>

  </article>
@endsection
