<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\KriteriaController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware(['belum_login'])->group(function () {
    Route::get('/','App\Http\Controllers\AdminController@indexExt');
    Route::get('/login','App\Http\Controllers\AdminController@indexExt');
    Route::post('aksilogin','App\Http\Controllers\AdminController@aksilogin')->name('login-admin');
});

Route::middleware(['sudah_login'])->group(function () {
    Route::get('logout','App\Http\Controllers\AdminController@logout')->name('logout');
    Route::get('welcome','App\Http\Controllers\HomeController@index')->name('welcome');

    //Admin
    Route::get('/admin',[AdminController::class, 'index'])->name('admin');
    Route::get('/admin/create',[AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin',[AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/{admin}',[AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/{admin}',[AdminController::class, 'update'])->name('admin.update');
    Route::get('/admin/delete/{admin}',[AdminController::class, 'destroy'])->name('admin.delete');

    //Murid
    Route::get('/murid',[MuridController::class, 'index'])->name('murid');
    Route::get('/murid/create',[MuridController::class, 'create'])->name('murid.create');
    Route::post('/murid',[MuridController::class, 'store'])->name('murid.store');
    Route::get('/murid/{murid}',[MuridController::class, 'edit'])->name('murid.edit');
    Route::put('/murid/{murid}',[MuridController::class, 'update'])->name('murid.update');
    Route::get('/murid/delete/{murid}',[MuridController::class, 'destroy'])->name('murid.delete');

    // Kriteria
    Route::get('/kriteria',[KriteriaController::class, 'index'])->name('kriteria');
    Route::get('/kriteria/create',[KriteriaController::class, 'create'])->name('kriteria.create');
    Route::post('/kriteria',[KriteriaController::class, 'store'])->name('kriteria.store');
    Route::get('/kriteria/{kriteria}',[KriteriaController::class, 'edit'])->name('kriteria.edit');
    Route::put('/kriteria/{kriteria}',[KriteriaController::class, 'update'])->name('kriteria.update');
    Route::get('/kriteria/delete/{kriteria}',[KriteriaController::class, 'destroy'])->name('kriteria.delete');
});
