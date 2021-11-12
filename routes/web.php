<?php

use App\Http\Controllers\SuratController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', [App\Http\Controllers\SuratController::class, 'index']);
Route::get('/arsip', [App\Http\Controllers\SuratController::class, 'index'])->name('arsip');
Route::get('/arsip/create', [App\Http\Controllers\SuratController::class, 'create'])->name('arsip.create');
Route::post('/arsip/store', [App\Http\Controllers\SuratController::class, 'store'])->name('arsip.store');
Route::delete('/arsip/delete/{surat}', [App\Http\Controllers\SuratController::class, 'delete'])->name('arsip.delete');
Route::get('/arsip/{surat}/edit', [App\Http\Controllers\SuratController::class, 'edit'])->name('arsip.edit');
Route::patch('/arsip/update/{surat}', [App\Http\Controllers\SuratController::class, 'update'])->name('arsip.update');
Route::get('/arsip/detail/{surat}', [App\Http\Controllers\SuratController::class, 'detail'])->name('arsip.detail');
Route::get('/about', [App\Http\Controllers\SuratController::class, 'about'])->name('arsip.about');
Auth::routes(['register'=>true,'reset'=>false]);
