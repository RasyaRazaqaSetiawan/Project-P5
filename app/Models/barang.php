<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nama_barang', 'stok', 'harga', 'id_merk', 'cover'];
    public $timestamps = true;

    public function merk()
    {
        return $this->belongsTo(Merk::class, 'id_merk');
    }

    // menghapus cover
    public function deleteImage()
    {
        if ($this->cover && file_exists(public_path('images/barang' . $this->cover))) {
            return unlink(public_path('images/barang' . $this->cover));
        }
    }
}
