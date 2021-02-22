<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\Resep;
use App\Models\Tanaman;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $post = Artikel::latest()->get()->random(3);
        $kategori = Kategori::latest()->get()->random(4);
        $resep = Resep::latest()->get()->random(4);
        return view('pages.index', [
            'post' => $post,
            'kategori' => $kategori,
            'resep' => $resep
        ]);
    }

    // public function indexSearch(){
    //     return view('pages.search');
    // }
    public function search(Request $request)
    {
        $search = $request->search;

        $resep = Resep::where('nama', 'like', "%" . $search . "%")->paginate();
        $kategori = Kategori::where('nama', 'like', "%" . $search . "%")->paginate();
        $tanaman = Tanaman::where('nama', 'like', "%" . $search . "%")->paginate();
        $artikel = Artikel::where('judul', 'like', "%" . $search . "%")->paginate();

        return view('pages.search', [
            'resep' => $resep,
            'kategori' => $kategori,
            'tanaman' => $tanaman,
            'artikel' => $artikel
        ]);
    }
}
