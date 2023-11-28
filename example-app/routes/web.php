<?php

use App\Http\Controllers\KontaktController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PrihlasenieController;
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

Route::get('/', [MainController::class, 'index'])->name('app_index');

Route::get('/kontakt', [KontaktController::class, 'get'])->name('app_kontakt');
Route::post('/kontakt', [KontaktController::class, 'post'])->name('app_kontakt');

Route::get('/doprava', [MainController::class, 'doprava'])->name('app_doprava');

Route::get('/registracia', [MainController::class, 'registracia'])->name('app_registracia');

Route::get('/reklamacie', [MainController::class, 'reklamacie'])->name('app_reklamacie');

Route::get('/prihlasenie', [PrihlasenieController::class, 'get'])->name('app_prihlasenie');
Route::post('/prihlasenie', [PrihlasenieController::class, 'post'])->name('app_prihlasenie');



