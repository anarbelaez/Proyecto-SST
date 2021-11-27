<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
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
                    <!--Links de acceso para los usuarios-->
                    <!-- Administrador -->

                    @auth
                        @if(auth()->user()->role_id === 1)
                        <li class="nav-item">
                            <a class="nav-link text-info" href=" {{ route('usuarios.index') }} ">Listado de usuarios</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link text-info" href=" {{ route('usuarios.create') }} ">Crear usuario</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-info" href=" {{ route('usuarios.edit',auth()->user()->id) }} ">Editar usuario</a>
                        </li>
                        @endif
                    @endauth

                    <!-- Encargado SST -->
                    @auth
                        @if(auth()->user()->role_id === 2)
                        <li class="nav-item">
                            <a class="nav-link text-success" href=" {{ route('gestion_sst.index_sst') }} ">Encargado SST</a>
                        </li>
                        @endif
                    @endauth


                    <!-- Comites -->
                    @auth
                        @if(auth()->user()->role_id === 3 || auth()->user()->role_id === 4 || auth()->user()->role_id === 5)
                        <li class="nav-item">
                            <a class="nav-link text-danger" href=" {{ route('comite.index_comite') }} ">Cómite</a>
                        </li>
                        @endif
                    @endauth


                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
</nav>
