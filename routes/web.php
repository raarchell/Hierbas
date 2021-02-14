<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'App\Http\Controllers\HomeController@index')
    ->name('home');

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', 'App\Http\Controllers\AdminController@index')
            ->name('dashboard');
        // kategori
        Route::get('/kategori', 'App\Http\Controllers\KategoriController@index')
            ->name('tabelkategori');
        Route::get('/addkategori', 'App\Http\Controllers\KategoriController@indexAdd')
            ->name('addkategori');
        Route::post('/addkategori/store', 'App\Http\Controllers\KategoriController@store')
            ->name('storekategori');
        Route::post('/delete/{id}', 'App\Http\Controllers\KategoriController@delete')
            ->name('delete');
        Route::get('/edit/{id}', 'App\Http\Controllers\KategoriController@indexEdit')
            ->name('edit');
        Route::post('/edit/update/{id}', 'App\Http\Controllers\KategoriController@update')
            ->name('update');

        //contactus
        Route::get('/pesan', 'App\Http\Controllers\ContactusController@index')
            ->name('contactus');
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contactus', 'App\Http\Controllers\ContactusController@Adduser')
    ->name('addsaran');
Route::post('/contactus/store', 'App\Http\Controllers\ContactusController@store')
    ->name('storepesan');
