@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-lightmustard fw-bold fs-6">
                <span class="me-2">
                    <i class="bi bi-pencil-square"></i>
                </span>
                <span>Editar postulación a la Brigada de Emergencia</span>
            </div>
            <div class="card-body">
                <form class="row g-3" action="{{ route('postulantesbe.update',$postulantebe->id) }}" autocomplete="off" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <label for="nombre_postulante" class="form-label fw-bold text-darkblue">Nombres:</label>
                        <input type="text" name="nombre_postulante" value="{{ $postulantebe->nombre_postulante }}" class="form-control">
                         @if ($errors->has('nombre_postulante'))
                            <p class="text-danger">{{ $errors->first('nombre_postulante') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="apellidos_postulante" class="form-label fw-bold text-darkblue">Apellidos:</label>
                        <input type="text" name="apellidos_postulante" value="{{ $postulantebe->apellidos_postulante }}" class="form-control">
                         @if ($errors->has('apellidos_postulante'))
                            <p class="text-danger">{{ $errors->first('apellidos_postulante') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="cedula_postulante" class="form-label fw-bold text-darkblue">Documento de identidad:</label>
                        <input type="text" name="cedula_postulante" value="{{ $postulantebe->cedula_postulante }}" class="form-control">
                         @if ($errors->has('cedula_postulante'))
                            <p class="text-danger">{{ $errors->first('cedula_postulante') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="telefono_postulante" class="form-label fw-bold text-darkblue">Número telefónico:</label>
                        <input type="text" name="telefono_postulante" value="{{ $postulantebe->telefono_postulante }}" class="form-control">
                         @if ($errors->has('telefono_postulante'))
                            <p class="text-danger">{{ $errors->first('telefono_postulante') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="correo_postulante" class="form-label fw-bold text-darkblue">Correo electrónico:</label>
                        <input type="text" name="correo_postulante" value="{{ $postulantebe->correo_postulante }}" class="form-control">
                         @if ($errors->has('correo_postulante'))
                            <p class="text-danger">{{ $errors->first('correo_postulante') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="area_empresa" class="form-label fw-bold text-darkblue">Área de la empresa:</label>
                        <input type="text" name="area_empresa" value="{{ $postulantebe->area_empresa }}" class="form-control">
                         @if ($errors->has('area_empresa'))
                            <p class="text-danger">{{ $errors->first('area_empresa') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="fecha_ingreso" class="form-label fw-bold text-darkblue">Fecha de ingreso a la empresa:</label>
                        <input type="date" name="fecha_ingreso" value="{{ $postulantebe->fecha_ingreso }}" class="form-control">
                         @if ($errors->has('fecha_ingreso'))
                            <p class="text-danger">{{ $errors->first('fecha_ingreso') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="experiencia_brigadas" class="form-label fw-bold text-darkblue">¿El postulante tiene experiencia en brigadas de emergencia?</label>
                        <div class="mt-1 mx-3">
                            <input type="radio" name="experiencia_brigadas" value="si" class="form-check-input" @if ($postulantebe->experiencia_brigadas === "Sí") checked='checked' @endif>
                            <label for="si" class="form-check-label">Sí</label>
                            <input type="radio" name="experiencia_brigadas" value="no" class="form-check-input" @if ($postulantebe->experiencia_brigadas === "No") checked='checked' @endif>
                            <label for="no" class="form-check-label">No</label>
                        </div>
                        @if ($errors->has('experiencia_brigadas'))
                            <p class="text-danger">{{ $errors->first('experiencia_brigadas') }}</p>
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
                        <label for="hdv_postulante" class="form-label fw-bold text-darkblue">
                            <i class="bi bi-dot me-1"></i></i>Hoja de vida:</label>
                            <br>
                            <i class="bi bi-arrow-return-right ms-4 text-indigo"></i>
                            <a class="text-indigo" href="/comites/postulantesbe/{{ $postulantebe->hdv_postulante }}" target="blank">Hoja de vida</a>
                        <input type="file" name="hdv_postulante" accept="application/pdf" class="form-control mt-3">
                         @if ($errors->has('hdv_postulante'))
                            <p class="text-danger">{{ $errors->first('hdv_postulante') }}</p>
                        @endif
                    </div>

                    <div class="d-grid gap-2 col-6">
                        <button type="submit" class="btn fw-bold bg-lightmustard">Guardar empleado</button>
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
