<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tmobil extends Model
{
    use HasFactory;

    public $primaryKey = 'idmobil';
    public $incrementing = true;
    public $timestamps = false;
    protected $table = 'tmobil';

    protected $fillable = [
        'merek',
        'model',
        'no_plat',
        'harga_sewa_harian',
        'status_mobil',
    ];
}
