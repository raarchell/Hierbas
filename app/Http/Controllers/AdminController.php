<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Resep;
use App\Models\Tanaman;
use App\Models\Artikel;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('pages.admin.dashboard', [
            'jmlkat' => Kategori::count(),
            'jmlrsp' => Resep::count(),
            'jmltnm' => Tanaman::count(),
            'jmlart' => Artikel::count()
        ]);
    }
}
