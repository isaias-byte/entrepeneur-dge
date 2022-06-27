<?php

use App\Http\Controllers\AdministradorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\ProfesorController;

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//  Rutas de estudiantes
Route::resource('estudiante', EstudianteController::class)->middleware('verified');

//Rutas de administradores
Route::get('administrador/estudiantes', [AdministradorController::class, 'adminEstudiantes'])->name('adminEstudiantes');
Route::get('administrador/usuarios', [AdministradorController::class, 'adminUsuarios'])->name('adminUsuarios');

//Rutas de profesores
Route::get('profesor/create', [ProfesorController::class, 'create'])->name('profesorCreate');
Route::post('profesor/store', [ProfesorController::class, 'store'])->name('profesorStore');
Route::get('profesor/show/{id}', [ProfesorController::class, 'show'])->name('profesorShow');
Route::get('profesor/edit/{id}', [ProfesorController::class, 'edit'])->name('profesorEdit');
Route::patch('profesor/update/{id}', [ProfesorController::class, 'update'])->name('profesorUpdate');
Route::delete('profesor/destroy/{id}', [ProfesorController::class, 'destroy'])->name('profesorDestroy');