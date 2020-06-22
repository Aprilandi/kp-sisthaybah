<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\Keuangan\KategoriKeuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class KategoriKeuanganController extends Controller
{

    public function index() {
        $kk = KategoriKeuangan::get();
        return view('admin/keuangan/kategori/index', ['kategori_keuangan' => $kk]);
    }

    public function store(Request $request) {
        // return $request->all();
        DB::table('kategori_keuangan')->insert([
            'nama_kategori' => $request->txtNamaKategori,
            'jenis_kategori' => $request->txtJenisKategori,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('admin/keuangan/kategori')->with('insert', 'Data Berhasil Ditambah');;
    }

    public function update(Request $request, $id){
        // return $request->all();
        DB::table('kategori_keuangan')->where('id_kk', $id)->update([
            'nama_kategori' => $request->txtedNamaKategori,
            'jenis_kategori' => $request->txtedJenisKategori,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('admin/keuangan/kategori')->with('update', 'Data Berhasil Diubah');;
    }

    public function destroy($id) {
        DB::table('kategori_keuangan')->where('id_kk', $id)->delete();

        return redirect('admin/keuangan/kategori')->with('delete', 'Data Berhasil Dihapus');;
    }

}
