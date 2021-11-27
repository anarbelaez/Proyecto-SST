@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-lightmustard fw-bold fs-6">
                <span class="me-2">
                    <i class="bi bi-pencil-square"></i>
                </span>
                <span>Editar acta de votación</span>
            </div>
            <div class="card-body">
                <form class="row g-3" action="{{ route('actasvotacion.update',$actavotacion->id)}}" autocomplete="off" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <label for="fecha_votacion" class="form-label fw-bold text-darkblue">Fecha de la votación:</label>
                        <input type="date" name="fecha_votacion" value="{{ $actavotacion->fecha_votacion }}" class="form-control">
                         @if ($errors->has('fecha_votacion'))
                            <p class="text-danger">{{ $errors->first('fecha_votacion') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="lugar_votacion" class="form-label fw-bold text-darkblue">Lugar en donde se realizó:</label>
                        <input type="text" name="lugar_votacion" value="{{ $actavotacion->lugar_votacion }}" class="form-control">
                         @if ($errors->has('lugar_votacion'))
                            <p class="text-danger">{{ $errors->first('lugar_votacion') }}</p>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <label for="objetivo_votacion" class="form-label fw-bold text-darkblue">¿Cuál fue el objetivo de la votación?</label>
                        <input type="text" name="objetivo_votacion" value="{{ $actavotacion->objetivo_votacion }}" class="form-control">
                         @if ($errors->has('objetivo_votacion'))
                            <p class="text-danger">{{ $errors->first('objetivo_votacion') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="votos" class="form-label fw-bold text-darkblue">Número de votos:</label>
                        <input type="text" name="votos" value="{{ $actavotacion->votos }}" class="form-control">
                         @if ($errors->has('votos'))
                            <p class="text-danger">{{ $errors->first('votos') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="votos_blanco" class="form-label fw-bold text-darkblue">Número de votos en blanco:</label>
                        <input type="text" name="votos_blanco" value="{{ $actavotacion->votos_blanco }}" class="form-control">
                         @if ($errors->has('votos_blanco'))
                            <p class="text-danger">{{ $errors->first('votos_blanco') }}</p>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <label for="descripcion_votacion" class="form-label fw-bold text-darkblue">Describa brevemente los resultados de la votación:</label>
                        <textarea name="descripcion_votacion" class="form-control" rows="3">{{ $actavotacion->descripcion_votacion }}</textarea>
                        @if ($errors->has('descripcion_votacion'))
                            <p class="text-danger">{{ $errors->first('descripcion_votacion') }}</p>
                        @endif
                    </div>
                    <div class="">
                        <div class="p-1 text-center fw-bold tb-brown">
                            <span class="me-3"><i class="bi bi-exclamation-diamond-fill"></i></span>
                            <span>En caso de que deba actualizar el acta de la reunión, tenga en cuenta que solo se admiten documentos en formato PDF.</span>
                            <span class="ms-3"><i class="bi bi-exclamation-diamond-fill"></i></span>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="acta_votacion" class="form-label fw-bold text-darkblue">
                            <i class="bi bi-dot me-1"></i></i>Acta de la votación:</label>
                            <br>
                            <i class="bi bi-arrow-return-right ms-4 text-indigo"></i>
                            <a class="text-indigo" href="/comites/actasvotaciones/{{ $actavotacion->acta_votacion }}" target="blank">Acta de la votación</a>
                        <input type="file" name="acta_votacion" accept="application/pdf" class="form-control mt-3">
                         @if ($errors->has('acta_votacion'))
                            <p class="text-danger">{{ $errors->first('acta_votacion') }}</p>
                        @endif
                    </div>

                    <div class="d-grid gap-2 col-12">
                        <button type="submit" class="btn fw-bold bg-lightmustard">Actualizar información</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
