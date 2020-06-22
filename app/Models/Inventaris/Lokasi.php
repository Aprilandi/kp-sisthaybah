<?php

namespace App\Models\Inventaris;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $table = 'lokasi';

    protected $primaryKey = 'id_lokasi';

    protected $fillable = [
        'id_lokasi',
        'lokasi',
        'created_at',
        'updated_at'
    ];
}
