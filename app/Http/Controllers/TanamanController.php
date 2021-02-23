<?php

namespace App\Http\Controllers;

use App\Models\Tanaman;
use App\Models\TanamanComment;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class TanamanController extends Controller
{
    // tabel
    public function index(Request $request)
    {
        $items = Tanaman::paginate(15);
        return view('pages.admin.tanaman', [
            'items' => $items
        ]);
    }
    public function delete($id)
    {
        $items = Tanaman::findOrFail($id);
        $items->delete();
        return redirect()->route('tabeltanaman')->with('status', 'Tanaman herbal berhasil dihapus');
    }
    public function search(Request $request)
    {
        $cari = $request->cari;
        $items = Tanaman::where('nama', 'like', "%" . $cari . "%")->paginate();
        return view('pages.admin.tanaman', [
            'items' => $items
        ]);
    }

    //add
    public function indexAdd()
    {
        $items = Tanaman::get();
        return view('pages.admin.add_tanaman', [
            'items' => $items
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:30',
            'isi' => 'required',
            'foto' => 'file|image|mimes:jpeg,png,jpg',
            'video' => 'nullable|file|mimes:mp4,x-flv,x-mpegURL,MP2T,3gpp,quicktime,x-msvideo,x-ms-wmv',
        ]);
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('foto');
        $file1 = $request->file('video');

        $nama_file = time() . "_" . $file->getClientOriginalName();
        $nama_file1 = time() . "_" . $file1->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'assets/gallery';
        $file->move($tujuan_upload, $nama_file);
        $file1->move($tujuan_upload, $nama_file1);
        $data = [
            'nama' => $request->nama,
            'isi' => $request->isi,
            'foto' => $nama_file,
            'link' => $request->link,
            'video' => $nama_file1,

        ];
        Tanaman::create($data);

        return redirect()->route('tabeltanaman')->with('status', 'Tanaman berhasil ditambahkan!');
    }

    // edit
    public function indexEdit($id)
    {
        $items = Tanaman::findOrFail($id);
        return view('pages.admin.edit_tanaman', [
            'items' => $items,
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:30',
            'isi' => 'required',
            'foto' => 'file|image|mimes:jpeg,png,jpg',
            'link' => 'nullable',
            'video' => 'nullable|file|mimes:mp4,x-flv,x-mpegURL,MP2T,3gpp,quicktime,x-msvideo,x-ms-wmv',
        ]);
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('foto');
        $file1 = $request->file('video');

        $nama_file = time() . "_" . $file->getClientOriginalName();
        $nama_file1 = time() . "_" . $file1->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'assets/gallery';
        $file->move($tujuan_upload, $nama_file);
        $data = [
            'nama' => $request->nama,
            'isi' => $request->isi,
            'foto' => $nama_file,
            'link' => $request->link,
            'video' => $nama_file1,
        ];
        Tanaman::find($id)->update($data);

        return redirect()->route('tabeltanaman')->with('status', 'Tanaman berhasil diupdate!');
    }

    // page menu tanaman user
    public function indexTanaman()
    {
        $items = Tanaman::get();
        return view('pages.menu_tanaman', [
            'items' => $items
        ]);
    }

    //page post tanaman user
    public function postTanaman(Request $request, $id)
    {
        $items = Tanaman::findOrFail($id);
        $comment = TanamanComment::with(['user'])->where('id_tanaman', $id)->get();
        $post = Tanaman::latest()->get()->random(3);
        return view('pages.post_tanaman', [
            'items' => $items,
            'comment' => $comment,
            'post' => $post
        ]);
    }
    public function comment(Request $request)
    {
        $data = $request->all();
        TanamanComment::create($data);
        $id = TanamanComment::orderBy('id', 'desc')->value('id_tanaman');
        return redirect()->route('posttanaman', $id);
    }
    public function deleteComment(Request $request, $id)
    {
        $items = TanamanComment::where('id', $id)->value('id_tanaman');
        TanamanComment::find($id)->delete();
        return redirect()->route('posttanaman', $items);
    }
}
