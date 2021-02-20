<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\Resep;

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
        $kategori = Kategori::latest()->get()->random(2);
        $resep = Resep::latest()->get()->random(3);
        return view('pages.index', [
            'post' => $post,
            'kategori' => $kategori,
            'resep' => $resep
        ]);
    }
}
