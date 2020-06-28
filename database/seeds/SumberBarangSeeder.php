<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SumberBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sumber_barang')->insert([
            'sumber_barang' => 'Beli',
            'Keterangan' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('sumber_barang')->insert([
            'sumber_barang' => 'Hibah',
            'Keterangan' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('sumber_barang')->insert([
            'sumber_barang' => 'Donasi',
            'Keterangan' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('sumber_barang')->insert([
            'sumber_barang' => 'Tidak Diketahui',
            'Keterangan' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
