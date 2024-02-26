<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TransaksiSementaraController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PengarangController;
use Illuminate\Auth\Events\PasswordReset;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return Auth::check() ? redirect('/dashboard') : view('auth.login');
});


// bagian lupa pas
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);

})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');


Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|regex:/[0-9]/|regex:/[@$!%*#?&]/|confirmed',
    ]);
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');
// end bagian lupa pass



Route::get('/daftar', [AuthController::class, 'daftar']);
Route::post('/user/daftar', [AuthController::class, 'store'])->name('store');

Route::post('/postlogin', [AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/login', function () {
    return Auth::check() ? redirect('/dashboard') : view('auth.login');
})->middleware('guest')->name('login');


Route::group(['middleware' => ['auth', 'ceklevel:Admin']], function(){
    Route::get('/dashboard', [DashboardController::class, 'index']);
    

    Route::get('/kategori', [KategoriController::class, 'index']);
    Route::post('/kategori/store', [KategoriController::class, 'store']);
    Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit']);
    Route::put('/kategori/{id}', [KategoriController::class, 'update']);
    Route::get('/kategori/{id}', [KategoriController::class, 'destroy']);
    
    Route::get('/penerbit', [PenerbitController::class, 'index']);
    Route::post('/penerbit/store', [PenerbitController::class, 'store']);
    Route::get('/penerbit/{id}/edit', [PenerbitController::class, 'edit']);
    Route::put('/penerbit/{id}', [PenerbitController::class, 'update']);
    Route::get('/penerbit/{id}', [PenerbitController::class, 'destroy']);

    Route::get('/pengarang', [PengarangController::class, 'index']);
    Route::post('/pengarang/store', [PengarangController::class, 'store']);
    Route::get('/pengarang/{id}/edit', [PengarangController::class, 'edit']);
    Route::put('/pengarang/{id}', [PengarangController::class, 'update']);
    Route::get('/pengarang/{id}', [PengarangController::class, 'destroy']);
    
    Route::get('/barang', [BarangController::class, 'index']);
    Route::post('/barang/store', [BarangController::class, 'store']);
    Route::get('/barang/{id}/edit', [BarangController::class, 'edit']);
    Route::get('/barang/{id}/show', [BarangController::class, 'show']);
    Route::put('/barang/{id}', [BarangController::class, 'update']);
    Route::get('/barang/{id}', [BarangController::class, 'destroy']);
    Route::get('/barang/print/{id}', [BarangController::class, 'print']);
    
    Route::get('/penjualan', [TransaksiSementaraController::class, 'index']);
    Route::post('/penjualan/store', [TransaksiSementaraController::class, 'store']);
    Route::post('/penjualan/bayar/{kodeTransaksi}', [TransaksiSementaraController::class, 'bayar']);
    Route::get('/penjualan/{id}', [TransaksiSementaraController::class, 'destroy']);
    Route::get('/penjualan/hapus/semua', [TransaksiSementaraController::class, 'hapusSemua']);
    
    Route::get('/laporan', [TransaksiController::class, 'index']);
    Route::get('/laporan/cari', [TransaksiController::class, 'cari']);
    Route::get('/laporan/{dari}/{sampai}/print', [TransaksiController::class, 'printTanggal']);
    Route::get('/laporan/{kodeTransaksi}/print', [TransaksiController::class, 'print']);
    Route::get('/laporan/{kodeTransaksi}', [TransaksiController::class, 'show']);
    
    Route::get('/user', [UserController::class, 'index']);
    Route::post('/user/store', [UserController::class, 'store']);
    Route::get('/user/{id}/edit', [UserController::class, 'edit']);
    Route::put('/user/{id}', [UserController::class, 'update']);
    Route::get('/user/{id}', [UserController::class, 'destroy']);
});

Route::group(['middleware' => ['auth', 'ceklevel:Admin,Kasir']], function(){
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/penjualan', [TransaksiSementaraController::class, 'index']);
    Route::post('/penjualan/store', [TransaksiSementaraController::class, 'store']);
    Route::post('/penjualan/bayar', [TransaksiSementaraController::class, 'bayar']);
    Route::post('/penjualan/bayar/{kodeTransaksi}', [TransaksiSementaraController::class, 'bayar']);
    Route::get('/penjualan/{id}', [TransaksiSementaraController::class, 'destroy']);
    Route::get('/penjualan/hapus/semua', [TransaksiSementaraController::class, 'hapusSemua']);

    Route::get('/laporan', [TransaksiController::class, 'index']);
    Route::get('/laporan/cari', [TransaksiController::class, 'cari']);
    Route::get('/laporan/{dari}/{sampai}/print', [TransaksiController::class, 'printTanggal']);
    Route::get('/laporan/{kodeTransaksi}/print', [TransaksiController::class, 'print']);
    Route::get('/laporan/{kodeTransaksi}', [TransaksiController::class, 'show']);
    
    // Route::get('/laporan', [TransaksiController::class, 'index']);
    // Route::get('/laporan/{kodeTransaksi}/print', [TransaksiController::class, 'print']);
    // Route::get('/laporan/{kodeTransaksi}', [TransaksiController::class, 'show']);
});