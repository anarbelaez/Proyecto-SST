@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-lightmustard fw-bold fs-6">
                <span class="me-2">
                    <i class="bi bi-person-lines-fill"></i>
                </span>
                <span>Editar usuario</span>
            </div>
            <div class="card-body">
                <form class="row g-3" action="{{ route('usuarios.update', $usuario->id) }}" autocomplete="off" method="post">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <label for="nombre" class="form-label fw-bold text-darkblue">Nombres:</label>
                        <input type="text" name="nombre" value="{{ $usuario->name }}" class="form-control">
                        @if ($errors->has('nombre'))
                            <p class="text-danger">{{ $errors->first('nombre') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="apellido" class="form-label fw-bold text-darkblue">Apellidos:</label>
                        <input type="text" name="apellido" value="{{ $usuario->apellido }}" class="form-control">
                        @if ($errors->has('apellido'))
                            <p class="text-danger">{{ $errors->first('apellido') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="cedula" class="form-label fw-bold text-darkblue">Cédula:</label>
                        <input type="text" name="cedula" value="{{ $usuario->cedula }}" class="form-control">
                        @if ($errors->has('cedula'))
                            <p class="text-danger">{{ $errors->first('cedula') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="telefono" class="form-label fw-bold text-darkblue">Teléfono:</label>
                        <input type="text" name="telefono" value="{{ $usuario->telefono }}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="celular" class="form-label fw-bold text-darkblue">Celular:</label>
                        <input type="text" name="celular" value="{{ $usuario->celular }}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="direccion" class="form-label fw-bold text-darkblue">Dirección:</label>
                        <input type="text" name="direccion" value="{{ $usuario->direccion }}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="correo" class="form-label fw-bold text-darkblue">Correo electrónico:</label>
                        <input type="text" name="correo" value="{{ $usuario->email }}" class="form-control">
                        @if ($errors->has('correo'))
                            <p class="text-danger">{{ $errors->first('correo') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="role" class="form-label fw-bold text-darkblue">Rol del usuario:</label>
                        <select class="form-select" name="role">
                            <option value="#">Seleccione una opcion</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" @if ($usuario->role->nombre === $role->nombre) selected='selected' @endif>{{ $role->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('role'))
                            <p class="text-danger">{{ $errors->first('role') }}</p>
                        @endif
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn fw-bold bg-lightblue">Actualizar información del usuario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
