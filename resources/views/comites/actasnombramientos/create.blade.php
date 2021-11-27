@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-lightmustard fw-bold fs-6">
                <span class="me-2">
                    <i class="bi bi-file-earmark-plus"></i>
                </span>
                <span>Nueva acta de nombramiento</span>
            </div>
            <div class="card-body">
                <form class="row g-3" action="{{ route('actasnombramiento.store') }}" autocomplete="off" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <label for="lider" class="form-label fw-bold text-darkblue">Líder del nombramiento:</label>
                        <select class="form-select" name="lider">
                            <option value="#">Seleccione una opción</option>
                            @foreach ($lideres as $lider)
                                <option value="{{ $lider->id }}">{{ $lider->nombre_miembro ." ". $lider->apellidos_miembro }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('lider'))
                            <p class="text-danger">{{ $errors->first('lider') }}</p>
                        @endif
                    </div>
                    <div class="col-md-3">
                        <label for="fecha_nombramiento" class="form-label fw-bold text-darkblue">Fecha del nombramiento:</label>
                        <input type="date" name="fecha_nombramiento" value="{{ old('fecha_nombramiento') }}" class="form-control">
                         @if ($errors->has('fecha_nombramiento'))
                            <p class="text-danger">{{ $errors->first('fecha_nombramiento') }}</p>
                        @endif
                    </div>
                    <div class="col-md-9">
                        <label for="titulo_nombramiento" class="form-label fw-bold text-darkblue">Título del acta:</label>
                        <input type="text" name="titulo_nombramiento" value="{{ old('titulo_nombramiento') }}" class="form-control">
                         @if ($errors->has('titulo_nombramiento'))
                            <p class="text-danger">{{ $errors->first('titulo_nombramiento') }}</p>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <label for="descripcion_nombramiento" class="form-label fw-bold text-darkblue">Breve descripción del nombramiento:</label>
                        <textarea name="descripcion_nombramiento" class="form-control" rows="3">{{ old('descripcion_nombramiento') }}</textarea>
                        @if ($errors->has('descripcion_nombramiento'))
                            <p class="text-danger">{{ $errors->first('descripcion_nombramiento') }}</p>
                        @endif
                    </div>
                    <div class="">
                        <div class="p-1 text-center fw-bold tb-brown">
                            <span class="me-3"><i class="bi bi-exclamation-diamond-fill"></i></span>
                            <span>Agregue el acta del nombramiento. Solo se admiten documentos en formato PDF.</span>
                            <span class="ms-3"><i class="bi bi-exclamation-diamond-fill"></i></span>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="acta_nombramiento" class="form-label fw-bold text-darkblue">
                            <i class="bi bi-dot me-1"></i></i>Acta del nombramiento:</label>
                        <input type="file" name="acta_nombramiento" accept="application/pdf" class="form-control">
                         @if ($errors->has('acta_nombramiento'))
                            <p class="text-danger">{{ $errors->first('acta_nombramiento') }}</p>
                        @endif
                    </div>

                    <div class="d-grid gap-2 col-6">
                        <button type="submit" class="btn fw-bold bg-lightmustard">Guardar información</button>
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
