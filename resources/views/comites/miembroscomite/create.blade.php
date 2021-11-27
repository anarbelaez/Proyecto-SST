@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-lightmustard fw-bold fs-6">
                <span class="me-2">
                    <i class="bi bi-person-plus-fill"></i>
                </span>
                <span>Nuevo integrante del Comité</span>
            </div>
            <div class="card-body">
                <form class="row g-3" action="{{ route('miembroscomite.store') }}" autocomplete="off" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="nombre_miembro" class="form-label fw-bold text-darkblue">Nombres:</label>
                        <input type="text" name="nombre_miembro" value="{{ old('nombre_miembro') }}" class="form-control">
                         @if ($errors->has('nombre_miembro'))
                            <p class="text-danger">{{ $errors->first('nombre_miembro') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="apellidos_miembro" class="form-label fw-bold text-darkblue">Apellidos:</label>
                        <input type="text" name="apellidos_miembro" value="{{ old('apellidos_miembro') }}" class="form-control">
                         @if ($errors->has('apellidos_miembro'))
                            <p class="text-danger">{{ $errors->first('apellidos_miembro') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="cedula_miembro" class="form-label fw-bold text-darkblue">Documento de identidad:</label>
                        <input type="text" name="cedula_miembro" value="{{ old('cedula_miembro') }}" class="form-control">
                         @if ($errors->has('cedula_miembro'))
                            <p class="text-danger">{{ $errors->first('cedula_miembro') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="cargo" class="form-label fw-bold text-darkblue">Cargo dentro del comité:</label>
                        <select class="form-select" name="cargo">
                            <option value="#">Seleccione una opción</option>
                            @foreach ($cargos as $cargo)
                                <option value="{{ $cargo->id }}">{{ $cargo->nombre }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('cargo'))
                            <p class="text-danger">{{ $errors->first('cargo') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="telefono_miembro" class="form-label fw-bold text-darkblue">Número telefónico:</label>
                        <input type="text" name="telefono_miembro" value="{{ old('telefono_miembro') }}" class="form-control">
                         @if ($errors->has('telefono_miembro'))
                            <p class="text-danger">{{ $errors->first('telefono_miembro') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="correo_miembro" class="form-label fw-bold text-darkblue">Correo electrónico:</label>
                        <input type="text" name="correo_miembro" value="{{ old('correo_miembro') }}" class="form-control">
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

                    <div class="d-grid gap-2 col-6">
                        <button type="submit" class="btn fw-bold bg-lightmustard">Guardar integrante</button>
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
