<?php

namespace App\Models\Keuangan;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;

class Iuran extends Model
{
    use Filterable;

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

    public function santri(){
        return $this->belongsTo(\App\Models\Santri\Santri::class, 'id_santri', 'id_santri');
    }

    public function biaya(){
        return $this->belongsTo(Biaya::class, 'id_biaya', 'id_biaya');
    }

    public function modelFilter()
    {
        return $this->provideFilter(\App\ModelFilters\IuranFilter::class);
    }
}