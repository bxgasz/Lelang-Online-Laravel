<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barangs';
    protected $primaryKey = 'id_barang';
    protected $guarded = [];

    /**
     * Get the lelang that owns the Barang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lelang()
    {
        return $this->belongsTo(Lelang::class, 'id_barang', 'id_barang');
    }
}
