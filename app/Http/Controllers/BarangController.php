<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Pengarang;
use App\Models\Penerbit;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::all();
        $kategori = Kategori::all();
        $pengarang = Pengarang::all();
        $penerbit = Penerbit::all();
        $now = \Carbon\Carbon::now();
        $tahun_bulan = $now->format('Ymd');

    // Ambil tanggal terakhir direset dari cache
    $lastResetDate = Cache::get('last_reset_date');
    $urut = 1;

    if (!$lastResetDate || $lastResetDate != $tahun_bulan) {
        // Jika tanggal terakhir direset belum diset atau berbeda dengan tanggal saat ini, reset nomor
        Cache::put('last_reset_date', $tahun_bulan, 1440); // Cache akan berlaku selama 1 hari (dalam menit)
    } else {
        // Jika tanggal terakhir direset sama dengan tanggal saat ini, ambil nomor terakhir dari database
        $ambil = Barang::latest()->first();
        if ($ambil) {
            $urut = (int) substr($ambil->kode, -4) + 1;
        }
    }

    // Menggunakan str_pad untuk menambahkan angka nol di depan $urut jika perlu
    $nomor = $tahun_bulan . str_pad($urut, 4, '0', STR_PAD_LEFT);

    return view('barang.index', compact('barang', 'kategori', 'penerbit', 'pengarang' , 'nomor'));
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
            'kategori_id' => 'required',
            'pengarang_id' => 'required',
            'harga_jual' => 'required',
            'penerbit_id' => 'required',
            'stok' => 'required',
        ]);

        $barang = new Barang;
        $barang->kode = $request->kode;
        $barang->nama = $request->nama;
        $barang->kategori_id = $request->kategori_id;
        $barang->pengarang_id = $request->pengarang_id;
        $barang->harga_jual = $request->harga_jual;
        $barang->penerbit_id = $request->penerbit_id;
        $barang->stok = $request->stok;
        $barang->diskon = $request->diskon;
        $barang->save();


        return redirect('barang')->with('sukses', 'Data berhasil di simpan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $barang = Barang::find($id);
        $kategori = \App\Models\Kategori::all();
        $pengarang = \App\Models\Pengarang::all();
        $penerbit = \App\Models\Penerbit::all();

        return view('barang.view', compact('barang', 'kategori', 'penerbit', 'pengarang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $barang = Barang::find($id);
        $kategori = \App\Models\Kategori::all();
        $pengarang = \App\Models\Pengarang::all();
        $penerbit = \App\Models\Penerbit::all();

        return view('barang.edit', compact('barang', 'kategori', 'penerbit', 'pengarang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);
        $barang->kode = $request->kode;
        $barang->nama = $request->nama;
        $barang->kategori_id = $request->kategori_id;
        $barang->pengarang_id = $request->pengarang_id;
        $barang->harga_jual = $request->harga_jual;
        $barang->penerbit_id = $request->penerbit_id;
        $barang->stok = $request->stok;
        $barang->diskon = $request->diskon;
        $barang->update();


        return redirect('barang')->with('sukses', 'Data berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();

        return redirect('barang')->with('sukses', 'Data berhasil di Hapus');
    }

    public function print($id)
    {
        $barang = Barang::find($id);

        $pdf = Pdf::loadView('barang.print', compact('barang'));
        $pdf->setPaper('A4');
        return $pdf->stream();
    }
    
}
