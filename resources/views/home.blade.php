@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('')}}
                </div>
            </div>
        </div>
        <div class="col-md-12 text-center fs-3">
            <img src="{{ asset('flatplantilla.png') }}" class="img-fluid rounded-start" alt="..." style="width: 20%;">
            <div class="mt-3">Bienvenido, {{ Auth::user()->name }}.</div>
            <div>Accede a las funciones en los menús de la izquierda</div>
        </div>
    </div>
</div>
@endsection
