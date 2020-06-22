<?php

namespace App\Models\Administrasi;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $table = 'dokumen';

    protected $primaryKey = 'id_dokumen';

    protected $fillable = [
        'id_dokumen',
        'id_jenis_dokumen',
        'nama_dokumen',
        'template_dokumen',
        'keterangan',
        
    ];
}
