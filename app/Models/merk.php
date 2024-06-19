<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class merk extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nama_merk'];
    public $timestamps = true;

    public function merk()
    {
        return $this->hasMany(merk::class, 'id_barang', 'id_transaksi');
    }
}
