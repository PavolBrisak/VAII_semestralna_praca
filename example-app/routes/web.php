<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\KontaktController;
use App\Http\Controllers\KosikController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ObjednavkaController;
use App\Http\Controllers\PrihlasenieController;
use App\Http\Controllers\ProduktController;
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

Route::get('/moj-ucet', [MainController::class, 'ucet'])->name('app_ucet')->middleware('auth');

Route::get('/zabudnute-heslo', [ZabudnuteHesloController::class, 'get'])->name('app_zabudnute-heslo');
Route::post('/zabudnute-heslo', [ZabudnuteHesloController::class, 'post'])->name('app_zabudnute-heslo');

Route::resource('users', 'UsersController');
Route::get('/odhlasit_sa', [UsersController::class, 'odhlasenie'])->name('app_odhlasenie')->middleware('auth');

Route::get('/zmena-mena', [UsersController::class, 'zmena_mena_index'])->name('app_zmena_mena')->middleware('auth');
Route::post('/zmena-mena', [UsersController::class, 'zmena_mena'])->name('app_zmena_mena');

Route::get('/zmena-hesla', [UsersController::class, 'zmena_hesla_index'])->name('app_zmena_hesla')->middleware('auth');
Route::post('/zmena-hesla', [UsersController::class, 'zmena_hesla'])->name('app_zmena_hesla');

Route::get('/zrusit-ucet-index', [UsersController::class, 'zrusit_ucet_index'])->name('app_zrusit_ucet_index')->middleware('auth');
Route::post('/zrusit-ucet', [UsersController::class, 'zrusit_ucet'])->name('app_zrusit_ucet');

Route::get('/moje-objednavky', [UsersController::class, 'moje_objednavky'])->name('app_moje_objednavky')->middleware('auth');
Route::get('/moje-objednavky/id={id}', [UsersController::class, 'zobraz_objednavku'])->name('app_zobraz_objednavku')->middleware('auth');
Route::get('/vlozit-produkt', [ProduktController::class, 'vlozit_produkt'])->name('app_vlozit_produkt')->middleware('preventDirectAccess');

Route::get('/upravit-produkt-index', [ProduktController::class, 'upravit_produkt_index'])->name('app_upravit_produkt_index')->middleware('preventDirectAccess');
Route::get('/upravit-produkt-index/id={id}', [ProduktController::class, 'upravit_produkt_id_index'])->name('app_upravit_produkt_id_index')->middleware('preventDirectAccess');
Route::post('/upravit-produkt', [ProduktController::class, 'upravit_produkt'])->name('app_upravit_produkt')->middleware('preventDirectAccess');

Route::post('/ajax/filterProducts', [AjaxController::class, 'filterProducts'])->name('app_ajax_filterProducts');
Route::get('/upravit-objednavky-index', [ObjednavkaController::class, 'upravit_objednavky_index'])->name('app_upravit_objednavky_index')->middleware('preventDirectAccess');
Route::any('/upravit-objednavky-index/id={id}', [ObjednavkaController::class, 'upravit_objednavky_id_index'])->name('app_upravit_objednavku')->middleware('preventDirectAccess');
Route::post('/ajax/filterOrdersDate', [AjaxController::class, 'filterOrdersDate'])->name('app_ajax_filterOrdersDate');
Route::post('/ajax/filterOrdersStatus', [AjaxController::class, 'filterOrdersStatus'])->name('app_ajax_filterOrdersStatus');
Route::post('/ajax/filterOrdersCustomer', [AjaxController::class, 'filterOrdersCustomer'])->name('app_ajax_filterOrdersCustomer');
Route::post('/ajax/filterOrdersById', [AjaxController::class, 'filterOrdersById'])->name('app_ajax_filterOrdersById');
Route::post('/ajax/updateOrderStatus', [AjaxController::class, 'updateOrderStatus'])->name('app_ajax_updateOrderStatus');

Route::post('/vlozit-produkt', [ProduktController::class, 'vlozit_produkt_index'])->name('app_vlozit_produkt');
Route::get('/produkt/id={id}', [ProduktController::class, 'produkt'])->name('app_produkt');
Route::get('/vyhladať', [ProduktController::class, 'vyhladat'])->name('app_vyhladaj');
Route::post('/ajax/refreshNaSklade', [AjaxController::class, 'refreshNaSklade'])->name('app_ajax_refreshNaSklade');
Route::post('/ajax/updateQuantity', [AjaxController::class, 'updateQuantity'])->name('app_ajax_update_quantity');
Route::get('/pridat-do-kosika/id={id}', [KosikController::class, 'pridat_do_kosika'])->name('app_pridaj_do_kosika')->middleware('auth');
Route::get('/vymazat-z-kosika/id={id}', [KosikController::class, 'vymazat_z_kosika'])->name('app_vymazat_z_kosika')->middleware('auth');
Route::get('/kosik', [KosikController::class, 'kosik'])->name('app_kosik')->middleware('auth');

Route::get('/kategorie/{kategoria}', [ProduktController::class, 'kategoria'])->name('app_kategoria');
Route::get('/vypredaj', [ProduktController::class, 'vypredaj'])->name('app_vypredaj');
Route::get('/najpredavanejsie', [ProduktController::class, 'najpredavanejsie'])->name('app_najpredavanejsie');

Route::get('/vytvor-objednavku', [ObjednavkaController::class, 'vytvor_objednavku'])->name('app_vytvor_objednavku')->middleware('auth');
Route::post('/ajax/sendOrder', [AjaxController::class, 'sendOrder'])->name('app_ajax_sendOrder');
Route::get('/objednavka/{id}', [ObjednavkaController::class, 'objednavka_detail'])->name('app_objednavka_detail')->middleware('auth');
