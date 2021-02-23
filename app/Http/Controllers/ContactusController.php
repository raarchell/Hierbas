<?php

namespace App\Http\Controllers;

use App\Models\Contactus;
use Illuminate\Http\Request;

class ContactusController extends Controller
{
    // tabel
    public function index(Request $request)
    {
        $items = Contactus::paginate(15);
        return view('pages.admin.view_message', [
            'items' => $items
        ]);
    }
    public function delete($id)
    {
        $items = Contactus::findOrFail($id);
        $items->delete();
        return redirect()->route('contactus')->with('status', 'Pesan berhasil dihapus');
    }

    //tambahsaranuser
    public function Adduser()
    {
        return view('pages.contactus');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        Contactus::create($data);
        return redirect()->route('contactus');
    }
}
