<div class="sidebar bg-dark p-0">
  <div class="close-btn" onclick="toggleSidebar()">&times;</div>
  <div class="d-flex">
    <a href="{{ route('superadmin.superdashboard') }}" class="text-white text-decoration-none">
      <span class="fs-4">Super Admin</span>
    </a>
  </div>

  <ul class="nav nav-pills flex-column mb-auto">
    <li>
      <a href="{{ route('superadmin.superdashboard') }}" class="nav-link text-white">
        Dashboard
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('superadmin.create') }}" class="nav-link" aria-current="page">
        Add Admin
      </a>
    </li>
    <li>
      <a href="{{ route('superadmin.index') }}" class="nav-link text-white">
        All Users
      </a>
    </li>
    <li>
      <a href="#" class="nav-link text-white">
        Customers
      </a>
    </li>
  </ul>
  <hr>
  <div class="dropdown show d-flex px-3">
    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" role="button"
      id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
      <strong>{{ Auth::user()->name }}</strong>
    </a>
    <ul class="dropdown-menu text-small shadow-lg bg-dark" aria-labelledby="dropdownMenuLink">
      <li class="bg-danger">
        <a class="dropdown-item" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </li>
    </ul>
  </div>

</div>
