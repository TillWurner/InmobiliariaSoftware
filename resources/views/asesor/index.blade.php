@extends('layouts.sidebar')
@section('contenido')
    <link rel="stylesheet" href={{ asset('asesor/asesor.css') }}>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <div class="title2">
        <h1 class="lista">Listado de Asesores</h1>
    </div>

    <button type="button" class="btn btn-secondary btn-nuevo" data-toggle="modal" data-target="#exampleModal"
        data-whatever="@mdo">Nuevo
        Asesor</button>
    <div class="table">
        <table class="table table-dark table-striped" id="tablita">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Carnet</th>
                    <th scope="col">Codigo</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($asesores as $i => $asesor)
                    <tr>
                        <th scope="row">{{ $i + 1 }}</th>
                        <td>{{ $asesor->nombre }}</td>
                        <td>{{ $asesor->email }}</td>
                        <td>{{ $asesor->telefono }}</td>
                        <td>{{ $asesor->carnet }}</td>
                        <td>{{ $asesor->codigo }}</td>
                        <td>
                            <form action="{{ route('eliminarAsesor', $asesor->id) }}" method="POST">
                                @csrf
                                @php
                                    $foto = $asesor->foto ? asset('fotos/fotos-asesores/' . $asesor->foto) : asset('fotos/defecto/defecto.png');
                                @endphp
                                <a href="#" class="btn btn-link" data-toggle="modal" data-target="#exampleModal2"
                                    data-id="{{ $asesor->id }}" data-foto="{{ $foto }}">
                                    <i class="fa-solid fa-right-to-bracket fa-sm"></i>
                                </a>
                                <button type="submit" class="btn btn-link">
                                    <i class="fa-solid fa-trash fa-sm"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- MODAL NUEVO ASESOR --}}
    <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Asesor!</h1>
                </div>
                <form class="container" method="POST" action="{{ route('registrarAsesor') }}"
                    enctype="multipart/form-data">
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
                                <input type="file" id="file-upload" class="file-upload-input" accept="image/*"
                                    name="foto">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nombre:</label>
                            <input name="nombre" type="text" class="form-control" id="recipient-name" maxlength="50"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Correo:</label>
                            <input type="email" name="email" class="form-control" id="message-text"
                                placeholder="email@example.com" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Contraseña:</label>
                            <input name="password" type="password" class="form-control" id="recipient-name" maxlength="10"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Telefono:</label>
                            <input name="telefono" class="form-control" id="message-text" maxlength="8"
                                pattern="[0-9]{1,8}">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Carnet:</label>
                            <input type="text" name="carnet" class="form-control" id="message-text" maxlength="7">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Codigo:</label>
                            <input type="text" name="codigo" class="form-control" id="message-text" maxlength="7">
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

    {{-- MODAL VER ASESOR --}}
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content modal-edit">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel2">Información del Asesor</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form class="container" method="POST" action="{{ route('modificarAsesor', ['id' => 'idCapturado']) }}"
                    enctype="multipart/form-data" data-route="{{ route('modificarAsesor', ['id' => 'idCapturado']) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body show-left-only">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="text-center">Foto de Perfil</h3>
                                <hr class="hr-division">
                                <div class="profile-picture-container text-center">
                                    <div class="profile-picture">
                                        <img src="" alt="Foto de perfil" id="profile-picture-ver">
                                    </div>
                                </div>
                                <hr class="hr-division">
                                <div class="datos-transacciones"><br>
                                    <h6 class="text-center">Total de Transacciones Realizadas</h6>
                                    <p class="text-center text-white">10 transacciones</p>
                                    <h6 class="text-center">Transacciones en Procesos</h6>
                                    <p class="text-center text-white">3 Transacciones</p>
                                    <div class="btn-container">
                                        <a href="{{ route('inmueble') }}" type="button"
                                            class="btn btn-primary btn-sm btn-center">Ver
                                            Propiedades</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3 class="text-center">Datos Personales</h3>
                                <hr class="hr-division">
                                <div class="profile-info">
                                    <div class="form-group form-group-edit">
                                        <label for="recipient-name" class="col-form-label">Nombre:</label>
                                        <input name="nombre" type="text" class="form-control" id="nombre"
                                            value="" required readonly>
                                    </div>
                                    <div class="form-group form-group-edit">
                                        <label for="message-text" class="col-form-label">Correo:</label>
                                        <input type="email" name="email" class="form-control" id="message-text"
                                            value="" required readonly>
                                    </div>
                                    <div class="form-group form-group-edit">
                                        <label for="message-text" class="col-form-label">Teléfono:</label>
                                        <input type="tel" name="telefono" class="form-control" id="message-text"
                                            value="" readonly>
                                    </div>
                                    <div class="form-group form-group-edit">
                                        <label for="message-text" class="col-form-label">Carnet:</label>
                                        <input type="text" name="carnet" class="form-control" id="message-text"
                                            value="" readonly>
                                    </div>
                                    <div class="form-group form-group-edit">
                                        <label for="message-text" class="col-form-label">Código:</label>
                                        <input type="text" name="codigo" class="form-control" id="message-text"
                                            value="" readonly>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="btn-transacciones" type="button" class="btn btn-primary">Ver Mas</button>
                        <button id="btn-modificar" type="button" class="btn btn-warning">Modificar</button>
                        <button id="btn-guardar" type="submit" class="btn btn-success">Guardar</button>
                        <button id="btn-cerrar" type="button" class="btn btn-danger"
                            data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.2/jquery.modal.min.js"></script>

    <script>
        var btnModificar = document.getElementById("btn-modificar");

        var nombreInput = document.querySelector('#exampleModal2 input[name="nombre"]');
        var emailInput = document.querySelector('#exampleModal2 input[name="email"]');
        var telefonoInput = document.querySelector('#exampleModal2 input[name="telefono"]');
        var carnetInput = document.querySelector('#exampleModal2 input[name="carnet"]');
        var codigoInput = document.querySelector('#exampleModal2 input[name="codigo"]');

        btnModificar.addEventListener('click', function() {
            nombreInput.removeAttribute('readonly');
            emailInput.removeAttribute('readonly');
            telefonoInput.removeAttribute('readonly');
            carnetInput.removeAttribute('readonly');
            codigoInput.removeAttribute('readonly');
        });
    </script>

    <script>
        var btnCerrar = document.getElementById("btn-cerrar");
        var btnModificar = document.getElementById("btn-modificar");
        var btnGuardar = document.getElementById("btn-guardar");
        var btnVerMas = document.getElementById("btn-transacciones");

        btnModificar.addEventListener("click", function() {
            btnCerrar.style.display = "inline-block";
            btnModificar.style.display = "none";
            btnGuardar.style.display = "inline-block";
            btnVerMas.style.display = "none";
        });

        btnVerMas.addEventListener("click", function() {
            btnCerrar.style.display = "inline-block";
            btnModificar.style.display = "inline-block";
            btnGuardar.style.display = "none";
            btnVerMas.style.display = "none";
        });

        btnCerrar.addEventListener("click", function() {
            setTimeout(function() {
                btnCerrar.style.display = "inline-block";
                btnModificar.style.display = "inline-block";
                btnGuardar.style.display = "none";
                btnVerMas.style.display = "inline-block";
            }, 1000);
        });
    </script>

    <script>
        $(document).ready(function() {
            // para mostrar lo requerido
            $('.modal-body').addClass('show-left-only');

            // para mostrar lo que esta oculto
            $('#btn-transacciones').click(function() {
                $('.modal-body').removeClass('show-left-only');
            });

            // $('#btn-transacciones').click(function() {
            //     $('.modal-body').removeClass('show-left-only');
            //     $('.modal-body').addClass('animate__animated animate__fadeInRight');
            // });
        });
    </script>

    {{-- para mostrar los datos del asesor --}}
    <script>
        $(document).ready(function() {
            $('#exampleModal2').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var asesorId = button.data('id');
                var fotoUrl = button.data('foto');
                var modal = $(this);

                var asesor = obtenerAsesorPorId(asesorId);

                if (asesor) {
                    modal.find('[name="nombre"]').val(asesor.nombre);
                    modal.find('[name="email"]').val(asesor.email);
                    modal.find('[name="telefono"]').val(asesor.telefono);
                    modal.find('[name="carnet"]').val(asesor.carnet);
                    modal.find('[name="codigo"]').val(asesor.codigo);

                    var profilePictureId = 'profile-picture-ver';
                    modal.find('#profile-picture-ver').attr('src', fotoUrl);
                    var form = modal.find('form');
                    var route = form.data('route');
                    route = route.replace('idCapturado', asesor.id);
                    form.attr('action', route);
                }

                function obtenerAsesorPorId(asesorId) {
                    var asesores = {!! json_encode($asesores) !!};

                    for (var i = 0; i < asesores.length; i++) {
                        if (asesores[i].id === asesorId) {
                            return asesores[i];
                        }
                    }

                    return null;
                }
            });
        });
    </script>

    {{-- para mostrar los datos del asesor desde otra vista --}}
    <script>
        $(document).ready(function() {
            var urlParams = new URLSearchParams(window.location.search);
            var id_asesor = urlParams.get('x');

            if (id_asesor && id_asesor === id_asesor) {
                $('#exampleModal2').modal('show');
                rellenarDatos(id_asesor);
            }
        });

        function rellenarDatos(id_asesor) {
            var modal = $('#exampleModal2');

            var asesor = obtenerAsesorPorId(
                id_asesor);
            if (asesor) {
                modal.find('[name="nombre"]').val(asesor.nombre);
                modal.find('[name="email"]').val(asesor.email);
                modal.find('[name="telefono"]').val(asesor.telefono);
                modal.find('[name="carnet"]').val(asesor.carnet);
                modal.find('[name="codigo"]').val(asesor.codigo);

                var form = modal.find('form');
                var route = form.data('route');
                route = route.replace('idCapturado', asesor.id);
                form.attr('action', route);
            }

            function obtenerAsesorPorId(id_asesor) {
                var asesores =
                    {!! json_encode($asesores) !!};
                for (var i = 0; i < asesores.length; i++) {
                    if (asesores[i].id == id_asesor) {
                        return asesores[i];
                    }
                }

                return null;
            }
        }
    </script>
@endsection
