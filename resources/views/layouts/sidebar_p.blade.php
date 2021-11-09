  <!-- Offcanvas -->
  <div class="offcanvas offcanvas-start bg-dark text-white sidebar-nav " tabindex="-1" id="my-sidebar"
      aria-labelledby="offcanvasLabel">

      <div class="offcanvas-body p-0 my-3">
          <nav class="navbar-dark">
              <ul class="navbar-nav">

                <!-- Administrador -->
                    @auth
                      @if (auth()->user()->role_id === 1)
                          <li>
                              <div class="text-sb small fw-bold text-uppercase px-3">
                                  ADMINISTRADOR
                              </div>
                          </li>
                          <li>
                              <a href=" {{ route('usuarios.index') }}" class="nav-link px-3 mt-1">
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
                      @endif
                  @endauth
                  <!-- Administrador -->

                  <!-- Encargado SG-SST -->
                  @auth
                      @if (auth()->user()->role_id === 2 || auth()->user()->role_id === 1)
                          <li class="my-2">
                              <hr class="dropdown-divider">
                          </li>
                          <li>
                              <div class="text-sb small fw-bold text-uppercase px-3">
                                  ENCARGADO SG-SST
                              </div>
                          </li>

                          <!-- Información empresa -->
                          <li>
                              <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#seccion-empresa"
                                  role="button" aria-expanded="false" aria-controls="collapseExample">
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
                                              <a href=" {{ route('gestionsst.index_sst') }} " class="nav-link px-3">
                                                  <span class="me-2"><i
                                                          class="bi bi-arrow-right-short"></i></span>
                                                  <span>Información de la empresa</span>
                                              </a>
                                          </li>
                                          <li>
                                              <a href="#" class="nav-link px-3">
                                                  <span class="me-2"><i
                                                          class="bi bi-arrow-right-short"></i></span>
                                                  <span>Editar información</span>
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
                                  role="button" aria-expanded="false" aria-controls="collapseExample">
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
                                              <a href="#" class="nav-link px-3">
                                                  <span class="me-2"><i
                                                          class="bi bi-arrow-right-short"></i></span>
                                                  <span>Listado de colaboradores</span>
                                              </a>
                                          </li>
                                          <li>
                                              <a href="{{ route('personal.create') }}" class="nav-link px-3">
                                                  <span class="me-2"><i
                                                          class="bi bi-arrow-right-short"></i></span>
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
                                  role="button" aria-expanded="false" aria-controls="collapseExample">
                                  <span class="me-2"><i class="bi bi-intersect"></i></span>
                                  <span>Aliados estratégicos</span>
                                  <span class="ms-auto">
                                      <span class="right-icon"><i class="bi bi-chevron-down"></i></span>
                                  </span>
                              </a>
                              <div class="collapse" id="seccion-aliados">
                                  <div class="my-1">
                                      <ul class="navbar-nav ps-3">
                                          <li>
                                              <a href="#" class="nav-link px-3">
                                                  <span class="me-2"><i
                                                          class="bi bi-arrow-right-short"></i></span>
                                                  <span>Proveedores</span>
                                              </a>
                                          </li>
                                          <li>
                                              <a href="#" class="nav-link px-3">
                                                  <span class="me-2"><i
                                                          class="bi bi-arrow-right-short"></i></span>
                                                  <span>Fichas de seguridad</span>
                                              </a>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                          </li>
                          <!-- Aliados estrategicos -->

                          <!-- Documentación -->
                          <li>
                              <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#documentacion"
                                  role="button" aria-expanded="false" aria-controls="collapseExample">
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
                                              <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse"
                                                  href="#seccion1-documentacion" role="button" aria-expanded="false"
                                                  aria-controls="collapseExample">
                                                  <span class="me-2"><i class="bi bi-check2-square"></i></span>
                                                  <span>Compromisos y responsabilidades</span>
                                                  <span class="ms-auto">
                                                      <span class="right-icon"><i class="bi bi-chevron-down"></i></span>
                                                  </span>
                                              </a>
                                              <!-- Div padre -->
                                              <div class="collapse" id="seccion1-documentacion">
                                                  <div class="my-1">
                                                      <ul class="navbar-nav ps-3">
                                                          <li>
                                                              <a href="#" class="nav-link px-3">
                                                                  <span class="me-2"><i
                                                                          class="bi bi-arrow-right-short"></i></span>
                                                                  <span>Compromiso de gerencia</span>
                                                              </a>
                                                          </li>
                                                          <li>
                                                              <a href="#" class="nav-link px-3">
                                                                  <span class="me-2"><i
                                                                          class="bi bi-arrow-right-short"></i></span>
                                                                  <span>Roles y responsabilidades</span>
                                                              </a>
                                                          </li>
                                                      </ul>
                                                  </div>
                                          </li>
                                          <li>
                                              <a href="#" class="nav-link px-3">
                                                  <span class="me-2"><i class="bi bi-check2-square"></i></span>
                                                  <span>Política SG-SST</span>
                                              </a>
                                          </li>
                                          <li>
                                              <a href="#" class="nav-link px-3">
                                                  <span class="me-2"><i class="bi bi-check2-square"></i></span>
                                                  <span>Riesgos psicosociales</span>
                                              </a>
                                          </li>
                                          <li>
                                              <a href="#" class="nav-link px-3">
                                                  <span class="me-2"><i class="bi bi-check2-square"></i></span>
                                                  <span>Plan de emergencia</span>
                                              </a>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                          </li>
                          <!-- Documentación -->
                      @endif
                  @endauth
                  <!-- Encargado SG-SST -->

                  <!-- Comites -->
                  @auth
                      @if (auth()->user()->role_id === 1 || auth()->user()->role_id === 3 || auth()->user()->role_id === 4 || auth()->user()->role_id === 5)
                          <li class="my-2">
                              <hr class="dropdown-divider">
                          </li>
                          <li>
                              <div class="text-sb small fw-bold text-uppercase px-3">
                                  COMITÉS
                              </div>
                          </li>
                          <li>
                              <a href=" {{ route('comite.index_comite') }} " class="nav-link px-3">
                                  <span class="me-2">
                                      <i class="bi bi-speedometer2"></i>
                                  </span>
                                  <span>Modulo comites</span>
                              </a>
                          </li>
                      @endif
                  @endauth
                  <!-- Comites -->
              </ul>
          </nav>
      </div>
  </div>
  <!-- Fin offcanvas -->
