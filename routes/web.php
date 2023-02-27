<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EmpleadoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

//CREACION DE GRUPO DE RUTAS PARAN QUE SOLO SEAN ACCESIBLES CUANDO SE ESTE LOGUEADO
Route::group(['middleware' => 'auth'], function () {
  Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
  //RUTA TIPO RESOURCE PARA QUE CREE TODAS LAS RUTAS DEL CRUD DE EMPRESAS
  Route::resource('empresas',EmpresaController::class)->names('empresas');
  //RUTA TIPO RESOURCE PARA QUE CREE TODAS LAS RUTAS DEL CRUD DE EMPLEADOS
  Route::resource('empleados',EmpleadoController::class)->names('empleados');
});
