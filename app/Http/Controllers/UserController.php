<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();

        $now = Carbon::now();
        $tahun_bulan = $now->year . $now->month;
        $cek = User::count();
        
        if($cek == 0){
            $urut = 100001;
            $kode = $tahun_bulan . $urut;
            // dd($kode);
        }else {
            $ambil = User::all()->last();
            $urut = (int)substr($ambil->kode, -6) + 1;
            $kode = $tahun_bulan . $urut;
        }
        return view('user.index', compact('user', 'kode'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string||min:8|regex:/[0-9]/|regex:/[@$!%*#?&]/',
                'level' => 'required|in:Admin,Kasir',
            ]);

            $user = new User;
            $user->kode = $request->kode;
            $user->nama = $request->nama;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->level = $request->level;
            $user->save();

            return redirect('user')->with('sukses', 'Data berhasil di Simpan');
        } catch (\Exception $e) {
            // If an exception occurs, redirect back with an error message
            return redirect('user')->with('gagal', 'Tidak Berhasil Daftar. Terjadi Kesalahan: '.$e->getMessage());
        } 
    }

    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    try {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:5', // Allow password to be nullable
            'level' => 'required|in:Admin,Kasir',
        ]);

        $user = User::find($id);

        if (!$user) {
            throw new \Exception('User not found');
        }

        // Update non-password fields
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->level = $request->level;

        // Update password if provided
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->update();

        return redirect('user')->with('sukses', 'Data Berhasil di Edit');
    } catch (\Exception $e) {
        return redirect('user')->with('gagal', 'Gagal mengedit data: ' . $e->getMessage());
    }
}

    

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('user')->with('sukses', 'Data Berhasil Di Hapus');
    }
}
