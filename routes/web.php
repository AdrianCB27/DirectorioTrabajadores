<?php

use App\Http\Controllers\TrabajadorController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [TrabajadorController::class,'index'])->name('trabajadores.index');
Route::get('/create', [TrabajadorController::class,'create'])->name('trabajadores.create');

Route::get('/{parametro}', [TrabajadorController::class, 'buscar'])->name('buscar');
Route::get('/show/{id}', [TrabajadorController::class,'show'])->name('trabajadores.show');

Route::post('/store', [TrabajadorController::class,'store'])->name('trabajadores.store');
Route::get('/edit/{id}', [TrabajadorController::class,'edit'])->name('trabajadores.edit');
Route::put('/update/{id}', [TrabajadorController::class,'update'])->name('trabajadores.update');
Route::delete('/destroy/{id}', [TrabajadorController::class,'destroy'])->name('trabajadores.destroy');






