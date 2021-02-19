<?php

namespace App\Http\Controllers;

use App\Models\User;
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
    }
}
