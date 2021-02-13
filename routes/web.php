<?php

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

Route::get('/', 'App\Http\Controllers\HomeController@index')
    ->name('home');
//kategori
Route::get('/kategori', 'App\Http\Controllers\KategoriController@indexKategori')
    ->name('kategori');
//resep
Route::get('/resep', 'App\Http\Controllers\ResepController@indexResep')
    ->name('resep');

Route::prefix('admin')
    ->middleware(['auth','admin'])
    ->group(function(){
        Route::get('/', 'App\Http\Controllers\AdminController@index')
            ->name('dashboard');
        // kategori
        Route::get('/kategori', 'App\Http\Controllers\KategoriController@index')
            ->name('tabelkategori');
        Route::get('/addkategori', 'App\Http\Controllers\KategoriController@indexAdd')
            ->name('addkategori');
        Route::post('/addkategori/store', 'App\Http\Controllers\KategoriController@store')
            ->name('storekategori');
        Route::post('/delete/{id}','App\Http\Controllers\KategoriController@delete')
            ->name('delete');
        Route::get('/edit/{id}', 'App\Http\Controllers\KategoriController@indexEdit')
            ->name('edit');
        Route::post('/edit/update/{id}', 'App\Http\Controllers\KategoriController@update')
            ->name('update');
        // resep
        Route::get('/resep', 'App\Http\Controllers\ResepController@index')
            ->name('tabelresep');
        Route::get('/addresep', 'App\Http\Controllers\ResepController@indexAdd')
            ->name('addresep');
        Route::post('/addresep/store', 'App\Http\Controllers\ResepController@store')
            ->name('storeresep');
        Route::post('/delete/{id}','App\Http\Controllers\ResepController@delete')
            ->name('delete');
        Route::get('/edit/{id}', 'App\Http\Controllers\ResepController@indexEdit')
            ->name('editresep');
        Route::post('/edit/update/{id}', 'App\Http\Controllers\ResepController@update')
            ->name('update');
    });

Auth::routes();
