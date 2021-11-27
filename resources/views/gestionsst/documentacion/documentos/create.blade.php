@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-lightmustard fw-bold fs-6">
                <span class="me-2">
                    <i class="bi bi-file-earmark-plus"></i>
                </span>
                <span>Crear documento de la empresa</span>
            </div>
            <div class="card-body">
                <form class="row g-3" action=" {{ route('documentos.store') }} " autocomplete="off" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <i class="bi bi-dot"></i>
                        <label for="titulo" class="form-label fw-bold text-darkblue">Nombre del documento:</label>
                        <input type="text" name="titulo" value="{{ old('titulo') }}" class="form-control">
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
                                <option value="{{ $tipodocumento->id }}">{{ $tipodocumento->nombre }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('tipodocumento'))
                            <p class="text-danger">{{ $errors->first('tipodocumento') }}</p>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <i class="bi bi-dot"></i>
                        <label for="descripcion" class="form-label fw-bold text-darkblue">Breve descripción del documento:</label>
                        <textarea name="descripcion" class="form-control" rows="3">{{ old('descripcion') }}</textarea>
                         @if ($errors->has('descripcion'))
                            <p class="text-danger">{{ $errors->first('descripcion') }}</p>
                        @endif
                    </div>
                    <div class="">
                        <div class="p-1 text-center fw-bold tb-brown">
                            <span class="me-3"><i class="bi bi-exclamation-diamond-fill"></i></span>
                            <span>Agregue el documento de la empresa. Solo se admiten documentos en formato PDF.</span>
                            <span class="ms-3"><i class="bi bi-exclamation-diamond-fill"></i></span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="documento" class="form-label fw-bold text-darkblue">
                            <i class="bi bi-dot me-1"></i>Elige el archivo a subir:</label>
                        <input type="file" name="documento" accept="application/pdf" class="form-control">
                         @if ($errors->has('documento'))
                            <p class="text-danger">{{ $errors->first('documento') }}</p>
                        @endif
                    </div>
                    <div class="d-grid gap-2 col-6">
                        <button type="submit" class="btn fw-bold bg-lightmustard">Guardar documento</button>
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
