<?php

use App\Http\Controllers\AnimalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GranjaController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(GranjaController::class)->group(function () {
    
    Route::match(['get', 'post'], '/', 'index')->name('animal.index');
    
    Route::post('/sumar', 'sumar')->name('animal.sumar');

    Route::get('/añadir', 'create')->name('animal.create');

    Route::post('/añadir', 'store')->name('animal.store');

    Route::get('/buscar', 'buscar')->name('animal.buscar');

    Route::post('/volcar', 'volcar')->name('animal.volcar');

    Route::get('/ver/{fichero}', 'AbrirNav')->name('animal.ver');

});