<?php

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\AdministradorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\UsersController;

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
// Route::resource('estudiante', EstudianteController::class)->middleware('verified');
Route::get('estudiante/create', [EstudianteController::class, 'create'])->name('estudiante.create');
Route::post('estudiante/store', [EstudianteController::class, 'store'])->name('estudiante.store');
Route::get('estudiante/show/{estudiante}', [EstudianteController::class, 'show'])->name('estudiante.show');
Route::get('estudiante/edit/{estudiante}', [EstudianteController::class, 'edit'])->name('estudiante.edit');
Route::patch('estudiante/update/{estudiante}', [EstudianteController::class, 'update'])->name('estudiante.update');
Route::delete('estudiante/destroy/{estudiante}', [EstudianteController::class, 'destroy'])->name('estudiante.destroy');
Route::get('estudiante/mi-proyecto', [EstudianteController::class, 'estudianteproyecto'])->name('estudianteproyecto');

//Rutas de administradores
Route::get('administrador/estudiantes', [AdministradorController::class, 'adminEstudiantes'])->name('adminEstudiantes');
Route::get('administrador/profesores', [AdministradorController::class, 'adminProfesores'])->name('adminProfesores');
Route::get('administrador/usuarios', [AdministradorController::class, 'adminUsuarios'])->name('adminUsuarios');


// Route::resource('profesor', ProfesorController::class)->middleware('verified');
//Rutas de profesores
Route::get('profesor/create', [ProfesorController::class, 'create'])->name('profesor.create');
Route::post('profesor/store', [ProfesorController::class, 'store'])->name('profesor.store');
Route::get('profesor/show/{profesor}', [ProfesorController::class, 'show'])->name('profesor.show');
Route::get('profesor/edit/{profesor}', [ProfesorController::class, 'edit'])->name('profesor.edit');
Route::patch('profesor/update/{profesor}', [ProfesorController::class, 'update'])->name('profesor.update');
Route::delete('profesor/destroy/{profesor}', [ProfesorController::class, 'destroy'])->name('profesor.destroy');
Route::post('profesor/{profesor}/nrcsrua', [ProfesorController::class, 'agregarNrc'])->name('profesor.nrc');

//Ruta de usuarios
Route::get('mi-cuenta', [UsersController::class, 'miCuenta'])->name('user.cuenta');
Route::patch('mi-cuenta/{user}', [UsersController::class, 'actualizarCuenta'])->name('user.actualizar');

