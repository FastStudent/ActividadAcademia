<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\SeccionController;

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

use App\Models\Seccion;
use App\Models\Alumno;

Route::get('/', function () {
    return view('welcome');
})->name('home');

//Route::post('/secciones/{seccion}/asignar-alumnos', [SeccionController::class, 'asignarAlumnos'])->name('seccion.asignarAlumnos');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::get('/asignar-alumnos', [SeccionController::class, 'vistaAsignar'])->name('seccion.vistaAsignar');
Route::post('/asignar-alumnos', [SeccionController::class, 'asignarAlumnos'])->name('seccion.asignarAlumnos');



Route::get('/dashboard', function () {
    $secciones = Seccion::with('alumnos')->get();
    $alumnos = Alumno::all();
    return view('dashboard', compact('secciones', 'alumnos'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('alumno/{alumno}/actualizar-secciones', [AlumnoController::class, 'actualizarSeccionesAlumno'])
    ->name('alumno.actualizar-secciones')
    ->middleware(['auth']);

Route::resource('alumno', AlumnoController::class)->middleware(['auth']);

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
