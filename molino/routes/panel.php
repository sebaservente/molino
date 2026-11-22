<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriaAdminController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/admin/productos', [AdminController::class, 'productos'])->name('admin.productos');
    Route::post('/admin/productos/{id}/visible', [AdminController::class, 'visible'])->whereNumber('id')->name('admin.visible');
    Route::get('/admin/categorias', [CategoriaAdminController::class, 'index'])->name('admin.categorias');
    Route::get('/admin/categorias/crear', [CategoriaAdminController::class, 'formulario'])->name('admin.categorias.crear');
    Route::post('/admin/categorias/crear', [CategoriaAdminController::class, 'guardar'])->name('admin.categorias.guardar');
    Route::get('/admin/categorias/{id}/editar', [CategoriaAdminController::class, 'formulario'])->whereNumber('id')->name('admin.categorias.editar');
    Route::post('/admin/categorias/{id}/editar', [CategoriaAdminController::class, 'guardar'])->whereNumber('id')->name('admin.categorias.actualizar');
    Route::post('/admin/categorias/{id}/borrar', [CategoriaAdminController::class, 'borrar'])->whereNumber('id')->name('admin.categorias.borrar');
});
