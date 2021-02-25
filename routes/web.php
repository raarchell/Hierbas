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
//contactus
Route::get('/contactus', 'App\Http\Controllers\ContactusController@Adduser')
    ->name('addsaran');
Route::post('/contactus/store', 'App\Http\Controllers\ContactusController@store')
    ->name('storepesan');

Route::middleware(['auth'])
    ->group(function () {
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
        //search
        Route::get('/search', 'App\Http\Controllers\AdminController@search')
            ->name('searchAdmin');
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
        Route::get('/searchkategori', 'App\Http\Controllers\KategoriController@search')
            ->name('searchkategori');

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
        Route::get('/searchresep', 'App\Http\Controllers\ResepController@search')
            ->name('searchresep');

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
        Route::get('/searchartikel', 'App\Http\Controllers\ArtikelController@search')
            ->name('searchartikel');

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
        Route::get('/searchtanaman', 'App\Http\Controllers\TanamanController@search')
            ->name('searchtanaman');

        //profil
        Route::get('/profil', 'App\Http\Controllers\ProfilController@indexEdit')
            ->name('profiladmin');
        Route::post('/profil/update/{id}', 'App\Http\Controllers\ProfilController@updateAdmin')
            ->name('profil-update');
        Route::patch('/profil/update/pass', 'App\Http\Controllers\ProfilController@updatePassAdmin')
            ->name('profil-updatePass');

        //data user
        Route::get('/datauser', 'App\Http\Controllers\UserController@index')
            ->name('tabeluser');
        Route::post('/deleteuser/{id}', 'App\Http\Controllers\UserController@delete')
            ->name('deleteuser');
        Route::get('/editdatauser/{id}', 'App\Http\Controllers\UserController@indexEdit')
            ->name('editdatauser');
        Route::post('/editdatauser/update/{id}', 'App\Http\Controllers\UserController@update')
            ->name('updatedatauser');
        Route::get('/searchuser', 'App\Http\Controllers\UserController@search')
            ->name('searchUser');
    });

Route::prefix('apoteker')
    ->middleware(['auth', 'apoteker'])
    ->group(function () {
        Route::get('/', 'App\Http\Controllers\ApotekerController@dashboard')
            ->name('dashboardApoteker');
        //search
        Route::get('/search', 'App\Http\Controllers\ApotekerController@search')
            ->name('searchApoteker');
        // kategori
        Route::get('/kategori', 'App\Http\Controllers\ApotekerController@indexKategori')
            ->name('Aptabelkategori');
        Route::get('/addkategori', 'App\Http\Controllers\ApotekerController@indexAddKategori')
            ->name('Apaddkategori');
        Route::post('/addkategori/store', 'App\Http\Controllers\ApotekerController@storeKategori')
            ->name('Apstorekategori');
        Route::post('/deletekategori/{id}', 'App\Http\Controllers\ApotekerController@deleteKategori')
            ->name('Apdeletekategori');
        Route::get('/editkategori/{id}', 'App\Http\Controllers\ApotekerController@indexEditKategori')
            ->name('Apeditkategori');
        Route::post('/editkategori/update/{id}', 'App\Http\Controllers\ApotekerController@updateKategori')
            ->name('Apupdatekategori');
        Route::get('/searchkategori', 'App\Http\Controllers\ApotekerController@searchKategori')
            ->name('Apsearchkategori');

        // resep
        Route::get('/resep', 'App\Http\Controllers\ApotekerController@indexResep')
            ->name('Aptabelresep');
        Route::get('/addresep', 'App\Http\Controllers\ApotekerController@indexAddResep')
            ->name('Apaddresep');
        Route::post('/addresep/store', 'App\Http\Controllers\ApotekerController@storeResep')
            ->name('Apstoreresep');
        Route::post('/deleteresep/{id}', 'App\Http\Controllers\ApotekerController@deleteResep')
            ->name('Apdeleteresep');
        Route::get('/editresep/{id}', 'App\Http\Controllers\ApotekerController@indexEditResep')
            ->name('Apeditresep');
        Route::post('/editresep/update/{id}', 'App\Http\Controllers\ApotekerController@updateResep')
            ->name('Apupdateresep');
        Route::get('/searchresep', 'App\Http\Controllers\ApotekerController@searchResep')
            ->name('Apsearchresep');

        //tanaman
        Route::get('/tanaman', 'App\Http\Controllers\ApotekerController@indexTanaman')
            ->name('Aptabeltanaman');
        Route::get('/addtanaman', 'App\Http\Controllers\ApotekerController@indexAddTanaman')
            ->name('Apaddtanaman');
        Route::post('/addtanaman/store', 'App\Http\Controllers\ApotekerController@storeTanaman')
            ->name('Apstoretanaman');
        Route::post('/delete/{id}', 'App\Http\Controllers\ApotekerController@deleteTanaman')
            ->name('Apdelete');
        Route::get('/edittanaman/{id}', 'App\Http\Controllers\ApotekerController@indexEditTanaman')
            ->name('Apedittanaman');
        Route::post('/edittanaman/update/{id}', 'App\Http\Controllers\ApotekerController@updateTanaman')
            ->name('Apupdatetanaman');
        Route::get('/searchtanaman', 'App\Http\Controllers\ApotekerController@searchTanaman')
            ->name('Apsearchtanaman');

        //profil
        Route::get('/profil', 'App\Http\Controllers\ApotekerController@profilApoteker')
            ->name('profilapoteker');
        Route::post('/profil/update/{id}', 'App\Http\Controllers\ApotekerController@updateProfilApoteker')
            ->name('Approfil-update');
        Route::patch('/profil/update/pass', 'App\Http\Controllers\ApotekerController@updatePassApoteker')
            ->name('Approfil-updatePass');
    });

Route::prefix('penulis')
    ->middleware(['auth', 'penulis'])
    ->group(function () {
        //artikel
        Route::get('/', 'App\Http\Controllers\PenulisController@indexTabel')
            ->name('tabelartikel1');
        Route::get('/addartikel', 'App\Http\Controllers\PenulisController@indexAdd')
            ->name('addartikel1');
        Route::post('/addartikel/store', 'App\Http\Controllers\PenulisController@store')
            ->name('storeartikel1');
        Route::post('/deleteartikel/{id}', 'App\Http\Controllers\PenulisController@delete')
            ->name('deleteartikel1');
        Route::get('/editartikel/{id}', 'App\Http\Controllers\PenulisController@indexEdit')
            ->name('editartikel1');
        Route::post('/editartikel/update/{id}', 'App\Http\Controllers\PenulisController@updateArtikel')
            ->name('updateartikel1');
        Route::get('/searchartikel', 'App\Http\Controllers\PenulisController@search')
            ->name('searchartikel1');

        //profil
        Route::get('/profil', 'App\Http\Controllers\PenulisController@indexEditProfil')
            ->name('profilpenulis');
        Route::post('/profil/update/{id}', 'App\Http\Controllers\PenulisController@updatePenulis')
            ->name('profilupdateP');
        Route::patch('/profil/update/pass', 'App\Http\Controllers\PenulisController@updatePass')
            ->name('profilupdatePassP');
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
