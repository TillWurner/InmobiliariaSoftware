@extends('layouts.sidebar')
@section('contenido')
    @php
        $inmuebleBase = 'https://static.wixstatic.com/media/63b041_e98452ee67e3450eb6936162bd357726~mv2_d_8333_5729_s_4_2.jpg/v1/fill/w_1000,h_688,al_c,q_85,usm_0.66_1.00_0.01/63b041_e98452ee67e3450eb6936162bd357726~mv2_d_8333_5729_s_4_2.jpg';
    @endphp

    <link rel="stylesheet" href="{{ asset('inmueble/inmueble.css') }}">

    <div class="container scrollable-container">
        <div class="row">
            @if ($inmueble != null)
                @if ($inmueble->id_asesor == auth()->user()->id)
                    <div class="col-md-6">
                        <div class="image-container">
                            @if ($inmueble && $inmueble->imagenes->count() > 0)
                                <img src="{{ asset('fotos/fotos-inmuebles/' . $inmueble->imagenes[0]->imagen) }}"
                                    width="100%" alt="Imagen" class="brillo-inmueble zoom-image">
                            @else
                                <img src="{{ $inmuebleBase }}" width="100%" alt="Imagen"
                                    class="brillo-inmueble zoom-image">
                            @endif
                            <div class="info1 d-flex justify-content-between">
                                <div style="clear: both;">
                                    <div class="titulo">Casa {{ $inmueble->id }}</div>
                                    @if ($inmueble->transaccion->isNotEmpty())
                                        @if ($inmueble->razon === 'venta')
                                            <div class="titulo" style="color: red">Vendido</div>
                                        @elseif($inmueble->razon === 'alquiler')
                                            <div class="titulo"style="color: red">Alquilado</div>
                                        @else
                                            <div class="titulo"style="color: red">Anticretizado</div>
                                        @endif
                                    @else
                                        <div class="titulo">En {{ $inmueble->razon }}</div>
                                    @endif
                                </div>
                                <div class="bloque">
                                    <div class="costo">{{ $inmueble->precio }} $us</div>
                                    <div>{{ $inmueble->direccion }}</div>
                                </div>
                            </div>
                            <div class="info2 d-flex justify-content-between">
                                <button class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#modal{{ $inmueble->id }}">Ver</button>
                            </div>
                        </div><br><br><br>
                    </div>
                    <!-- MODAL VER INMUEBLE -->
                    <div class="modal fade" data-modal="{{ $inmueble->id }}" id="modal{{ $inmueble->id }}" tabindex="-1"
                        role="dialog" aria-labelledby="modalLabel{{ $inmueble->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content modal-edit">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 titulos-modal" id="modalLabel{{ $inmueble->id }}">
                                        Información del Inmueble
                                    </h1>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body show-left-only">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <hr class="hr-division">
                                            <h3 class="text-center titulos-modal">Datos del Inmueble</h3>
                                            <hr class="hr-division">
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

                                                @if ($inmueble->transaccion->isNotEmpty())
                                                    @if ($inmueble->razon === 'venta')
                                                        <input type="text" class="form-control" value="Vendido" readonly>
                                                    @elseif($inmueble->razon === 'alquiler')
                                                        <input type="text" class="form-control" value="Alquilado"
                                                            readonly>
                                                    @else
                                                        <input type="text" class="form-control" value="Anticretizado"
                                                            readonly>
                                                    @endif
                                                @else
                                                    <input type="text" class="form-control"
                                                        value="En {{ $inmueble->razon }}" readonly>
                                                @endif
                                            </div>
                                            <div class="form-group form-group-edit">
                                                <label for="descripcion" class="col-form-label">Descripcion:</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $inmueble->descripcion }}" readonly>
                                            </div><br>
                                        </div>
                                        <div class="col-md-6">
                                            <hr class="hr-division">
                                            <h3 class="text-center titulos-modal">Imagenes del Inmueble</h3>
                                            <hr class="hr-division">
                                            <div id="carouselExampleSlidesOnly" class="carousel slide"
                                                data-ride="carousel">

                                                <div class="carousel-inner">
                                                    @if ($inmueble->imagenes->isNotEmpty())
                                                        @php $active = true; @endphp
                                                        @foreach ($inmueble->imagenes as $item)
                                                            <div class="carousel-item {{ $active ? 'active' : '' }}">
                                                                <img src="{{ asset('fotos/fotos-inmuebles/' . $item->imagen) }}"
                                                                    class="d-block w-100 img-smaller" alt="...">
                                                            </div>
                                                            @php $active = false; @endphp
                                                        @endforeach
                                                    @else
                                                        <div class="carousel-item active">
                                                            <img src="{{ $inmuebleBase }}"
                                                                class="d-block w-100 img-smaller" alt="...">
                                                        </div>
                                                    @endif
                                                </div>

                                            </div><br>
                                            <div class="btn-container">
                                                <a href="{{ route('imagenes', $inmueble->id) }}" type="button"
                                                    class="btn btn-primary btn-sm btn-center">Ver
                                                    todas
                                                    las imagenes</a>
                                            </div><br><br><br>
                                            <hr class="hr-division">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button id="btn-cerrar" type="button" class="btn btn-danger"
                                        data-dismiss="modal">Cerrar</button>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                @endif
            @else
            @endif
        </div>
    </div>
@endsection
