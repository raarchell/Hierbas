<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdatePasswordRequest;

class ProfilController extends Controller
{
    // edit dan view
    public function indexEdit()
    {
        return view('pages.admin.profil');
    }
    public function updateAdmin(Request $request, $id)
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

        return redirect()->route('profiladmin');
    }
    public function updatePassAdmin(UpdatePasswordRequest $request)
    {
        $request->user()->update([
            'password' => Hash::make($request->get('password'))
        ]);

        return redirect()->route('profiladmin');
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

        return redirect()->route('profil');
    }
    public function updatePass(UpdatePasswordRequest $request)
    {
        $request->user()->update([
            'password' => Hash::make($request->get('password'))
        ]);

        return redirect()->route('profil');
    }
}
