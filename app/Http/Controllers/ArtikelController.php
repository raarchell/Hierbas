<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\ArtikelComment;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;
use Session;

class ArtikelController extends Controller
{
    //tabel
    public function index(Request $request)
    {
        $items = Artikel::paginate(15);
        return view('pages.admin.artikel', [
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
        return view('pages.admin.artikel', [
            'items' => $items
        ]);
    }

    //add
    public function indexAdd()
    {
        $items = Artikel::get();
        return view('pages.admin.add_artikel', [
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
        return view('pages.admin.edit_artikel', [
            'items' => $items,
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|max:200',
            'isi_artikel' => 'required',
            'foto' => 'required | file|image|mimes:jpeg,png,jpg',
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

    // page menu artikel user
    public function indexArtikel()
    {
        $items = Artikel::get();
        return view('pages.menu_artikel', [
            'items' => $items
        ]);
    }

    //page post artikel user
    public function postArtikel(Request $request, $id)
    {
        $items = Artikel::findOrFail($id);
        $itemID = Artikel::where('id',$id)->pluck('id');
        $viewed = Session::get('viewed_post', []); //ini ngambil session yang namanya 'viewed_post' dengan bentuk type data array biar id yang masuk bisa banyak
        if (!in_array($itemID, $viewed)) { //ini ngecek apakah di dalam array session yang namanya 'viewed_post' ada id post yang lagi dibuka, jika tidak ada maka dilanjutkan
            Session::push('viewed_post', $itemID); //ini dia masukkin id post yang lagi dibuka kedalam session yang namanya 'viewed_post'
            $items->incrementPengunjung(); //ini ngejalanin function yang ada di model yang suda dibuat tadi
        }
        $post = Artikel::orderBy('pengunjung','DESC')->take(3)->get();
        $comment = ArtikelComment::with(['user'])->where('id_artikel', $id)->get();
        return view('pages.post_artikel', [
            'items' => $items,
            'comment' => $comment,
            'post' => $post
        ]);
    }
    public function comment(Request $request)
    {
        $data = $request->all();
        ArtikelComment::create($data);
        $id = ArtikelComment::orderBy('id', 'desc')->value('id_artikel');
        return redirect()->route('postartikel', $id);
    }
    public function deleteComment(Request $request, $id)
    {
        $items = ArtikelComment::where('id', $id)->value('id_artikel');
        ArtikelComment::find($id)->delete();
        return redirect()->route('postartikel', $items);
    }
}
