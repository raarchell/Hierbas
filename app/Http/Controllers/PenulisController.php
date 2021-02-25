<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdatePasswordRequest;

class PenulisController extends Controller
{

    //tabel
    public function indexTabel(Request $request)
    {
        $items = Artikel::paginate(15);
        return view('pages.penulis.artikel', [
            'items' => $items
        ]);
    }
    public function delete($id)
    {
        $items = Artikel::findOrFail($id);
        $items->delete();
        return redirect()->route('tabelartikel')->with('message', 'Artikel berhasil dihapus!');
    }
    public function search(Request $request)
    {
        $cari = $request->cari;
        $items = Artikel::where('judul', 'like', "%" . $cari . "%")->paginate();
        return view('pages.penulis.artikel', [
            'items' => $items
        ]);
    }

    //add
    public function indexAdd()
    {
        $items = Artikel::get();
        return view('pages.penulis.add_artikel', [
            'items' => $items
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:200',
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

        return redirect()->route('tabelartikel')->with('message', 'Artikel berhasil ditambahkan!');
    }

    // edit
    public function indexEdit($id)
    {
        $items = Artikel::findOrFail($id);
        return view('pages.penulis.edit_artikel', [
            'items' => $items,
        ]);
    }
    public function updateArtikel(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|max:200',
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

        return redirect()->route('tabelartikel')->with('message', 'Artikel berhasil diupdate!');
    }

    // edit dan view
    public function indexEditProfil()
    {
        return view('pages.penulis.profil');
    }
    public function updatePenulis(Request $request, $id)
    {
        //melakukan validasi data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'foto' => 'file|image|mimes:jpeg,png,jpg',
        ]);
        // menyimpan data file yang diupload ke variabel $file
        if ($request->foto != null) {
            $file = $request->file('foto');

            $nama_file = time() . "_" . $file->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'assets/avatar';
            $file->move($tujuan_upload, $nama_file);
        } else
            $nama_file = User::where('id', $id)->value('foto');
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal' => $request->tanggal,
            'foto' => $nama_file,
        ];

        User::find($id)->update($data);

        return redirect()->route('profilpenulis');
    }
    public function updatePassAdmin(UpdatePasswordRequest $request)
    {
        $request->user()->update([
            'password' => Hash::make($request->get('password'))
        ]);

        return redirect()->route('profilpenulis');
    }

    public function indexProfil()
    {
        return view('pages.profil_user');
    }
    public function update(Request $request, $id)
    {
        //melakukan validasi data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'foto' => 'file|image|mimes:jpeg,png,jpg',
        ]);
        // menyimpan data file yang diupload ke variabel $file
        if ($request->foto != null) {
            $file = $request->file('foto');

            $nama_file = time() . "_" . $file->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'assets/avatar';
            $file->move($tujuan_upload, $nama_file);
        } else
            $nama_file = User::where('id', $id)->value('foto');
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal' => $request->tanggal,
            'foto' => $nama_file,
        ];

        User::find($id)->update($data);

        return redirect()->route('profilpenulis');
    }
    public function updatePass(UpdatePasswordRequest $request)
    {
        $request->user()->update([
            'password' => Hash::make($request->get('password'))
        ]);

        return redirect()->route('profilpenulis');
    }
}
