<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontEndController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;

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



Route::middleware(['auth'])->group(function () {

    Route::get('/', [DashboardController::class,'index'])->name('index');

    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

    Route::get('user', [UserController::class, 'index'])->name('user');
    Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('user/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('user/update', [UserController::class, 'update'])->name('user.update');
    Route::get('user/destroy', [UserController::class, 'destroy'])->name('destroy.create');

    Route::get('kategori', [KategoriController::class, 'index'])->name('kategori');
    Route::get('kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::post('kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::get('kategori/destroy/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');


    Route::get('produk', [ProdukController::class, 'index'])->name('produk');
    Route::get('produk/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('produk/store', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::post('produk/update/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::get('produk/destroy/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
});
Route::get('linktree',[FrontEndController::class,'index'])->name('linktree');
Route::get('linktree/{id}',[FrontEndController::class,'kategori'])->name('linktree.kategori');
Route::post('linktree/pencarian',[FrontEndController::class,'search'])->name('linktree.search');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
