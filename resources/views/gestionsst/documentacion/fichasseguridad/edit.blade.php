@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-lightmustard fw-bold fs-6">
                <span class="me-2">
                    <i class="bi bi-pencil-square"></i>
                </span>
                <span>Editar fichas de seguridad</span>
            </div>
            <div class="card-body">
                <form class="row g-3" action="{{ route('fichasseguridad.update',$fichaseguridad->id) }}" autocomplete="off" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <label for="producto" class="form-label fw-bold text-darkblue">Producto:</label>
                        <select class="form-select" name="producto">
                            <option value="#">Seleccione una opción</option>
                            @foreach ($productos as $producto)
                                <option value="{{ $producto->id }}" @if ($fichaseguridad->producto->nombre_producto === $producto->nombre_producto) selected='selected' @endif>{{ $producto->nombre_producto }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('producto'))
                            <p class="text-danger">{{ $errors->first('producto') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="proveedor" class="form-label fw-bold text-darkblue">Proveedor:</label>
                        <select class="form-select" name="proveedor">
                            <option value="#">Seleccione una opción</option>
                            @foreach ($proveedores as $proveedor)
                                <option value="{{ $proveedor->id }}" @if ($fichaseguridad->proveedor->nombre_proveedor === $proveedor->nombre_proveedor) selected='selected' @endif>{{ $proveedor->nombre_proveedor }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('proveedor'))
                            <p class="text-danger">{{ $errors->first('proveedor') }}</p>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <label for="descripcion_fs" class="form-label fw-bold text-darkblue">Descripción:</label>
                        <textarea name="descripcion_fs" class="form-control" rows="3">{{ $fichaseguridad->descripcion }}</textarea>
                         @if ($errors->has('descripcion_fs'))
                            <p class="text-danger">{{ $errors->first('descripcion_fs') }}</p>
                        @endif
                    </div>
                    <div class="">
                        <div class="p-1 text-center fw-bold tb-brown">
                            <span class="me-3"><i class="bi bi-exclamation-diamond-fill"></i></span>
                            <span>En caso de que deba actualizar el documento, tenga en cuenta que solo se admiten documentos en formato PDF.</span>
                            <span class="ms-3"><i class="bi bi-exclamation-diamond-fill"></i></span>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="fichadeseguridad" class="form-label fw-bold text-darkblue">
                            <i class="bi bi-dot me-1"></i></i>Ficha de seguridad:</label>
                            <br>
                            <i class="bi bi-arrow-return-right ms-4 text-indigo"></i>
                            <span>Documento actual:</span>
                            <a class="text-indigo" href="/fichasdeseguridad/{{ $fichaseguridad->fichadeseguridad }}" target="blank">Ficha de seguridad</a>
                        <input type="file" name="fichadeseguridad" accept="application/pdf" class="form-control mt-3">
                         @if ($errors->has('fichadeseguridad'))
                            <p class="text-danger">{{ $errors->first('fichadeseguridad') }}</p>
                        @endif
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn fw-bold bg-lightmustard">Actualizar ficha de seguridad</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
