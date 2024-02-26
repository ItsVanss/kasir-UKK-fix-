<?php

namespace App\Http\Controllers;

use App\Models\TransaksiSementara;
use App\Models\TransaksiDetail;
use App\Models\Transaksi;
use App\Models\Barang;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class TransaksiSementaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::all();
        $transaksi_sementara = TransaksiSementara::all();
        $now = Carbon::now();
        $tahun_bulan = $now->year . $now->month;
        $cek = Transaksi::count();
        
        if($cek == 0){
            $urut = 10000001;
            $nomor = $tahun_bulan . $urut;
        }else {
            $ambil = Transaksi::all()->last();
            $urut = (int)substr($ambil->kode_transaksi, -8) + 1;
            $nomor = $tahun_bulan . $urut;
        }
    
        return view('penjualan.index', compact('barang', 'transaksi_sementara', 'nomor'));
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
    $data = $request->all();

    $sub_total = ($data['harga'] - ($data['diskon'] * $data['harga'] / 100)) * $data['jumlah'];

    $transaksi_sementara = TransaksiSementara::where('barang_id', $request->barang_id)
        ->where('kode_transaksi', $request->kode_transaksi)
        ->first();

    if($transaksi_sementara) {
        // If the item already exists, update the quantity
        $transaksi_sementara->jumlah += $request->jumlah;
        $transaksi_sementara->total += $sub_total;
        $transaksi_sementara->save();
    } else {
        // If the item doesn't exist, add it to the temporary table
        $transaksi_sementara = new TransaksiSementara;
        $transaksi_sementara->kode_transaksi = $request->kode_transaksi;
        $transaksi_sementara->barang_id = $request->barang_id;
        $transaksi_sementara->harga = $request->harga;
        $transaksi_sementara->jumlah = $request->jumlah;
        $transaksi_sementara->diskon = $request->diskon;
        $transaksi_sementara->total = $sub_total;
        $transaksi_sementara->save();
    }

    return redirect('penjualan');
}


    /**
     * Display the specified resource.
     */
    public function show(TransaksiSementara $transaksiSementara)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransaksiSementara $transaksiSementara)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TransaksiSementara $transaksiSementara)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transaksi_sementara = TransaksiSementara::find($id);
        $transaksi_sementara->delete();

        return redirect('penjualan');
    }

    public function hapusSemua()
    {
        TransaksiSementara::truncate(); // Menghapus semua data dari tabel Transaksi
        
        return redirect('penjualan');
    }
    
    public function bayar(Request $request, $kode_transaksi)
    {
        $validated = $request->validate([
            'bayar' => 'required|max:50',
        ]);

        $messages = [
            'required' => 'Field :attribute harus diisi.',
        ];

        $transaksi_sementara = TransaksiSementara::all();

        foreach ($transaksi_sementara as $data) {
            $barang = Barang::find($data->barang_id);
        
            // Validasi stok
            if ($data->jumlah > $barang->stok) {
                // Handle ketika stok tidak mencukupi
                // Misalnya, kembalikan pesan error atau lakukan tindakan lain
                return redirect()->back()->with('error', 'Stok tidak mencukupi untuk penjualan ini.');
            }
        
            // Kurangkan stok
            $kurangi = $barang->stok - $data->jumlah;
        
            // Update stok barang
            $barang->update(['stok' => $kurangi]);
        
            // Tambahkan detail transaksi
            TransaksiDetail::create([
                'kode_transaksi' => $data->kode_transaksi,
                'barang' => $barang->nama,
                'harga' => $data->harga,
                'jumlah' => $data->jumlah,
                'diskon' => $data->diskon,
                'total' => $data->total,
            ]);
        }
        
        
        TransaksiSementara::truncate(); // Menghapus semua data dari tabel Transaksi
        
        $tanggalSekarang = now('Asia/Jakarta')->format('Y-m-d H:i:s');
        $transaksi = new Transaksi;
        $transaksi->kode_transaksi = $request->kode_transaksi;
        $transaksi->total = $request->total;
        $transaksi->bayar = $request->bayar;
        $transaksi->kembali = $request->kembali;
        $transaksi->kode_kasir = $request->kode_kasir;
        $transaksi->tanggal = $tanggalSekarang;
        $transaksi->save();
        return redirect('penjualan')->with('berhasil', $kode_transaksi);
    }

}
