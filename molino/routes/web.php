<?php

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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::get('/carta.desayunos', [\App\Http\Controllers\CartaController::class, 'desayunos'])->name('desayunos');
Route::get('/carta.cafeteria', [\App\Http\Controllers\CartaController::class, 'cafeteria'])->name('cafeteria');
Route::get('/carta.bebidas', [\App\Http\Controllers\CartaController::class, 'bebidas'])->name('bebidas');
Route::get('/carta.platos', [\App\Http\Controllers\CartaController::class, 'platos'])->name('platos');
Route::get('/carta.ensaladas', [\App\Http\Controllers\CartaController::class, 'ensaladas'])->name('ensaladas');


Route::get('/admin.mill', [\App\Http\Controllers\AdminController::class, 'admin'])->name('admin');
Route::get('/admin.ingreso', [\App\Http\Controllers\AdminController::class, 'create'])->name('admin.create');
Route::post('/admin.ingreso', [\App\Http\Controllers\AdminController::class, 'createConfirm'])->name('admin.create.confirm');
