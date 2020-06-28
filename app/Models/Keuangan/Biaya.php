<?php

namespace App\Models\Keuangan;

use Illuminate\Database\Eloquent\Model;

class Biaya extends Model
{
    protected $table = 'biaya';

    protected $primaryKey = 'id_biaya';

    protected $fillable = [
        'id_biaya',
        'nama_biaya',
        'jumlah',
        'created_at',
        'updated_at'
    ];

    //Relation Biaya to Iuran
    public function iuran()
    {
        return $this->hasMany(Iuran::class, 'id_biaya', 'id_biaya');
    }
}
