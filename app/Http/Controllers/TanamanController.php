<?php

namespace App\Http\Controllers;

use App\Models\Tanaman;
use Illuminate\Http\Request;

class TanamanController extends Controller
{
    //tabel
    public function index(Request $request)
    {
        $items = Tanaman::get();
        return view('pages.admin.tanaman', [
            'items' => $items
        ]);
    }
    public function delete($id)
    {
        $items = Tanaman::findOrFail($id);
        $items->delete();
        return redirect()->route('tabeltanaman');
    }

    //add
    public function indexAdd()
    {
        $items = Tanaman::get();
        return view('pages.admin.add_tanaman', [
            'items' => $items
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:30',
            'isi' => 'required',
            'foto' => 'file|image|mimes:jpeg,png,jpg',
            'link' => 'required',
        ]);
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('foto');

        $nama_file = time() . "_" . $file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'assets/gallery';
        $file->move($tujuan_upload, $nama_file);
        $data = [
            'nama' => $request->nama,
            'isi' => $request->isi,
            'foto' => $nama_file,
            'link' => $request->link,
        ];
        Tanaman::create($data);

        return redirect()->route('tabeltanaman');
    }

    // edit
    public function indexEdit($id)
    {
        $items = Tanaman::findOrFail($id);
        return view('pages.admin.edit_tanaman', [
            'items' => $items,
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:30',
            'isi' => 'required',
            'foto' => 'file|image|mimes:jpeg,png,jpg',
            'link' => 'required',
        ]);
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('foto');

        $nama_file = time() . "_" . $file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'assets/gallery';
        $file->move($tujuan_upload, $nama_file);
        $data = [
            'nama' => $request->nama,
            'isi' => $request->isi,
            'foto' => $nama_file,
            'link' => $request->link,
        ];
        Tanaman::find($id)->update($data);

        return redirect()->route('tabeltanaman');
    }

    // page menu tanaman user
    public function indexTanaman()
    {
        $items = Tanaman::get();
        return view('pages.menu_tanaman', [
            'items' => $items
        ]);
    }

    //page post tanaman user
    public function postTanaman()
    {
        $items = Tanaman::get();
        return view('pages.post_tanaman', [
            'items' => $items
        ]);
    }
}
