<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resep;
use App\Models\Kategori;
use App\Models\ResepComment;
use App\Models\User;
use Session;
use DB;

class ResepController extends Controller
{
    //tabel
    public function index(Request $request)
    {
        $items = Resep::paginate(15);
        return view('pages.admin.resep', [
            'items' => $items
        ]);
    }
    public function delete($id)
    {
        $items = Resep::findOrFail($id);
        $items->delete();
        return redirect()->route('tabelresep')->with('status', 'Resep berhasil dihapus');
    }
    public function search(Request $request)
    {
        $cari = $request->cari;
        $items = Resep::where('nama', 'like', "%" . $cari . "%")->paginate();
        return view('pages.admin.resep', [
            'items' => $items
        ]);
    }

    //add
    public function indexAdd()
    {
        $items = Kategori::get();
        return view('pages.admin.add_resep', [
            'items' => $items
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:50',
            'slug' => 'required',
            'bahan' => 'required',
            'cara' => 'required',
            'pemakaian' => 'required',
            'foto' => 'required| file|image|mimes:jpeg,png,jpg',
        ]);
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('foto');

        $nama_file = time() . "_" . $file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'assets/gallery';
        $file->move($tujuan_upload, $nama_file);
        $data = [
            'nama' => $request->nama,
            'slug' => $request->slug,
            'bahan' => $request->bahan,
            'cara' => $request->cara,
            'pemakaian' => $request->pemakaian,
            'foto' => $nama_file,
        ];
        Resep::create($data);

        return redirect()->route('tabelresep')->with('status', 'Resep obat berhasil ditambahkan!');
    }

    // edit
    public function indexEdit($id)
    {
        $items = Resep::findOrFail($id);
        $kategori = Kategori::get();
        return view('pages.admin.edit_resep', [
            'items' => $items,
            'kategori' => $kategori
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:50',
            'slug' => 'required',
            'bahan' => 'required',
            'cara' => 'required',
            'pemakaian' => 'required',
            'foto' => 'file|image|mimes:jpeg,png,jpg',
        ]);
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('foto');

        $nama_file = time() . "_" . $file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'assets/gallery';
        $file->move($tujuan_upload, $nama_file);
        $data = [
            'nama' => $request->nama,
            'slug' => $request->slug,
            'bahan' => $request->bahan,
            'cara' => $request->cara,
            'pemakaian' => $request->pemakaian,
            'foto' => $nama_file,
        ];
        Resep::find($id)->update($data);

        return redirect()->route('tabelresep')->with('status', 'Resep obat berhasil diupdate!');
    }

    // page menu resep user
    public function indexResep()
    {
        $items = Resep::get();
        return view('pages.menu_resep', [
            'items' => $items
        ]);
    }

    // postingan resep
    public function indexPostResep(Request $request, $id)
    {   
        $items = Resep::findOrFail($id);
        $itemID = Resep::where('id',$id)->pluck('id');
        $viewed = Session::get('viewed_post', []); //ini ngambil session yang namanya 'viewed_post' dengan bentuk type data array biar id yang masuk bisa banyak
        if (!in_array($itemID, $viewed)) { //ini ngecek apakah di dalam array session yang namanya 'viewed_post' ada id post yang lagi dibuka, jika tidak ada maka dilanjutkan
            Session::push('viewed_post', $itemID); //ini dia masukkin id post yang lagi dibuka kedalam session yang namanya 'viewed_post'
            $items->incrementPengunjung(); //ini ngejalanin function yang ada di model yang suda dibuat tadi
        }
        $post = Resep::orderBy('pengunjung','DESC')->take(3)->get();
        $comment = ResepComment::with(['user'])->where('id_resep', $id)->get();
        return view('pages.post_resep', [
            'items' => $items,
            'post' => $post,
            'comment' => $comment
        ]);
    }
    public function comment(Request $request)
    {
        $data = $request->all();
        ResepComment::create($data);
        $id = ResepComment::orderBy('id', 'desc')->value('id_resep');
        return redirect()->route('postresep', $id);
    }
    public function deleteComment(Request $request, $id)
    {
        $items = ResepComment::where('id', $id)->value('id_resep');
        ResepComment::find($id)->delete();
        return redirect()->route('postresep', $items);
    }
}
