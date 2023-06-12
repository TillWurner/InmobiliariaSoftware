@php
    $imagenBase = [
        'imagen' => 'https://static.wixstatic.com/media/63b041_e98452ee67e3450eb6936162bd357726~mv2_d_8333_5729_s_4_2.jpg/v1/fill/w_1000,h_688,al_c,q_85,usm_0.66_1.00_0.01/63b041_e98452ee67e3450eb6936162bd357726~mv2_d_8333_5729_s_4_2.jpg',
        'costo' => '$100000',
        'titulo' => 'Et labore consequat tempor nisi amet proident.',
        'direccion' => 'Barrio Urbari',
        'tamaño' => '820mts²',
    ];
    
    $cantidadImagenes = 8;
    $imagenes = [];
    
    for ($i = 0; $i < $cantidadImagenes; $i++) {
        $imagenes[] = $imagenBase;
    }
@endphp

@extends('layouts.sidebar')
@section('contenido')
    <link rel="stylesheet" href={{ asset('inmueble/inmueble.css') }}>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <div class="title2">
        <h1>Listado de Inmuebles</h1>
    </div>

    <button type="button" class="btn btn-secondary btn-nuevo" data-toggle="modal" data-target="#exampleModal"
        data-whatever="@mdo">Nuevo Inmueble</button>
    <div class="container">
        <div class="row">
            @foreach ($imagenes as $i => $imagen)
                <div class="col-md-3">
                    <div class="image-container">
                        <img src="{{ $imagen['imagen'] }}" width="100%" alt="Imagen" class="brillo-imagen zoom-image">
                        <div class="info1 d-flex justify-content-between">
                            <div class="titulo">Casa {{ $i + 1 }}</div>
                            <div class="bloque">
                                {{-- <div class="costo">{{ $imagen['costo'] }}</div> --}}
                                <div class="costo">En Venta</div>
                            </div>
                        </div>
                        <div class="info2 d-flex justify-content-between">
                            {{-- <div class="direccion">{{ $imagen['direccion'] }}</div>
                            <div class="bloque">
                                <div class="costo">{{ $imagen['tamaño'] }}</div>
                            </div> --}}
                            <button class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#modal{{ $loop->iteration }}">Ver</button>
                            <button class="btn btn-warning btn-sm" data-toggle="modal"
                                data-target="#modalMod{{ $loop->iteration }}">Modificar</button>
                        </div>
                    </div><br><br><br>
                </div>
                <!-- MODAL VER INMUEBLE -->
                <div class="modal fade" data-modal="{{ $loop->iteration }}" id="modal{{ $loop->iteration }}" tabindex="-1"
                    role="dialog" aria-labelledby="modalLabel{{ $loop->iteration }}" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content modal-edit">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="modalLabel{{ $loop->iteration }}">Información del Asesor
                                </h1>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form class="container" method="POST" action="#" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body show-left-only">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <hr class="hr-division">
                                            <h3 class="text-center">Foto de Perfil</h3>
                                            <hr class="hr-division">
                                            <div class="profile-picture-container text-center">
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
                                            <hr class="hr-division">
                                            <h3 class="text-center">Datos del Inmueble</h3>
                                            <hr class="hr-division">
                                            <div class="profile-info">
                                                <div class="form-group">
                                                    <label for="titulo" class="col-form-label">Propietario:</label>
                                                    <input type="text" class="form-control"
                                                        value="Propietario {{ $loop->iteration }}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Direccion:</label>
                                                    <input name="direccion" type="text" class="form-control"
                                                        id="recipient-name" value="{{ $imagen['direccion'] }}"
                                                        maxlength="20" required readonly>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="tamaño" class="col-form-label">Tamaño
                                                                (mts²)
                                                                :</label>
                                                            <input name="tamaño" type="text" class="form-control"
                                                                id="tamaño" value="{{ $imagen['tamaño'] }}"
                                                                maxlength="10" required readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="tamaño" class="col-form-label">Precio
                                                                ($us):</label>
                                                            <input name="precio" type="text" class="form-control"
                                                                id="tamaño" value="{{ $imagen['costo'] }}"
                                                                maxlength="10" required readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="titulo" class="col-form-label">Estado:</label>
                                                    <input type="text" class="form-control" value="En Venta" readonly>
                                                </div>
                                                <div class="btn-container">
                                                    <button type="button"
                                                        class="btn btn-outline-danger btn-sm btn-center">
                                                        Eliminar Inmueble</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <hr class="hr-division">
                                            <h3 class="text-center">Imagenes del Inmueble</h3>
                                            <hr class="hr-division">
                                            <div id="carouselExampleSlidesOnly" class="carousel slide"
                                                data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="{{ $imagen['imagen'] }}"
                                                            class="d-block w-100 img-smaller" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="{{ $imagen['imagen'] }}"
                                                            class="d-block w-100 img-smaller" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="{{ $imagen['imagen'] }}"
                                                            class="d-block w-100 img-smaller" alt="...">
                                                    </div>
                                                </div>
                                            </div><br>
                                            <div class="btn-container">
                                                <button type="button"
                                                    class="btn btn-outline-primary btn-sm btn-center">Ver todas
                                                    las fotos</button>
                                            </div>
                                            <hr class="hr-division">
                                            <h3 class="text-center">Asesor Asignado</h3>
                                            <hr class="hr-division">
                                            <p class="text-center">[no tiene asignado un asesor]</p>
                                            <div class="btn-container">
                                                <button type="button" class="btn btn-outline-primary btn-sm btn-center">
                                                    Asignar asesor</button>
                                                {{-- En caso que tenga asignado un asesor --}}
                                                {{-- <button type="button" class="btn btn-primary btn-sm btn-center">
                                                    Ver Asesor</button> --}}
                                            </div>
                                            <hr class="hr-division">
                                            <h3 class="text-center">Otras Opciones</h3>
                                            <hr class="hr-division">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="btn-container">
                                                        <button type="button"
                                                            class="btn btn-outline-primary btn-sm btn-center">
                                                            Documentos</button>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="btn-container">
                                                        <button type="button"
                                                            class="btn btn-outline-primary btn-sm btn-center">
                                                            Transacciones</button>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="btn-container">
                                                        <button type="button"
                                                            class="btn btn-outline-primary btn-sm btn-center">
                                                            Reportes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="modal-footer">
                                    <button id="btn-cerrar" type="button" class="btn btn-danger"
                                        data-dismiss="modal">Cerrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- MODAL MODIFICAR INMUEBLE --}}

                <div class="modal" id="modalMod{{ $loop->iteration }}" tabindex="-1" role="dialog"
                    aria-labelledby="modalModLabel{{ $loop->iteration }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="modalModLabel{{ $loop->iteration }}">Modificar Inmueble!
                                </h1>
                            </div>
                            <form class="container" method="POST" action="#" enctype="multipart/form-data">
                                @csrf
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
                                    {{-- Se implementará un buscador --}}
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Propietario:</label>
                                        <input name="propietario" type="text" class="form-control"
                                            id="recipient-name" value="Propietario1" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Direccion:</label>
                                        <input name="direccion" type="text" class="form-control" id="recipient-name"
                                            maxlength="20" value="{{ $imagen['direccion'] }}" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tamaño" class="col-form-label">Tamaño (mts²):</label>
                                                <input name="tamaño" type="text" class="form-control" id="tamaño"
                                                    maxlength="10" value="{{ $imagen['tamaño'] }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tamaño" class="col-form-label">Precio ($us):</label>
                                                <input name="precio" type="text" class="form-control" id="tamaño"
                                                    maxlength="10" value="{{ $imagen['costo'] }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="titulo" class="col-form-label">Razon:</label>
                                        <select name="razon" class="form-control" id="razon">
                                            <option value="opcion1">Selecciona una opción</option>
                                            <option value="opcion2">Venta</option>
                                            <option value="opcion3">Alquiler</option>
                                            <option value="opcion3">Anticretico</option>
                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Descripcion:</label>
                                        <textarea name="descripcion" class="form-control" id="message-text">"Magna quis irure est proident."</textarea>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-success">
                                        Guardar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="zoom-overlay">
                <img src="" alt="Imagen Ampliada">
            </div>
        </div>
    </div>

    {{-- MODAL NUEVO INMUEBLE --}}

    <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Inmueble!</h1>
                </div>
                <form class="container" method="POST" action="#" enctype="multipart/form-data">
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
                        {{-- Se implementará un buscador --}}
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Propietario:</label>
                            <input name="propietario" type="text" class="form-control" id="recipient-name" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Direccion:</label>
                            <input name="direccion" type="text" class="form-control" id="recipient-name"
                                maxlength="20" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tamaño" class="col-form-label">Tamaño (mts²):</label>
                                    <input name="tamaño" type="text" class="form-control" id="tamaño"
                                        maxlength="10" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tamaño" class="col-form-label">Precio ($us):</label>
                                    <input name="precio" type="text" class="form-control" id="tamaño"
                                        maxlength="10" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="titulo" class="col-form-label">Razon:</label>
                            <select name="razon" class="form-control" id="razon">
                                <option value="opcion1">Selecciona una opción</option>
                                <option value="opcion2">Venta</option>
                                <option value="opcion3">Alquiler</option>
                                <option value="opcion3">Anticretico</option>
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Descripcion:</label>
                            <textarea name="descripcion" class="form-control" id="message-text"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.2/jquery.modal.min.js"></script>

    <script>
        var btnModificar = document.getElementsByClassName("btn-modificar");

        for (var i = 0; i < btnModificar.length; i++) {
            btnModificar[i].addEventListener('click', function() {
                var modalNumber = this.getAttribute('data-modal');
                var direccionInput = document.querySelector('#modal' + modalNumber + ' input[name="direccion"]');
                direccionInput.removeAttribute('readonly');
            });
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const zoomImages = document.querySelectorAll('.zoom-image');
            const zoomOverlay = document.querySelector('.zoom-overlay');
            const zoomImage = zoomOverlay.querySelector('img');

            zoomImages.forEach(function(image) {
                image.addEventListener('click', function() {
                    const imageURL = this.getAttribute('src');
                    zoomImage.setAttribute('src', imageURL);
                    zoomOverlay.style.display = 'flex';
                });
            });

            zoomOverlay.addEventListener('click', function(event) {
                if (event.target === this) {
                    zoomOverlay.style.display = 'none';
                }
            });
        });
    </script>
@endsection
