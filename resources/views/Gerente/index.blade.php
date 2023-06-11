@extends('layouts.sidebar')
@section('contenido')
    <link rel="stylesheet" href={{ asset('gerentecss/gerente.css') }}> <!-- PARA USAR 2 PLANTILLAS CSS-->

    <body>
        <div class="title2">
            <h1>Listado de Gerentes</h1>
        </div>

        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal"
            data-whatever="@mdo">Nuevo Gerente</button>
        <div class="table">
            <table class="table table-dark table-striped" id="tablita">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Carnet</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Nombre 1</td>
                        <td>correo1@example.com</td>
                        <td>1234567891</td>
                        <td>Carnet 1</td>
                        <td>
                            <form action="#" method="POST">
                                <a href="#" class="btn btn-link"><ion-icon name="enter-outline"></ion-icon></a>
                                <button type="submit" class="btn btn-link"><ion-icon
                                        name="trash-outline"></ion-icon></button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Nombre 2</td>
                        <td>correo2@example.com</td>
                        <td>1234567892</td>
                        <td>Carnet 2</td>
                        <td>
                            <form action="#" method="POST">
                                <a href="#" class="btn btn-link"><ion-icon name="enter-outline"></ion-icon></a>
                                <button type="submit" class="btn btn-link"><ion-icon
                                        name="trash-outline"></ion-icon></button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Gerente!</h1>
                    {{-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">Close</button> --}}
                </div>
                <form class="container" method="POST" action="#" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nombre:</label>
                            <input name="nombre" type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Correo:</label>
                            <textarea name="descripcion" class="form-control" id="message-text"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Telefono:</label>
                            <textarea name="descripcion" class="form-control" id="message-text"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Carnet:</label>
                            <textarea name="descripcion" class="form-control" id="message-text"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                      <button type="submit" class="btn btn-info">
                          Guardar
                      </button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">
                          Cerrar
                      </button>
                  </div>
                </form>
            </div>
        </div>
    </div>

@endsection
