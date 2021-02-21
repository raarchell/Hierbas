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
Route::get('/postresep/{id}', 'App\Http\Controllers\ResepController@indexPostResep')
    ->name('postresep');
Route::get('/artikel/post/{id}', 'App\Http\Controllers\ArtikelController@postArtikel')
    ->name('postartikel');

Route::middleware(['auth'])->group(function () {
    //profil
    Route::get('/profil', 'App\Http\Controllers\ProfilController@indexProfil')
        ->name('profil');
    Route::post('/profil/update/{id}', 'App\Http\Controllers\ProfilController@update')
        ->name('profilupdate');
    Route::patch('/profil/update/pass', 'App\Http\Controllers\ProfilController@updatePass')
        ->name('profilupdatePass');
    //search
    Route::get('/search', 'App\Http\Controllers\HomeController@search')
        ->name('search');
    //kategori
    Route::get('/kategori', 'App\Http\Controllers\KategoriController@indexKategori')
        ->name('kategori');
    Route::get('/kategori/resep/{slug}', 'App\Http\Controllers\KategoriController@resep')
        ->name('kat_resep');
    //resep
    Route::get('/resep', 'App\Http\Controllers\ResepController@indexResep')
        ->name('resep');
    Route::post('/postresep/comment', 'App\Http\Controllers\ResepController@comment')
        ->name('resepcomment');
    Route::post('/postresep/comment/delete/{id}', 'App\Http\Controllers\ResepController@deleteComment')
        ->name('delresepcomment');
    //contactus
    Route::get('/contactus', 'App\Http\Controllers\ContactusController@Adduser')
        ->name('addsaran');
    Route::post('/contactus/store', 'App\Http\Controllers\ContactusController@store')
        ->name('storepesan');
    //artikel
    Route::get('/artikel', 'App\Http\Controllers\ArtikelController@indexArtikel')
        ->name('indexartikel');
    Route::post('/postartikel/comment', 'App\Http\Controllers\ArtikelController@comment')
        ->name('artikelcomment');
    Route::post('/postartikel/comment/delete/{id}', 'App\Http\Controllers\ArtikelController@deleteComment')
        ->name('delartikelcomment');
    //tanaman
    Route::get('/tanaman', 'App\Http\Controllers\TanamanController@indexTanaman')
        ->name('tanaman');
    Route::get('/tanaman/post/{id}', 'App\Http\Controllers\TanamanController@postTanaman')
        ->name('posttanaman');
    Route::post('/posttanaman/comment', 'App\Http\Controllers\TanamanController@comment')
        ->name('tanamancomment');
    Route::post('/posttanaman/comment/delete/{id}', 'App\Http\Controllers\TanamanController@deleteComment')
        ->name('deltanamancomment');
});

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', 'App\Http\Controllers\AdminController@index')
            ->name('dashboard');
        Route::get('/search', 'App\Http\Controllers\AdminController@search');
        // kategori
        Route::get('/kategori', 'App\Http\Controllers\KategoriController@index')
            ->name('tabelkategori');
        Route::get('/addkategori', 'App\Http\Controllers\KategoriController@indexAdd')
            ->name('addkategori');
        Route::post('/addkategori/store', 'App\Http\Controllers\KategoriController@store')
            ->name('storekategori');
        Route::post('/deletekategori/{id}', 'App\Http\Controllers\KategoriController@delete')
            ->name('deletekategori');
        Route::get('/editkategori/{id}', 'App\Http\Controllers\KategoriController@indexEdit')
            ->name('editkategori');
        Route::post('/editkategori/update/{id}', 'App\Http\Controllers\KategoriController@update')
            ->name('updatekategori');

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
        Route::post('/deleteresep/{id}', 'App\Http\Controllers\ResepController@delete')
            ->name('deleteresep');
        Route::get('/editresep/{id}', 'App\Http\Controllers\ResepController@indexEdit')
            ->name('editresep');
        Route::post('/editresep/update/{id}', 'App\Http\Controllers\ResepController@update')
            ->name('updateresep');

        //artikel
        Route::get('/artikel', 'App\Http\Controllers\ArtikelController@index')
            ->name('tabelartikel');
        Route::get('/addartikel', 'App\Http\Controllers\ArtikelController@indexAdd')
            ->name('addartikel');
        Route::post('/addartikel/store', 'App\Http\Controllers\ArtikelController@store')
            ->name('storeartikel');
        Route::post('/deleteartikel/{id}', 'App\Http\Controllers\ArtikelController@delete')
            ->name('deleteartikel');
        Route::get('/editartikel/{id}', 'App\Http\Controllers\ArtikelController@indexEdit')
            ->name('editartikel');
        Route::post('/editartikel/update/{id}', 'App\Http\Controllers\ArtikelController@update')
            ->name('updateartikel');

        //tanaman
        Route::get('/tanaman', 'App\Http\Controllers\TanamanController@index')
            ->name('tabeltanaman');
        Route::get('/addtanaman', 'App\Http\Controllers\TanamanController@indexAdd')
            ->name('addtanaman');
        Route::post('/addtanaman/store', 'App\Http\Controllers\TanamanController@store')
            ->name('storetanaman');
        Route::post('/delete/{id}', 'App\Http\Controllers\TanamanController@delete')
            ->name('delete');
        Route::get('/edittanaman/{id}', 'App\Http\Controllers\TanamanController@indexEdit')
            ->name('edittanaman');
        Route::post('/edittanaman/update/{id}', 'App\Http\Controllers\TanamanController@update')
            ->name('updatetanaman');

        //profil
        Route::get('/profil', 'App\Http\Controllers\ProfilController@indexEdit')
            ->name('profiladmin');
        Route::post('/profil/update/{id}', 'App\Http\Controllers\ProfilController@updateAdmin')
            ->name('profil-update');
        Route::patch('/profil/update/pass', 'App\Http\Controllers\ProfilController@updatePassAdmin')
            ->name('profil-updatePass');
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
