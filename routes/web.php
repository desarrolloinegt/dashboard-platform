<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
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


Route::group(['middleware' => ['role:Supervisor_Encabih']], function () {
    //rutas accesibles solo para Supervisores
    Route::get('/encabih', [DashboardController::class, 'encabih'])->name('dashboards.encabih');
   
});

Route::group(['middleware' => ['role:Supervisor_Encovi']], function () {
    //rutas accesibles solo para Supervisores
    Route::get('/encovi', [DashboardController::class, 'encovi'])->name('dashboards.encovi');
});
require __DIR__.'/auth.php';
