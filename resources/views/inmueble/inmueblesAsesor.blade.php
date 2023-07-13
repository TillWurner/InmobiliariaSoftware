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
                    <div class="col-md-4">
                        <img src="{{ $inmuebleBase }}" width="100%" alt="Imagen" class="brillo-inmueble zoom-image">
                        <button class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#modal{{ $inmueble->id }}">Ver</button>
                    </div>
                    <!-- MODAL VER INMUEBLE -->
                    <div class="modal fade" data-modal="{{ $inmueble->id }}" id="modal{{ $inmueble->id }}" tabindex="-1"
                        role="dialog" aria-labelledby="modalLabel{{ $inmueble->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content modal-edit">
                                <div class="modal-body show-left-only">
                                    <div class="row">
                                        <div class="col-md-6">

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
                @endif
            @else
                @foreach ($inmuebles as $i => $inmueble)
                    @if ($inmueble->id_asesor == auth()->user()->id)
                        @if ($i + 1 == 1)
                            <div class="col-md-4">
                                <img src="{{ $inmuebleBase }}" width="100%" alt="Imagen"
                                    class="brillo-inmueble zoom-image">
                                <button class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#modal{{ $loop->iteration }}">Ver</button>
                            </div>
                        @elseif($i + 1 == 2)
                            <div class="col-md-4">
                                <img src="https://www.bienesonline.com/bolivia/photos/urbanizacion-del-valle-casas-en-pre-venta-CAV48511623287920-784.jpg"
                                    width="100%" alt="Imagen" class="brillo-inmueble zoom-image">
                                <button class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#modal{{ $loop->iteration }}">Ver</button>
                            </div>
                        @elseif(i + 1 == 3)
                            <div class="col-md-4">
                                <img src="{{ $inmuebleBase }}" width="100%" alt="Imagen"
                                    class="brillo-inmueble zoom-image">
                                <button class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#modal{{ $loop->iteration }}">Ver</button>
                            </div>
                        @else
                            <div class="col-md-4">
                                <img src="{{ $inmuebleBase }}" width="100%" alt="Imagen"
                                    class="brillo-inmueble zoom-image">
                                <button class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#modal{{ $loop->iteration }}">Ver</button>
                            </div>
                        @endif
                        <!-- MODAL VER INMUEBLE -->
                        <div class="modal fade" data-modal="{{ $loop->iteration }}" id="modal{{ $loop->iteration }}"
                            tabindex="-1" role="dialog" aria-labelledby="modalLabel{{ $loop->iteration }}"
                            aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content modal-edit">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 titulos-modal" id="modalLabel{{ $loop->iteration }}">
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
                                                        id="recipient-name" value="{{ $inmueble->direccion }}"
                                                        maxlength="20" required readonly>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-edit">
                                                            <label for="tamaño" class="col-form-label">Tamaño
                                                                (mts²)
                                                                :</label>
                                                            <input name="tamaño" type="text" class="form-control"
                                                                id="tamaño" value="{{ $inmueble->tamano }}"
                                                                maxlength="10" required readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-edit">
                                                            <label for="tamaño" class="col-form-label">Precio
                                                                ($us):</label>
                                                            <input name="precio" type="text" class="form-control"
                                                                id="tamaño" value="{{ $inmueble->precio }}"
                                                                maxlength="10" required readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group form-group-edit">
                                                    <label for="estado" class="col-form-label">Estado:</label>

                                                    @if ($inmueble->transaccion->isNotEmpty())
                                                        @if ($inmueble->razon === 'venta')
                                                            <input type="text" class="form-control" value="Vendido"
                                                                readonly>
                                                        @elseif($inmueble->razon === 'alquiler')
                                                            <input type="text" class="form-control" value="Alquilado"
                                                                readonly>
                                                        @else
                                                            <input type="text" class="form-control"
                                                                value="Anticretizado" readonly>
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
                                                <form method="POST"
                                                    action="{{ route('eliminarInmueble', $inmueble->id) }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="btn-container">
                                                        <button type="submit" class="btn btn-danger btn-sm btn-center">
                                                            Eliminar Inmueble</button>
                                                    </div>
                                                </form>
                                                @if ($inmueble->id_asesor == null)
                                                    <hr class="hr-division">
                                                    <h5 class="text-center titulos-modal">No tiene asignado un Asesor</h5>
                                                    <hr class="hr-division">
                                                    <div class="btn-container">
                                                        <button type="button"
                                                            class="btn btn-primary btn-sm btn-center btn-asignar">
                                                            Asignar asesor
                                                        </button>
                                                    </div>
                                                    <h6 class="text-center escoger-asesor" style="display: none;">Busca un
                                                        asesor
                                                        para este inmueble</h6>
                                                    <form id="formulario" method="POST"
                                                        action="{{ route('asignarAsesor', $inmueble->id) }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group asignar-asesor" style="display: none;">
                                                            <input id="nombre-asesor" name="asesor" type="text"
                                                                class="form-control input-asesor"
                                                                style="width: 50%; margin: 0 auto;" required>

                                                            <select id="asesores-{{ $inmueble->id }}" name="id_asesor"
                                                                class="form-control id_asesor"
                                                                id="as-{{ $loop->iteration }}"
                                                                style="display: none; width: 50%; margin: 0 auto;"></select>
                                                        </div>

                                                        <div class="btn-container asignar-asesor" style="display: none;">
                                                            <button type="submit"
                                                                class="btn btn-success btn-sm btn-aceptar-asesor"
                                                                data-id-inmueble="{{ $inmueble->id }}"
                                                                data-nombre-asesor="">Aceptar</button>
                                                            <button type="button"
                                                                class="btn btn-danger btn-sm btn-cancelar-asesor">Cancelar</button>
                                                        </div>
                                                    </form>
                                                @else
                                                    <hr class="hr-division">
                                                    <h5 class="text-center titulos-modal">Asesor Asignado</h5>
                                                    <hr class="hr-division">
                                                    <p class="text-center" style="color: black; font-family: bold">
                                                        {{ $inmueble->user->nombre }}
                                                    </p>
                                                    <div class="btn-container">
                                                        <a type="button" href="/asesores?x={{ $inmueble->user->id }}"
                                                            class="btn btn-primary btn-sm btn-center">
                                                            Ver Asesor</a>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <hr class="hr-division">
                                                <h3 class="text-center titulos-modal">Imagenes del Inmueble</h3>
                                                <hr class="hr-division">
                                                <div id="carouselExampleSlidesOnly" class="carousel slide"
                                                    data-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img src="{{ $inmuebleBase }}"
                                                                class="d-block w-100 img-smaller" alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="{{ $inmuebleBase }}"
                                                                class="d-block w-100 img-smaller" alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="{{ $inmuebleBase }}"
                                                                class="d-block w-100 img-smaller" alt="...">
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="btn-container">
                                                    <a href="{{ route('imagenes', $inmueble->id) }}" type="button"
                                                        class="btn btn-primary btn-sm btn-center">Ver todas
                                                        las imagenes</a>
                                                </div><br><br><br>
                                                <hr class="hr-division">
                                                <h5 class="text-center titulos-modal">Otras Opciones</h5>
                                                <hr class="hr-division">
                                                <div class="row">
                                                    {{-- <div class="col-md-6">
                                                <div class="btn-container">
                                                    <a type="button" href="/documentos?x={{ $inmueble->id }}"
                                                        class="btn btn-primary btn-sm btn-center">
                                                        Agregar Documento</a>
                                                </div>
                                            </div> --}}
                                                    <div class="col-md-6">
                                                        <div class="btn-container">
                                                            <a type="button"
                                                                href="{{ route('misdocumentos', ['id' => $inmueble->id]) }}"
                                                                class="btn btn-primary btn-sm btn-center">
                                                                Ver Documentos
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    @role('gerente')
                                                        <div class="col-md-6">
                                                            @if (!$inmueble->transaccion->isNotEmpty())
                                                                @if ($inmueble->id_asesor !== null)
                                                                    <div class="btn-container">
                                                                        <a type="button"
                                                                            href="/transacciones?x={{ $inmueble->id }}"
                                                                            class="btn btn-primary btn-sm btn-center">
                                                                            Realizar Transaccion
                                                                        </a>
                                                                    </div>
                                                                @else
                                                                    <div class="btn-container">
                                                                        <a type="button" href="#"
                                                                            class="btn btn-primary btn-sm btn-center realizar-transaccion-btn"
                                                                            data-target="#modal-{{ $inmueble->id }}">
                                                                            Realizar Transaccion
                                                                        </a>
                                                                        @if ($inmueble->id_asesor === null)
                                                                            <br><br>
                                                                            <h6 class="message mensaje-asesor"
                                                                                style="display: none; color:red;">
                                                                                Por favor, primero asigna un asesor!</h6>
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            @else
                                                            @endif
                                                        </div>
                                                    @endrole()
                                                    {{-- <div class="col-md-6">
                                                <div class="btn-container">
                                                    <a type="button" href="/reportes?x={{ $inmueble->id }}"
                                                        class="btn btn-primary btn-sm btn-center">
                                                        Agregar Reporte</a>
                                                </div>
                                            </div> --}}
                                                    {{-- <div class="col-md-6">
                                                <div class="btn-container">
                                                    <a type="button" href="#"
                                                        class="btn btn-primary btn-sm btn-center">
                                                        Ver Transacciones</a>
                                                </div>
                                            </div> --}}
                                                    <br>
                                                </div><br>
                                            </div>
                                        </div>
                                        <hr>
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
                @endforeach
            @endif
        </div>
    </div>
@endsection
