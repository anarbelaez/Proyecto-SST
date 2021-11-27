@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-lightmustard fw-bold fs-6">
                <span class="me-2">
                    <i class="bi bi-pencil-square"></i>
                </span>
                <span>Editar proveedor</span>
            </div>
            <div class="card-body">
                <form class="row g-3" action=" {{ route('aliados.update', $proveedor->id) }} " autocomplete="off" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <label for="nombre_proveedor" class="form-label fw-bold text-darkblue">Nombre del proveedor:</label>
                        <input type="text" name="nombre_proveedor" value="{{ $proveedor->nombre_proveedor }}" class="form-control">
                         @if ($errors->has('nombre_proveedor'))
                            <p class="text-danger">{{ $errors->first('nombre_proveedor') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="nit" class="form-label fw-bold text-darkblue">Número de identificación tributaria - NIT:</label>
                        <input type="text" name="nit" value="{{ $proveedor->nit }}" class="form-control">
                         @if ($errors->has('nit'))
                            <p class="text-danger">{{ $errors->first('nit') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="arl" class="form-label fw-bold text-darkblue">Administradora de Riesgos Laborales - ARL:</label>
                        <input type="text" name="arl" value="{{ $proveedor->arl }}" class="form-control">
                         @if ($errors->has('arl'))
                            <p class="text-danger">{{ $errors->first('arl') }}</p>
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
                        <label for="certificado_arl" class="form-label fw-bold text-darkblue">
                            <i class="bi bi-dot me-1"></i></i>Certificado ARL:</label>
                            <br>
                            <i class="bi bi-arrow-return-right ms-4 text-indigo"></i>
                            <span>Documento actual:</span>
                            <a class="text-indigo" href="/documentosproveedores/{{ $proveedor->certificado_arl }}" target="blank">Certificado ARL</a>
                        <input type="file" name="certificado_arl" accept="application/pdf" class="form-control mt-3">
                         @if ($errors->has('certificado_arl'))
                            <p class="text-danger">{{ $errors->first('certificado_arl') }}</p>
                        @endif
                    </div>

                    <div class="col-md-12">
                        <label for="seguridad_social" class="form-label fw-bold text-darkblue">
                            <i class="bi bi-dot me-1"></i>Seguridad social:</label>
                            <br>
                            <i class="bi bi-arrow-return-right ms-4 text-indigo"></i>
                            <span>Documento actual:</span>
                            <a class="text-indigo" href="/documentosproveedores/{{ $proveedor->seguridad_salud }}" target="blank">Seguridad Social</a>
                        <input type="file" name="seguridad_social" accept="application/pdf" class="form-control mt-3">
                         @if ($errors->has('seguridad_social'))
                            <p class="text-danger">{{ $errors->first('seguridad_social') }}</p>
                        @endif
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn fw-bold bg-lightmustard">Actualizar información del proveedor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
