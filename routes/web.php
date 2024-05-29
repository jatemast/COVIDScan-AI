<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\HistoriasController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/consulta', [ConsultaController::class, 'showForm'])->name('consulta.form');
Route::post('/consulta', [ConsultaController::class, 'sendConsulta'])->name('consulta.send');
Route::post('guardar/historia', [HistoriasController::class, 'store'])->name('consulta.store');
Route::get('/historias', [HistoriasController::class, 'showHistorial'])->name('historias.medicas');
Route::get('/historial/consulta/{cedula}', [HistoriasController::class, 'buscarPorCedula'])->name('historial.consulta.cedula');
