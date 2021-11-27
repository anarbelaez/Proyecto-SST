@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-lightmustard fw-bold fs-6">
                <span class="me-2">
                    <i class="bi bi-pencil-square"></i>
                </span>
                <span>Editar integrante del comité</span>
            </div>
            <div class="card-body">
                <form class="row g-3" action="{{ route('miembroscomite.update', $miembrocomite->id) }}" autocomplete="off" method="post">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <label for="nombre_miembro" class="form-label fw-bold text-darkblue">Nombres:</label>
                        <input type="text" name="nombre_miembro" value="{{ $miembrocomite->nombre_miembro }}" class="form-control">
                         @if ($errors->has('nombre_miembro'))
                            <p class="text-danger">{{ $errors->first('nombre_miembro') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="apellidos_miembro" class="form-label fw-bold text-darkblue">Apellidos:</label>
                        <input type="text" name="apellidos_miembro" value="{{ $miembrocomite->apellidos_miembro }}" class="form-control">
                         @if ($errors->has('apellidos_miembro'))
                            <p class="text-danger">{{ $errors->first('apellidos_miembro') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="cedula_miembro" class="form-label fw-bold text-darkblue">Documento de identidad:</label>
                        <input type="text" name="cedula_miembro" value="{{ $miembrocomite->cedula_miembro }}" class="form-control">
                         @if ($errors->has('cedula_miembro'))
                            <p class="text-danger">{{ $errors->first('cedula_miembro') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="cargo" class="form-label fw-bold text-darkblue">Cargo dentro del comité:</label>
                        <select class="form-select" name="cargo">
                            <option value="#">Seleccione una opción</option>
                            @foreach ($cargos as $cargo)
                                <option value="{{ $cargo->id }}" @if ($miembrocomite->cargo->nombre === $cargo->nombre) selected='selected' @endif>{{ $cargo->nombre }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('cargo'))
                            <p class="text-danger">{{ $errors->first('cargo') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="telefono_miembro" class="form-label fw-bold text-darkblue">Número telefónico:</label>
                        <input type="text" name="telefono_miembro" value="{{ $miembrocomite->telefono_miembro }}" class="form-control">
                         @if ($errors->has('telefono_miembro'))
                            <p class="text-danger">{{ $errors->first('telefono_miembro') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="correo_miembro" class="form-label fw-bold text-darkblue">Correo electrónico:</label>
                        <input type="text" name="correo_miembro" value="{{ $miembrocomite->correo_miembro }}" class="form-control">
                         @if ($errors->has('correo_miembro'))
                            <p class="text-danger">{{ $errors->first('correo_miembro') }}</p>
                        @endif
                    </div>
                    {{-- <div class="col-md-6">
                        <label for="area_empresa" class="form-label fw-bold text-darkblue">Área de la empresa:</label>
                        <input type="text" name="area_empresa" value="{{ old('area_empresa') }}" class="form-control">
                         @if ($errors->has('area_empresa'))
                            <p class="text-danger">{{ $errors->first('area_empresa') }}</p>
                        @endif
                    </div> --}}

                    <div class="d-grid gap-2 col-12">
                        <button type="submit" class="btn fw-bold bg-lightmustard">Actualizar información</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
