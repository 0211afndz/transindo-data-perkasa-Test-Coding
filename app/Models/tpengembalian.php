<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tpengembalian extends Model
{
    use HasFactory;

    public $primaryKey = 'idpengembalian';
    public $incrementing = true;
    public $timestamps = false;
    protected $table = 'tpengembalian';

    protected $fillable = [
        'tgl_pengembalian',
        'jam_pengembalian',
        'biaya_akhir',
        'denda',
        'total_biaya',
        'idpeminjaman',
        'idmobil',
        'iduser',
    ];

    public function user()
    {
        return $this->hasOne('\App\Models\User','iduser','iduser');
    }

    public function mobil()
    {
        return $this->hasOne('\App\Models\tmobil','idmobil','idmobil');
    }

    public function peminjaman()
    {
        return $this->hasOne('\App\Models\tpeminjaman','idpeminjaman','idpeminjaman');
    }
}
