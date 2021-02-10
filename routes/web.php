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

// ini untuk ngecek aja halamannya udah bener atau belum
Route::get('/', function () {
<<<<<<< HEAD
    return view('pages.menu_tanaman');
=======
    return view('pages.admin.profil');
>>>>>>> db275317c2fa8ef54e35ad721118d9f37494c24d
});
