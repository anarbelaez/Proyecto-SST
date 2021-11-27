@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-lightmustard fw-bold fs-6">
                <span class="me-2">
                    <i class="bi bi-pencil-square"></i>
                </span>
                <span>Editar documento de la empresa</span>
            </div>
            <div class="card-body">
                <form class="row g-3" action="{{ route('documentos.update', $documento->id) }}" autocomplete="off" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <i class="bi bi-dot"></i>
                        <label for="titulo" class="form-label fw-bold text-darkblue">Nombre del documento:</label>
                        <input type="text" name="titulo" value="{{ $documento->titulo  }}" class="form-control">
                         @if ($errors->has('titulo'))
                            <p class="text-danger">{{ $errors->first('titulo') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <i class="bi bi-dot"></i>
                        <label for="tipodocumento" class="form-label fw-bold text-darkblue">Tipo de documento:</label>
                        <select class="form-select" name="tipodocumento">
                            <option value="#">Seleccione una opción</option>
                            @foreach ($tipodocumentos as $tipodocumento)
                                <option value="{{ $tipodocumento->id }}"  @if ($documento->tipodocumento->nombre === $tipodocumento->nombre) selected='selected' @endif>{{ $tipodocumento->nombre }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('tipodocumento'))
                            <p class="text-danger">{{ $errors->first('tipodocumento') }}</p>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <i class="bi bi-dot"></i>
                        <label for="descripcion" class="form-label fw-bold text-darkblue">Breve descripción del documento:</label>
                        <textarea name="descripcion" class="form-control" rows="3">{{ $documento->descripcion  }}</textarea>
                         @if ($errors->has('descripcion'))
                            <p class="text-danger">{{ $errors->first('descripcion') }}</p>
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
                        <label for="documento" class="form-label fw-bold text-darkblue">
                            <i class="bi bi-dot me-1"></i>Elige el archivo:</label>
                            <br>
                            <i class="bi bi-arrow-return-right ms-4 text-indigo"></i>
                            <span class="me-2">Documento actual:</span>
                            <a class="text-indigo" href="/documentosempresa/{{ $documento->documento }}" target="blank">{{ $documento->documento }}</a>
                        <input type="file" name="documento" accept="application/pdf" class="form-control mt-3">
                         @if ($errors->has('documento'))
                            <p class="text-danger">{{ $errors->first('documento') }}</p>
                        @endif
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn fw-bold bg-lightmustard">Guardar documento</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
