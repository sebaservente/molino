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

Route::get('/carta/desayunos', [\App\Http\Controllers\CartaController::class, 'desayunos'])->name('desayunos');
Route::get('/carta/cafeteria', [\App\Http\Controllers\CartaController::class, 'cafeteria'])->name('cafeteria');
Route::get('/carta/bebidas', [\App\Http\Controllers\CartaController::class, 'bebidas'])->name('bebidas');
Route::get('/carta/platos', [\App\Http\Controllers\CartaController::class, 'platos'])->name('platos');
Route::get('/carta/ensaladas', [\App\Http\Controllers\CartaController::class, 'ensaladas'])->name('ensaladas');
Route::get('/carta/licuados', [\App\Http\Controllers\CartaController::class, 'licuados'])->name('licuados');
Route::get('/carta/postres', [\App\Http\Controllers\CartaController::class, 'postres'])->name('postres');
Route::get('/carta/promos', [\App\Http\Controllers\CartaController::class, 'promos'])->name('promos');


Route::get('/admin/mill', [\App\Http\Controllers\AuthController::class, 'login'])->name('login')->middleware(['guest']);
Route::post('/admin/mill', [\App\Http\Controllers\AuthController::class, 'loginIn'])->name('login.In')->middleware(['guest']);
Route::post('/admin/mill/cerrarSession', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout')->middleware(['auth']);
Route::get('/admin/auth/recuperar-password', [\App\Http\Controllers\RecuperarPasswordController::class, 'recuperarPassword'])->name('password.request')->middleware(['guest']);
Route::post('/admin/auth/recuperar-password', [\App\Http\Controllers\RecuperarPasswordController::class, 'recuperarPasswordPost'])->name('password.email')->middleware(['guest']);
Route::get('/admin/auth/reset-password/{token}', [\App\Http\Controllers\RecuperarPasswordController::class, 'resetPassword'])->name('password.reset')->middleware(['guest']);
Route::post('/admin/auth/reset-password', [\App\Http\Controllers\RecuperarPasswordController::class, 'updatePassword'])->name('password.update')->middleware(['guest']);

Route::get('/admin/home', [\App\Http\Controllers\AdminController::class, 'home'])->name('admin.home')->middleware(['auth']);
Route::get('/admin/create', [\App\Http\Controllers\AdminController::class, 'create'])->name('admin.create')->middleware(['auth']);
Route::post('/admin/create', [\App\Http\Controllers\AdminController::class, 'createConfirm'])->name('admin.create.confirm')->middleware(['auth']);
Route::post('/admin/create/{id}/delete', [\App\Http\Controllers\AdminController::class, 'delete'])->name('admin.delete')->whereNumber('id')->middleware(['auth']);
Route::get('/admin/upload/{id}', [\App\Http\Controllers\AdminController::class, 'upload'])->name('admin.upload')->whereNumber('id')->middleware(['auth']);
Route::post('/admin/upload/{id}/uploadConfirm', [\App\Http\Controllers\AdminController::class, 'uploadConfirm'])->name('admin.uploadConfirm')->whereNumber('id')->middleware(['auth']);

Route::get('/admin/papelera', [\App\Http\Controllers\AdminController::class, 'papelera'])->name('admin.papelera')->middleware(['auth']);
Route::post('/admin/papelera/{id}', [\App\Http\Controllers\AdminController::class, 'restaurar'])->name('admin.restaurar')->whereNumber('id')->middleware(['auth']);
Route::post('/admin/papelera/{id}/delete', [\App\Http\Controllers\AdminController::class, 'eliminar'])->name('admin.eliminar')->whereNumber('id')->middleware(['auth']);

Route::get('/admin/productos/desayuno', [\App\Http\Controllers\AdminController::class, 'desayuno'])->name('admin.desayuno')->middleware(['auth']);
Route::get('/admin/productos/cafeteria', [\App\Http\Controllers\AdminController::class, 'cafeteria'])->name('admin.cafeteria')->middleware(['auth']);
Route::get('/admin/productos/bebidas', [\App\Http\Controllers\AdminController::class, 'bebidas'])->name('admin.bebidas')->middleware(['auth']);
Route::get('/admin/productos/ensaladas', [\App\Http\Controllers\AdminController::class, 'ensaladas'])->name('admin.ensaladas')->middleware(['auth']);
Route::get('/admin/productos/platos', [\App\Http\Controllers\AdminController::class, 'platos'])->name('admin.platos')->middleware(['auth']);
Route::get('/admin/productos/licuados', [\App\Http\Controllers\AdminController::class, 'licuados'])->name('admin.licuados')->middleware(['auth']);
Route::get('/admin/productos/postres', [\App\Http\Controllers\AdminController::class, 'postres'])->name('admin.postres')->middleware(['auth']);
Route::get('/admin/productos/promos', [\App\Http\Controllers\AdminController::class, 'promos'])->name('admin.promos')->middleware(['auth']);
Route::get('/admin/productos/platoDia', [\App\Http\Controllers\AdminController::class, 'platoDia'])->name('admin.platoDia')->middleware(['auth']);



