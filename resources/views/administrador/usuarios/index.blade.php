@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-lightmustard fw-bold fs-6">
                <span class="me-2">
                    <i class="bi bi-people-fill"></i>
                </span>
                <span>Usuarios principales</span>
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
                <div class="table-responsive">
                    <!-- Tabla -->
                    <table id="index-admin-usuarios" class="table table-hover table-borderless" style="width: 100%">
                        <thead>
                            <tr class="table-primary">
                                <th scope="col">ID</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Cédula</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Celular</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <th scope="row">{{ $usuario->id }}</th>
                                    <td>{{ $usuario->role->nombre }}</td>
                                    <td>
                                        @if ($usuario->estado === 1)
                                            <span class="bg-activegreen">Activo</span>
                                        @else
                                            <span class="bg-inactivegray">Inactivo</span>
                                        @endif
                                    </td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->apellido }}</td>
                                    <td>{{ $usuario->cedula }}</td>
                                    <td>{{ $usuario->telefono }}</td>
                                    <td>{{ $usuario->celular }}</td>
                                    <td>{{ $usuario->direccion }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>
                                        <span class="boton-accion">
                                            <a href="{{ route('usuarios.edit', $usuario->id) }}" id="accion-editar"
                                                class="btn btn-p btn-sm" title="Editar">&#128221;</a>

                                            <a data-delete="{{ route('usuarios.delete', $usuario->id) }}" id="eliminar" type="submit" class="btn btn-p btn-sm"
                                                title="Eliminar">🗑️</a>

                                            <form action="{{ route('usuarios.activar', $usuario->id) }}"
                                                method="post">
                                                @csrf
                                                @method('PUT')
                                                @if ($usuario->estado === 1)
                                                    <input type="submit" class="btn btn-p btn-sm" title="Inhabilitar"
                                                        value="&#128683;">
                                                @else
                                                    <span class="boton-accion">
                                                        <input type="submit" class="btn btn-p btn-sm" title="Habilitar"
                                                            value="&#9989;">
                                                @endif
                                            </form>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Fin tabla -->
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Script Datatables --}}
<script>
    $(document).ready(function() {
        $('#index-admin-usuarios').DataTable({
            "order": [
                [0, "desc"]
            ],
            language: {
                "decimal": "",
                "emptyTable": "No hay registros",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                "infoFiltered": "(Filtrado de _MAX_ total registros)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrando _MENU_ registros",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "No hay registros",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                }
            }
        });
    });
</script>

{{-- Script SweetAlert --}}
<script>
    $(document).ready(function() {
        $('#eliminar').on('click', eliminar);
    })

    function eliminar() {
        var urlEliminar = $(this).data('delete');
        console.log(urlEliminar);
        Swal.fire({
            customClass: 'sweetalert-eliminar',
            title: '¿Está seguro de eliminar este usuario?',
            text: "¡No puedes deshacer los cambios!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#033C59',
            cancelButtonColor: '#DC8200',
            confirmButtonText: 'Sí, estoy seguro',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = urlEliminar;
            }
        })
    }
</script>

@endsection
