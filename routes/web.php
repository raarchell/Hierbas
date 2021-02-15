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
//kategori
Route::get('/kategori', 'App\Http\Controllers\KategoriController@indexKategori')
    ->name('kategori');
//resep
Route::get('/resep', 'App\Http\Controllers\ResepController@indexResep')
    ->name('resep');
Route::get('/postresep/{id}', 'App\Http\Controllers\ResepController@indexPostResep')
    ->name('postresep');
Route::post('/postresep/comment', 'App\Http\Controllers\ResepController@comment')
    ->name('storecomment');

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

        // resep
        Route::get('/resep', 'App\Http\Controllers\ResepController@index')
            ->name('tabelresep');
        Route::get('/addresep', 'App\Http\Controllers\ResepController@indexAdd')
            ->name('addresep');
        Route::post('/addresep/store', 'App\Http\Controllers\ResepController@store')
            ->name('storeresep');
        Route::post('/delete/{id}', 'App\Http\Controllers\ResepController@delete')
            ->name('delete');
        Route::get('/edit/{id}', 'App\Http\Controllers\ResepController@indexEdit')
            ->name('editresep');
        Route::post('/edit/update/{id}', 'App\Http\Controllers\ResepController@update')
            ->name('update');

        //artikel
        Route::get('/artikel', 'App\Http\Controllers\ArtikelController@index')
            ->name('tabelartikel');
        Route::get('/addartikel', 'App\Http\Controllers\ArtikelController@indexAdd')
            ->name('addartikel');
        Route::post('/addartikel/store', 'App\Http\Controllers\ArtikelController@store')
            ->name('storeartikel');
        Route::post('/delete/{id}', 'App\Http\Controllers\ArtikelController@delete')
            ->name('delete');
        Route::get('/edit/{id}', 'App\Http\Controllers\ArtikelController@indexEdit')
            ->name('editartikel');
        Route::post('/edit/update/{id}', 'App\Http\Controllers\ArtikelController@update')
            ->name('update');

        //tanaman
        Route::get('/tanaman', 'App\Http\Controllers\TanamanController@index')
            ->name('tabeltanaman');
        Route::get('/addtanaman', 'App\Http\Controllers\TanamanController@indexAdd')
            ->name('addtanaman');
        Route::post('/addtanaman/store', 'App\Http\Controllers\TanamanController@store')
            ->name('storetanaman');
<<<<<<< HEAD
        Route::post('/delete/{id}', 'App\Http\Controllers\TanamanController@delete')
            ->name('delete');
        Route::get('/edit/{id}', 'App\Http\Controllers\TanamanController@indexEdit')
            ->name('edittanaman');
        Route::post('/edit/update/{id}', 'App\Http\Controllers\TanamanController@update')
            ->name('update');
=======
>>>>>>> 7d210ac9a623afbc8254e4eb7345beda151025a0
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contactus', 'App\Http\Controllers\ContactusController@Adduser')
    ->name('addsaran');
Route::post('/contactus/store', 'App\Http\Controllers\ContactusController@store')
    ->name('storepesan');
Route::get('/artikel', 'App\Http\Controllers\ArtikelController@indexArtikel')
    ->name('indexartikel');
Route::get('/artikel/post', 'App\Http\Controllers\ArtikelController@postArtikel')
    ->name('postartikel');
