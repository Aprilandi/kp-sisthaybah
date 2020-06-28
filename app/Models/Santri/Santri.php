<?php

namespace App\Models\Santri;

use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
  
    protected $table = 'santris';

    protected $primaryKey = 'id_santri';

    protected $fillable = [
        'id_santri',
        'id_jabatan',
        'id_golongansantri',
        'id_kelas',
        'id_user',
        'no_ktp',
        'nama_lengkap',
        'nama_panggilan',
        'nama_kunyah',
        'tempat_lahir',
        'tanggal_lahir',
        'kota_asal',
        'alamat_asal',
        'no_hp',
        'email',
        'nama_kampus',
        'jurusan',
        'strata',
        'tahun_angkatan',
        'tahun_masuk',
        'tahun_keluar',
        'foto_profil'
    ];

    //Relation Santri to GolonganSantri
    public function golonganSantri(){
        return $this->belongsTo(GolonganSantri::class);
    }

    public function jabatan(){
        return $this->belongsTo(Jabatan::class);
    }

    public function iuran(){
        return $this->hasMany(Iuran::class, 'id_santri', 'id_santri');
    }
}