@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-lightmustard fw-bold fs-6">
                <span class="me-2">
                    <i class="bi bi-building"></i>
                </span>
                <span>Ingresar información de la empresa</span>
            </div>
            <div class="card-body">
                <form class="row g-3" action=" {{ route('empresa.store') }} " autocomplete="off" method="post">
                    @csrf
                    <div class="col-md-12">
                        <i class="bi bi-dot"></i>
                        <label for="nombre_empresa" class="form-label fw-bold text-darkblue">Nombre de la empresa:</label>
                        <input type="text" name="nombre_empresa" value="{{ old('nombre_empresa') }}" class="form-control">
                         @if ($errors->has('nombre_empresa'))
                            <p class="text-danger">{{ $errors->first('nombre_empresa') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <i class="bi bi-dot"></i>
                        <label for="naturaleza_juridica" class="form-label fw-bold text-darkblue">Naturaleza jurídica:</label>
                        <input type="text" name="naturaleza_juridica" value="{{ old('naturaleza_juridica') }}" class="form-control">
                         @if ($errors->has('naturaleza_juridica'))
                            <p class="text-danger">{{ $errors->first('naturaleza_juridica') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <i class="bi bi-dot"></i>
                        <label for="nit" class="form-label fw-bold text-darkblue">NIT:</label>
                        <input type="text" name="nit" value="{{ old('nit') }}" class="form-control">
                         @if ($errors->has('nit'))
                            <p class="text-danger">{{ $errors->first('nit') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <i class="bi bi-dot"></i>
                        <label for="actividad_economica" class="form-label fw-bold text-darkblue">Actividad económica:</label>
                        <input type="text" name="actividad_economica" value="{{ old('actividad_economica') }}" class="form-control">
                         @if ($errors->has('actividad_economica'))
                            <p class="text-danger">{{ $errors->first('actividad_economica') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <i class="bi bi-dot"></i>
                        <label for="tipo_empresa" class="form-label fw-bold text-darkblue">Tipo de empresa:</label>
                        <input type="text" name="tipo_empresa" value="{{ old('tipo_empresa') }}" class="form-control">
                         @if ($errors->has('tipo_empresa'))
                            <p class="text-danger">{{ $errors->first('tipo_empresa') }}</p>
                        @endif
                    </div>
                   {{--  <div class="col-md-6">
                        <i class="bi bi-dot"></i>
                        <label for="nivel_riesgo" class="form-label fw-bold text-darkblue">Nivel de riesgo:</label>
                        <input type="text" name="nivel_riesgo" value="{{ old('nivel_riesgo') }}" class="form-control">
                         @if ($errors->has('nivel_riesgo'))
                            <p class="text-danger">{{ $errors->first('nivel_riesgo') }}</p>
                        @endif
                    </div> --}}

                    <div class="col-md-6">
                        <i class="bi bi-dot"></i>
                        <label for="nivel_riesgo" class="form-label fw-bold text-darkblue">Nivel de riesgo:</label>
                        <select class="form-select" name="nivel_riesgo">
                            <option value="#">Seleccione una opción</option>
                            @foreach ($riesgos as $riesgo)
                                <option value="{{ $riesgo->id }}">{{ $riesgo->nombre }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('nivel_riesgo'))
                            <p class="text-danger">{{ $errors->first('nivel_riesgo') }}</p>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <i class="bi bi-dot"></i>
                        <label for="cantidad_trabajadores" class="form-label fw-bold text-darkblue">Cantidad de empleados:</label>
                        <input type="text" name="cantidad_trabajadores" value="{{ old('cantidad_trabajadores') }}" class="form-control">
                         @if ($errors->has('cantidad_trabajadores'))
                            <p class="text-danger">{{ $errors->first('cantidad_trabajadores') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <i class="bi bi-dot"></i>
                        <label for="correo_electronico" class="form-label fw-bold text-darkblue">Correo electrónico:</label>
                        <input type="text" name="correo_electronico" value="{{ old('correo_electronico') }}" class="form-control">
                         @if ($errors->has('correo_electronico'))
                            <p class="text-danger">{{ $errors->first('correo_electronico') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <i class="bi bi-dot"></i>
                        <label for="direccion_empresa" class="form-label fw-bold text-darkblue">Dirección:</label>
                        <input type="text" name="direccion_empresa" value="{{ old('direccion_empresa') }}" class="form-control">
                         @if ($errors->has('direccion_empresa'))
                            <p class="text-danger">{{ $errors->first('direccion_empresa') }}</p>
                        @endif
                    </div>
                    <div>
                        <i class="bi bi-dot"></i>
                        <span class="fw-bold text-darkblue">Números telefónicos:</span>
                    </div>
                    <div class="col-md-4">
                        <i class="bi bi-dot"></i>
                        <label for="telefono1" class="form-label fw-bold text-darkblue">Teléfono 1</label>
                        <input type="text" name="telefono1" value="{{ old('telefono1') }}" class="form-control">
                         @if ($errors->has('telefono1'))
                            <p class="text-danger">{{ $errors->first('telefono1') }}</p>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <i class="bi bi-dot"></i>
                        <label for="telefono2" class="form-label fw-bold text-darkblue">Telefóno 2</label>
                        <input type="text" name="telefono2" value="{{ old('telefono2') }}" class="form-control">
                         @if ($errors->has('telefono2'))
                            <p class="text-danger">{{ $errors->first('telefono2') }}</p>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <i class="bi bi-dot"></i>
                        <label for="telefono3" class="form-label fw-bold text-darkblue">Teléfono 3</label>
                        <input type="text" name="telefono3" value="{{ old('telefono3') }}" class="form-control">
                         @if ($errors->has('telefono3'))
                            <p class="text-danger">{{ $errors->first('telefono3') }}</p>
                        @endif
                    </div>
                    <div class="d-grid gap-2 col-6">
                        <button type="submit" class="btn fw-bold bg-lightmustard">Guardar información</button>
                    </div>
                    <div class="d-grid gap-2 col-6">
                        <button type="reset" class="btn fw-bold bg-lightblue">Limpiar todo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
