<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KlantController;
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


    // inloggen
    Route::view('/login', '/admin/login')->name('login');
    Route::post('/login/admin/submit', [AdminController::class,'login']);
    Route::get('/logout', [AdminController::class,'logout']);

    //registeren
    Route::view('/register', '/Admin/registreren');
    Route::post('/admin/register/submit', [AdminController::class,'register']);
    
    Route::view('forgot-password', '/admin/forgot-password');
    Route::post('forgot-password/submit', [AdminController::class, 'forgotPassword']);

    //admin main
    Route::group(['middleware' => ['checkLogin']], function () {
        Route::get('/admin', [AdminController::class,'admin']);
        // other admin routes
    });

//om 1 bestelling te zien die jij wilt
Route::get('/admin/show/{id}', [AdminController::class,'ShowBestelling']);

//om 1 bestelling t kunnen wijzigen
Route::get('/admin/update/{id}', [AdminController::class,'updateShowBestelling']);
Route::post('/admin/update/submit', [AdminController::class,'updateBestelling']);

// bestelling te kunnen verwijderen
Route::get('/admin/delete/{id}', [AdminController::class,'delete']);

//kamers admin

Route::get('/admin/insertKamer', [AdminController::class,'insertshowKamer']);
Route::post('/admin/insertKamer/submit', [AdminController::class, 'insertKamer']);

Route::get('/admin/insertKamer/show/{id}', [AdminController::class,'kamer']);

Route::get('/admin/insertKamer/update/{id}', [AdminController::class,'updateShowKamer']);
Route::post('/admin/insertKamer/update/submit', [AdminController::class,'updateKamer']);

Route::get('/admin/insertKamer/delete/{id}', [AdminController::class,'delete_kamer']);



//Klanten
Route::get('/klant/selectDate', [KlantController::class,'selectDate']);

Route::get('/klant/insertBestelling ', [KlantController::class,'showInsertForm']);
Route::post('/klant/insertBestelling/submit', [KlantController::class,'insertKlant']);

Route::get('/klant/kamer_overzicht', [KlantController::class,'show_kamers']);

Route::get('/klant/factuur', [KlantController::class,'factuur']);

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
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Planetcontroller;
// use App\Http\Controllers\SolarSystemController;
// Route::get('/planeten', [Planetcontroller::class,'show']);
// Route::get('/planets', [Planetcontroller::class,'relation']);
// Route::get('/planet/{name}', [Planetcontroller::class,'showPlanets']);

// Route::get('/solar', [SolarSystemController::class,'show']);
// Route::get('/solar/{id}', [SolarSystemController::class,'planeten',]);
