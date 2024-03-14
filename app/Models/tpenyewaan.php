<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tpenyewaan extends Model
{
    use HasFactory;

    public $primaryKey = 'idpenyewaan';
    public $incrementing = true;
    public $timestamps = false;
    protected $table = 'tpenyewaan';

    protected $fillable = [
        'tgl_pesan',
        'tgl_mulai',
        'jam_mulai',
        'tgl_akhir',
        'jam_akhir',
        'jumlah_hari',
        'idmobil',
        'iduser',
        'status_penyewaan',
    ];

    public function user()
    {
        return $this->hasOne('\App\Models\User','iduser','iduser');
    }

    public function mobil()
    {
        return $this->hasOne('\App\Models\tmobil','idmobil','idmobil');
    }
}
