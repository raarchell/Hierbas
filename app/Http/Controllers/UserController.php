<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // tabel
    public function index(Request $request)
    {
        $items = User::get();
        return view('pages.admin.data_user', [
            'items' => $items
        ]);
    }
    public function delete($id)
    {
        $items = User::findOrFail($id);
        $items->delete();
        return redirect()->route('tabeluser')->with('message', 'Data user berhasil dihapus!');
    }

    // fungsi edit
    public function indexEdit($id)
    {
        $items = User::findOrFail($id);
        return view('pages.admin.edit_data_user', [
            'items' => $items
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:30',
            'foto' => 'file|image|mimes:jpeg,png,jpg',
        ]);
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('foto');

        $nama_file = time() . "_" . $file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'assets/avatar';
        $file->move($tujuan_upload, $nama_file);
        $data = [
            'name' => $request->nama,
            'foto' => $nama_file,
        ];
        User::find($id)->update($data);

        return redirect()->route('tabeluser')->with('message', 'Data user berhasil diupdate!');
    }
}
