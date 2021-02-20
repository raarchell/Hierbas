<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    // edit dan view
    public function indexEdit()
    {
        return view('pages.admin.profil')->with('user', auth()->user());
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'jenis_kelamin' => 'required',
            'tanggal' => 'required'
        ]);

        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->tanggal = $request->tanggal;

        if ($request->has('password')) {
            $user->password = bcrypt($request->password);
        }

        /*Session::flash('success', 'Akun Profil telah diupdate');*/

        return redirect()->back();
    }
}
