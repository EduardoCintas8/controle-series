<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\Autenticador;
use App\Models\Episode;
use Illuminate\Http\Request;
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





Route::middleware('autenticador')->group(function () {



    Route::get('/', function () {
        return redirect('/series');
    });
    Route::resource('/series', SeriesController::class)
        ->except(['show']);
    Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])->name('seasons.index');
    Route::get('/seasons/{season}/episodes', [EpisodesController::class, 'index'])->name('episodes.index');
    Route::post('/seasons/{season}/episodes', [EpisodesController::class, 'update'])->name('episodes.update');
});
// Route::get('/teste', [TesteController::class, 'index'])->name('teste.index');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::get('/registrar', [UsersController::class, 'create'])->name('users.create');
Route::post('/registrar', [UsersController::class, 'store'])->name('users.store');
