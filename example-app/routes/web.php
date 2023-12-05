<?php

use App\Http\Controllers\KontaktController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PrihlasenieController;
use App\Http\Controllers\RegistraciaController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ZabudnuteHesloController;
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

Route::get('/registracia', [RegistraciaController::class, 'get'])->name('app_registracia');
Route::post('/registracia', [RegistraciaController::class, 'post'])->name('app_registracia');


Route::get('/reklamacie', [MainController::class, 'reklamacie'])->name('app_reklamacie');

Route::get('/prihlasenie', [PrihlasenieController::class, 'get'])->name('app_prihlasenie');
Route::post('/prihlasenie', [PrihlasenieController::class, 'post'])->name('app_prihlasenie');

Route::get('/moj-ucet', [MainController::class, 'ucet'])->name('app_ucet');

Route::get('/zabudnute-heslo', [ZabudnuteHesloController::class, 'get'])->name('app_zabudnute-heslo');
Route::post('/zabudnute-heslo', [ZabudnuteHesloController::class, 'post'])->name('app_zabudnute-heslo');

Route::resource('users', 'UsersController');
Route::get('/odhalsit_sa', [UsersController::class, 'odhlasenie'])->name('app_odhlasenie');

Route::get('/zmena-mena', [UsersController::class, 'zmena_mena_index'])->name('app_zmena_mena');
Route::post('/zmena-mena', [UsersController::class, 'zmena_mena'])->name('app_zmena_mena');

Route::get('/zmena-hesla', [UsersController::class, 'zmena_hesla_index'])->name('app_zmena_hesla');
Route::post('/zmena-hesla', [UsersController::class, 'zmena_hesla'])->name('app_zmena_hesla');

