<?php

namespace App\Models\Keuangan;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table= 'transaksi';
    
    protected $primaryKey = 'id_transaksi';

    protected $fillable = [
        'id_transaksi',
        'id_kk',
        'tanggal',
        'jumlah',
        'keterangan',
        'gambar',
        'created_at',
        'updated_at'
    ];
}
