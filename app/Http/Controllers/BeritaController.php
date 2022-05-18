<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBeritaRequest;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['berita'] = Berita::paginate(10);

        return view('daftar-berita', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambah-berita');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBeritaRequest $request)
    {
        $gambar = $request->gambar;
        $gambarHash = $gambar->hashName();
        $gambar->move(public_path('uploads/berita'), $gambarHash);

        $berita = new Berita;
        $berita->judul = $request->judul;
        $berita->image = $gambarHash;
        $berita->content = $request->konten;
        $berita->save();

        return redirect('admin/berita')->with('success', 'Berita Telah Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['berita'] = Berita::find($id);
        
        return view('edit-berita', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gambar = $request->gambar;
        $gambarHash = $gambar->hashName();
        $gambar->move(public_path('uploads/berita'), $gambarHash);

        $berita = Berita::find($id);
        $berita->judul = $request->judul;
        $berita->image = $gambarHash;
        $berita->content = $request->konten;
        $berita->save();

        return redirect('admin/berita')->with('success', 'Berhasil Mengubah Berita');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Berita::find($id)->delete();

        return redirect('admin/berita')->with('success', 'Berhasil Menghapus Berita');
    }
}
