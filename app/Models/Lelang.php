<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lelang extends Model
{
    use HasFactory;

    protected $table = 'lelangs';
    protected $primaryKey = 'id_lelang';
    protected $guarded = [];

    public function barang()
    {
        return $this->hasOne(Barang::class,'id_barang','id_barang');
    }

    public function image()
    {
        return $this->hasOne(Image::class, 'id_barang','id_barang');
    }

    public function user()
    {
        return $this->hasOne(Masyarakat::class, 'id_user','id_user');
    }
}
