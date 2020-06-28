<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GolonganSantriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('golongan_santris')->insert([
            'golongan_santri' => 'Aktif',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('golongan_santris')->insert([
            'golongan_santri' => 'Tidak Aktif',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
