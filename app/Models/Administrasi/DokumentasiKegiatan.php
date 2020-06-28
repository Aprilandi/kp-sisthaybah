<?php

namespace App\Models\Administrasi;

use Illuminate\Database\Eloquent\Model;

class DokumentasiKegiatan extends Model
{
    protected $table = 'dokumentasi_kegiatan';

    protected $primaryKey = 'id_dokumentasi_kegiatan';

    protected $fillable = [
        'id_dokumentasi_kegiatan',
        'nama_kegiatan',
        'tempat_kegiatan',
        'tanggal_kegiatan',
        'keterangan',
        'created_at',
        'updated_at'
    ];

    public function detailDokumentasi(){
        return $this->hasMany(DetailDokumentasi::class, 'id_dokumentasi_kegiatan', 'id_dokumentasi_kegiatan');
    }
}
