<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // tabel
    public function index(Request $request)
    {
        $items = User::paginate(15);
        return view('pages.admin.data_user', [
            'items' => $items
        ]);
    }
    public function delete($id)
    {
        $items = User::findOrFail($id);
        $items->delete();
        return redirect()->route('tabeluser')->with('message', 'User berhasil dihapus!');
    }
    public function search(Request $request)
    {
        $cari = $request->cari;
        $items = User::where('name', 'like', "%" . $cari . "%")->paginate();
        return view('pages.admin.data_user', [
            'items' => $items
        ]);
    }

    // fungsi edit
    public function indexEdit($id)
    {
        $items = User::findOrFail($id);
        return view('pages.admin.edit_data_user', [
            'items' => $items
        ]);
    }
    public function update(Request $request, $id){
        $data = $request->all();
        User::find($id)->update($data);

        return redirect()->route('tabeluser')->with('message', 'Roles user berhasil diupdate!');
    }
}
