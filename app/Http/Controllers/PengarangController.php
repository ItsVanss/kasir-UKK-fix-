<?php

namespace App\Http\Controllers;

use App\Models\Pengarang;
// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengarang = Pengarang::all();
        return view('pengarang.index', compact('pengarang'));
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

        $pengarang = new Pengarang;
        $pengarang->nama = $request->nama;
        $pengarang->save();


        return redirect('pengarang')->with('sukses', 'Data berhasil di Simpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengarang $pengarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengarang $pengarang, $id)
    {
        $pengarang = Pengarang::find($id);

        return view('pengarang.edit', compact('pengarang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengarang $pengarang, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|max:30',
        ]);

        $pengarang = Pengarang::find($id);
        $pengarang->nama = $request->nama;
        $pengarang->update();

        return redirect('pengarang')->with('sukses', 'Data Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengarang $pengarang, $id)
    {
        $pengarang = Pengarang::find($id);
        $pengarang->delete();

        return redirect('pengarang')->with('sukses', 'Data berhasil di Hapus');
    }
}
