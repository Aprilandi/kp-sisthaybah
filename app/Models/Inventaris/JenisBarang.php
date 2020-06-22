<?php

namespace App\Models\Inventaris;

use Illuminate\Database\Eloquent\Model;

class JenisBarang extends Model
{
    protected $table = 'jenis_barang';

    protected $primaryKey = 'id_jenis_barang';

    protected $fillable = [
        'id_jenis_barang',
        'jenis_barang',
        'keterangan',
        'created_at',
        'updated_at'
    ];
}
