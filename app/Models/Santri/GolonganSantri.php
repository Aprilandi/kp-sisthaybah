<?php

namespace App\Models\Santri;

use Illuminate\Database\Eloquent\Model;

class GolonganSantri extends Model
{
    protected $table = 'golongan_santris';

    protected $primaryKey = 'id_golongansantri';

    protected $fillable = [
        'id_golongansantri',
        'golongan_santri'
    ];

    //Relation GolonganSantri to Santri
    public function santri(){
        return $this->hasMany(Santri::class, 'id_golongansantri', 'id_golongansantri');
    }
}
