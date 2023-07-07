@extends('layouts/sidebar')
@section('contenido')
<link rel="stylesheet" href={{ asset('documentocss/midocumento.css') }}>

<div class="title2">
    <h1>Documentos Inmueble</h1>
</div>
<button type="button" class="btn btn-secondary btn-nuevo" data-toggle="modal" data-target="#exampleModal"
        data-whatever="@mdo">Nuevo Documento</button>
<div class="table">
    <table class="table table-dark table-striped" id="tablita">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Archivo</th>
                <th scope="col">Fecha</th>
                <th scope="col">id_inmueble</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($documentos as $documento)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $documento->descripcion }}</td>
                <td>{{ $documento->archivo }}</td>
                <td>{{ $documento->fecha }}</td>
                <td>{{ $documento->id_inmueble }}</td>
                <td>
                    <form action="#" method="POST">
                        <a href="#" class="btn btn-link" data-toggle="modal" data-target="#exampleModal2">
                            <ion-icon name="enter-outline"></ion-icon>
                        </a>
                        <button type="submit" class="btn btn-link">
                            <ion-icon name="trash-outline"></ion-icon>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- MODAL NUEVO DOCUMENTO --}}
<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Documento</h1>
            </div>
            <form class="container" method="POST" action="{{ route('registrarDocumento') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="profile-picture-container">
                        <div class="profile-picture">
                            <img src="https://www.seekpng.com/png/detail/355-3550337_png-file-male-avatar-png.png"
                                alt="Foto de perfil" id="profile-picture">
                            <label for="file-upload" class="file-upload-label">
                                <span class="upload-icon">
                                    <i class="fas fa-camera"></i>
                                </span>
                            </label>
                            <input type="file" id="file-upload" class="file-upload-input" accept="image/*">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="descripcion" class="col-form-label">Descripción:</label>
                        <input name="descripcion" type="text" class="form-control" id="descripcion" maxlength="50" required>
                    </div>
                    <div class="form-group">
                        <label for="archivo" class="col-form-label">Archivo:</label>
                        <input type="text" name="archivo" class="form-control" id="archivo">
                    </div>
                    <div class="form-group">
                        <label for="fecha" class="col-form-label">Fecha:</label>
                        <input type="date" name="fecha" class="form-control" id="fecha" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id_inmueble" value="{{ $inmueble->id }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection