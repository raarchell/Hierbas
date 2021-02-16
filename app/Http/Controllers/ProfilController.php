<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    // edit dan view
    public function indexEdit(Request $request)
    {
        if (auth()->user()->admin) {
            $admin = Auth::user();
            return view('pages.admin.profil', ['profil' => $admin]);
        } else {
            $user = Auth::user();
            return view('pages.profil_user', ['profil' => $user]);
        }
    }
    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required|max:30',
            'email' => 'required|email|max:30',
        ]);

        $id = auth()->user()->id;

        if (isset($request->password)) {
            if (!isset($request->password_new)) {
                if (auth()->user()->admin) {
                    return redirect()->route('pages.admin.profil')->with('failed', 'Anda belum memasukkan password baru');
                } else {
                    return redirect()->route('akun')->with('failed', 'Anda belum memasukkan password baru');
                }
            }
            $pass = Hash::check($request->password, auth()->user()->password);
            if ($pass) {
                $store = User::where('id', $id)
                    ->update([
                        'nama' => $request->nama,
                        'email' => $request->email,
                        'password' => bcrypt($request->password_new)
                    ]);
            } else {
                if (auth()->user()->admin) {
                    return redirect()->route('manajer.profil')->with('failed', 'Password tidak sama!');
                } else {
                    return redirect()->route('akun')->with('failed', 'Password tidak sama!');
                }
            }
        } else {
            $store = User::where('id', $id)
                ->update([
                    'nama' => $request->nama,
                    'email' => $request->email,
                ]);
        }

        if ($store) {
            if (auth()->user()->admin) {
                return redirect()->route('pages.admin.profil')->with('success', 'Data Anda berhasil diperbarui');
            } else {
                return redirect()->route('akun')->with('success', 'Data Anda berhasil diperbarui');
            }
        } else {
            if (auth()->user()->admin) {
                return redirect()->route('pages.admin.profil')->with('failed', 'Data Anda gagal diperbarui');
            } else {
                return redirect()->route('akun')->with('failed', 'Data Anda gagal diperbarui');
            }
        }
    }
}
