<?php

use App\Http\Controllers\AsesorController;
use App\Http\Controllers\GerenteController;
use App\Http\Controllers\HomeController;

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
Route::get('/asesores', [AsesorController::class, 'asesores'])->name('asesores');
