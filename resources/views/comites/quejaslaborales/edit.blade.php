@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-lightmustard fw-bold fs-6">
                <span class="me-2">
                    <i class="bi bi-pencil-square"></i>
                </span>
                <span>Editar queja laboral</span>
            </div>
            <div class="card-body">
                <form class="row g-3" action="{{ route('quejaslaborales.update',$quejalaboral->id) }}" autocomplete="off" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <label for="nombre_empleado" class="form-label fw-bold text-darkblue">Nombres:</label>
                        <input type="text" name="nombre_empleado" value="{{ $quejalaboral->nombre_empleado }}" class="form-control">
                         @if ($errors->has('nombre_empleado'))
                            <p class="text-danger">{{ $errors->first('nombre_empleado') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="apellidos_empleado" class="form-label fw-bold text-darkblue">Apellidos:</label>
                        <input type="text" name="apellidos_empleado" value="{{ $quejalaboral->apellidos_empleado }}" class="form-control">
                         @if ($errors->has('apellidos_empleado'))
                            <p class="text-danger">{{ $errors->first('apellidos_empleado') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="cedula_empleado" class="form-label fw-bold text-darkblue">Documento de identidad:</label>
                        <input type="text" name="cedula_empleado" value="{{ $quejalaboral->cedula_empleado }}" class="form-control">
                         @if ($errors->has('cedula_empleado'))
                            <p class="text-danger">{{ $errors->first('cedula_empleado') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="telefono_empleado" class="form-label fw-bold text-darkblue">Número telefónico:</label>
                        <input type="text" name="telefono_empleado" value="{{ $quejalaboral->telefono_empleado }}" class="form-control">
                         @if ($errors->has('telefono_empleado'))
                            <p class="text-danger">{{ $errors->first('telefono_empleado') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="correo_empleado" class="form-label fw-bold text-darkblue">Correo electrónico:</label>
                        <input type="text" name="correo_empleado" value="{{ $quejalaboral->correo_empleado }}" class="form-control">
                         @if ($errors->has('correo_empleado'))
                            <p class="text-danger">{{ $errors->first('correo_empleado') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="area_empresa" class="form-label fw-bold text-darkblue">Área de la empresa:</label>
                        <input type="text" name="area_empresa" value="{{ $quejalaboral->area_empresa }}" class="form-control">
                         @if ($errors->has('area_empresa'))
                            <p class="text-danger">{{ $errors->first('area_empresa') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="cargo_empleado" class="form-label fw-bold text-darkblue">Cargo del empleado:</label>
                        <input type="text" name="cargo_empleado" value="{{ $quejalaboral->cargo_empleado }}" class="form-control">
                         @if ($errors->has('cargo_empleado'))
                            <p class="text-danger">{{ $errors->first('cargo_empleado') }}</p>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="fecha_diligenciamiento" class="form-label fw-bold text-darkblue">Fecha de diligienciamiento de la queja laboral:</label>
                        <input type="date" name="fecha_diligenciamiento" value="{{ $quejalaboral->fecha_diligenciamiento }}" class="form-control">
                         @if ($errors->has('fecha_diligenciamiento'))
                            <p class="text-danger">{{ $errors->first('fecha_diligenciamiento') }}</p>
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
                        <label for="queja_laboral" class="form-label fw-bold text-darkblue">
                            <i class="bi bi-dot me-1"></i></i>Queja laboral:</label>
                            <br>
                            <i class="bi bi-arrow-return-right ms-4 text-indigo"></i>
                            <a class="text-indigo" href="/comites/quejaslaborales/{{ $quejalaboral->queja_laboral }}" target="blank">Queja laboral</a>
                        <input type="file" name="queja_laboral" accept="application/pdf" class="form-control mt-3">
                         @if ($errors->has('queja_laboral'))
                            <p class="text-danger">{{ $errors->first('queja_laboral') }}</p>
                        @endif
                    </div>

                    <div class="d-grid gap-2 col-6">
                        <button type="submit" class="btn fw-bold bg-lightmustard">Actualizar información</button>
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
