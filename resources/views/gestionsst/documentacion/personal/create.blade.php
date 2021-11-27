@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-lightmustard fw-bold fs-6">
                <span class="me-2">
                    <i class="bi bi-person-plus-fill"></i>
                </span>
                <span>Crear personal del SG-SST</span>
            </div>
            <div class="card-body">
                <form class="row g-3" action=" {{ route('personal.store') }} " autocomplete="off" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="nombre_empleado" class="form-label fw-bold text-darkblue">Nombres:</label>
                        <input type="text" name="nombre_empleado" value="{{ old('nombre_empleado') }}" class="form-control">
                         @if ($errors->has('nombre_empleado'))
                            <p class="text-danger">{{ $errors->first('nombre_empleado') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="apellidos_empleado" class="form-label fw-bold text-darkblue">Apellidos:</label>
                        <input type="text" name="apellidos_empleado" value="{{ old('apellidos_empleado') }}" class="form-control">
                         @if ($errors->has('apellidos_empleado'))
                            <p class="text-danger">{{ $errors->first('apellidos_empleado') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="documento_identidad" class="form-label fw-bold text-darkblue">Documento de identidad:</label>
                        <input type="text" name="documento_identidad" value="{{ old('documento_identidad') }}" class="form-control">
                         @if ($errors->has('documento_identidad'))
                            <p class="text-danger">{{ $errors->first('documento_identidad') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="nivel_estudio" class="form-label fw-bold text-darkblue">Nivel de estudios:</label>
                        <select class="form-select" name="nivel_estudio">
                            <option value="#">Seleccione una opción</option>
                            @foreach ($niveles_estudio as $nivel_estudio)
                                <option value="{{ $nivel_estudio->id }}">{{ $nivel_estudio->nombre }}</option>
                            @endforeach
                        </select>
                         @if ($errors->has('nivel_estudio'))
                            <p class="text-danger">{{ $errors->first('nivel_estudio') }}</p>
                        @endif
                    </div>

                    <div class="">
                        <div class="p-1 text-center fw-bold tb-brown">
                            <span class="me-3"><i class="bi bi-exclamation-diamond-fill"></i></span>
                            <span>Agregue los siguientes documentos del empleado. Solo se admiten documentos en formato PDF.</span>
                            <span class="ms-3"><i class="bi bi-exclamation-diamond-fill"></i></span>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="hdv" class="form-label fw-bold text-darkblue">
                            <i class="bi bi-dot me-1"></i></i>Hoja de vida:</label>
                        <input type="file" name="hdv" accept="application/pdf" class="form-control">
                         @if ($errors->has('hdv'))
                            <p class="text-danger">{{ $errors->first('hdv') }}</p>
                        @endif
                    </div>

                    <div class="col-md-12">
                        <label for="diploma" class="form-label fw-bold text-darkblue">
                            <i class="bi bi-dot me-1"></i>Diploma de estudios:</label>
                        <input type="file" name="diploma" accept="application/pdf" class="form-control">
                         @if ($errors->has('diploma'))
                            <p class="text-danger">{{ $errors->first('diploma') }}</p>
                        @endif
                    </div>

                    <div class="col-md-12">
                        <label for="certisalud" class="form-label fw-bold text-darkblue">
                            <i class="bi bi-dot me-1"></i>Certificado Seccional de Salud:</label>
                        <input type="file" name="certisalud" accept="application/pdf" class="form-control">
                         @if ($errors->has('certisalud'))
                            <p class="text-danger">{{ $errors->first('certisalud') }}</p>
                        @endif
                    </div>

                    <div class="col-md-12">
                        <label for="curso50h" class="form-label fw-bold text-darkblue">
                            <i class="bi bi-dot me-1"></i>Certificado Curso 50 horas:</label>
                        <input type="file" name="curso50h" accept="application/pdf" class="form-control">
                         @if ($errors->has('curso50h'))
                            <p class="text-danger">{{ $errors->first('curso50h') }}</p>
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
