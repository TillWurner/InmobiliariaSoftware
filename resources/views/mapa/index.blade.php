@extends('layouts/sidebar')
@section('contenido')
<link rel="stylesheet" href={{ asset('reportecss/reporte.css') }}>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
<!-- Incluir Leaflet JS -->
<script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
<!-- Opcional: Incluir Leaflet Plugins (por ejemplo, Leaflet.markercluster) -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.4.1/MarkerCluster.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.4.1/MarkerCluster.Default.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.4.1/leaflet.markercluster.js"></script> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-fullscreen/dist/leaflet.fullscreen.css" />
<script src="https://cdn.jsdelivr.net/npm/leaflet-fullscreen/dist/Leaflet.fullscreen.min.js"></script>

<body>
    <div id="map" style="width: 55%; height: 480px; margin: 0 auto; display: flex; justify-content: center; align-items: center; "></div>
</body>

<script>
    // Inicializar el mapa
    var map = L.map('map').setView([-17.775777145801303, -63.2021721890594], 13); // Latitud y longitud inicial y nivel de zoom

    // Agregar el mapa base de OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
        maxZoom: 18,
    }).addTo(map);
    var baseIcon = L.icon({
        iconUrl: '{{ asset("icons/base.png") }}',
        iconSize: [72, 72], // Tamaño del ícono en píxeles
        iconAnchor: [32, 32], // Punto de anclaje del ícono en píxeles
    });

    // Agregar un marcador
    L.marker([-17.775777145801303, -63.2021721890594],{ icon: baseIcon }).addTo(map)
        .bindPopup('<strong>Franquicia Century</strong><br>Central')
        .openPopup();

    // Obtener los datos de los inmuebles desde el backend
    fetch('/inmuebles/json')
        .then(response => response.json())
        .then(data => {
            // Iterar sobre los inmuebles y crear marcadores
            data.forEach(inmueble => {

                // Obtener las coordenadas del inmueble y convertirlas a un formato compatible con Leaflet
                const coordenada = inmueble.coordenada.split(',').map(parseFloat);

                var customIcon = L.icon({
                    iconUrl: '{{ asset("icons/inmueble3.png") }}',
                    iconSize: [64, 64], // Tamaño del ícono en píxeles
                    iconAnchor: [32, 32], // Punto de anclaje del ícono en píxeles
                });
                // Obtener el propietario del inmueble
                fetch(`/propietarios/${inmueble.id_propietario}`)
                    .then(response => response.json())
                    .then(propietario => {
                        const propietarioNombre = propietario.nombre;

                        // Obtener el asesor del inmueble solo si existe
                        const asesorPromise = inmueble.id_asesor ? fetch(`/asesores/${inmueble.id_asesor}`).then(response => response.json()) : Promise.resolve(null);
                        
                        asesorPromise.then(asesor => {
                            const asesorNombre = asesor ? asesor.nombre : 'No tiene un Asesor Asignado';

                            // Crear el marcador con las coordenadas
                            var marker = L.marker(coordenada, { icon: customIcon }).addTo(map);

                            // Personalizar el marcador con los datos del inmueble, propietario y asesor
                            marker.bindPopup(`
                                <strong>Id_inmueble:</strong> ${inmueble.id}<br>
                                <strong>Propietario:</strong> ${propietarioNombre}<br>
                                <strong>Dirección:</strong> ${inmueble.direccion}<br>
                                <strong>Descripción:</strong> ${inmueble.descripcion}<br>
                                <strong>Asesor:</strong> ${asesorNombre}
                            `).openPopup();
                        });
                    });
            });
            // Centrar la vista en las coordenadas de "map"
            map.setView([-17.775777145801303, -63.2021721890594]);
        });

    // Agregar el control de pantalla completa al mapa
    L.control.fullscreen().addTo(map);


</script>


@endsection