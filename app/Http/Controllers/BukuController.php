<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use App\Models\Bahasa;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bukus = Buku::with('bahasa')->get(); // Mengambil semua isi tabel
        $posts = Buku::orderBy('id_buku', 'desc')->paginate(3);
        return view('bukus.index', ['bukus'=>$bukus,'paginate'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bahasa = Bahasa::all();
        return view('bukus.create',['bahasa'=>$bahasa]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'id_buku' => 'required',
            'judul' => 'required',
            'kategori' => 'required',
            'penerbit' => 'required',
            'pengarang' => 'required',
            'bahasa_id' => 'required',
            'jumlah' => 'required',
            'status' => 'required',
            ]);
            //fungsi eloquent untuk menambah data
            $buku = new Buku;
            $buku->id_buku = $request->get ('id_buku');
            $buku->judul = $request->get ('judul');
            $buku->kategori = $request->get ('kategori');
            $buku->penerbit = $request->get ('penerbit');
            $buku->pengarang = $request->get ('pengarang');
            $buku->jumlah = $request->get ('jumlah');
            $buku->status = $request->get ('status');

            $bahasa = new Bahasa;
            $bahasa->id = $request->get('bahasa_id');

            $buku->bahasa()->associate($bahasa);
            $buku->save();
            //jika data berhasil ditambahkan, akan kembali ke halaman utama
            return redirect()->route('bukus.index')->with('success', 'Buku Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_buku)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        $buku = Buku::with('bahasa')->where('id_buku',$id_buku)->first();
        return view('bukus.detail',['Buku'=>$buku]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_buku)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $buku = Buku::with('bahasa')->where('id_buku',$id_buku)->first();
        $bahasa = Bahasa::all();
        return view('bukus.edit', compact('buku','bahasa'));
    }
    public function update(Request $request, $id_buku)
        {
        //melakukan validasi data
        $request->validate([
            'id_buku' => 'required',
            'judul' => 'required',
            'kategori' => 'required',
            'penerbit' => 'required',
            'pengarang' => 'required',
            'bahasa_id' => 'required',
            'jumlah' => 'required',
            'status' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
            $buku = Buku::with('bahasa')->where('id_buku',$id_buku)->first(); 
            $buku->id_buku = $request->get ('id_buku');
            $buku->judul = $request->get ('judul');
            $buku->kategori = $request->get ('kategori');
            $buku->penerbit = $request->get ('penerbit');
            $buku->pengarang = $request->get ('pengarang');
            $buku->jumlah = $request->get ('jumlah');
            $buku->status = $request->get ('status');

        $bahasa = new Bahasa;
        $bahasa->id = $request->get('bahasa_id');

        $buku->bahasa()->associate($bahasa);
        $buku->save();
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('bukus.index')->with('success', 'Buku Berhasil Diupdate');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_buku)
    {
        //fungsi eloquent untuk menghapus data
        Buku::find($id_buku)->delete();
        return redirect()->route('bukus.index')-> with('success', 'Buku Berhasil Dihapus');

    }
}
