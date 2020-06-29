<?php

namespace App\Models\Keuangan;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use Filterable;
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

    public function kategoriKeuangan(){
        return $this->belongsTo(KategoriKeuangan::class, 'id_kk', 'id_kk');
    }

    public function modelFilter()
    {
        return $this->provideFilter(\App\ModelFilters\IuranFilter::class);
    }
}
