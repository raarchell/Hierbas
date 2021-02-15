<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    //tabel
    public function index(Request $request)
    {
        $items = Artikel::get();
        return view('pages.admin.artikel', [
            'items' => $items
        ]);
    }
    public function delete($id)
    {
        $items = Artikel::findOrFail($id);
        $items->delete();
        return redirect()->route('tabelartikel');
    }

    //add
    public function indexAdd()
    {
        $items = Artikel::get();
        return view('pages.admin.add_artikel', [
            'items' => $items
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:50',
            'isi_artikel' => 'required',
            'foto' => 'file|image|mimes:jpeg,png,jpg',
        ]);
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('foto');

        $nama_file = time() . "_" . $file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'assets/gallery';
        $file->move($tujuan_upload, $nama_file);
        $data = [
            'judul' => $request->judul,
            'isi_artikel' => $request->isi_artikel,
            'foto' => $nama_file,
        ];
        Artikel::create($data);

        return redirect()->route('tabelartikel');
    }

    // edit
    public function indexEdit($id)
    {
        $items = Artikel::findOrFail($id);
        return view('pages.admin.edit_artikel', [
            'items' => $items,
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|max:50',
            'isi_artikel' => 'required',
            'foto' => 'file|image|mimes:jpeg,png,jpg',
        ]);
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('foto');

        $nama_file = time() . "_" . $file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'assets/gallery';
        $file->move($tujuan_upload, $nama_file);
        $data = [
            'judul' => $request->judul,
            'isi_artikel' => $request->isi_artikel,
            'foto' => $nama_file,
        ];
        Artikel::find($id)->update($data);

        return redirect()->route('tabelartikel');
    }

    // page menu artikel user
    public function indexArtikel()
    {
        $items = Artikel::get();
        return view('pages.menu_artikel', [
            'items' => $items
        ]);
    }

    //page post artikel user
    public function postArtikel()
    {
        $items = Artikel::get();
        return view('pages.post_artikel', [
            'items' => $items
        ]);
    }
}
