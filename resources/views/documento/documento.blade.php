@extends('layouts/sidebar')
@section('contenido')
<link rel="stylesheet" href={{ asset('documentocss/midocumento.css') }}>

<div class="title2">
    <h1>Documentos Inmueble</h1>
</div>


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
            <tr>
                <th scope="row">1</th>
                <!--
                <td><img src="https://img.freepik.com/vector-gratis/hermosa-casa_24877-50819.jpg" alt="casa"
                        width="100%" height="100%"></td>
                -->
                <td>Documentos 1</td>
                <td>Croquis.pdf, Mapeo.pdf, Propietarios.pdf</td>
                <td>06/12/2022</td>
                <td>1</td>
                <td>
                    <form action="#" method="POST">
                        <a href="#" class="btn btn-link" data-toggle="modal" data-target="#exampleModal2">
                            <ion-icon name="enter-outline"></ion-icon>
                        </a>
                        <a type="submit" class="btn btn-link" id="btnEliminar">
                            <ion-icon name="trash-outline"></ion-icon>
                        </a>
                    </form>

                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <!--
                <td><img src="https://definicion.de/wp-content/uploads/2011/01/casa-2.jpg" alt="casa" width="100%"
                        height="100%"></td>
                -->
                <td>Documentos 2</td>
                <td>Croquis.pdf, Mapeo.pdf, Propietarios.pdf</td>
                <td>06/12/2022</td>
                <td>2</td>
                <td>
                    <form action="#" method="POST">
                        <a href="#" class="btn btn-link" data-toggle="modal" data-target="#exampleModal2">
                            <ion-icon name="enter-outline"></ion-icon>
                        </a>
                        <button type="button" class="btn btn-link" id="btnEliminar">
                            <ion-icon name="trash-outline"></ion-icon>
                        </button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</div>


@endsection