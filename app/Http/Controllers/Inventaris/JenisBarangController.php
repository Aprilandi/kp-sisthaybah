<?php

namespace App\Http\Controllers\Inventaris;

use App\Http\Controllers\Controller;
use App\Models\Inventaris\JenisBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class JenisBarangController extends Controller
{
    public function index() {
        $jb = JenisBarang::get();
        return view('admin/inventaris/jenis-barang/index', ['jenis_barang' => $jb]);
    }

    public function store(Request $request) {
        // return $request->all();
        DB::table('jenis_barang')->insert([
            'jenis_barang' => $request->txtJenisBarang,
            'keterangan' => $request->txtKeterangan,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('admin/inventaris/jenisbarang')->with('insert', 'Data Berhasil Ditambah');;
    }

    public function update(Request $request, $id){
        // return $request->all();
        DB::table('jenis_barang')->where('id_jenis_barang', $id)->update([
            'jenis_barang' => $request->txtedJenisBarang,
            'keterangan' => $request->txtedKeterangan,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('admin/inventaris/jenisbarang')->with('update', 'Data Berhasil Diubah');;
    }

    public function destroy($id) {
        DB::table('jenis_barang')->where('id_jenis_barang', $id)->delete();

        return redirect('admin/inventaris/jenisbarang')->with('delete', 'Data Berhasil Dihapus');;
    }
}
