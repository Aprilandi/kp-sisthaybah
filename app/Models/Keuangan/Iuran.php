<?php

namespace App\Models\Keuangan;

use Illuminate\Database\Eloquent\Model;

class Iuran extends Model
{
    protected $table= 'iuran';
    
    protected $primaryKey = 'id_iuran';

    protected $fillable = [
        'id_iuran',
        'id_biaya',
        'id_santri',
        'tahun_iuran',
        'tahun_bulan',
        'is_telat',
        'is_lunas',
        'jumlah_bayar',
        'jumlah_hutang'
    ];
}
