<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resep;
use App\Models\Kategori;
use App\Models\ResepComment;

class ResepController extends Controller
{
    //tabel
    public function index(Request $request)
    {
        $items = Resep::get();
        return view('pages.admin.resep', [
            'items' => $items
        ]);
    }
    public function delete($id)
    {
        $items = Resep::findOrFail($id);
        $items->delete();
        return redirect()->route('tabelresep');
    }

    //add
    public function indexAdd()
    {
        $items = Kategori::get();
        return view('pages.admin.add_resep', [
            'items' => $items
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:30',
            'slug'=>'required',
            'bahan' => 'required',
            'cara' => 'required',
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
            'slug' => $request->slug,
            'bahan' => $request->bahan,
            'cara' => $request->cara,
            'foto' => $nama_file,
        ];
        Resep::create($data);

        return redirect()->route('tabelresep');
    }

    // edit
    public function indexEdit($id)
    {
        $items = Resep::findOrFail($id);
        $kategori = Kategori::get();
        return view('pages.admin.edit_resep', [
            'items' => $items,
            'kategori' => $kategori
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:30',
            'id_kategori' => 'required|integer|exists:kategori,id',
            'bahan' => 'required',
            'cara' => 'required',
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
            'id_kategori' => $request->id_kategori,
            'bahan' => $request->bahan,
            'cara' => $request->cara,
            'foto' => $nama_file,
        ];
        Resep::find($id)->update($data);

        return redirect()->route('tabelresep');
    }

    // page menu resep user
    public function indexResep()
    {
        $items = Resep::get();
        return view('pages.menu_resep', [
            'items' => $items
        ]);
    }

    // postingan resep
    public function indexPostResep(Request $request, $id)
    {
        $items = Resep::findOrFail($id);
        $data = ResepComment::get();
        $post = Resep::latest()->get()->random(3);
        return view('pages.post_resep', [
            'items' => $items,
            'data' => $data,
            'post' => $post
        ]);
    }
    public function comment(Request $request)
    {
        $data = $request->all();
        ResepComment::create($data);
        $id = ResepComment::orderBy('id', 'desc')->value('id_resep');
        return redirect()->route('postresep', $id);
    }
}
