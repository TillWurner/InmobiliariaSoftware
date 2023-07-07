@extends('layouts.sidebar')
@section('contenido')
    @php
        $inmuebleBase = 'https://static.wixstatic.com/media/63b041_e98452ee67e3450eb6936162bd357726~mv2_d_8333_5729_s_4_2.jpg/v1/fill/w_1000,h_688,al_c,q_85,usm_0.66_1.00_0.01/63b041_e98452ee67e3450eb6936162bd357726~mv2_d_8333_5729_s_4_2.jpg';
    @endphp

    <link rel="stylesheet" href={{ asset('inmueble/inmueble.css') }}>
    <div class="title2">
        <h1>Listado de Inmuebles</h1>
    </div>

    <button type="button" class="btn btn-secondary btn-nuevo" data-toggle="modal" data-target="#exampleModal"
        data-whatever="@mdo">Nuevo Inmueble</button>
    <div class="container">
        <div class="row">
            @foreach ($inmuebles as $i => $inmueble)
                <div class="col-md-4">
                    <div class="image-container">
                        <img src="{{ $inmuebleBase }}" width="100%" alt="Imagen" class="brillo-inmueble zoom-image">
                        <div class="info1 d-flex justify-content-between">
                            <div style="clear: both;">
                                <div class="titulo">Casa {{ $i + 1 }}</div>
                                <div class="titulo">En {{ $inmueble->razon }}</div>
                            </div>

                            <div class="bloque">
                                <div class="costo">{{ $inmueble->precio }} $us</div>
                                <div>{{ $inmueble->direccion }}</div>
                            </div>
                        </div>
                        <div class="info2 d-flex justify-content-between">
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
                                <h1 class="modal-title fs-5" id="modalLabel{{ $loop->iteration }}">Información del Inmueble
                                </h1>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>


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
                                            </div>
                                        </div>
                                        <hr class="hr-division">
                                        <h3 class="text-center">Datos del Inmueble</h3>
                                        <hr class="hr-division">
                                        <div class="profile-info">
                                            <div class="form-group form-group-edit">
                                                <label for="titulo" class="col-form-label">Propietario:</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $inmueble->propietario->nombre }}" readonly>
                                            </div>
                                            <div class="form-group form-group-edit">
                                                <label for="recipient-name" class="col-form-label">Direccion:</label>
                                                <input name="direccion" type="text" class="form-control"
                                                    id="recipient-name" value="{{ $inmueble->direccion }}" maxlength="20"
                                                    required readonly>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-edit">
                                                        <label for="tamaño" class="col-form-label">Tamaño
                                                            (mts²)
                                                            :</label>
                                                        <input name="tamaño" type="text" class="form-control"
                                                            id="tamaño" value="{{ $inmueble->tamano }}" maxlength="10"
                                                            required readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-edit">
                                                        <label for="tamaño" class="col-form-label">Precio
                                                            ($us):</label>
                                                        <input name="precio" type="text" class="form-control"
                                                            id="tamaño" value="{{ $inmueble->precio }}" maxlength="10"
                                                            required readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-group-edit">
                                                <label for="estado" class="col-form-label">Estado:</label>
                                                <input type="text" class="form-control"
                                                    value="En {{ $inmueble->razon }}" readonly>
                                            </div>
                                            <div class="form-group form-group-edit">
                                                <label for="descripcion" class="col-form-label">Descripcion:</label>
                                                <textarea type="text" class="form-control" rows="2" readonly>{{ $inmueble->descripcion }}
                                                    </textarea>
                                            </div><br>
                                            <form class="container" method="POST"
                                                action="{{ route('eliminarInmueble', $inmueble->id) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="btn-container">
                                                    <button type="submit" class="btn btn-danger btn-sm btn-center">
                                                        Eliminar Inmueble</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <hr class="hr-division">
                                        <h3 class="text-center">Imagenes del Inmueble</h3>
                                        <hr class="hr-division">
                                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="{{ $inmuebleBase }}" class="d-block w-100 img-smaller"
                                                        alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="{{ $inmuebleBase }}" class="d-block w-100 img-smaller"
                                                        alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="{{ $inmuebleBase }}" class="d-block w-100 img-smaller"
                                                        alt="...">
                                                </div>
                                            </div>
                                        </div><br>
                                        <div class="btn-container">
                                            <button type="button" class="btn btn-primary btn-sm btn-center">Ver todas
                                                las fotos</button>
                                        </div>
                                        <hr class="hr-division">

                                        @if ($inmueble->id_asesor == null)
                                            <h6 class="text-center no-asesor">[no tiene asignado un asesor]</h6>
                                            <div class="btn-container">
                                                <button type="button"
                                                    class="btn btn-primary btn-sm btn-center btn-asignar">
                                                    Asignar asesor
                                                </button>
                                            </div>
                                            <h6 class="text-center escoger-asesor" style="display: none;">Escoge un asesor
                                                para este inmueble</h6>
                                            <form method="POST" action="{{ route('asignarAsesor', $inmueble->id) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group asignar-asesor" style="display: none;">
                                                    <input name="asesor" type="text"
                                                        class="form-control input-asesor"
                                                        style="width: 50%; margin: 0 auto;" required>
                                                    <select name="id_asesor" class="form-control id_asesor"
                                                        style="display: none; width: 50%; margin: 0 auto;"></select>
                                                </div>

                                                <div class="btn-container asignar-asesor" style="display: none;">
                                                    <button type="submit"
                                                        class="btn btn-success btn-sm btn-aceptar-asesor">Aceptar</button>
                                                    <button type="button"
                                                        class="btn btn-danger btn-sm btn-cancelar-asesor">Cancelar</button>
                                                </div>
                                            </form>
                                        @else
                                            <h5 class="text-center">Asesor Asignado</h5>
                                            <hr class="hr-division">
                                            <p class="text-center" style="color: black; font-family: bold">
                                                {{ $inmueble->asesor->nombre }}
                                            </p>
                                            <div class="btn-container">
                                                <a type="button" href="/asesores?x={{ $inmueble->asesor->id }}"
                                                    class="btn btn-primary btn-sm btn-center">
                                                    Ver Asesor</a>
                                            </div>
                                        @endif

                                        <hr class="hr-division">
                                        <h5 class="text-center">Otras Opciones</h5>
                                        <hr class="hr-division">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-container">
                                                    <button type="button" class="btn btn-primary btn-sm btn-center">
                                                        Ver Documentos</button>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="btn-container">
                                                    <a type="button" href="#"
                                                        class="btn btn-primary btn-sm btn-center">
                                                        Ver Transacciones</a>
                                                </div>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-container">
                                                    <a type="button" href="/documentos?x={{ $inmueble->id }}"
                                                        class="btn btn-primary btn-sm btn-center">
                                                        Agregar Documento</a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="btn-container">
                                                    <a type="button" href="/transacciones?x={{ $inmueble->id }}"
                                                        class="btn btn-primary btn-sm btn-center">
                                                        Iniciar Nueva Transaccion</a>
                                                </div>
                                            </div><br>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-container">
                                                    <a type="button" href="/reportes?x={{ $inmueble->id }}"
                                                        class="btn btn-primary btn-sm btn-center">
                                                        Agregar Reporte</a>
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
                            <form class="container" method="POST"
                                action="{{ route('modificarInmueble', $inmueble->id) }}" enctype="multipart/form-data">
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
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Propietario:</label>
                                        <input name="propietario" type="text" class="form-control"
                                            id="recipient-name" value="{{ $inmueble->propietario->nombre }}" required
                                            readonly>
                                        <select id="propietarios-list" class="form-control"
                                            style="display: none;"></select>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Direccion:</label>
                                        <input name="direccion" type="text" class="form-control" id="recipient-name"
                                            maxlength="20" value="{{ $inmueble->direccion }}" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tamaño" class="col-form-label">Tamaño (mts²):</label>
                                                <input name="tamano" type="text" class="form-control" id="tamaño"
                                                    maxlength="10" value="{{ $inmueble->tamano }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tamaño" class="col-form-label">Precio ($us):</label>
                                                <input name="precio" type="text" class="form-control" id="tamaño"
                                                    maxlength="10" value="{{ $inmueble->precio }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="titulo" class="col-form-label">Razon:</label>
                                        <select name="razon" class="form-control" id="razon">
                                            @if ($inmueble->razon == 'venta')
                                                <option value="venta">Venta</option>
                                                <option value="alquiler">Alquiler</option>
                                                <option value="anticretico">Anticretico</option>
                                            @elseif ($inmueble->razon == 'alquiler')
                                                <option value="alquiler">Alquiler</option>
                                                <option value="venta">Venta</option>
                                                <option value="anticretico">Anticretico</option>
                                            @else
                                                <option value="anticretico">Anticretico</option>
                                                <option value="alquiler">Alquiler</option>
                                                <option value="venta">Venta</option>
                                            @endif

                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Descripcion:</label>
                                        <textarea name="descripcion" class="form-control" id="message-text">{{ $inmueble->descripcion }}</textarea>
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
                <form class="container" method="POST" action="{{ route('registrarInmueble') }}"
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
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Propietario:</label>
                            <input name="propietario" type="text" class="form-control" id="input-propietario"
                                required>
                            <select name="id_propietario" id="id_propietario" class="form-control"
                                style="display: none"></select>
                            </select>
                        </div>
                        <div class="form-group">

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
                                    <input name="tamano" type="text" class="form-control" id="tamaño"
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
                                <option value="venta">Venta</option>
                                <option value="alquiler">Alquiler</option>
                                <option value="anticretico">Anticretico</option>
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Descripcion:</label>
                            <textarea name="descripcion" class="form-control" id="message-text"></textarea>
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

    {{-- Busca los propietarios --}}
    <script>
        $(document).ready(function() {
            $('#input-propietario').on('input', function() {
                var searchTerm = $(this).val();
                $.ajax({
                    url: '{{ route('buscar-propietarios') }}',
                    type: 'GET',
                    data: {
                        search: searchTerm
                    },
                    success: function(response) {
                        var select = $('#id_propietario');
                        select.empty();

                        if (response.length > 0) {
                            $.each(response, function(key, value) {
                                select.append('<option value="' + value.id + '">' +
                                    value.nombre + '</option>');
                            });
                            select.show();
                        } else {
                            select.hide();
                        }
                    }

                });
            });
        });
    </script>

    {{-- Fix para el componente select --}}
    <script>
        var select = document.getElementById('id_propietario');
        var inputPropietario = document.getElementById('input-propietario');

        select.addEventListener('change', function() {

            var selectedOption = select.options[select.selectedIndex];

            var selectedText = selectedOption.text;

            inputPropietario.value = selectedText;

            select.style.display = 'none';
        });

        inputPropietario.addEventListener('click', function() {
            if (inputPropietario.value === '') {
                select.style.display = 'none';
            } else if (select.options.length > 1) {
                select.style.display = 'block';
            } else {
                select.selectedIndex = 0;

                var selectedText = select.options[0].text;

                inputPropietario.value = selectedText;

                select.style.display = 'none';
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.btn-asignar').click(function() {
                $('.no-asesor').hide();
                $('.btn-asignar').hide();
                $('.asignar-asesor').show();
                $('.escoger-asesor').show();
            });
            $('.btn-cancelar-asesor').click(function() {
                $('.no-asesor').show();
                $('.btn-asignar').show();
                $('.asignar-asesor').hide();
                $('.escoger-asesor').hide();
            });
        });
    </script>

    {{-- Busca los asesores --}}
    <script>
        $(document).ready(function() {
            $('.input-asesor').on('input', function() {
                var searchTerm = $(this).val();
                $.ajax({
                    url: '{{ route('buscar-asesores') }}',
                    type: 'GET',
                    data: {
                        search: searchTerm
                    },
                    success: function(response) {
                        var select = $('.id_asesor');
                        select.empty();

                        if (response.length > 0) {
                            $.each(response, function(key, value) {
                                select.append('<option value="' + value.id + '">' +
                                    value.nombre + '</option>');
                            });
                            select.show();
                        } else {
                            select.hide();
                        }
                    }

                });
            });
        });
    </script>

    {{-- Fix para el componente select asesor --}}
    <script>
        $(document).ready(function() {
            $('.input-asesor').click(function() {
                var inputPropietario = $(this);
                var select = inputPropietario.siblings('.id_asesor');

                if (inputPropietario.val() === '') {
                    select.hide();
                } else if (select.find('option').length > 1) {
                    select.show();
                } else {
                    select[0].selectedIndex = 0;
                    var selectedText = select.find('option:first-child').text();
                    inputPropietario.val(selectedText);
                    select.hide();
                }
            });

            $('.id_asesor').change(function() {
                var select = $(this);
                var inputPropietario = select.siblings('.input-asesor');
                var selectedOption = select.find('option:selected');
                var selectedText = selectedOption.text();
                inputPropietario.val(selectedText);
                select.hide();
            });
        });
    </script>
@endsection
