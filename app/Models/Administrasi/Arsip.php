<?php

namespace App\Models\Administrasi;

use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    protected $table = 'arsip';

    protected $primaryKey = 'id_arsip';

    protected $fillable = [
        'id_arsip',
        'id_dokumen',
        'nama_arsip',
        'no_dokumen',
        'tujuan_dokumen',
        'asal_dokumen',
        'tanggal_dokumen',
        'disposisi_dokumen',
        'file_dokumen',
        'is_disposisi_selesai',
        
    ];
}
