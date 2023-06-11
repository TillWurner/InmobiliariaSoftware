@extends('layouts.sidebar')
@section('contenido')
<link rel="stylesheet" href={{ asset("gerentecss/gerente.css") }}>  <!-- PARA USAR 2 PLANTILLAS CSS-->
<body>
    <div class="title2">
        <h1>Listado de Gerentes</h1>
    </div>

    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Nuevo Gerente</button>
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
        </tbody>
  </table>
</div>
</body>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Gerente!</h1>
            {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Close</button> --}}
          </div>
          <form  class="container" method="POST" action="#" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
             {{--  <form> --}}
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Nombre:</label>
                  <input name="nombre"  type="text" class="form-control" id="recipient-name">
                </div>
                <div class="mb-3">
                  <label for="message-text" class="col-form-label">Correo:</label>
                  <textarea name="descripcion" class="form-control" id="message-text"></textarea>
                </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label">Telefono:</label>
                    <textarea name="descripcion" class="form-control" id="message-text"></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label">Carnet:</label>
                    <textarea name="descripcion" class="form-control" id="message-text"></textarea>
                  </div>
              {{-- </form> --}}
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-info ">
               <!-- {{ __('Guardar') }}-->
            </button>
            </div>
          </form>
        </div>
      </div>
    </div>

@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>