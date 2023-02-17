<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontendController;
use App\Http\Controllers\AdminController;

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

Route::get('/',[frontendController::class,'index'])->name('/');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');
Route::post('/input-info',[AdminController::class,'inputInfo'])->name('input-info');
Route::get('/edit-data/{id}',[AdminController::class,'editData'])->name('edit-data');
Route::post('/update-data',[AdminController::class,'updateData'])->name('update-data');
Route::post('/delete-data',[AdminController::class,'deleteData'])->name('delete-data');
});
