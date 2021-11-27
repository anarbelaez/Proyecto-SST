@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-lightmustard fw-bold fs-6">
                    <span class="me-2">
                        <i class="bi bi-building"></i>
                    </span>
                    <span>Información de la empresa</span>
                </div>

                <div class="row card-body h-100">
                    @foreach ($empresas as $empresa)
                        <h5 class="text-uppercase text-center fs-2 fw-bold" style="letter-spacing: 0.1em; color: #006D32;">
                            {{ Str::limit($empresa->nombre_empresa, 10, '') }}</h5>
                        <h5 class="fs-6 text-center fst-italic">
                            {{ Str::substr($empresa->nombre_empresa, 11, 42) }}</h5>
                        <hr class="dropdown-divider mx-auto bg-lightblue" style="height: 0.2rem; opacity: 1; width: 40%">

                        @if (Session::has('confirmacion'))
                            <div class="m-3">
                                <div class="p-2 text-center fw-bold tb-seagreen">
                                    <span>{{ session('confirmacion') }}</span>
                                    <span><i class="bi bi-check2"></i></span>
                                </div>
                            </div>
                        @endif

                        <span class="fw-bold mt-2 fs-6">Datos generales</span>
                        <hr class="dropdown-divider " style="">

                        <div class="container">
                            <div class="row gy-2">
                                <div class="col-md-6">
                                    <i class="bi bi-dot text-darkblue"></i>
                                    <span class="fw-bold text-darkblue">Número de identificación tributaria - NIT:</span>
                                    <span class="ms-2">{{ $empresa->nit }}</span>
                                </div>
                                <div class="col-md-6">
                                    <i class="bi bi-dot text-darkblue"></i>
                                    <span class="fw-bold text-darkblue">Naturaleza jurídica:</span>
                                    <span class="ms-2">{{ $empresa->naturaleza_juridica }}</span>
                                </div>
                                <div class="col-md-6">
                                    <i class="bi bi-dot text-darkblue"></i>
                                    <span class="fw-bold text-darkblue">Actividad económica:</span>
                                    <span class="ms-2">{{ $empresa->actividad_economica }}</span>
                                </div>
                                <div class="col-md-6">
                                    <i class="bi bi-dot text-darkblue"></i>
                                    <span class="fw-bold text-darkblue">Tipo de empresa:</span>
                                    <span class="ms-2">{{ $empresa->tipo_empresa }}</span>
                                </div>
                                <div class="col-md-6">
                                    <i class="bi bi-dot text-darkblue"></i>
                                    <span class="fw-bold text-darkblue">Nivel de riesgo:</span>
                                    <span class="ms-2">{{ $empresa->riesgo->nombre }}</span>
                                </div>
                                <div class="col-md-6">
                                    <i class="bi bi-dot text-darkblue"></i>
                                    <span class="fw-bold text-darkblue">Cantidad de empleados:</span>
                                    <span class="ms-2">{{ $empresa->cantidad_trabajadores }}</span>
                                </div>

                                <div class="col-md-6">
                                    <i class="bi bi-dot text-darkblue"></i>
                                    <span class="fw-bold text-darkblue">Dirección:</span>
                                    <span class="ms-2">{{ $empresa->direccion }}</span>
                                </div>
                                <div class="col-md-6">
                                    <i class="bi bi-dot text-darkblue"></i>
                                    <span class="fw-bold text-darkblue">Correo electrónico:</span>
                                    <span class="ms-2">{{ $empresa->correo_electronico }}</span>
                                </div>
                                <div class="col-md-6">
                                    <i class="bi bi-dot text-darkblue"></i>
                                    <span class="fw-bold text-darkblue">Números telefónicos:</span>
                                    <span class="ms-2">{{ $empresa->telefono1 }}</span>
                                    <span class=""> - {{ $empresa->telefono2 }}</span>
                                    <span class=""> - {{ $empresa->telefono3 }}</span>
                                </div>
                                <div class="col-md-6">

                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="container m-4">
                        <div>
                            <a href="{{ route('empresa.edit', $empresa->id) }}" class="position-absolute bottom-0 end-0 m-2 btn fw-bold bg-lightmustard text-light rounded-pill">
                                Editar información
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
