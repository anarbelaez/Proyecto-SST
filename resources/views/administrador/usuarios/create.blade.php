@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-lightmustard fw-bold fs-6">
                    <span class="me-2">
                        <i class="bi bi-person-plus-fill"></i>
                    </span>
                    <span>Crear usuario</span>
                </div>
                <div class="card-body">
                    <form class="row g-3" action=" {{ route('usuarios.store') }} " autocomplete="off" method="post" >
                        @csrf
                        <div class="col-md-6">
                            <label for="nombre" class="form-label fw-bold text-darkblue">Nombres:</label>
                            <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control">
                            @if ($errors->has('nombre'))
                                <p class="text-danger">{{ $errors->first('nombre') }}</p>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="apellido" class="form-label fw-bold text-darkblue">Apellidos:</label>
                            <input type="text" name="apellido" value="{{ old('apellido') }}" class="form-control">
                            @if ($errors->has('apellido'))
                                <p class="text-danger">{{ $errors->first('apellido') }}</p>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="cedula" class="form-label fw-bold text-darkblue">Cédula:</label>
                            <input type="text" name="cedula" value="{{ old('cedula') }}" class="form-control">
                            @if ($errors->has('cedula'))
                                <p class="text-danger">{{ $errors->first('cedula') }}</p>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="telefono" class="form-label fw-bold text-darkblue">Teléfono:</label>
                            <input type="text" name="telefono" value="{{ old('telefono') }}" class="form-control">
                            @if ($errors->has('telefono'))
                                <p class="text-danger">{{ $errors->first('telefono') }}</p>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="celular" class="form-label fw-bold text-darkblue">Celular:</label>
                            <input type="text" name="celular" value="{{ old('celular') }}" class="form-control">
                            @if ($errors->has('celular'))
                                <p class="text-danger">{{ $errors->first('celular') }}</p>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="direccion" class="form-label fw-bold text-darkblue">Dirección:</label>
                            <input type="text" name="direccion" value="{{ old('direccion') }}" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="correo" class="form-label fw-bold text-darkblue">Correo electrónico:</label>
                            <input type="text" name="correo" value="{{ old('correo') }}" class="form-control">
                            @if ($errors->has('correo'))
                                <p class="text-danger">{{ $errors->first('correo') }}</p>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="role" class="form-label fw-bold text-darkblue">Rol del usuario:</label>
                            <select class="form-select" name="role">
                                <option value="#">Seleccione una opción</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->nombre }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('role'))
                                <p class="text-danger">{{ $errors->first('role') }}</p>
                            @endif
                        </div>
                        <div class="d-grid gap-2 col-6">
                            <button type="submit" class="btn fw-bold bg-lightmustard">Guardar usuario</button>
                        </div>
                        <div class="d-grid gap-2 col-6">
                            <button type="reset" class="btn fw-bold bg-lightblue">Limpiar todo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="contenedor">

<div class="contenedor-form">

<form class="formulario-create" action=" {{ route('usuarios.store') }} " method="post">
    @csrf
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" value="{{ old('nombre') }}">

    @if ($errors->has('nombre'))
        <br>
        <p>{{$errors->first('nombre')}}</p>
    @endif

    <label for="apellido">Apellido</label>
    <input type="text" name="apellido" value="{{ old('apellido') }}">


    @if ($errors->has('apellido'))
        <br>
        <p>{{$errors->first('apellido')}}</p>
    @endif

    <label for="cedula">Cedula</label>
    <input type="text" name="cedula" value="{{ old('cedula') }}">

    @if ($errors->has('cedula'))
        <br>
        <p>{{$errors->first('cedula')}}</p>
    @endif

    @if ($errors->has('cedula'))
        <br>
        <p>{{$errors->first('cedula.numeric')}}</p>
    @endif

    <label for="telefono">Telefono</label>
    <input type="text" name="telefono" value="{{ old('telefono') }}">

    <label for="celular">Celular</label>
    <input type="text" name="celular" value="{{ old('celular') }}">

    @if ($errors->has('celular'))
        <br>
        <p>{{$errors->first('celular')}}</p>
    @endif

    @if ($errors->has('celular'))
        <br>
        <p>{{$errors->first('celular.numeric')}}</p>
    @endif

    <label for="direccion">Direccion</label>
    <input type="text" name="direccion" value="{{ old('direccion') }}">

    <label for="correo">Correo electronico</label>
    <input type="text" name="correo" value="{{ old('correo') }}">

    @if ($errors->has('correo'))
        <br>
        <p class="text-danger">{{$errors->first('correo')}}</p>
    @endif

    <label for="role">Rol del usuario</label>
    <select name="role">
        <option value="#">Seleccione una opcion</option>
        @foreach ($roles as $role)
            <option value="{{ $role->id }}">{{ $role->nombre }}</option>
        @endforeach
    </select>

    <input type="submit" value="Guardar usuario">
    <input type="reset" value="Limpiar todo">
</form>
</div>

</div> --}}
@endsection
