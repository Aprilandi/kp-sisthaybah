<?php

namespace App\Models\Administrasi;

use Illuminate\Database\Eloquent\Model;

class DetailDokumentasi extends Model
{
    protected $table = 'detail_dokumentasi';

    protected $primaryKey = 'id_detail_dokumentasi';
	public $timestamps = false;

    protected $fillable = [
        'id_detail_dokumentasi',
        'id_dokumentasi_kegiatan',
        'foto_kegiatan'
    ];

    public function dokumentasiKegiatan(){
        return $this->belongsTo(DokumentasiKegiatan::class);
    }
}
