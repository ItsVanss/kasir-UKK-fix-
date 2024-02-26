<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::all();
        $barang = Barang::all();
        $transaksi = Transaksi::all();
        $item_terjual = TransaksiDetail::all();

        return view('dashboard.index', compact('user', 'barang', 'transaksi', 'item_terjual'));
    }
}
