  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
          <!-- Offcanvas trigger -->
          <button class="navbar-toggler me-2 bg-toggler-sb" type="button" data-bs-toggle="offcanvas"
              data-bs-target="#my-sidebar" aria-controls="my-sidebar">
              <span data-bs-target="#my-sidebar"><i class="bi bi-chevron-double-right"></i></span>
          </button>
          <!-- Fin offcanvas trigger -->
          <!-- Titulo -->
          <a class="navbar-brand fw-bold me-auto brand" href="#">
              <span><i class="bi bi-building text-light"></i></span>
              <span class="text-light mx-2">Sistema SG-SST</span>
          </a>
          <!-- Titulo -->

          <!-- Parte derecha del navbar -->
          <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              @guest
                  @if (Route::has('login'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                      </li>
                  @endif

                  {{-- @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                  @endif --}}
              @else
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }} -
                          {{ Auth::user()->role->nombre }}
                      </a>

                      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" style="font-size: 0.85rem">
                          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              {{ __('Cerrar sesión') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                          </form>
                      </div>
                  </li>
              @endguest
          </ul>
          <!-- Parte derecha del navbar -->
      </div>
  </nav>
  <!-- Fin navbar -->
