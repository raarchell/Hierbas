<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    // edit dan view
    public function indexEdit($id)
    {
        $items = User::findOrFail($id);
        return view('pages.admin.profil', [
            'items' => $items,
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:30',
            'email' => 'required',
            'password' => 'required',
        ]);
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('foto');

        $nama_file = time() . "_" . $file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'assets/gallery';
        $file->move($tujuan_upload, $nama_file);
        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password,
        ];
        User::find($id)->update($data);

        return redirect()->route('editprofil');
    }
}
