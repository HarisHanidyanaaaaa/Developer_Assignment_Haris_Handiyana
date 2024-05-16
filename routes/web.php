<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MasterObatController;
use App\Http\Controllers\MasterSignaController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\UserController;
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

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/check', [AuthController::class, 'check'])->name('check');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/login/authenticate', [AuthController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [AuthController::class, 'logout']);



Route::post('/User-Register', [UserController::class, 'register'])->name('User-Register');
Route::middleware('auth')->group(
    function () {
        Route::get('/User-Index', [UserController::class, 'index'])->name('User-Index');
        Route::post('/User-Store', [UserController::class, 'store'])->name('User-Store');
        
        Route::put('/User-Update/{id}', [UserController::class, 'update'])->name('User-Update');
        Route::delete('/User-Delete/{id}', [UserController::class, 'destroy'])->name('User-Delete');
    }
);

Route::middleware('auth')->group(
    function () {
        Route::get('/Resep-Index', [ResepController::class, 'index'])->name('Resep-Index');
        Route::post('/Resep-Store', [ResepController::class, 'store'])->name('Resep-Store');
        Route::put('/Resep-Update/{id}', [ResepController::class, 'update'])->name('Resep-Update');
        Route::delete('/Resep-Delete/{id}', [ResepController::class, 'destroy'])->name('Resep-Delete');
        Route::post('/racikan-store', [ResepController::class, 'storeRacikan'])->name('Racikan-Store');
        Route::get('/printrow/{id}', [ResepController::class, 'printrow'])->name('print.row');
    }
);

Route::middleware('auth')->group(
    function () {
Route::get('/Master-Obat-Index', [MasterObatController::class, 'index'])->name('Master-Obat-Index');
    }
);
Route::middleware('auth')->group(
    function () {
Route::get('/Master-Signa-Index', [MasterSignaController::class, 'index'])->name('Master-Signa-Index');
    }
);