<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class merk extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nama_merk', 'cover'];
    public $timestamps = true;

    public function merk()
    {
        return $this->hasMany(merk::class, 'id_barang');
    }
    // menghapus cover
    public function deleteImage()
    {
        if ($this->cover && file_exists(public_path('images/merk' . $this->cover))) {
            return unlink(public_path('images/merk' . $this->cover));
        }
    }

}
