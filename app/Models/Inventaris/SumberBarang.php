<?php

namespace App\Models\Inventaris;

use Illuminate\Database\Eloquent\Model;

class SumberBarang extends Model
{
    protected $table = 'sumber_barang';

    protected $primaryKey = 'id_sumber_barang';

    protected $fillable = [
        'id_sumber_barang',
        'sumber_barang',
        'created_at',
        'updated_at'
    ];

    public function inventarisBarang(){
        return $this->hasMany(InventarisBarang::class, 'id_sumber_barang', 'id_sumber_barang');
    }
}
