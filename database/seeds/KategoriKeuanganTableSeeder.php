<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriKeuanganTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori_keuangan')->insert([
            'nama_kategori' => 'Default',
            'jenis_kategori' => 'Nilai Default',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
