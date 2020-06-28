<?php

namespace App\Models\Inventaris;

use Illuminate\Database\Eloquent\Model;

class InventarisBarang extends Model
{
    protected $table = 'inventaris_barang';

    protected $primaryKey = 'id_barang';

    protected $fillable = [
        'id_barang',
        'nama_barang',
        'foto_barang',
        'id_jenis_barang',
        'id_lokasi',
        'id_sumber_barang',
        'kondisi',
        'jumlah_barang',
        'keterangan'
    ];

    public function jenisBarang(){
        return $this->belongsTo(JenisBarang::class, 'id_jenis_barang', 'id_jenis_barang');
    }

    public function lokasi(){
        return $this->belongsTo(Lokasi::class, 'id_lokasi', 'id_lokasi');
    }

    public function sumberBarang(){
        return $this->belongsTo(SumberBarang::class, 'id_sumber_barang', 'id_sumber_barang');
    }
}
