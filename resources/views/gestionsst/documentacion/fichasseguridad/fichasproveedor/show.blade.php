@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-lightmustard fw-bold fs-6">
                <span class="me-2">
                    <i class="bi bi-intersect"></i>
                </span>
                <span>Fichas de seguridad del proveedor</span>
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
                <div class="mt-1">
                    <div class="p-2 text-center fw-bold fs-5">
                        <span>{{ $proveedor->nombre_proveedor }}</span>
                    </div>
                    <div class="text-center">
                        <span class="fst-italic">Fichas de seguridad</span>
                    </div>
                </div>
                <table id="show-fichasporproveedor" class="table table-hover table-borderless" style="width: 100%">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">ID</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Documento</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fichaproductos as $fichaproducto)
                            <tr>
                                <td scope="row">{{ $fichaproducto->id }}</td>
                                <td>{{ $fichaproducto->producto->nombre_producto }}</td>
                                <td>{{ $fichaproducto->descripcion }}</td>
                                <td><a class="text-indigo" href="/fichasdeseguridad/{{ $fichaproducto->fichadeseguridad }}" target="blank">Ver documento</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Script Datatables --}}
<script>
    $(document).ready(function() {
        $('#show-fichasporproveedor').DataTable({
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

@endsection
