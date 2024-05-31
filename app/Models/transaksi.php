<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'tanggal_pembelian', 'id_barang', 'id_kasir','jumlah','total'];
    public $timestamps = true;

    public function kasir()
    {
        return $this->belongsTo(Kasir::class, 'id_kasir');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
