<?php

namespace App\Http\Controllers;

use App\Models\Tanaman;
use Illuminate\Http\Request;
<<<<<<< HEAD
use Symfony\Contracts\Service\Attribute\Required;

class TanamanController extends Controller
{
    // tabel
=======

class TanamanController extends Controller
{
    //tabel
>>>>>>> 7d210ac9a623afbc8254e4eb7345beda151025a0
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
<<<<<<< HEAD
            'cara_menanam' => 'required',
=======
            'isi' => 'required',
>>>>>>> 7d210ac9a623afbc8254e4eb7345beda151025a0
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
<<<<<<< HEAD
            'cara_menanam' => $request->cara_menanam,
=======
            'isi' => $request->isi,
>>>>>>> 7d210ac9a623afbc8254e4eb7345beda151025a0
            'foto' => $nama_file,
            'link' => $request->link,
        ];
        Tanaman::create($data);

        return redirect()->route('tabeltanaman');
    }
<<<<<<< HEAD

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
            'cara_menanam' => 'required',
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
            'cara_menanam' => $request->cara_menanam,
            'foto' => $nama_file,
            'link' => $request->link,
        ];
        Tanaman::find($id)->update($data);

        return redirect()->route('tabeltanaman');
    }
=======
>>>>>>> 7d210ac9a623afbc8254e4eb7345beda151025a0
}
