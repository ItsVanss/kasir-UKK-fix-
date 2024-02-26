<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function daftar()
    {
        $user = User::all();

        return view('auth.signup', compact('user'));
    }

    public function store(Request $request)
    {
        try{
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

            $request->validate([
                'nama' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8|regex:/[0-9]/|regex:/[@$!%*#?&]/',
                'level' => 'required|in:Admin,Kasir',
            ]);
    
            $user = new User;
            $user->kode = $kode;
            $user->nama = $request->nama;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->level = $request->level;
            $user->save();
    
    
            return redirect('login')->with('sukses', 'Berhasil Daftar, Silahkan Login!');
        }catch(\Exception $e){
            return redirect('daftar')->with('gagal', 'Tidak Berhasil Daftar. Terjadi Kesalahan: '.$e->getMessage());
        }
    }

    public function login()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request): RedirectResponse
    {
        if(Auth::attempt($request->only('email', 'password'))){
            $user = Auth::user();

            return redirect('/dashboard');
        }
        else {
            return back()->with('gagal', 'Email atau Password salah!');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}
