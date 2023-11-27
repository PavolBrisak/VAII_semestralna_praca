<?php

use App\Http\Controllers\MainController;
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
Route::get('/kontakt', [MainController::class, 'kontakt'])->name('app_kontakt');
Route::get('/doprava', [MainController::class, 'doprava'])->name('app_doprava');
Route::get('/prihlasenie', [MainController::class, 'prihlasenie'])->name('app_prihlasenie');
Route::get('/registracia', [MainController::class, 'registracia'])->name('app_registracia');
Route::get('/reklamacie', [MainController::class, 'reklamacie'])->name('app_reklamacie');



