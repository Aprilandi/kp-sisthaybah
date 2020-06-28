<?php

namespace App\Models\Santri;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatan';

    protected $primaryKey = 'id_jabatan';

    protected $fillable = [
        'id_jabatan',
        'nama_jabatan',
        'is_struktural',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function santri(){
        return $this->hasMany(Santri::class, 'id_jabatan', 'id_jabatan');
    }
}
