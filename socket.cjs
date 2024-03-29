const express = require('express');

const app = express();

const server = require('http').createServer(app);

const io = require('socket.io')(server, {
    cors: {
        origin: "*" // Configura los orígenes permitidos correctamente
    }
});

io.on('connection', (socket) => {
    console.log('Cliente conectado: ' + socket.id);

    // Escuchar evento de asignación de inmuebles
    socket.on('asignacion-inmueble', (data) => {
        console.log("recibido");
        // Emitir evento a los asesores conectados
        io.emit('notificacion', data);
        console.log("enviado")
    });

    socket.on('coordenadas-inmueble', (data) => {
        console.log('Coordenadas recibidas del cliente:', data.coordenada_inmueble);

        io.emit('mapa', data);
        console.log("enviado-coordenada")
    });
});

server.listen(3000, () => {
    console.log('Servidor corriendo en el puerto 3000');
});
