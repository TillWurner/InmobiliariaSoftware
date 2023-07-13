@extends('layouts/sidebar')
@section('contenido')
    <link rel="stylesheet" href={{ asset('reportecss/reporte.css') }}>
    <div class="title2">
        <h1 class="lista">Reportes</h1>
    </div>
    <div class="document-container">

        <body>
            <div class="section">
                <div class="title">Listado de Gerentes</div>
                <button class="button" id="generar-pdf-gerente">Generar PDF</button>
                <button class="button" id="generar-csv-gerente">Generar CSV</button>
            </div>

            <div class="section">
                <div class="title">Listado de Asesores</div>
                <button class="button" id="generar-pdf-asesor">Generar PDF</button>
                <button class="button" id="generar-csv-asesor">Generar CSV</button>
            </div>

            <div class="section">
                <div class="title">Listado de Propietarios</div>
                <button class="button" id="generar-pdf-propietario">Generar PDF</button>
                <button class="button" id="generar-csv-propietario">Generar CSV</button>
            </div>

            <div class="section">
                <div class="title">Listado de Inmuebles</div>
                <button class="button" id="generar-pdf-inmueble">Generar PDF</button>
                <button class="button" id="generar-csv-inmueble">Generar CSV</button>
            </div>

            <div class="section">
                <div class="title">Listado de Documentos</div>
                <button class="button" id="generar-pdf-documento">Generar PDF</button>
                <button class="button" id="generar-csv-documento">Generar CSV</button>
            </div>

            <div class="section">
                <div class="title">Listado de transacciones</div>
                <button class="button" id="generar-pdf-transaccion">Generar PDF</button>
                <button class="button" id="generar-csv-transaccion">Generar CSV</button>
            </div>
        </body>
    </div>

    <!-- Agrega los enlaces a las librerías necesarias -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/vfs_fonts.js"></script>

    <!--Gerentes-->

    <script>
        // Código para generar un PDF a partir de los datos de los gerentes
        document.getElementById('generar-pdf-gerente').addEventListener('click', function() {
            fetch('/gerentes/json')
                .then(response => response.json())
                .then(data => {
                    var gerentesData = data.map(gerente => [
                        gerente.nombre,
                        gerente.correo,
                        gerente.telefono,
                        gerente.carnet,
                    ]);

                    // Crear un nuevo documento PDF
                    var docDefinition = {
                        content: [{
                                text: 'Listado de Gerentes',
                                fontSize: 18,
                                bold: true
                            },
                            {
                                text: '\n\n'
                            },
                            {
                                table: {
                                    headerRows: 1,
                                    body: [
                                        ['Nombre', 'Correo', 'Teléfono', 'Carnet'],
                                        ...gerentesData
                                    ]
                                }
                            }
                        ]
                    };

                    // Generar el PDF y descargarlo
                    pdfMake.createPdf(docDefinition).download('gerentes.pdf');
                });
        });

        // Código para generar un CSV a partir de los datos de los gerentes
        document.getElementById('generar-csv-gerente').addEventListener('click', function() {
            fetch('/gerentes/json')
                .then(response => response.json())
                .then(data => {
                    var gerentesData = data.map(gerente => [
                        gerente.nombre,
                        gerente.correo,
                        gerente.telefono,
                        gerente.carnet
                    ]);

                    // Crear el contenido del archivo CSV
                    var csvContent = 'Nombre,Correo,Telefono,Carnet\n' + gerentesData.join('\n');

                    // Crear un objeto Blob con el contenido del archivo CSV
                    var blob = new Blob([csvContent], {
                        type: 'text/csv;charset=utf-8;'
                    });

                    // Descargar el archivo CSV
                    saveAs(blob, 'gerentes.csv');
                });
        });
    </script>

    <!--Asesores-->

    <script>
        // Código para generar un PDF a partir de los datos de los asesores
        document.getElementById('generar-pdf-asesor').addEventListener('click', function() {
            fetch('/asesores/json')
                .then(response => response.json())
                .then(data => {
                    var asesoresData = data.map(asesor => [
                        asesor.nombre,
                        asesor.correo,
                        asesor.telefono,
                        asesor.carnet,
                        asesor.codigo
                    ]);

                    // Crear un nuevo documento PDF
                    var docDefinition = {
                        content: [{
                                text: 'Listado de Asesores',
                                fontSize: 18,
                                bold: true
                            },
                            {
                                text: '\n\n'
                            },
                            {
                                table: {
                                    headerRows: 1,
                                    body: [
                                        ['Nombre', 'Correo', 'Teléfono', 'Carnet', 'Código'],
                                        ...asesoresData
                                    ]
                                }
                            }
                        ]
                    };

                    // Generar el PDF y descargarlo
                    pdfMake.createPdf(docDefinition).download('asesores.pdf');
                });
        });

        // Código para generar un CSV a partir de los datos de los asesores
        document.getElementById('generar-csv-asesor').addEventListener('click', function() {
            fetch('/asesores/json')
                .then(response => response.json())
                .then(data => {
                    var asesoresData = data.map(asesor => [
                        asesor.nombre,
                        asesor.correo,
                        asesor.telefono,
                        asesor.carnet,
                        asesor.codigo
                    ]);

                    // Crear el contenido del archivo CSV
                    var csvContent = 'Nombre,Correo,Telefono,Carnet,Codigo\n' + asesoresData.join('\n');

                    // Crear un objeto Blob con el contenido del archivo CSV
                    var blob = new Blob([csvContent], {
                        type: 'text/csv;charset=utf-8;'
                    });

                    // Descargar el archivo CSV
                    saveAs(blob, 'asesores.csv');
                });
        });
    </script>

    <!--Propietarios-->

    <script>
        // Código para generar un PDF a partir de los datos de los propietarios
        document.getElementById('generar-pdf-propietario').addEventListener('click', function() {
            fetch('/propietarios/json')
                .then(response => response.json())
                .then(data => {
                    var propietariosData = data.map(propietario => [
                        propietario.nombre,
                        propietario.telefono,
                        propietario.carnet
                    ]);

                    // Crear un nuevo documento PDF
                    var docDefinition = {
                        content: [{
                                text: 'Listado de Propietarios',
                                fontSize: 18,
                                bold: true
                            },
                            {
                                text: '\n\n'
                            },
                            {
                                table: {
                                    headerRows: 1,
                                    body: [
                                        ['Nombre', 'Teléfono', 'Carnet'],
                                        ...propietariosData
                                    ]
                                }
                            }
                        ]
                    };

                    // Generar el PDF y descargarlo
                    pdfMake.createPdf(docDefinition).download('propietarios.pdf');
                });
        });

        // Código para generar un CSV a partir de los datos de los propietarios
        document.getElementById('generar-csv-propietario').addEventListener('click', function() {
            fetch('/propietarios/json')
                .then(response => response.json())
                .then(data => {
                    var propietariosData = data.map(propietario => [
                        propietario.nombre,
                        propietario.telefono,
                        propietario.carnet
                    ]);

                    // Crear el contenido del archivo CSV
                    var csvContent = 'Nombre,Telefono,Carnet\n' + propietariosData.join('\n');

                    // Crear un objeto Blob con el contenido del archivo CSV
                    var blob = new Blob([csvContent], {
                        type: 'text/csv;charset=utf-8;'
                    });

                    // Descargar el archivo CSV
                    saveAs(blob, 'propietarios.csv');
                });
        });
    </script>

    <!--Inmuebles-->

    <script>
        // Código para generar un PDF a partir de los datos de los inmuebles
        document.getElementById('generar-pdf-inmueble').addEventListener('click', function() {
            fetch('/inmuebles/json')
                .then(response => response.json())
                .then(data => {
                    var inmueblesData = data.map(inmueble => [
                        inmueble.coordenada,
                        inmueble.tamano,
                        inmueble.direccion,
                        inmueble.precio,
                        inmueble.razon,
                        inmueble.descripcion,
                        inmueble.id_propietario,
                        inmueble.id_asesor
                    ]);

                    // Crear un nuevo documento PDF
                    var docDefinition = {
                        content: [{
                                text: 'Listado de Inmuebles',
                                fontSize: 18,
                                bold: true
                            },
                            {
                                text: '\n\n'
                            },
                            {
                                table: {
                                    headerRows: 1,
                                    body: [
                                        ['Coordenada', 'Tamaño', 'Dirección', 'Precio', 'Razón',
                                            'Descripción', 'Id Propietario', 'Id Asesor'
                                        ],
                                        ...inmueblesData
                                    ]
                                }
                            }
                        ]
                    };

                    // Generar el PDF y descargarlo
                    pdfMake.createPdf(docDefinition).download('inmuebles.pdf');
                });
        });

        // Código para generar un CSV a partir de los datos de los inmuebles
        document.getElementById('generar-csv-inmueble').addEventListener('click', function() {
            fetch('/inmuebles/json')
                .then(response => response.json())
                .then(data => {
                    var inmueblesData = data.map(inmueble => [
                        inmueble.coordenada,
                        inmueble.tamano,
                        inmueble.direccion,
                        inmueble.precio,
                        inmueble.razon,
                        inmueble.descripcion,
                        inmueble.id_propietario,
                        inmueble.id_asesor
                    ]);

                    // Crear el contenido del archivo CSV
                    var csvContent =
                        'Coordenada,Tamaño,Dirección,Precio,Razón,Descripción,Id Propietario,Id Asesor\n' +
                        inmueblesData.join('\n');

                    // Crear un objeto Blob con el contenido del archivo CSV
                    var blob = new Blob([csvContent], {
                        type: 'text/csv;charset=utf-8;'
                    });

                    // Descargar el archivo CSV
                    saveAs(blob, 'inmuebles.csv');
                });
        });
    </script>

    <!--Documentos-->

    <script>
        // Código para generar un PDF a partir de los datos de los documentos
        document.getElementById('generar-pdf-documento').addEventListener('click', function() {
            fetch('/documentos/json')
                .then(response => response.json())
                .then(data => {
                    var documentosData = data.map(documento => [
                        documento.descripcion,
                        documento.archivo,
                        documento.fecha,
                        documento.id_inmueble
                    ]);

                    // Crear un nuevo documento PDF
                    var docDefinition = {
                        content: [{
                                text: 'Listado de Documentos',
                                fontSize: 18,
                                bold: true
                            },
                            {
                                text: '\n\n'
                            },
                            {
                                table: {
                                    headerRows: 1,
                                    body: [
                                        ['Descripción', 'Archivo', 'Fecha', 'Id Inmueble'],
                                        ...documentosData
                                    ]
                                }
                            }
                        ]
                    };

                    // Generar el PDF y descargarlo
                    pdfMake.createPdf(docDefinition).download('documentos.pdf');
                });
        });

        // Código para generar un CSV a partir de los datos de los documentos
        document.getElementById('generar-csv-documento').addEventListener('click', function() {
            fetch('/documentos/json')
                .then(response => response.json())
                .then(data => {
                    var documentosData = data.map(documento => [
                        documento.descripcion,
                        documento.archivo,
                        documento.fecha,
                        documento.id_inmueble
                    ]);

                    // Crear el contenido del archivo CSV
                    var csvContent = 'Descripción,Archivo,Fecha,Id Inmueble\n' + documentosData.join('\n');

                    // Crear un objeto Blob con el contenido del archivo CSV
                    var blob = new Blob([csvContent], {
                        type: 'text/csv;charset=utf-8;'
                    });

                    // Descargar el archivo CSV
                    saveAs(blob, 'documentos.csv');
                });
        });
    </script>

    <!--Transacciones-->

    <script>
        // Código para generar un PDF a partir de los datos de las transacciones
        document.getElementById('generar-pdf-transaccion').addEventListener('click', function() {
            fetch('/transacciones/json')
                .then(response => response.json())
                .then(data => {
                    var transaccionesData = data.map(transaccion => [
                        transaccion.interesado,
                        transaccion.fecha,
                        transaccion.inmueble_id
                    ]);

                    // Crear un nuevo documento PDF
                    var docDefinition = {
                        content: [{
                                text: 'Listado de Transacciones',
                                fontSize: 18,
                                bold: true
                            },
                            {
                                text: '\n\n'
                            },
                            {
                                table: {
                                    headerRows: 1,
                                    body: [
                                        ['Interesado', 'Fecha', 'Id Inmueble'],
                                        ...transaccionesData
                                    ]
                                }
                            }
                        ]
                    };

                    // Generar el PDF y descargarlo
                    pdfMake.createPdf(docDefinition).download('transacciones.pdf');
                });
        });

        // Código para generar un CSV a partir de los datos de las transacciones
        document.getElementById('generar-csv-transaccion').addEventListener('click', function() {
            fetch('/transacciones/json')
                .then(response => response.json())
                .then(data => {
                    var transaccionesData = data.map(transaccion => [
                        transaccion.interesado,
                        transaccion.fecha,
                        transaccion.inmueble_id
                    ]);

                    // Crear el contenido del archivo CSV
                    var csvContent = 'Interesado,Fecha,Id Inmueble\n' + transaccionesData.join('\n');

                    // Crear un objeto Blob con el contenido del archivo CSV
                    var blob = new Blob([csvContent], {
                        type: 'text/csv;charset=utf-8;'
                    });

                    // Descargar el archivo CSV
                    saveAs(blob, 'transacciones.csv');
                });
        });
    </script>
@endsection
