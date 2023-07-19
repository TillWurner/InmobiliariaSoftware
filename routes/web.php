<?php

use App\Http\Controllers\AsesorController;
use App\Http\Controllers\DocumentoController;
// use App\Http\Controllers\GerenteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\PropietarioController;
use App\Http\Controllers\InmuebleController;
use App\Http\Controllers\MapaController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\TransaccionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('main');

Auth::routes();


Route::middleware(['auth'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    /* Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'main'])->name('base'); */
    Route::get('/contactus', [ContactusController::class, 'contactus'])->name('contactus');
    Route::get('/gerentes', [UserController::class, 'gerentes'])->name('gerentes');
    Route::get('/propietarios', [PropietarioController::class, 'propietarios'])->name('propietarios');
    Route::post('/registrarPropietario', [PropietarioController::class, 'registrarPropietario'])->name('registrarPropietario');
    Route::put('/modificarPropietario/{id}', [PropietarioController::class, 'modificarPropietario'])->name('modificarPropietario');
    Route::post('/eliminarPropietario/{id}', [PropietarioController::class, 'eliminarPropietario'])->name('eliminarPropietario');
    Route::get('/perfil', [UserController::class, 'perfil'])->name('perfil_gerente');
    Route::get('/inmuebles', [InmuebleController::class, 'inmuebles'])->name('inmuebles');
    Route::post('/registrarInmueble', [InmuebleController::class, 'registrarInmueble'])->name('registrarInmueble');
    Route::put('/modificarInmueble/{id}', [InmuebleController::class, 'modificarInmueble'])->name('modificarInmueble');
    Route::post('/eliminarInmueble/{id}', [InmuebleController::class, 'eliminarInmueble'])->name('eliminarInmueble');
    Route::get('/imagenes/{id}', [ImagenController::class, 'imagenes'])->name('imagenes');
    Route::post('/registrarImagen/{id}', [ImagenController::class, 'registrarImagen'])->name('registrarImagen');
    Route::put('/modificarImagen/{id}', [ImagenController::class, 'modificarImagen'])->name('modificarImagen');
    Route::post('/eliminarImagen/{id}', [ImagenController::class, 'eliminarImagen'])->name('eliminarImagen');
    Route::post('/destacarImagen/{id}/{idInmueble}', [ImagenController::class, 'destacarImagen'])->name('destacarImagen');
    Route::get('/buscar-propietarios', [PropietarioController::class, 'buscarPropietarios'])->name('buscar-propietarios');
    Route::get('/buscar-asesores', [UserController::class, 'buscarAsesores'])->name('buscar-asesores');
    Route::post('/asignarAsesor/{id}', [InmuebleController::class, 'asignarAsesor'])->name('asignarAsesor');

    Route::get('/coordenadas', [InmuebleController::class, 'obtenerInmueblesConCoordenadas'])->name('coordenadas');

    Route::get('/notificacion/{idAsesor}', [NotificacionController::class, 'notificacion'])->name('notificacion');
    Route::get('/inmueble-asesor/{id?}/{idNotificacion?}', [InmuebleController::class, 'inmueble'])->name('inmueble');
    Route::post('/asignar', [InmuebleController::class, 'asignar'])->name('asignar');
    Route::get('/asesores', [UserController::class, 'asesores'])->name('asesores');
    Route::post('/registrarAsesor', [UserController::class, 'registrarAsesor'])->name('registrarAsesor');
    Route::put('/modificarAsesor/{id}', [UserController::class, 'modificarAsesor'])->name('modificarAsesor');
    Route::post('/eliminarAsesor/{id}', [UserController::class, 'eliminarAsesor'])->name('eliminarAsesor');
    Route::get('/transacciones', [TransaccionController::class, 'transacciones'])->name('transacciones');
    Route::post('/registrarTransaccion', [TransaccionController::class, 'registrarTransaccion'])->name('registrarTransaccion');
    Route::put('/modificarTransaccion/{id}', [TransaccionController::class, 'modificarTransaccion'])->name('modificarTransaccion');
    Route::post('/eliminarTransaccion/{id}', [TransaccionController::class, 'eliminarTransaccion'])->name('eliminarTransaccion');
    Route::get('/reportes', [ReporteController::class, 'reportes'])->name('reportes');
    Route::get('/documents', [DocumentoController::class, 'documents'])->name('documents');
    Route::get('/mapas', [MapaController::class, 'mapas'])->name('mapas');
    Route::post('/registrarGerente', [UserController::class, 'registrarGerente'])->name('registrarGerente');
    Route::put('/modificarGerente/{id}', [UserController::class, 'modificarGerente'])->name('modificarGerente');
    Route::post('/eliminarGerente/{id}', [UserController::class, 'eliminarGerente'])->name('eliminarGerente');
    Route::get('/mis-documentos/{id}', [DocumentoController::class, 'misdocumentos'])->name('misdocumentos');
    Route::post('/registrarDocumento', [DocumentoController::class, 'registrarDocumento'])->name('registrarDocumento');
    Route::post('/eliminarDocumento/{id}', [DocumentoController::class, 'eliminarDocumento'])->name('eliminarDocumento');
    Route::get('/descargar-documento/{nombreArchivo}', function ($nombreArchivo) {
        $rutaArchivo = storage_path('app/public/documentos/' . $nombreArchivo);

        return Response::download($rutaArchivo);
    })->name('descargarDocumento');
});

/*JSONS*/
Route::get('/gerentes/json', [UserController::class, 'json']);
Route::get('/asesores/json', [AsesorController::class, 'json']);
Route::get('/propietarios/json', [PropietarioController::class, 'json']);
Route::get('/inmuebles/json', [InmuebleController::class, 'json']);
Route::get('/documentos/json', [DocumentoController::class, 'json']);
Route::get('/transacciones/json', [TransaccionController::class, 'json']);

/*Buscador*/
Route::get('/propietarios/{id}', [PropietarioController::class, 'buscar']);
Route::get('/asesores/{id}', [AsesorController::class, 'buscar']);
