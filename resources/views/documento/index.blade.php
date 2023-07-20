@extends('layouts/sidebar')
@section('contenido')
    <link rel="stylesheet" href={{ asset('documentocss/documento.css') }}>
    <div class="title2">
        <h1 class="lista">Listado de Documentos</h1>
    </div>

    <!-- <button type="button" class="btn btn-secondary btn-nuevo" data-toggle="modal" data-target="#exampleModal"
                data-whatever="@mdo">Nuevo
                Documento</button>-->
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
                                <a target="true"
                                    href="https://servicios.infoleg.gob.ar/infolegInternet/anexos/315000-319999/316544/res412-01.pdf"
                                    class="btn btn-link">
                                    <i class="fa-solid fa-right-to-bracket"></i>
                                </a>
                                <button type="submit" class="btn btn-link">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- MODAL NUEVA TRANSACCION --}}
    <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" data-value="">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Documento!</h1>
                </div>
                <form class="container" method="POST" action="#" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">ID de la Casa:</label>
                            <input name="nombre" type="text" class="form-control" id="id-casa" readonly required>
                            {{-- Este atributo se rellanara solo, porque esta relacionado con el inmueble --}}
                            {{-- <label for="recipient-name" class="col-form-label">Propietario:</label>
                            <input name="nombre" type="text" class="form-control" id="propietario" maxlength="50"
                                required> --}}
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Descripcion:</label>
                            <input name="descripcion" type="text" class="form-control" id="recipient-name" maxlength="50"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Archivo:</label>
                            <input name="archivo" type="text" class="form-control" id="recipient-name" maxlength="50"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Fecha:</label>
                            <input name="fecha" type="text" class="form-control" id="recipient-name" maxlength="50"
                                required>
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

    {{-- MODAL VER TRANSACCION --}}
    <div class="modal" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label"
        aria-hidden="true" data-value="">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModal2Label">Documento X</h1>
                </div>
                <form class="container" method="POST" action="#" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">ID de la Casa:</label>
                            <input name="nombre" type="text" class="form-control" value="1" id="id-casa"
                                readonly required>
                            {{-- Este atributo se rellanara solo, porque esta relacionado con el inmueble --}}
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Descripcion:</label>
                            <input name="descripcion" type="text" class="form-control" id="recipient-name"
                                maxlength="50" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">archivo:</label>
                            <input name="archivo" type="text" class="form-control" id="recipient-name"
                                maxlength="50" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Fecha:</label>
                            <input name="fecha" type="text" class="form-control" id="recipient-name"
                                maxlength="50" readonly required>
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

    {{-- MODAL BOTON ELIMINAR --}}
    <div id="confirmModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmación de eliminación</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p class="letra-negra">¿Estás seguro de que deseas eliminar este documento?</p>
                </div>
                <div class="modal-footer">
                    <button id="confirmarBtn" class="btn btn-danger">Confirmar</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            var inputIdCasa = document.getElementById('id-casa');
            var urlParams = new URLSearchParams(window.location.search);
            var value = urlParams.get('x');

            if (value && value === value) {
                $('#exampleModal').attr('data-value', value);
                $('#exampleModal').modal('show');
                inputIdCasa.value = value;
            }
        });
    </script>

    <script>
        $('#btnEliminar').click(function() {
            $('#confirmModal').modal('show');
        });

        $('#confirmarBtn').click(function() {
            //codigo para eliminar la transaccion
            $('#confirmModal').modal('hide');
        });
    </script>
@endsection
