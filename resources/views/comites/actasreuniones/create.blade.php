@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-lightmustard fw-bold fs-6">
                <span class="me-2">
                    <i class="bi bi-file-earmark-plus"></i>
                </span>
                <span>Nueva acta de reunión</span>
            </div>
            <div class="card-body">
                <form class="row g-3" action="{{ route('actasreuniones.store') }}" autocomplete="off" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="lider" class="form-label fw-bold text-darkblue">Líder de la reunión:</label>
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
                    <div class="col-md-6">
                        <label for="fecha_reunion" class="form-label fw-bold text-darkblue">Fecha de la reunión:</label>
                        <input type="date" name="fecha_reunion" value="{{ old('fecha_reunion') }}" class="form-control">
                         @if ($errors->has('fecha_reunion'))
                            <p class="text-danger">{{ $errors->first('fecha_reunion') }}</p>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <label for="hora_inicio" class="form-label fw-bold text-darkblue">Hora de inicio:</label>
                        <input type="time" name="hora_inicio" value="{{ old('hora_inicio') }}" class="form-control">
                         @if ($errors->has('hora_inicio'))
                            <p class="text-danger">{{ $errors->first('hora_inicio') }}</p>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <label for="hora_final" class="form-label fw-bold text-darkblue">Hora de finalización:</label>
                        <input type="time" name="hora_final" value="{{ old('hora_final') }}" class="form-control">
                         @if ($errors->has('hora_final'))
                            <p class="text-danger">{{ $errors->first('hora_final') }}</p>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <label for="lugar_reunion" class="form-label fw-bold text-darkblue">Lugar:</label>
                        <input type="text" name="lugar_reunion" value="{{ old('lugar_reunion') }}" class="form-control">
                         @if ($errors->has('lugar_reunion'))
                            <p class="text-danger">{{ $errors->first('lugar_reunion') }}</p>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <label for="descripcion_reunion" class="form-label fw-bold text-darkblue">Breve descripción de las temas tratados en la reunión:</label>
                        <textarea name="descripcion_reunion" class="form-control" rows="3">{{ old('descripcion_reunion') }}</textarea>                         @if ($errors->has('descripcion_reunion'))
                            <p class="text-danger">{{ $errors->first('descripcion_reunion') }}</p>
                        @endif
                    </div>
                    <div class="">
                        <div class="p-1 text-center fw-bold tb-brown">
                            <span class="me-3"><i class="bi bi-exclamation-diamond-fill"></i></span>
                            <span>Agregue el acta de la reunión. Solo se admiten documentos en formato PDF.</span>
                            <span class="ms-3"><i class="bi bi-exclamation-diamond-fill"></i></span>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="acta_reunion" class="form-label fw-bold text-darkblue">
                            <i class="bi bi-dot me-1"></i></i>Acta de la reunión:</label>
                        <input type="file" name="acta_reunion" accept="application/pdf" class="form-control">
                         @if ($errors->has('acta_reunion'))
                            <p class="text-danger">{{ $errors->first('acta_reunion') }}</p>
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
