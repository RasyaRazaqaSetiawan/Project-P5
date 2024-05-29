<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kasir extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nama_kasir', , 'jenis_kelamin', 'alamat', 'no_telepon', 'cover'];
    public $timestamps = true;

    public function kasir()
    {
        return $this->hasMany(kasir::class, 'id_transaksi');
    }

    // menghapus cover
    public function deleteImage()
    {
        if ($this->cover && file_exists(public_path('images/kasir' . $this->cover))) {
            return unlink(public_path('images/kasir' . $this->cover));
        }
    }
}

// https://github.com/nurfawaiq/bootstrap-templates/blob/main/shoppy-template.zip
