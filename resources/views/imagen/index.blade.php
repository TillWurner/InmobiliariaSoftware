@extends('layouts.sidebar')
@section('contenido')
    @php
        $imagenBase = 'https://static.wixstatic.com/media/63b041_e98452ee67e3450eb6936162bd357726~mv2_d_8333_5729_s_4_2.jpg/v1/fill/w_1000,h_688,al_c,q_85,usm_0.66_1.00_0.01/63b041_e98452ee67e3450eb6936162bd357726~mv2_d_8333_5729_s_4_2.jpg';
    @endphp

    <link rel="stylesheet" href={{ asset('imagen/imagen.css') }}>
    <div class="title2">
        <h1>Imagenes del Inmueble</h1>
    </div>

    <button type="button" class="btn btn-secondary btn-nuevo" data-toggle="modal" data-target="#exampleModal"
        data-whatever="@mdo">Agregar Imagen</button>
    <div class="container scrollable-container">
        <div class="row">
            @if (!$imagenes->isEmpty())
                @foreach ($imagenes as $i => $imagen)
                    <div class="col-md-4">
                        <div class="image-container">
                            @if ($imagen->imagen === null)
                                <img src="{{ $imagenBase }}" width="100%" alt="Imagen"
                                    class="brillo-imagen zoom-image">
                            @else
                                <img src="{{ $imagen->imagen }}" width="100%" alt="Imagen"
                                    class="brillo-imagen zoom-image">
                            @endif
                            <div class="info1 d-flex justify-content-between">
                                <div style="clear: both;">
                                    <div class="titulo">Imagen {{ $imagen->id }}</div>
                                    <div class="descripcion">{{ $imagen->descripcion }}</div>
                                </div>
                            </div>
                            <div class="info2 d-flex justify-content-between">
                                <button class="btn btn-warning btn-sm" data-toggle="modal"
                                    data-target="#modalMod{{ $loop->iteration }}">Modificar</button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#modalMod{{ $loop->iteration }}">Eliminar</button>
                            </div>
                        </div><br><br><br>
                    </div>

                    {{-- MODAL MODIFICAR INMUEBLE --}}

                    <div class="modal" id="modalMod{{ $loop->iteration }}" tabindex="-1" role="dialog"
                        aria-labelledby="modalModLabel{{ $loop->iteration }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalModLabel{{ $loop->iteration }}">Modificar Imagen!
                                    </h1>
                                </div>
                                <form class="container" method="POST" action="{{ route('modificarImagen', $imagen->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="profile-picture-container">
                                            <div class="profile-picture">
                                                <img src="https://cdn-icons-png.flaticon.com/512/9073/9073032.png"
                                                    alt="Foto de perfil" id="profile-picture">
                                                <label for="file-upload" class="file-upload-label">
                                                    <span class="upload-icon">
                                                        <i class="fas fa-camera"></i>
                                                    </span>
                                                </label>
                                                <input type="file" id="file-upload" class="file-upload-input"
                                                    accept="image/*">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group text-center">
                                            <label for="recipient-name" class="col-form-label"
                                                style="font-weight: bold;">Descripcion:</label>
                                            <div style="display: flex; justify-content: center;">
                                                <input name="descripcion" style="width: 50%" type="text"
                                                    class="form-control" id="recipient-name"
                                                    value="{{ $imagen->descripcion }}" required>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">
                                            Guardar
                                        </button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="zoom-overlay">
                    <img src="" alt="Imagen Ampliada">
                </div>
            @else
                <div style="color: white; font-size: 50px; margin-top: 90px">
                    NO HAY IMAGENES SUBIDAS !!!
                </div>
            @endif
        </div>
    </div>

    {{-- MODAL NUEVO INMUEBLE --}}

    <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Imagen!</h1>
                </div>
                <form class="container" method="POST" action="{{ route('registrarImagen', $id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="profile-picture-container">
                            <div class="profile-picture">
                                <img src="https://cdn-icons-png.flaticon.com/512/9073/9073032.png" alt="Foto de perfil"
                                    id="profile-picture">
                                <label for="file-upload" class="file-upload-label">
                                    <span class="upload-icon">
                                        <i class="fas fa-camera"></i>
                                    </span>
                                </label>
                                <input type="file" id="file-upload" class="file-upload-input" accept="image/*">
                            </div>
                        </div>
                        <br>
                        <div class="form-group text-center">
                            <label for="recipient-name" class="col-form-label"
                                style="font-weight: bold;">Descripcion:</label>
                            <div style="display: flex; justify-content: center;">
                                <input name="descripcion" style="width: 50%" type="text" class="form-control"
                                    id="recipient-name" value="" required>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">
                            Guardar
                        </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
