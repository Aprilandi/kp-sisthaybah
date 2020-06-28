<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BiayaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('biaya')->insert([
            'nama_biaya' => 'SPP',
            'jumlah' => 1000000,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('biaya')->insert([
            'nama_biaya' => 'Kas',
            'jumlah' => 500000,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('biaya')->insert([
            'nama_biaya' => 'Rekreasi',
            'jumlah' => 3500000,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
