<!-- Offcanvas -->
<div class="offcanvas offcanvas-start bg-dark text-white sidebar-nav " tabindex="-1" id="my-sidebar"
    aria-labelledby="offcanvasLabel">
    <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
            <ul class="navbar-nav">
                <li class="my-1">
                    <hr class="dropdown-divider">
                </li>
                <!-- Administrador -->
                @auth
                    @if (auth()->user()->role_id === 1)
                        <li>
                            <div class="text-sb small fw-bold text-uppercase px-3">
                                ADMINISTRADOR
                            </div>
                        </li>
                        <li class="my-2">
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a href=" {{ route('usuarios.index') }}" class="nav-link px-3">
                                <span class="me-2">
                                    <i class="bi bi-people-fill"></i>
                                </span>
                                <span>Usuarios</span>
                            </a>
                        </li>
                        <li>
                            <a href=" {{ route('usuarios.create') }} " class="nav-link px-3">
                                <span class="me-2">
                                    <i class="bi bi-person-plus-fill"></i>
                                </span>
                                <span>Crear usuario</span>
                            </a>
                        </li>
                        <li class="my-2">
                            <hr class="dropdown-divider">
                        </li>
                    @endif
                @endauth
                <!-- Administrador -->

                <!-- Encargado SG-SST -->
                @auth
                    @if (auth()->user()->role_id === 2 || auth()->user()->role_id === 1)
                        <li>
                            <div class="text-sb small fw-bold text-uppercase px-3">
                                ENCARGADO SG-SST
                            </div>
                        </li>
                        <li class="my-2">
                            <hr class="dropdown-divider">
                        </li>
                        <!-- Información empresa -->
                        <li>
                            <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#seccion-empresa"
                                role="button" aria-expanded="false" aria-controls="#">
                                <span class="me-2"><i class="bi bi-building"></i></span>
                                <span>Empresa</span>
                                <span class="ms-auto">
                                    <span class="right-icon"><i class="bi bi-chevron-down"></i></span>
                                </span>
                            </a>
                            <div class="collapse" id="seccion-empresa">
                                <div class="my-1">
                                    <ul class="navbar-nav ps-3">
                                        <li>
                                            <a href=" {{ route('empresa.show') }} " class="nav-link px-3">
                                                <span class="me-2"><i class="bi bi-arrow-right-short"></i></span>
                                                <span>Información de la empresa</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <!-- Información empresa -->

                        <!-- Personal SST -->
                        <li>
                            <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#seccion-personalSST"
                                role="button" aria-expanded="false" aria-controls="#">
                                <span class="me-2"><i class="bi bi-person-check-fill"></i></span>
                                <span>Personal SST</span>
                                <span class="ms-auto">
                                    <span class="right-icon"><i class="bi bi-chevron-down"></i></span>
                                </span>
                            </a>
                            <div class="collapse" id="seccion-personalSST">
                                <div class="my-1">
                                    <ul class="navbar-nav ps-3">
                                        <li>
                                            <a href="{{ route('personal.show') }}" class="nav-link px-3">
                                                <span class="me-2"><i class="bi bi-arrow-right-short"></i></span>
                                                <span>Listado de colaboradores</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('personal.create') }}" class="nav-link px-3">
                                                <span class="me-2"><i class="bi bi-arrow-right-short"></i></span>
                                                <span>Nuevo colaborador</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <!-- Personal SST -->

                        <!-- Aliados estrategicos -->
                        <li>
                            <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#seccion-aliados"
                                role="button" aria-expanded="false" aria-controls="#">
                                <span class="me-2"><i class="bi bi-intersect"></i></span>
                                <span>Aliados estratégicos</span>
                                <span class="ms-auto">
                                    <span class="right-icon"><i class="bi bi-chevron-down"></i></span>
                                </span>
                            </a>
                            <div class="collapse" id="seccion-aliados">
                                <div class="my-1">
                                    <ul class="navbar-nav ps-3">
                                        {{-- Proveedores --}}
                                        <li>
                                            <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse"
                                                href="#seccion-proveedores" role="button" aria-expanded="false"
                                                aria-controls="#">
                                                <span class="me-2"><i class="bi bi-dot"></i></span>
                                                <span>Proveedores</span>
                                                <span class="ms-auto">
                                                    <span class="right-icon"><i class="bi bi-chevron-down"></i></span>
                                                </span>
                                            </a>
                                            <!-- Div padre -->
                                            <div class="collapse" id="seccion-proveedores">
                                                <div class="my-1">
                                                    <ul class="navbar-nav ps-3">
                                                        <li>
                                                            <a href=" {{ route('aliados.show') }} "
                                                                class="nav-link px-3">
                                                                <span class="me-2"><i
                                                                        class="bi bi-arrow-right-short"></i></span>
                                                                <span>Listado proveedores</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href=" {{ route('aliados.create') }} "
                                                                class="nav-link px-3">
                                                                <span class="me-2"><i
                                                                        class="bi bi-arrow-right-short"></i></span>
                                                                <span>Crear proveedor</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        {{-- Fichas de seguridad --}}
                                        <li>
                                            <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse"
                                                href="#seccion-fichasseguridad" role="button" aria-expanded="false"
                                                aria-controls="#">
                                                <span class="me-2"><i class="bi bi-dot"></i></span>
                                                <span>Fichas de seguridad</span>
                                                <span class="ms-auto">
                                                    <span class="right-icon"><i class="bi bi-chevron-down"></i></span>
                                                </span>
                                            </a>
                                            <!-- Div padre -->
                                            <div class="collapse" id="seccion-fichasseguridad">
                                                <div class="my-1">
                                                    <ul class="navbar-nav ps-3">
                                                        <li>
                                                            <a href=" {{ route('fichasseguridad.show') }} "
                                                                class="nav-link px-3">
                                                                <span class="me-2"><i
                                                                        class="bi bi-arrow-right-short"></i></span>
                                                                <span>Todas las fichas de
                                                                    seguridad</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href=" {{ route('fichasseguridad.create') }} "
                                                                class="nav-link px-3">
                                                                <span class="me-2"><i
                                                                        class="bi bi-arrow-right-short"></i></span>
                                                                <span>Nueva ficha de seguridad</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Aliados estrategicos -->
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <!-- Aliados estrategicos -->

                        <!-- Documentación -->
                        <li>
                            <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse"
                                href="#documentacion" role="button" aria-expanded="false" aria-controls="#">
                                <span class="me-2"><i class="bi bi-file-earmark-text"></i></span>
                                <span>Documentación</span>
                                <span class="ms-auto">
                                    <span class="right-icon"><i class="bi bi-chevron-down"></i></span>
                                </span>
                            </a>
                            <div class="collapse" id="documentacion">
                                <div class="my-1">
                                    <ul class="navbar-nav ps-3">
                                        <li>
                                            <a href="{{ route('documentos.show') }}" class="nav-link px-3">
                                                <span class="me-2"><i
                                                        class="bi bi-check2-square"></i></span>
                                                <span>Todos los documentos</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('documentos.create') }}" class="nav-link px-3">
                                                <span class="me-2"><i
                                                        class="bi bi-check2-square"></i></span>
                                                <span>Nuevo documento</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <!-- Documentación -->
                        <li class="my-2">
                            <hr class="dropdown-divider">
                        </li>
                    @endif
                @endauth
                <!-- Encargado SG-SST -->
                <!-- Comites -->
                @auth
                    @if (auth()->user()->role_id === 1 || auth()->user()->role_id === 3 || auth()->user()->role_id === 4 || auth()->user()->role_id === 5)
                        <li>
                            <div class="text-sb small fw-bold text-uppercase px-3 mb-1">
                                ACCIONES DEL COMITÉ
                            </div>
                        </li>
                        <li class="">
                            <hr class="dropdown-divider">
                        </li>
                        <!-- Integrantes del comité -->
                        <li>
                            <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse"
                                href="#integrantescomite" role="button" aria-expanded="false" aria-controls="#">
                                <span class="me-2"><i class="bi bi-people-fill"></i></i></span>
                                <span>Integrantes comité</span>
                                <span class="ms-auto">
                                    <span class="right-icon"><i class="bi bi-chevron-down"></i></span>
                                </span>
                            </a>
                            <div class="collapse" id="integrantescomite">
                                <div class="my-1">
                                    <ul class="navbar-nav ps-3">
                                        <li>
                                            <a href="{{ route('miembroscomite.show') }}" class="nav-link px-3">
                                                <span class="me-2"><i
                                                        class="bi bi-arrow-right-short"></i></span>
                                                <span>Listado de integrantes</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('miembroscomite.create') }}" class="nav-link px-3">
                                                <span class="me-2"><i
                                                        class="bi bi-arrow-right-short"></i></span>
                                                <span>Nuevo integrante</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <!-- Integrantes del comité -->

                        <!-- Reuniones del comité -->
                        <li>
                            <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse"
                                href="#actasreuniones" role="button" aria-expanded="false" aria-controls="#">
                                <span class="me-2"><i class="bi bi-union"></i></span>
                                <span>Reuniones</span>
                                <span class="ms-auto">
                                    <span class="right-icon"><i class="bi bi-chevron-down"></i></span>
                                </span>
                            </a>
                            <div class="collapse" id="actasreuniones">
                                <div class="my-1">
                                    <ul class="navbar-nav ps-3">
                                        <li>
                                            <a href="{{ route('actasreuniones.show') }}" class="nav-link px-3">
                                                <span class="me-2"><i
                                                        class="bi bi-arrow-right-short"></i></span>
                                                <span>Listado de actas</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('actasreuniones.create') }}" class="nav-link px-3">
                                                <span class="me-2"><i
                                                        class="bi bi-arrow-right-short"></i></span>
                                                <span>Nueva acta</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <!-- Reuniones del comité -->

                        <!-- Votaciones del comité -->
                        @if (auth()->user()->role_id === 1 || auth()->user()->role_id === 3 || auth()->user()->role_id === 4)
                            <li>
                                <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse"
                                    href="#actasvotaciones" role="button" aria-expanded="false" aria-controls="#">
                                    <span class="me-2"><i class="bi bi-check2-circle"></i></span>
                                    <span>Votaciones</span>
                                    <span class="ms-auto">
                                        <span class="right-icon"><i class="bi bi-chevron-down"></i></span>
                                    </span>
                                </a>
                                <div class="collapse" id="actasvotaciones">
                                    <div class="my-1">
                                        <ul class="navbar-nav ps-3">
                                            <li>
                                                <a href="{{ route('actasvotacion.show') }}" class="nav-link px-3">
                                                    <span class="me-2"><i
                                                            class="bi bi-arrow-right-short"></i></span>
                                                    <span>Listado de actas</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('actasvotacion.create') }}" class="nav-link px-3">
                                                    <span class="me-2"><i
                                                            class="bi bi-arrow-right-short"></i></span>
                                                    <span>Nueva acta</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        <!-- Votaciones del comité -->
                        @endif

                        <!-- Nombramientos del comité -->
                        <li>
                            <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse"
                                href="#actasnombramientos" role="button" aria-expanded="false" aria-controls="#">
                                <span class="me-2"><i class="bi bi-person-circle"></i></span>
                                <span>Nombramientos</span>
                                <span class="ms-auto">
                                    <span class="right-icon"><i class="bi bi-chevron-down"></i></span>
                                </span>
                            </a>
                            <div class="collapse" id="actasnombramientos">
                                <div class="my-1">
                                    <ul class="navbar-nav ps-3">
                                        <li>
                                            <a href="{{ route('actasnombramiento.show') }}" class="nav-link px-3">
                                                <span class="me-2"><i
                                                        class="bi bi-arrow-right-short"></i></span>
                                                <span>Listado de actas</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('actasnombramiento.create') }}" class="nav-link px-3">
                                                <span class="me-2"><i
                                                        class="bi bi-arrow-right-short"></i></span>
                                                <span>Nueva acta</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <!-- Nombramientos del comité -->

                        <!-- Postulantes a la Brigada de emergencia -->
                        @if (auth()->user()->role_id === 1 || auth()->user()->role_id === 5)
                            <li>
                                <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse"
                                    href="#postulantesbe" role="button" aria-expanded="false" aria-controls="#">
                                    <span class="me-2"><i class="bi bi-person-badge"></i></span>
                                    <span>Postulaciones</span>
                                    <span class="ms-auto">
                                        <span class="right-icon"><i class="bi bi-chevron-down"></i></span>
                                    </span>
                                </a>
                                <div class="collapse" id="postulantesbe">
                                    <div class="my-1">
                                        <ul class="navbar-nav ps-3">
                                            <li>
                                                <a href="{{ route('postulantesbe.show') }}" class="nav-link px-3">
                                                    <span class="me-2"><i
                                                            class="bi bi-arrow-right-short"></i></span>
                                                    <span>Todas las postulaciones</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('postulantesbe.create') }}" class="nav-link px-3">
                                                    <span class="me-2"><i
                                                            class="bi bi-arrow-right-short"></i></span>
                                                    <span>Nueva postulación</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        @endif
                        <!-- Postulantes a la Brigada de emergencia -->

                        <!-- Quejas laborales -->
                        @if (auth()->user()->role_id === 1 || auth()->user()->role_id === 3)
                            <li>
                                <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse"
                                    href="#quejaslaborales" role="button" aria-expanded="false" aria-controls="#">
                                    <span class="me-2"><i class="bi bi-chat-dots-fill"></i></span>
                                    <span>Quejas laborales</span>
                                    <span class="ms-auto">
                                        <span class="right-icon"><i class="bi bi-chevron-down"></i></span>
                                    </span>
                                </a>
                                <div class="collapse" id="quejaslaborales">
                                    <div class="my-1">
                                        <ul class="navbar-nav ps-3">
                                            <li>
                                                <a href="{{ route('quejaslaborales.show') }}" class="nav-link px-3">
                                                    <span class="me-2"><i
                                                            class="bi bi-arrow-right-short"></i></span>
                                                    <span>Listado de quejas laborales</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('quejaslaborales.create') }}" class="nav-link px-3">
                                                    <span class="me-2"><i
                                                            class="bi bi-arrow-right-short"></i></span>
                                                    <span>Agregar queja laboral</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        @endif
                        <!-- Quejas laborales -->
                        <li class="my-2">
                            <hr class="dropdown-divider">
                        </li>
                    @endif
                @endauth
                <!-- Comites -->
            </ul>
        </nav>
    </div>
</div>
<!-- Fin offcanvas -->
