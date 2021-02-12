<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    // tabel
    public function index(Request $request){
        $items = Kategori::get();
        return view('pages.admin.kategori_p', [
            'items' => $items
        ]);
    }
    public function delete($id)
    {
        $items = Kategori::findOrFail($id);
        $items->delete();
        return redirect()->route('tabelkategori');
    }

    // fungsi add
    public function indexAdd(){
        return view('pages.admin.add_kategori');
    }
    public function store(Request $request){
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
            Kategori::create($data);

        return redirect()->route('tabelkategori');
    }

    // fungsi edit
    public function indexEdit(){
        $items = Kategori::get();
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

        return redirect()->route('tabelkategori');
    }
}
