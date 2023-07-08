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
<body>
    <div id="map" style="width: 100%; height: 400px;"></div>
</body>

<script>
    // Inicializar el mapa
    var map = L.map('map').setView([-17.782313734747774, -63.17961325430206], 13); // Latitud y longitud inicial y nivel de zoom

    // Agregar el mapa base de OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
        maxZoom: 18,
    }).addTo(map);

    // Agregar un marcador
    L.marker([-17.782313734747774, -63.17961325430206]).addTo(map)
        .bindPopup('Franquicia Century')
        .openPopup();
</script>


@endsection