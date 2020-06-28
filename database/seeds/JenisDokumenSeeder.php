<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisDokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_dokumen')->insert([
            'jenis_dokumen' => 'Resmi',
            'keterangan' => ''
        ]);
        DB::table('jenis_dokumen')->insert([
            'jenis_dokumen' => 'Pribadi',
            'keterangan' => ''
        ]);
        DB::table('jenis_dokumen')->insert([
            'jenis_dokumen' => 'Pesma',
            'keterangan' => ''
        ]);
    }
}
