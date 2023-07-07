<?php

use App\Http\Controllers\AsesorController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\GerenteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropietarioController;
use App\Http\Controllers\InmuebleController;
use App\Http\Controllers\MapaController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\TransaccionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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




Route::get('/home', [HomeController::class, 'index'])->name('home');
/* Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'main'])->name('base'); */
Route::get('/contactus', [ContactusController::class, 'contactus'])->name('contactus');
Route::get('/gerentes', [GerenteController::class, 'gerentes'])->name('gerentes');
Route::get('/propietarios', [PropietarioController::class, 'propietarios'])->name('propietarios');
Route::post('/registrarPropietario', [PropietarioController::class, 'registrarPropietario'])->name('registrarPropietario');
Route::put('/modificarPropietario/{id}', [PropietarioController::class, 'modificarPropietario'])->name('modificarPropietario');
Route::post('/eliminarPropietario/{id}', [PropietarioController::class, 'eliminarPropietario'])->name('eliminarPropietario');
Route::get('/perfil', [GerenteController::class, 'perfil'])->name('perfil_gerente');
Route::get('/inmuebles', [InmuebleController::class, 'inmuebles'])->name('inmuebles');
Route::post('/registrarInmueble', [InmuebleController::class, 'registrarInmueble'])->name('registrarInmueble');
Route::put('/modificarInmueble/{id}', [InmuebleController::class, 'modificarInmueble'])->name('modificarInmueble');
Route::post('/eliminarInmueble/{id}', [InmuebleController::class, 'eliminarInmueble'])->name('eliminarInmueble');
Route::get('/buscar-propietarios', [PropietarioController::class, 'buscarPropietarios'])->name('buscar-propietarios');
Route::get('/buscar-asesores', [AsesorController::class, 'buscarAsesores'])->name('buscar-asesores');
Route::post('/asignarAsesor/{id}', [InmuebleController::class, 'asignarAsesor'])->name('asignarAsesor');
Route::get('/asesores', [AsesorController::class, 'asesores'])->name('asesores');
Route::post('/registrarAsesor', [AsesorController::class, 'registrarAsesor'])->name('registrarAsesor');
Route::put('/modificarAsesor/{id}', [AsesorController::class, 'modificarAsesor'])->name('modificarAsesor');
Route::post('/eliminarAsesor/{id}', [AsesorController::class, 'eliminarAsesor'])->name('eliminarAsesor');
Route::get('/transacciones', [TransaccionController::class, 'transacciones'])->name('transacciones');
Route::get('/reportes', [ReporteController::class, 'reportes'])->name('reportes');
Route::get('/documentos', [DocumentoController::class, 'documentos'])->name('documentos');
Route::get('/mapas', [MapaController::class, 'mapas'])->name('mapas');
Route::post('/registrarGerente', [GerenteController::class, 'registrarGerente'])->name('registrarGerente');
Route::put('/modificarGerente/{id}', [GerenteController::class, 'modificarGerente'])->name('modificarGerente');
Route::post('/eliminarGerente/{id}', [GerenteController::class, 'eliminarGerente'])->name('eliminarGerente');
Route::get('/mis-documentos/{id}', [DocumentoController::class, 'misdocumentos'])->name('misdocumentos');
Route::post('/registrarDocumento', [DocumentoController::class, 'registrarDocumento'])->name('registrarDocumento');
Route::post('/eliminarDocumento/{id}', [DocumentoController::class, 'eliminarDocumento'])->name('eliminarDocumento');