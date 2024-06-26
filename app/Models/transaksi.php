<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'tanggal_pembelian', 'id_barang', 'merk', 'id_kasir', 'jumlah', 'total', 'cover'];
    public $timestamps = true;

    public function kasir()
    {
        return $this->belongsTo(Kasir::class, 'id_kasir');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }


    public function merk()
    {
        return $this->belongsTo(Merk::class, 'id_merk');
    }
    // menghapus cover
    public function deleteImage()
    {
        if ($this->cover && file_exists(public_path('images/transaksi' . $this->cover))) {
            return unlink(public_path('images/transaksi' . $this->cover));
        }
    }
}
