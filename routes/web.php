<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [FrontController::class, 'index'])->name('home');

Route::get('admin/brand', [BrandController::class, 'index'])->name('admin.index.brand');
Route::get('admin/add/brand', [BrandController::class, 'create'])->name('admin.create.brand');
Route::post('admin/add/brand/save', [BrandController::class, 'store'])->name('admin.store.brand');
Route::get('admin/edit/brand/{id}', [BrandController::class, 'edit'])->name('admin.edit.brand');
Route::put('admin/update/brand/save/{id}', [BrandController::class, 'update'])->name('admin.update.brand');
Route::delete('admin/delete/brand/{id}', [BrandController::class, 'destroy'])->name('admin.destroy.brand');

Route::get('admin/post', [PostController::class, 'index'])->name('admin.index.post');
Route::get('admin/add/post', [PostController::class, 'create'])->name('admin.create.post');
Route::post('admin/add/post/save', [PostController::class, 'store'])->name('admin.store.post');
Route::get('admin/edit/post/{id}', [PostController::class, 'edit'])->name('admin.edit.post');
Route::put('admin/update/post/save/{id}', [PostController::class, 'update'])->name('admin.update.post');
Route::delete('admin/delete/post/{id}', [PostController::class, 'destroy'])->name('admin.destroy.post');