@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-lightmustard fw-bold fs-6">
                <span class="me-2">
                    <i class="bi bi-pencil-square"></i>
                </span>
                <span>Editar personal SG-SST</span>
            </div>
            <div class="card-body">
                <form class="row g-3" action=" {{ route('personal.update', $empleado->id) }} " autocomplete="off" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <label for="nombre_empleado" class="form-label fw-bold text-darkblue">Nombres:</label>
                        <input type="text" name="nombre_empleado" value="{{ $empleado->nombre_empleado }}" class="form-control">
                         @if ($errors->has('nombre_empleado'))
                            <p class="text-danger">{{ $errors->first('nombre_empleado') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="apellidos_empleado" class="form-label fw-bold text-darkblue">Apellidos:</label>
                        <input type="text" name="apellidos_empleado" value="{{ $empleado->apellidos_empleado }}" class="form-control">
                         @if ($errors->has('apellidos_empleado'))
                            <p class="text-danger">{{ $errors->first('apellidos_empleado') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="documento_identidad" class="form-label fw-bold text-darkblue">Documento de identidad:</label>
                        <input type="text" name="documento_identidad" value="{{ $empleado->documento_identidad }}" class="form-control">
                         @if ($errors->has('documento_identidad'))
                            <p class="text-danger">{{ $errors->first('documento_identidad') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="nivel_estudio" class="form-label fw-bold text-darkblue">Nivel de estudios:</label>
                        <select class="form-select" name="nivel_estudio">
                            <option value="#">Seleccione una opción</option>
                            @foreach ($niveles_estudio as $nivel_estudio)
                                <option value="{{ $nivel_estudio->id }}" @if ($empleado->nivelestudio->nombre === $nivel_estudio->nombre) selected='selected' @endif>{{ $nivel_estudio->nombre }}</option>
                            @endforeach
                        </select>
                         @if ($errors->has('nivel_estudio'))
                            <p class="text-danger">{{ $errors->first('nivel_estudio') }}</p>
                        @endif
                    </div>

                    <div class="">
                        <div class="p-1 text-center fw-bold tb-brown">
                            <span class="me-3"><i class="bi bi-exclamation-diamond-fill"></i></span>
                            <span>En caso de que deba actualizar uno de los siguientes documentos, tenga en cuenta que solo se admiten documentos en formato PDF.</span>
                            <span class="ms-3"><i class="bi bi-exclamation-diamond-fill"></i></span>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="hdv" class="form-label fw-bold text-darkblue">
                            <i class="bi bi-dot me-1"></i></i>Hoja de vida:</label>
                            <br>
                            <i class="bi bi-arrow-return-right ms-4 text-indigo"></i>
                            <a class="text-indigo" href="/documentosempleados/{{ $empleado->hdv }}" target="blank">Hoja de vida del empleado</a>
                        <input type="file" name="hdv" accept="application/pdf" class="form-control mt-3">
                         @if ($errors->has('hdv'))
                            <p class="text-danger">{{ $errors->first('hdv') }}</p>
                        @endif
                    </div>

                    <div class="col-md-12">
                        <label for="diploma" class="form-label fw-bold text-darkblue">
                            <i class="bi bi-dot me-1"></i>Diploma de estudios:</label>
                            <br>
                            <i class="bi bi-arrow-return-right ms-4 text-indigo"></i>
                            <a class="text-indigo" href="/documentosempleados/{{ $empleado->diploma }}" target="blank">Diploma de estudios del empleado</a>
                        <input type="file" name="diploma" accept="application/pdf" class="form-control mt-3">
                         @if ($errors->has('diploma'))
                            <p class="text-danger">{{ $errors->first('diploma') }}</p>
                        @endif
                    </div>

                    <div class="col-md-12">
                        <label for="certisalud" class="form-label fw-bold text-darkblue">
                            <i class="bi bi-dot me-1"></i>Certificado Seccional de Salud:</label>
                            <br>
                            <i class="bi bi-arrow-return-right ms-4 text-indigo"></i>
                            <a class="text-indigo" href="/documentosempleados/{{ $empleado->certisalud }}" target="blank">Certificado de Salud del empleado</a>
                        <input type="file" name="certisalud" accept="application/pdf" class="form-control mt-3">
                         @if ($errors->has('certisalud'))
                            <p class="text-danger">{{ $errors->first('certisalud') }}</p>
                        @endif
                    </div>

                    <div class="col-md-12">
                        <label for="curso50h" class="form-label fw-bold text-darkblue">
                            <i class="bi bi-dot me-1"></i>Certificado Curso 50 horas:</label>
                            <br>
                            <i class="bi bi-arrow-return-right ms-4 text-indigo"></i>
                            <a class="text-indigo" href="/documentosempleados/{{ $empleado->curso50h }}" target="blank">Certificado Curso de 50 horas del empleado</a>
                        <input type="file" name="curso50h" accept="application/pdf" class="form-control mt-3">
                         @if ($errors->has('curso50h'))
                            <p class="text-danger">{{ $errors->first('curso50h') }}</p>
                        @endif
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn fw-bold bg-lightmustard">Actualizar información del usuario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
