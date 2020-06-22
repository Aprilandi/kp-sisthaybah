<?php

namespace App\Http\Controllers\Inventaris;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventaris\Lokasi;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;


class LokasiController extends Controller
{
    public function index() {
        $lk = Lokasi::get();
        return view('admin/inventaris/lokasi/index', ['lokasi' => $lk]);
    }

    public function store(Request $request) {
        // return $request->all();
        DB::table('lokasi')->insert([
            'lokasi' => $request->txtLokasi,
            'keterangan' => $request->txtKeterangan,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('admin/inventaris/lokasi')->with('insert', 'Data Berhasil Ditambah');;
    }

    public function update(Request $request, $id){
        // return $request->all();
        DB::table('lokasi')->where('id_lokasi', $id)->update([
            'lokasi' => $request->txtedLokasi,
            'keterangan' => $request->txtedKeterangan,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('admin/inventaris/lokasi')->with('update', 'Data Berhasil Diubah');;
    }

    public function destroy($id) {
        DB::table('lokasi')->where('id_lokasi', $id)->delete();

        return redirect('admin/inventaris/lokasi')->with('delete', 'Data Berhasil Dihapus');;
    }
}
