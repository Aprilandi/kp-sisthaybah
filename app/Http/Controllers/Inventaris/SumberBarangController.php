<?php

namespace App\Http\Controllers\Inventaris;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventaris\SumberBarang;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class SumberBarangController extends Controller
{
    public function index() {
        $sb = SumberBarang::get();
        return view('admin/inventaris/sumber-barang/index', ['sumber_barang' => $sb]);
    }

    public function store(Request $request) {
        // return $request->all();
        DB::table('sumber_barang')->insert([
            'sumber_barang' => $request->txtSumberBarang,
            'keterangan' => $request->txtKeterangan,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('admin/inventaris/sumberbarang')->with('insert', 'Data Berhasil Ditambah');;
    }

    public function update(Request $request, $id){
        // return $request->all();
        DB::table('sumber_barang')->where('id_sumber_barang', $id)->update([
            'sumber_barang' => $request->txtedSumberBarang,
            'keterangan' => $request->txtedKeterangan,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('admin/inventaris/sumberbarang')->with('update', 'Data Berhasil Diubah');;
    }

    public function destroy($id) {
        DB::table('sumber_barang')->where('id_sumber_barang', $id)->delete();

        return redirect('admin/inventaris/sumberbarang')->with('delete', 'Data Berhasil Dihapus');;
    }
}
