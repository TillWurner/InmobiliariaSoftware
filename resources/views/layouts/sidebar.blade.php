@role('asesor')
    @php
        $cantidad_notificaciones = App\Models\Notificacion::where('id_asesor', Auth::user()->id)->count();
        $notificaciones = App\Models\Notificacion::where('id_asesor', Auth::user()->id)->get();
        if ($notificaciones->isNotEmpty()) {
            $mensaje = '<p>Buenas noticias!</p><p>Te asignaron nuevos inmuebles</p><hr>';
            foreach ($notificaciones as $item) {
                $mensaje .= '<a href="' . route('inmueble', ['id' => $item->id_inmueble, 'idNotificacion' => $item->id]) . '">' . $item->mensaje . '</a><hr>';
            }
        } else {
            $mensaje = 'No hay nada nuevo!';
        }
    @endphp
@endrole()

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Franquicia Inmobiliaria Century 21</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{ asset('sidebar/sidebar.css') }}">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- Font Awesome JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    {{-- Para que funcione Socket IO --}}
    <script src="https://cdn.socket.io/4.6.0/socket.io.min.js"
        integrity="sha384-c79GN5VsunZvi+Q/WObgk2in0CbZsHnjEqvFxC5DxHn9lTfNce2WW6h2pH6u/kF+" crossorigin="anonymous">
    </script>
    <script type="importmap">
        {
            "imports": {
                "socket.io-client": "https://cdn.socket.io/4.3.2/socket.io.esm.min.js"
            }
        }
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>
    {{-- <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script> --}}
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body
    style="background-image: url({{ asset('/gerentecss/img/fondoCentury5.jpg') }}) ; margin: 0;
padding: 0; background-size: cover;
background-repeat: no-repeat;
background-position: center center">

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div id="dismiss">
                <i class="fas fa-arrow-left"></i>
            </div>

            <div class="sidebar-header">
                <div class="logo-container">
                    <img src="{{ asset('sidebar/img/logo.png') }}" alt="Logo de la página" class="logo">
                </div>
            </div>

            <hr class="linea-division">
            <ul class="list-unstyled margin-icon-sidebar">
                @role('admin')
                    <li class="{{ Request::is('home') ? 'active' : '' }}">
                        <a href="/home"><i class="fas fa-home"></i> Inicio</a>
                    </li>
                    <li class="{{ Request::is('gerentes') ? 'active' : '' }}">
                        <a href="/gerentes"><i class="fas fa-user-tie"></i> Gerentes</a>
                    </li>
                    <li class="{{ Request::is('asesores') ? 'active' : '' }}">
                        <a href="/asesores"><i class="fas fa-user-tie"></i> Asesores</a>
                    </li>
                    <li class="{{ Request::is('propietarios') ? 'active' : '' }}">
                        <a href="/propietarios"><i class="fas fa-user"></i> Propietarios</a>
                    </li>
                @endrole
                @role('gerente')
                    <li class="{{ Request::is('home') ? 'active' : '' }}">
                        <a href="/home"><i class="fas fa-home"></i> Inicio</a>
                    </li>
                    <li class="{{ Request::is('asesores') ? 'active' : '' }}">
                        <a href="/asesores"><i class="fas fa-user-tie"></i> Asesores</a>
                    </li>
                    <li class="{{ Request::is('propietarios') ? 'active' : '' }}">
                        <a href="/propietarios"><i class="fas fa-user"></i> Propietarios</a>
                    </li>
                    <li class="{{ Request::is('inmuebles') ? 'active' : '' }}">
                        <a href="/inmuebles"><i class="fas fa-building"></i> Inmuebles</a>
                    </li>
                    <li class="{{ Request::is('documents') ? 'active' : '' }}">
                        <a href="/documents"><i class="fas fa-folder"></i> Documentos</a>
                    </li>
                    <li class="{{ Request::is('transacciones') ? 'active' : '' }}">
                        <a href="/transacciones"><i class="fas fa-handshake"></i> Transacciones</a>
                    </li>
                    <li class="{{ Request::is('reportes') ? 'active' : '' }}">
                        <a href="/reportes"><i class="fas fa-file"></i> Reportes</a>
                    </li>
                    <li class="{{ Request::is('mapas') ? 'active' : '' }}">
                        <a href="/mapas"><i class="fas fa-file"></i> Ver Mapa</a>
                    </li>
                @endrole
                @role('asesor')
                    <li class="{{ Request::is('home') ? 'active' : '' }}">
                        <a href="/home"><i class="fas fa-home"></i> Inicio</a>
                    </li>
                    <li class="{{ Request::is('propietarios') ? 'active' : '' }}">
                        <a href="/propietarios"><i class="fas fa-user"></i> Propietarios</a>
                    </li>
                    <li class="{{ Request::is('inmuebles') ? 'active' : '' }}">
                        <a href="/inmuebles"><i class="fas fa-building"></i> Inmuebles</a>
                    </li>
                    <li class="{{ Request::is('documents') ? 'active' : '' }}">
                        <a href="/documents"><i class="fas fa-folder"></i> Documentos</a>
                    </li>
                    <li class="{{ Request::is('transacciones') ? 'active' : '' }}">
                        <a href="/transacciones"><i class="fas fa-handshake"></i> Transacciones</a>
                    </li>
                    <li class="{{ Request::is('reportes') ? 'active' : '' }}">
                        <a href="/reportes"><i class="fas fa-file"></i> Reportes</a>
                    </li>
                    <li class="{{ Request::is('mapas') ? 'active' : '' }}">
                        <a href="/mapas"><i class="fas fa-file"></i> Ver Mapa</a>
                    </li>
                @endrole
            </ul>
            <hr class="linea-division">
        </nav>

        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-cog"></i>
                    </button>
                    <h5 style="margin-left: 10px">Haz iniciado como {{ Auth::user()->tipo }}</h5>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown" href="#" role="button" data-toggle="dropdown"
                                    aria-expanded="false">
                                    @role('gerente')
                                        <img src="{{ asset('fotos/fotos-gerentes/' . Auth::user()->foto) }}"
                                            class="img-fluid rounded-circle mr-2 avatar">
                                    @endrole()
                                    @role('asesor')
                                        <img src="{{ asset('fotos/fotos-asesores/' . Auth::user()->foto) }}"
                                            class="img-fluid rounded-circle mr-2 avatar">
                                    @endrole()
                                    @role('admin')
                                        <img src="https://thumbs.dreamstime.com/b/imagen-del-pasaporte-de-un-hombre-de-negocios-hisp%C3%A1nico-con-el-traje-54531886.jpg"
                                            class="img-fluid rounded-circle mr-2 avatar">
                                    @endrole()
                                    {{ Auth::user()->nombre }}
                                </a>
                                <div class="dropdown-menu">
                                    {{-- <a class="dropdown-item" href="#">Mi Perfil</a> --}}
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" onclick="logout()">
                                        Cerrar Sesión
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    @role('asesor')
                        <button id="mensaje" type="button" class="btn btn-outline-dark btn-bell"
                            data-toggle="popover" data-content="{{ $mensaje }}">
                            <a href="#"><i class="fas fa-bell"></i> <span id="cantidad_notificaciones"
                                    class="badge badge-pill badge-light">{{ $cantidad_notificaciones }}</span></a>
                        </button>
                    @endrole()
                </div>
            </nav>

            @yield('contenido')

        </div>
    </div>
    </div>

    <div class="overlay"></div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script> --}}

    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>
    <!-- jQuery Custom Scroller CDN -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js">
    </script>


    <script>
        function logout() {
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ route('logout') }}';

            var csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';

            form.appendChild(csrfToken);
            document.body.appendChild(form);
            form.submit();
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function() {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>

    <script>
        $(function() {
            $('[data-toggle="popover"]').popover({
                placement: 'bottom',
                trigger: 'manual',
                html: true
            }).on('mouseenter', function() {
                var _this = this;
                $(this).popover('show');
                $('.popover').on('mouseleave', function() {
                    $(_this).popover('hide');
                });
            }).on('mouseleave', function() {
                var _this = this;
                setTimeout(function() {
                    if (!$('.popover:hover').length) {
                        $(_this).popover('hide');
                    }
                }, 100);
            });
        });
    </script>

    {{-- Envio y recibo de datos con Socket IO --}}
    <script type="module">
        const csrfToken = '{{ csrf_token() }}';
        import { io } from "socket.io-client";
    
        const socket = io("http://127.0.0.1:3000/",{
            transports: ["websocket"],
        });

        const mensaje = document.querySelector("#mensaje");
        const cantidad_notificaciones = document.querySelector("#cantidad_notificaciones");
    
        @role('asesor')
        socket.on('notificacion', (data) => {
            data._token = csrfToken;
            if (data.id_asesor == {{ auth()->user()->id }}) {
                const url = `{{ route("asignarAsesor", ":id_inmueble") }}`;
                const id_inmueble = data.id_inmueble;
                const urlWithParam = url.replace(':id_inmueble', id_inmueble);
                $.ajax({
                    url: urlWithParam,
                    method: 'POST',
                    data: data,
                    error: function(error) {
                    console.error('Error al enviar los datos al controlador:', error);
                }
            });

            
                console.log(data);
                $.ajax({
                    url: '/notificacion/'+data.id_asesor,
                    method: 'GET',
                    success: function(resultado) {
                        cantidad_notificaciones.innerHTML = resultado.cantidad_notificaciones;
                        mensaje.dataset.content = resultado.mensaje;
                        $(mensaje).popover('show');
                    },
                    error: function(error) {
                        console.error('Error al obtener los datos:', error);
                    }
                });
            }
        });
        @endrole()
    </script>

</body>

</html>
