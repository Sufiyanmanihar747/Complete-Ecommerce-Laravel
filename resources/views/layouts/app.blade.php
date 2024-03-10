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

    .navbar-icon {
      font-size: 30px;
      color: #555;
      margin: 0 10px;
    }

    .navbar-icon.active {
      color: #405de6;
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
    }
  </style>

  <style>
    .login-container {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
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
      font-size: 1.5rem;
      color: black;
    }

    .navbar-nav .nav-item:hover .nav-link {
      color: rgb(14, 163, 14) !important;
    }
  </style>
</head>

<body>
  <div id="app">

    {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          {{ config('app.name', 'TrendBazaar') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav me-auto">

          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
            @guest
              @if (Route::has('login'))
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
              @endif

              @if (Route::has('register'))
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
              @endif
            @else
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </div>
              </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav> --}}

    @if (Auth::user())
      <nav class="navbar navbar-expand-lg p-0 px-4"
        style="height: 70px;position: fixed; z-index: 1000;
  width: 100vw;
  backdrop-filter: blur(10px);
  background-color: #ffffff69;">
        <a class="navbar-brand p-0" href="#"><img
            src="{{ asset('logos/trendbazaar-high-resolution-logo-transparent.png') }}"
            style="width: 144px;overflow: hidden;" alt="" class="mt-2"></a>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
          <ul class="navbar-nav ml-auto gap-5">
            <li class="nav-item active">
              <a class="nav-link" href="#"> Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                role="button"data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>Category</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">General Inquiry</a>
                <a class="dropdown-item" href="#">Sales</a>
                <a class="dropdown-item" href="#">Support</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"> About</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"></i> Contact</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">General Inquiry</a>
                <a class="dropdown-item" href="#">Sales</a>
                <a class="dropdown-item" href="#">Support</a>
              </div>
            </li>
            {{-- <a class="nav-link" href="#"><i class="fas fa-user"></i></a> --}}
          </ul>
          <ul class="ml-auto navbar-nav">
            <li class="nav-item mr-4">
              <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i> </a>
            </li>
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </div>
              {{-- <span>{{ Auth::user()->name }}</span> --}}
            </li>
          </ul>
        </div>
      </nav>
      <nav class="first-nav navbar-expand-lg navbar-light" style="z-index: 1000">
        <a class="navbar-brand" href="#">
          <i class="fas fa-store navbar-icon"></i> <!-- Replace with your store icon -->
        </a>
        <a class="navbar-icon" href="#"><i class="fas fa-shopping-cart"></i></a> <!-- Replace with cart icon -->
        <a class="navbar-icon" href="#"><i class="far fa-heart"></i></a> <!-- Replace with wishlist icon -->
        <a class="navbar-icon" href="#"><i class="fas fa-search"></i></a> <!-- Replace with search icon -->
        <a class="navbar-icon" href="#"><i class="far fa-user"></i></a> <!-- Replace with user icon -->
      </nav>
    @endif
    <main class="pt-5">
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
</body>

</html>
