<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'TrendBazaar - Biggest shopping center') }}</title>

  <link rel="stylesheet" href="{{ asset('assets/css/custom-style.css') }}">
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  {{-- ICONS --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
    /* Add your custom styles here */
    .first-nav {
      background-color: #fff;
      /* Navbar background color */
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
      display: flex;
      /* Optional: Add a shadow effect */
      --bs-navbar-padding-x: 0;
      --bs-navbar-padding-y: 0.5rem;
      --bs-navbar-color: rgba(var(--bs-emphasis-color-rgb), 0.65);
      --bs-navbar-hover-color: rgba(var(--bs-emphasis-color-rgb), 0.8);
      --bs-navbar-disabled-color: rgba(var(--bs-emphasis-color-rgb), 0.3);
      --bs-navbar-active-color: rgba(var(--bs-emphasis-color-rgb), 1);
      --bs-navbar-brand-padding-y: 0.32rem;
      --bs-navbar-brand-margin-end: 1rem;
      --bs-navbar-brand-font-size: 1.125rem;
      --bs-navbar-brand-color: rgba(var(--bs-emphasis-color-rgb), 1);
      --bs-navbar-brand-hover-color: rgba(var(--bs-emphasis-color-rgb), 1);
      --bs-navbar-nav-link-padding-x: 0.5rem;
      --bs-navbar-toggler-padding-y: 0.25rem;
      --bs-navbar-toggler-padding-x: 0.75rem;
      --bs-navbar-toggler-font-size: 1.125rem;
      --bs-navbar-toggler-icon-bg: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%2833, 37, 41, 0.75%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e);
      --bs-navbar-toggler-border-color: rgba(var(--bs-emphasis-color-rgb), 0.15);
      --bs-navbar-toggler-border-radius: var(--bs-border-radius);
      --bs-navbar-toggler-focus-width: 0.25rem;
      --bs-navbar-toggler-transition: box-shadow 0.15s ease-in-out;
      position: relative;
      flex-wrap: wrap;
      align-items: center;
      justify-content: space-between;
      padding: var(--bs-navbar-padding-y) var(--bs-navbar-padding-x);
    }

    ::-webkit-scrollbar {
      width: 0;
    }

    .navbar-icon {
      font-size: 30px;
      color: black;
      margin: 0 10px;
    }

    .navbar-icon.active {
      color: #405de6;
    }

    .mobile-logo {
      display: none;
    }

    @media (min-width: 992px) {
      .first-nav {
        display: none;
      }
    }

    @media (max-width: 991.98px) {
      .first-nav {
        position: fixed;
        bottom: 0;
        width: 100%;
      }

      .navbar {
        display: none;
      }

      body {
        padding: 0;
      }

      .main-padding {
        padding: 40px 0px !important;
      }

      .mobile-logo {
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: fixed;
        width: 100vw;
        z-index: 10000;
        top: 0;
        backdrop-filter: blur(10px);
        background-color: #ffffff69;
      }
    }
  </style>

  <style>
    .login-container {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .card {
      width: 350px;
      border: none;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-header {
      background-color: #4285f4;
      color: #ffffff;
      border-bottom: none;
      text-align: center;
      padding: 15px;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }

    .card-body {
      padding: 20px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .btn-primary {
      background-color: #4285f4;
      border: none;
      width: 100%;
    }

    .btn-primary:hover {
      background-color: #317ae2;
    }

    .signup-link {
      text-align: center;
      margin-top: 15px;
      color: #4285f4;
    }

    .shake {
      animation: shake 0.5s;
    }

    @keyframes shake {

      10%,
      90% {
        transform: translateX(-5px);
      }

      20%,
      80% {
        transform: translateX(5px);
      }

      30%,
      50%,
      70% {
        transform: translateX(-5px);
      }

      40%,
      60% {
        transform: translateX(5px);
      }
    }

    body {
      background-color: #F8F9FA;
      /* Custom background color */
    }

    .navbar-brand {
      font-weight: bold;
      font-size: 2rem;
      /* Custom brand color */
    }

    .navbar-nav .nav-link {
      font-size: 1rem;
      color: black;
      font-weight: bold;
    }

    .navbar-nav .nav-item:hover .nav-link {
      color: rgb(14, 163, 14) !important;
    }
  </style>
  <style>
    .counter-btn {
      width: 30px;
      height: 30px;
      font-size: 16px;
      line-height: 30px;
      text-align: center;
    }

    .notification-toast {
      position: fixed;
      bottom: 80px;
      left: 20px;
      right: 20px;
      background: white;
      max-width: 300px;
      display: flex;
      align-items: flex-start;
      padding: 0px 15px;
      box-shadow: 0 5px 20px hsla(0, 0%, 0%, 0.15);
      transform: translateX(calc(-100% - 40px));
      transition: 0.5s ease-in-out;
      z-index: 2000;
      animation: slideInOut 10s ease-in-out infinite;
    }

    @keyframes slideInOut {

      0%,
      45%,
      100% {
        transform: translateX(calc(-100% - 40px));
        opacity: 0;
        visibility: hidden;
      }

      50%,
      95% {
        transform: translateX(0);
        opacity: 1;
        visibility: visible;
      }
    }

    .notification-toast.closed {
      display: none;
    }

    .toast-close-btn {
      font-size: 24px;
      position: absolute;
      top: 10px;
      right: 10px;
      color: black;
    }

    .toast-banner {
      width: 70px;
      height: 70px;
    }

    .toast-detail {
      padding-right: 10px;
    }

    .toast-message {
      margin-bottom: 8px;
    }

    .cart-count {
      position: absolute;
      top: 10px;
      right: 99px;
      border-radius: 20px;
      font-size: 15px;
      background-color: #ffc800;
      padding: 0px 4px;
    }

    .offcanvas-backdrop {
      background-color: transparent !important;
    }

    .offcanvas {
      backdrop-filter: blur(10px);
      background-color: #ffffff69;
      width: 300px !important;
    }

    .background-transparent {
      backdrop-filter: blur(10px);
      background-color: #ffffff69
    }
  </style>
</head>

<body style="background: linear-gradient(to right, #aedbff, #c0ffc0);
">
  <div id="app">
    {{-- ofcanvas of user --}}
    <div class="offcanvas offcanvas-end p-2" style="z-index: 20000" tabindex="-1" id="offcanvasRight"
      aria-labelledby="offcanvasRightLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">My Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="list-unstyled">
          @if (Auth::user())
            <li><a class="dropdown-item" href="{{ route('order.index') }}">Orders</a></li>
          @endif
        </ul>
      </div>
      <div class="offcanvas-footer">
        <li>
          <a class="dropdown-item bg-danger text-white" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
      </div>
    </div>

    <nav class="navbar navbar-expand-lg p-0 px-4"
      style="height: 70px;position: fixed; z-index: 1000;width: 100vw;backdrop-filter: blur(10px);background-color: #ffffff69;">
      <a class="navbar-brand p-0" href="{{ route('home.index') }}"><img
          src="{{ asset('logos/trendbazaar-high-resolution-logo-transparent.png') }}"
          style="width: 144px;overflow: hidden;" alt="" class="mt-2"></a>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav ml-auto gap-5">
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('home.index') }}"> HOME</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#category" role="button" aria-haspopup="true" aria-expanded="false">CATEGORY</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#"> OFFERS</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false"></i> CONTACT US</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">General Inquiry</a>
              <a class="dropdown-item" href="#">Sales</a>
              <a class="dropdown-item" href="#">Support</a>
            </div>
          </li>
        </ul>
        <ul class="ml-auto navbar-nav">
          @if (Auth::user())
            <li class="nav-item mr-4">
              <a class="nav-link" href="{{ route('cart.index') }}"><i class="fas fa-shopping-cart"></i><span
                  class="cart-count">{{ DB::table('cart_items')->where('user_id', Auth::id())->count() }}</span></a>
            </li>
            <li>
              <a type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                aria-controls="offcanvasRight" class="nav-link" href="#" role="button" aria-haspopup="true"
                aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
              </a>
            @else
              <a class="nav-link " href="{{ route('login') }}">{{ __('Login') }}<i
                  class="fas fa-sign-in-alt"></i></a>
          @endif
          </li>
        </ul>
      </div>

    </nav>
    <nav class="first-nav navbar-expand-lg navbar-light"
      style="z-index: 1000;backdrop-filter: blur(10px);background-color: #ffffff69;">
      <a class="navbar-brand" href="{{ route('home.index') }}">
        <i class="fas fa-store navbar-icon"></i>
      </a>
      <a class="navbar-icon" href="{{ route('cart.index') }}"><i class="fas fa-shopping-cart"></i></a>
      <a class="navbar-icon" href="#"><i class="fas fa-heart"></i></a>
      @if (Auth::user())
        <a type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"
          class="navbar-icon" href="#" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
          <i class="fas fa-user"></i>
        </a>
      @else
        <a class="navbar-icon" href="{{ route('login') }}"><i class="fas fa-user"></i></a>
      @endif

      </a>
    </nav>
    <div class="mobile-logo">
      <img src="http://127.0.0.1:8000/logos/trendbazaar-high-resolution-logo-transparent.png"
        style="width: 144px;overflow: hidden;margin-left: 10px;" alt="" class="mt-2">
      <a class="navbar-icon" href="#"><i class="fas fa-search"></i></a>
    </div>
    <main class="pt-5 main-padding">
      @yield('content')
    </main>
  </div>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="{{ asset('assets/js/custom-script.js') }}"></script>
  <script src="{{ asset('jquery.js') }}"></script>

  <script>
    //sweet alert for order successfull


    //increasing and decrreasing quantiy using ajax
    $(document).ready(function($) {
      $('.increment').click(function() {
        let $counter = $(this).parent().find('.counter');
        console.log($counter);
        let count = parseInt($counter.text());
        count++;
        $counter.text(count);
        console.log('this is increment function');
        updateQuantity($(this).parent());
      });

      $('.decrement').click(function() {
        let $counter = $(this).parent().find('.counter');
        let count = parseInt($counter.text());
        if (count > 1) {
          count--;
          $counter.text(count);
          updateQuantity($(this).parent());
        }
      });

      // update quantity in the database
      function updateQuantity($cartItem) {
        let productId = $cartItem.find('.product-id').val();
        let quantity = $cartItem.find('.counter').text();

        $.ajax({
          url: `/cart/${productId}`,
          type: 'PUT',
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
          },
          data: JSON.stringify({
            quantity: quantity
          }),
          contentType: 'application/json',
          success: function(response) {
            console.log(response);
            updateTotals(productId);
          },
          error: function(xhr, status, error) {
            console.error('Error:', error);
          }
        });
      }

      //update the total in cart
      function updateTotals(productId) {
        $.ajax({
          url: "cart/total",
          type: 'GET',
          success: function(response) {
            console.log(response);
            $('#totalItems').text(response.totalItems);
            $('#totalAmount').text(response.totalAmount);
          },
          error: function(xhr, status, error) {
            console.error('Error:', error);
          }
        });
      }

      // Pop-up notification of item sold
      const $notificationToast = $('[data-toast]');
      const $toastCloseBtn = $('[data-toast-close]');
      $toastCloseBtn.on('click', function() {
        $notificationToast.addClass('closed');
      });

    });

    // Show specific image in carousel
    jQuery(document).ready(function($) {

      function updateCarousel(index) {
        $('#productCarousel').carousel(index);
      }

      function prevSlide() {
        $('#productCarousel').carousel('prev');
      }

      function nextSlide() {
        $('#productCarousel').carousel('next');
      }

      $('.row.justify-content-center img').click(function() {
        var index = $(this).index();
        updateCarousel(index);
      });

      $('.carousel-control-prev').click(function() {
        prevSlide();
      });

      $('.carousel-control-next').click(function() {
        nextSlide();
      });
    });
  </script>
</body>

</html>
