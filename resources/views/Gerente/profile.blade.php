@extends('layouts.sidebar')
@section('contenido')
<link rel="stylesheet" href={{ asset('gerentecss/perfil.css') }}> <!-- PARA USAR 2 PLANTILLAS CSS-->

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card card-personalizado">
                <div class="card-header">
                    <h5>Perfil de Usuario</h5>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ asset('/gerentecss/img/gerente.jpg') }}" alt="Foto de perfil" class="img-fluid perfil-img">
                    </div>
                    <div class="mt-4">
                        <h6>Nombre:</h6>
                        <p>Juan</p>
                    </div>
                    <div>
                        <h6>Correo:</h6>
                        <p>Juan@gmail.com</p>
                    </div>
                    <div>
                        <h6>Teléfono:</h6>
                        <p>69180490</p>
                    </div>
                    <div>
                        <h6>Carnet:</h6>
                        <p>11206578</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection