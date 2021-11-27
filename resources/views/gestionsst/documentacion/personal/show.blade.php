@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-lightmustard fw-bold fs-6">
                <span class="me-2">
                    <i class="bi bi-people-fill"></i>
                </span>
                <span>Listado personal SG-SST</span>
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
                    <table id="show-personalsst" class="table table-hover table-borderless" style="width: 100%">
                        <thead>
                            <tr class="table-primary">
                                <th scope="col">ID</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Cédula</th>
                                <th scope="col">Estudios</th>
                                <th scope="col">Hdv</th>
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
                                    <td>{{ $empleado->nombre_empleado }}</td>
                                    <td>{{ $empleado->apellidos_empleado }}</td>
                                    <td>{{ $empleado->documento_identidad }}</td>
                                    <td>{{ $empleado->nivelestudio->nombre }}</td>
                                    <td><a class="text-indigo" href="/documentosempleados/{{ $empleado->hdv }}" target="blank">Hoja de vida</a></td>
                                    <td><a class="text-indigo" href="/documentosempleados/{{ $empleado->diploma }}" target="blank">Diploma de estudios</a></td>
                                    <td><a class="text-indigo" href="/documentosempleados/{{ $empleado->certisalud }}" target="blank">Certificado de Salud</a></td>
                                    <td><a class="text-indigo" href="/documentosempleados/{{ $empleado->curso50h }}" target="blank">Certificado Curso 50h</a></td>
                                    <td>
                                        <div class="boton-accion">
                                            <a href="{{ route('personal.edit', $empleado->id) }}" id="accion-editar"
                                                class="btn btn-p btn-sm" title="Editar">&#128221;</a>

                                            <a data-delete="{{ route('personal.delete', $empleado->id) }}" type="submit" class="eliminar-js btn btn-p btn-sm"
                                                title="Eliminar">🗑️</a>
                                        </div>
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

{{-- Script Datatables --}}
<script>
    $(document).ready(function() {
        $('#show-personalsst').DataTable({
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
        $('.eliminar-js').on('click', eliminar);
    })

    function eliminar() {
        var urlEliminar = $(this).data('delete');
        console.log(urlEliminar);
        Swal.fire({
            customClass: 'sweetalert-eliminar',
            title: '¿Está seguro de eliminar este empleado?',
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
