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
            'nama_kategori' => 'Donasi',
            'jenis_kategori' => 'Pemasukan',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('kategori_keuangan')->insert([
            'nama_kategori' => 'Iuran',
            'jenis_kategori' => 'Pemasukan',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('kategori_keuangan')->insert([
            'nama_kategori' => 'Perlengkapan',
            'jenis_kategori' => 'Pengeluaran',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('kategori_keuangan')->insert([
            'nama_kategori' => 'Konsumsi',
            'jenis_kategori' => 'Pengeluaran',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('kategori_keuangan')->insert([
            'nama_kategori' => 'Kajian',
            'jenis_kategori' => 'Pengeluaran',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
