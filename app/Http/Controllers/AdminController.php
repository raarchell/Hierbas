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

    public function search(Request $request)
    {
        $search = $request->search;

        $resep = Resep::where('nama', 'like', "%" . $search . "%")->paginate();
        $kategori = Kategori::where('nama', 'like', "%" . $search . "%")->paginate();
        $tanaman = Tanaman::where('nama', 'like', "%" . $search . "%")->paginate();
        $artikel = Artikel::where('judul', 'like', "%" . $search . "%")->paginate();

        return view('pages.admin.search', [
            'resep' => $resep,
            'kategori' => $kategori,
            'tanaman' => $tanaman,
            'artikel' => $artikel
        ]);
    }
}
