@extends('layouts.sidebar')
@section('contenido')
    <link rel="stylesheet" href={{ asset('propietariocss/propietario.css') }}> <!-- PARA USAR 2 PLANTILLAS CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <div class="title2">
        <h1>Listado de Propietarios</h1>
    </div>

    <button type="button" class="btn btn-secondary btn-nuevo" data-toggle="modal" data-target="#exampleModal"
        data-whatever="@mdo">Nuevo
        Propietario</button>
    <div class="table">
        <table class="table table-dark table-striped" id="tablita">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Carnet</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($propietarios as $i => $propietario)
                    <tr>
                        <th scope="row">{{ $i + 1 }}</th>
                        <td>{{ $propietario->nombre }}</td>
                        <td>{{ $propietario->carnet }}</td>
                        <td>{{ $propietario->telefono }}</td>
                        <td>
                            <form action="{{ route('eliminarPropietario', $propietario->id) }}" method="POST">
                                @csrf
                                <a href="#" class="btn btn-link" data-toggle="modal" data-target="#exampleModal2"
                                    data-id="{{ $propietario->id }}">
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

    {{-- MODAL NUEVO PROPIETARIO --}}
    <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Propietario!</h1>
                </div>
                <form class="container" method="POST" action="{{ route('registrarPropietario') }}"
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
                                <input type="file" id="file-upload" class="file-upload-input" accept="image/*">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nombre:</label>
                            <input name="nombre" type="text" class="form-control" id="recipient-name" maxlength="50"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Carnet:</label>
                            <input type="text" name="carnet" class="form-control" id="message-text" maxlength="7">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Telefono:</label>
                            <input name="telefono" class="form-control" id="message-text" maxlength="8"
                                pattern="[0-9]{1,8}">
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

    {{-- MODAL VER ASESOR --}}
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content modal-edit">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel2">Información del Propietario</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form class="container" method="POST"
                    action="{{ route('modificarPropietario', ['id' => 'idCapturado']) }}" enctype="multipart/form-data"
                    data-route="{{ route('modificarPropietario', ['id' => 'idCapturado']) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body show-left-only">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="text-center">Foto de Perfil</h3>
                                <hr class="hr-division">
                                <div class="profile-picture-container text-center">
                                    <div class="profile-picture">
                                        <img src="https://www.seekpng.com/png/detail/355-3550337_png-file-male-avatar-png.png"
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
                                <!--
                                                                        <hr class="hr-division">
                                                                        <div class="datos-transacciones"><br>
                                                                            <h6 class="text-center">Total de Transacciones Realizadas</h6>
                                                                            <p class="text-center text-white">10 transacciones</p>
                                                                            <h6 class="text-center">Transacciones en Procesos</h6>
                                                                            <p class="text-center text-white">3 Transacciones</p>
                                                                            <div class="btn-container">
                                                                                <button type="button" class="btn btn-primary btn-sm btn-center">Ver
                                                                                    Propiedades</button>
                                                                            </div>
                                                                        </div>
                                                                    -->
                            </div>
                            <div class="col-md-6">
                                <h3 class="text-center">Datos Personales</h3>
                                <hr class="hr-division">
                                <div class="profile-info">
                                    <div class="form-group form-group-edit">
                                        <label for="recipient-name" class="col-form-label">Nombre:</label>
                                        <input name="nombre" type="text" class="form-control" id="recipient-name"
                                            value="" required readonly>
                                    </div>
                                    <div class="form-group form-group-edit">
                                        <label for="message-text" class="col-form-label">Carnet:</label>
                                        <input type="text" name="carnet" class="form-control" id="message-text"
                                            value="" readonly>
                                    </div>
                                    <div class="form-group form-group-edit">
                                        <label for="message-text" class="col-form-label">Teléfono:</label>
                                        <input type="tel" name="telefono" class="form-control" id="message-text"
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

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.2/jquery.modal.min.js"></script> --}}

    <script>
        var btnModificar = document.getElementById("btn-modificar");

        var nombreInput = document.querySelector('#exampleModal2 input[name="nombre"]');
        var correoInput = document.querySelector('#exampleModal2 input[name="correo"]');
        var telefonoInput = document.querySelector('#exampleModal2 input[name="telefono"]');
        var carnetInput = document.querySelector('#exampleModal2 input[name="carnet"]');
        var codigoInput = document.querySelector('#exampleModal2 input[name="codigo"]');

        btnModificar.addEventListener('click', function() {
            nombreInput.removeAttribute('readonly');
            correoInput.removeAttribute('readonly');
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

    {{-- Para mostrar los datos del propietario --}}
    <script>
        $(document).ready(function() {
            $('#exampleModal2').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var propietarioId = button.data('id');
                var modal = $(this);

                var propietario = obtenerAsesorPorId(
                    propietarioId); // Función que obtiene los datos del propietario por su ID

                if (propietario) {
                    modal.find('[name="nombre"]').val(propietario.nombre);
                    modal.find('[name="carnet"]').val(propietario.carnet);
                    modal.find('[name="telefono"]').val(propietario.telefono);

                    var form = modal.find('form');
                    var route = form.data('route');
                    route = route.replace('idCapturado', propietario.id);
                    form.attr('action', route);
                }

                function obtenerAsesorPorId(propietarioId) {
                    var propietarios =
                        {!! json_encode($propietarios) !!};

                    for (var i = 0; i < propietarios.length; i++) {
                        if (propietarios[i].id === propietarioId) {
                            return propietarios[i];
                        }
                    }

                    return null;
                }

            });
        });
    </script>
@endsection
