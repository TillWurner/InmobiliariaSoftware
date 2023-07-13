@extends('layouts.sidebar')
@section('contenido')
    <link rel="stylesheet" href={{ asset('gerentecss/gerente.css') }}> <!-- PARA USAR 2 PLANTILLAS CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <div class="title2">
        <h1>Listado de Gerentes</h1>
    </div>

    <button type="button" class="btn btn-secondary btn-nuevo" data-toggle="modal" data-target="#exampleModal"
        data-whatever="@mdo">Nuevo
        Gerente</button>
    <div class="table">
        <table class="table table-dark table-striped" id="tablita">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Carnet</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gerentes as $i => $gerente)
                    <tr>
                        <th scope="row">{{ $i + 1 }}</th>
                        <td>{{ $gerente->nombre }}</td>
                        <td>{{ $gerente->telefono }}</td>
                        <td>{{ $gerente->email }}</td>
                        <td>{{ $gerente->carnet }}</td>
                        <td>
                            <form action="{{ route('eliminarGerente', $gerente->id) }}" method="POST">
                                @csrf
                                @php
                                    $foto = $gerente->foto ? asset('fotos/fotos-gerentes/' . $gerente->foto) : asset('fotos/defecto/defecto.png');
                                @endphp
                                <a href="#" class="btn btn-link" data-toggle="modal" data-target="#exampleModal2"
                                    data-id="{{ $gerente->id }}" data-foto="{{ $foto }}">
                                    <i class="fa-solid fa-right-to-bracket fa-sm"></i>
                                </a>

                                @if ($i === 0 && count($gerentes) === 1)
                                    <a href="#" class="btn btn-link btn-trash"
                                        onclick="alert('No se puede eliminar el único gerente.'); return false;">
                                        <i class="fa-solid fa-trash fa-sm"></i>
                                    </a>
                                @else
                                    <button type="submit" class="btn btn-link">
                                        <i class="fa-solid fa-trash fa-sm"></i>
                                    </button>
                                @endif
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Gerente!</h1>
                </div>
                <form class="container" method="POST" action="{{ route('registrarGerente') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="profile-picture-container">
                            <div class="profile-picture">
                                <img src="https://www.seekpng.com/png/detail/355-3550337_png-file-male-avatar-png.png">
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
                            <input type="email" name="correo" class="form-control" id="message-text"
                                placeholder="correo@example.com" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Contraseña:</label>
                            <input name="contrasena" type="password" class="form-control" id="recipient-name" maxlength="10"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Teléfono:</label>
                            <input name="telefono" class="form-control" id="message-text" maxlength="8"
                                pattern="[0-9]{1,8}" required>
                            <small class="form-text  form-error">El teléfono debe tener máximo 8 dígitos numéricos.</small>
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Carnet:</label>
                            <input type="text" name="carnet" class="form-control" id="message-text" maxlength="12"
                                pattern="[A-Za-z0-9]{1,12}" required>
                            <small class="form-text form-error">El carnet debe tener máximo 12 caracteres
                                alfanuméricos.</small>
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

    {{-- MODAL VER GERENTE --}}
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content modal-edit">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel2">Información del Gerente</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form class="container" method="POST" action="{{ route('modificarGerente', ['id' => 'idCapturado']) }}"
                    enctype="multipart/form-data" data-route="{{ route('modificarGerente', ['id' => 'idCapturado']) }}">

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
                                        <input type="email" name="correo" class="form-control" id="message-text"
                                            value="" required readonly>
                                    </div>
                                    <div class="form-group form-group-edit">
                                        <label for="message-text" class="col-form-label">Teléfono:</label>
                                        <input type="tel" name="telefono" maxlength="8" pattern="[0-9]{1,8}"
                                            class="form-control" id="message-text" value="" readonly>
                                    </div>
                                    <div class="form-group form-group-edit">
                                        <label for="message-text" class="col-form-label">Carnet:</label>
                                        <input type="text" name="carnet" maxlength="12" pattern="{1,12}"
                                            class="form-control" id="message-text" value="" readonly>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button id="btn-transacciones" type="button" class="btn btn-primary">Ver Mas</button>-->
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
        var correoInput = document.querySelector('#exampleModal2 input[name="correo"]');
        var telefonoInput = document.querySelector('#exampleModal2 input[name="telefono"]');
        var carnetInput = document.querySelector('#exampleModal2 input[name="carnet"]');

        btnModificar.addEventListener('click', function() {
            nombreInput.removeAttribute('readonly');
            correoInput.removeAttribute('readonly');
            telefonoInput.removeAttribute('readonly');
            carnetInput.removeAttribute('readonly');
        });
    </script>

    <script>
        var btnCerrar = document.getElementById("btn-cerrar");
        var btnModificar = document.getElementById("btn-modificar");
        var btnGuardar = document.getElementById("btn-guardar");

        btnModificar.addEventListener("click", function() {
            btnCerrar.style.display = "inline-block";
            btnModificar.style.display = "none";
            btnGuardar.style.display = "inline-block";
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

    <script>
        $(document).ready(function() {
            $('#exampleModal2').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var gerenteId = button.data('id');
                var fotoUrl = button.data('foto');
                var modal = $(this);

                var gerente = obtenerGerentePorId(
                    gerenteId); // Función que obtiene los datos del gerente por su ID

                if (gerente) {
                    modal.find('[name="nombre"]').val(gerente.nombre);
                    modal.find('[name="correo"]').val(gerente.email);
                    modal.find('[name="telefono"]').val(gerente.telefono);
                    modal.find('[name="carnet"]').val(gerente.carnet);

                    var profilePictureId = 'profile-picture-ver';
                    // var fotoUrl = '{{ asset('storage/fotos-gerentes') . '/' . $gerente->foto }}';

                    modal.find('#profile-picture-ver').attr('src', fotoUrl);
                    var form = modal.find('form');
                    var route = form.data('route');
                    route = route.replace('idCapturado', gerente.id);
                    form.attr('action', route);
                }

                function obtenerGerentePorId(gerenteId) {
                    var gerentes = {!! json_encode($gerentes) !!};

                    for (var i = 0; i < gerentes.length; i++) {
                        if (gerentes[i].id === gerenteId) {
                            return gerentes[i];
                        }
                    }

                    return null;
                }
            });
        });
    </script>
@endsection
