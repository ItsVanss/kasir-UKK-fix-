<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;
use App\Models\Penerbit;
use App\Traits\HasFormatRupiah;
use App\Models\Pengarang;
use App\Models\TransaksiSementara;
use App\Models\TransaksiDetail;

class Barang extends Model
{
    use HasFactory;
    use HasFormatRupiah;
    protected $fillable = [
        'kode',
        'nama',
        'kategori',
        'penerbit',
        'pengarang',
        'harga_jual',
        'penerbit',
        'stok',
    ];

    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class);
    }

    public function pengarang()
    {
        return $this->belongsTo(Pengarang::class);
    }

    public function TransaksiSementara()
    {
        return $this->hasMany(TransaksiSementara::class);
    }

    public function TransaksiDetail()
    {
        return $this->hasMany(TransaksiDetail::class);
    }
}
