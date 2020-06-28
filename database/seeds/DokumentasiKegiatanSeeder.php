<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DokumentasiKegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dokumentasi_kegiatan')->insert([
            'nama_kegiatan' => 'Lomba Banjari',
            'tempat_kegiatan' => 'Masjid At-Taqwa, Madiun',
            'tanggal_kegiatan' => date('Y-m-d'),
            'keterangan' => 'juara 1 sejawa timur',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
