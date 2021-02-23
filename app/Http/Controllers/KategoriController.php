<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Resep;

class KategoriController extends Controller
{
    // tabel
    public function index(Request $request){
        $items = Kategori::paginate(15);
        return view('pages.admin.kategori_p', [
            'items' => $items
        ]);
    }
    public function delete($id)
    {
        $items = Kategori::findOrFail($id);
        $items->delete();
        return redirect()->route('tabelkategori')->with('status', 'Kategori berhasil dihapus');
    }
    public function search(Request $request)
    {
	$cari = $request->cari;
	$items = Kategori::where('nama','like',"%".$cari."%")->paginate();
	return view('pages.admin.kategori_p', [
        'items' => $items]);
    }

    // fungsi add
    public function indexAdd()
    {
        return view('pages.admin.add_kategori');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:kategori|max:30',
            'foto' => 'file|image|mimes:jpeg,png,jpg',
        ]);
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('foto');

        $nama_file = time() . "_" . $file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'assets/gallery';
        $file->move($tujuan_upload, $nama_file);
        $data = [
            'nama' => $request->nama,
            'foto' => $nama_file,
            'slug' => Str::slug($request->nama)
        ];
        Kategori::create($data);

        return redirect()->route('tabelkategori')->with('message', 'Kategori berhasil ditambahkan!');
    }

    // fungsi edit
    public function indexEdit($id)
    {
        $items = Kategori::findOrFail($id);
        return view('pages.admin.edit_kategori', [
            'items' => $items
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:30',
            'foto' => 'file|image|mimes:jpeg,png,jpg',
        ]);
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('foto');

        $nama_file = time() . "_" . $file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'assets/gallery';
        $file->move($tujuan_upload, $nama_file);
        $data = [
            'nama' => $request->nama,
            'foto' => $nama_file,
        ];
        Kategori::find($id)->update($data);

        return redirect()->route('tabelkategori')->with('message', 'Kategori berhasil diupdate!');
    }

    // page kategori user
    public function indexKategori()
    {
        $items = Kategori::get();
        return view('pages.kategori', [
            'items' => $items
        ]);
    }

    // resep per kategori
    public function resep($slug)
    {
        $items = Resep::where('slug', $slug)->get();
        $kategori = Kategori::where('slug', $slug)->first();
        return view('pages.menu_resepkategori', [
            'items' => $items,
            'kategori' => $kategori
        ]);
    }
}
