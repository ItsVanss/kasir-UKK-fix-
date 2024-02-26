<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|max:30',
        ]);

        $kategori = new Kategori;
        $kategori->nama = $request->nama;
        $kategori->save();


        return redirect('kategori')->with('sukses', 'Data berhasil di Simpan');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategori = Kategori::find($id);

        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|max:30',
        ]);

        $kategori = Kategori::find($id);
        $kategori->nama = $request->nama;
        $kategori->update();

        return redirect('kategori')->with('sukses', 'Data Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();

        return redirect('kategori')->with('sukses', 'Data berhasil di Hapus');
    }
}
