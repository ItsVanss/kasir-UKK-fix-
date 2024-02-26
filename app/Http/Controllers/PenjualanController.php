<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Barang;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::all();

        return view('penjualan.index', compact('barang'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penjualan $penjualan)
    {
        //
    }
    
    // public function print($id, $kode_transaksi) {
    //     $transaksi = Transaksi::find($id);
    //     $transaksi_detail = TransaksiDetail::where('kode_transaksi', $kode_transaksi)->get();

    //     $pdf = Pdf::loadView('laporan.print', compact('transaksi', 'transaksi_detail'));
    //     return $pdf->stream();
    // }
}
