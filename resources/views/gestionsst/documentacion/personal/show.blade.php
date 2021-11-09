@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-lightmustard fw-bold fs-6">
                <span class="me-2">
                    <i class="bi bi-building"></i>
                </span>
                <span>Listado personal</span>
            </div>

            @if (Session::has('confirmacion'))
                <div class="m-3">
                    <div class="p-2 text-center fw-bold tb-seagreen">
                        <span>{{ session('confirmacion') }}</span>
                        <span><i class="bi bi-check2"></i></span>
                    </div>
                </div>
            @endif
            <div class="card-body">
                Aquí aparecerá toda la información del personal
                <div class="table-responsive">
                    <table id="index-admin-empleados" class="table table-hover table-borderless" style="width: 100%">
                        <thead>
                            <tr class="table-primary">
                                <th scope="col">ID</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Cedula</th>
                                <th scope="col">Estudios</th>
                                <th scope="col">HDV</th>
                                <th scope="col">Diploma</th>
                                <th scope="col">Salud</th>
                                <th scope="col">Curso 50h</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($empleados as $empleado)
                                <tr>
                                    <th scope="row">{{ $empleado->id }}</th>
                                    <td>Rol sin hacer</td>
                                    <td>
                                        {{-- @if ($empleado->estado === 1)
                                            <span class="bg-activegreen">Activo</span>
                                        @else
                                            <span class="bg-inactivegray">Inactivo</span>
                                        @endif --}}
                                        Activo o inactivo
                                    </td>
                                    <td>{{ $empleado->nombre_empleado }}</td>
                                    <td>{{ $empleado->apellidos_empleado }}</td>
                                    <td>{{ $empleado->documento_identidad }}</td>
                                    <td>{{ $empleado->nivelestudio->nombre }}</td>
                                    <td>Hoja de vida</td>
                                    <td>Diploma</td>
                                    <td>Certificado de salud</td>
                                    <td>Curso de 50 horas</td>
                                    <td>
                                        <span class="boton-accion">
                                            <a href="#" id="accion-editar"
                                                class="btn btn-p btn-sm" title="Editar">&#128221;</a>

                                            <a data-delete="#" id="eliminar" type="submit" class="btn btn-p btn-sm"
                                                title="Eliminar">🗑️</a>

                                            <form action="#" method="post">
                                                {{-- @csrf
                                                @method('PUT')
                                                @if ($empleado->estado === 1)
                                                    <input type="submit" class="btn btn-p btn-sm" title="Inhabilitar"
                                                        value="&#128683;">
                                                @else
                                                    <span class="boton-accion">
                                                        <input type="submit" class="btn btn-p btn-sm" title="Habilitar"
                                                            value="&#9989;">
                                                @endif --}}
                                            </form>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
