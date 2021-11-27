@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-lightmustard fw-bold fs-6">
                <span class="me-2">
                    <i class="bi bi-file-earmark-text"></i>
                </span>
                <span>Todas las actas de nombramiento del comité</span>
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
                    <table id="show-actasnombramientos" class="table table-hover table-borderless" style="width: 100%">
                        <thead>
                            <tr class="table-primary">
                                <th scope="col">ID</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Líder</th>
                                <th scope="col">Título</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Acta</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($actasnombramientos as $actanombramiento)
                                <tr>
                                    <th scope="row">{{ $actanombramiento->id }}</th>
                                    <td>{{ $actanombramiento->fecha_nombramiento }}</td>
                                    <td>{{ $actanombramiento->lider->nombre_miembro ." ". $actanombramiento->lider->apellidos_miembro }}</td>
                                    <td>{{ $actanombramiento->titulo_nombramiento }}</td>
                                    <td>{{ $actanombramiento->descripcion_nombramiento }}</td>
                                    <td><a class="text-indigo" href="/comites/actasnombramientos/{{ $actanombramiento->acta_nombramiento }}" target="blank">Ver documento</a></td>
                                    <td>
                                        <div class="boton-accion">
                                            <a href="{{ route('actasnombramiento.edit',$actanombramiento->id) }}" id="accion-editar"
                                                class="btn btn-p btn-sm" title="Editar">&#128221;</a>

                                            <a data-delete="{{ route('actasnombramiento.delete',$actanombramiento->id) }}" type="submit" class="eliminar-js btn btn-p btn-sm"
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
        $('#show-actasnombramientos').DataTable({
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
            title: '¿Está seguro de eliminar este documento?',
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
