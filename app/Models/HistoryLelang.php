<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryLelang extends Model
{
    use HasFactory;

    protected $table = 'history_lelang';
    protected $primaryKey = 'id_history';
    protected $guarded = [];

    /**
     * Get the lelang that owns the HistoryLelang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lelang()
    {
        return $this->belongsTo(Lelang::class, 'id_lelang', 'id_lelang');
    }

    public function barang()
    {
        return $this->hasOne(Barang::class, 'id_barang','id_barang');
    }

    public function user()
    {
        return $this->hasOne(Masyarakat::class, 'id_user','id_user');
    }

    public function petugas()
    {
        return $this->hasOne(User::class,'id','id_petugas');
    }
}
