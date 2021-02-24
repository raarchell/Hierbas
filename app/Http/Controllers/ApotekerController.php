<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Contracts\Session\Session;
use App\Models\Kategori;
use App\Models\Resep;
use App\Models\Tanaman;
use App\Models\User;

class ApotekerController extends Controller
{
    public function dashboard(){
        return view('pages.apoteker.dashboard', [
            'jmlkat' => Kategori::count(),
            'jmlrsp' => Resep::count(),
            'jmltnm' => Tanaman::count()
        ]);
    }
    public function search(Request $request){
        $search = $request->search;

        $resep = Resep::where('nama', 'like', "%" . $search . "%")->paginate();
        $kategori = Kategori::where('nama', 'like', "%" . $search . "%")->paginate();
        $tanaman = Tanaman::where('nama', 'like', "%" . $search . "%")->paginate();

        return view('pages.apoteker.search', [
            'resep' => $resep,
            'kategori' => $kategori,
            'tanaman' => $tanaman
        ]);
    }

    // kategori
        // tabel kategori
    public function indexKategori(Request $request){
        $items = Kategori::paginate(15);
        return view('pages.apoteker.kategori', [
            'items' => $items
        ]);
    }
    public function deleteKategori($id)
    {
        $items = Kategori::findOrFail($id);
        $items->delete();
        return redirect()->route('Aptabelkategori')->with('status', 'Kategori berhasil dihapus');
    }
    public function searchKategori(Request $request)
    {
        $cari = $request->cari;
        $items = Kategori::where('nama', 'like', "%" . $cari . "%")->paginate();
        return view('pages.apoteker.kategori', [
            'items' => $items
        ]);
    }
        //add kategori
    public function indexAddKategori(){
        return view('pages.apoteker.addkategori');
    }
    public function storeKategori(Request $request){
        $request->validate([
            'nama' => 'required|unique:kategori|max:30',
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
            'foto' => $nama_file,
            'slug' => Str::slug($request->nama)
        ];
        Kategori::create($data);

        return redirect()->route('Aptabelkategori')->with('status', 'Kategori berhasil ditambahkan!');
    }
        // edit kategori
    public function indexEditKategori($id){
        $items = Kategori::findOrFail($id);
        return view('pages.apoteker.editkategori', [
            'items' => $items
        ]);
    }
    public function updateKategori(Request $request, $id){
        $request->validate([
            'nama' => 'required|max:30',
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
            'foto' => $nama_file,
        ];
        Kategori::find($id)->update($data);

        return redirect()->route('Aptabelkategori')->with('status', 'Kategori berhasil diupdate!');
    }

    //resep
        //tabel resep
    public function indexResep(Request $request){
        $items = Resep::paginate(15);
        return view('pages.apoteker.resep', [
            'items' => $items
        ]);
    }
    public function deleteResep($id){
        $items = Resep::findOrFail($id);
        $items->delete();
        return redirect()->route('Aptabelresep')->with('status', 'Resep berhasil dihapus');
    }
    public function searchResep(Request $request){
        $cari = $request->cari;
        $items = Resep::where('nama', 'like', "%" . $cari . "%")->paginate();
        return view('pages.apoteker.resep', [
            'items' => $items
        ]);
    }
        // add resep
    public function indexAddResep()
    {
        $items = Kategori::get();
        return view('pages.apoteker.addresep', [
            'items' => $items
        ]);
    }
    public function storeResep(Request $request)
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
        Resep::create($data);

        return redirect()->route('Aptabelresep')->with('status', 'Resep obat berhasil ditambahkan!');
    }
        // edit resep
    public function indexEditResep($id)
    {
        $items = Resep::findOrFail($id);
        $kategori = Kategori::get();
        return view('pages.apoteker.editresep', [
            'items' => $items,
            'kategori' => $kategori
        ]);
    }
    public function updateResep(Request $request, $id)
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

        return redirect()->route('Aptabelresep')->with('status', 'Resep obat berhasil diupdate!');
    }

    // tanaman
        // tabel tanaman
    public function indexTanaman(Request $request){
        $items = Tanaman::paginate(15);
        return view('pages.apoteker.tanaman', [
            'items' => $items
        ]);
    }
    public function deleteTanaman($id){
        $items = Tanaman::findOrFail($id);
        $items->delete();
        return redirect()->route('Aptabeltanaman')->with('status', 'Tanaman herbal berhasil dihapus');
    }
    public function searchTanaman(Request $request){
        $cari = $request->cari;
        $items = Tanaman::where('nama', 'like', "%" . $cari . "%")->paginate();
        return view('pages.apoteker.tanaman', [
            'items' => $items
        ]);
    }
        // add tanaman
    public function indexAddTanaman()
    {
        $items = Tanaman::get();
        return view('pages.apoteker.addtanaman', [
            'items' => $items
        ]);
    }
    public function storeTanaman(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:30',
            'isi' => 'required',
            'foto' => 'file|image|mimes:jpeg,png,jpg',
            'video' => 'nullable|file|mimes:mp4,x-flv,x-mpegURL,MP2T,3gpp,quicktime,x-msvideo,x-ms-wmv',
        ]);
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('foto');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'assets/gallery';
        $file->move($tujuan_upload, $nama_file);
        if ($request->video != null) {
            $file1 = $request->file('video');

            $nama_file1 = time() . "_" . $file1->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'assets/gallery';
            $file1->move($tujuan_upload, $nama_file1);

            $data = [
                'nama' => $request->nama,
                'isi' => $request->isi,
                'foto' => $nama_file,
                'link' => $request->link,
                'video' => $nama_file1,
            ];
            Tanaman::create($data);
        }
        $data = [
            'nama' => $request->nama,
            'isi' => $request->isi,
            'foto' => $nama_file,
            'link' => $request->link,
        ];
        Tanaman::create($data);

        return redirect()->route('Aptabeltanaman')->with('status', 'Tanaman berhasil ditambahkan!');
    }
        // edit tanaman
    public function indexEditTanaman($id){
        $items = Tanaman::findOrFail($id);
        return view('pages.apoteker.edittanaman', [
            'items' => $items,
        ]);
    }
    public function updateTanaman(Request $request, $id){
        $request->validate([
            'nama' => 'required|max:30',
            'isi' => 'required',
            'foto' => 'file|image|mimes:jpeg,png,jpg',
            'link' => 'nullable',
            'video' => 'file|mimes:mp4,x-flv,x-mpegURL,MP2T,3gpp,quicktime,x-msvideo,x-ms-wmv',
        ]);
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('foto');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'assets/gallery';
        $file->move($tujuan_upload, $nama_file);
        if ($request->video != null) {
            $file1 = $request->file('video');

            $nama_file1 = time() . "_" . $file1->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'assets/gallery';
            $file1->move($tujuan_upload, $nama_file1);

            $data = [
                'nama' => $request->nama,
                'isi' => $request->isi,
                'foto' => $nama_file,
                'link' => $request->link,
                'video' => $nama_file1,
            ];
            Tanaman::find($id)->update($data);
        }
        $data = [
            'nama' => $request->nama,
            'isi' => $request->isi,
            'foto' => $nama_file,
            'link' => $request->link,
        ];
        Tanaman::find($id)->update($data);

        return redirect()->route('Aptabeltanaman')->with('status', 'Tanaman berhasil diupdate!');
    }

        //profil apoteker
    // view
    public function profilApoteker()
    {
        return view('pages.apoteker.profil');
    }
    public function updateProfilApoteker(Request $request, $id)
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

        return redirect()->route('profilapoteker');
    }
    public function updatePassApoteker(UpdatePasswordRequest $request)
    {
        $request->user()->update([
            'password' => Hash::make($request->get('password'))
        ]);

        return redirect()->route('profilapoteker');
    }
}
