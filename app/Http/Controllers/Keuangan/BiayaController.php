<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\Keuangan\Biaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class BiayaController extends Controller
{

    public function index() {
        $kk = Biaya::get();
        return view('admin/keuangan/biaya/index', ['biaya' => $kk]);
    }

    public function store(Request $request) {
        // return $request->all();
        DB::table('biaya')->insert([
            'nama_biaya' => $request->txtNamaBiaya,
            'jumlah' => $request->txtJumlah,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('admin/keuangan/biaya')->with('insert', 'Data Berhasil Ditambah');;
    }

    public function update(Request $request, $id){
        // return $request->all();
        DB::table('biaya')->where('id_biaya', $id)->update([
            'nama_biaya' => $request->txtedNamaBiaya,
            'jumlah' => $request->txtedJumlah,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('admin/keuangan/biaya')->with('update', 'Data Berhasil Diubah');;
    }

    public function destroy($id) {
        DB::table('biaya')->where('id_biaya', $id)->delete();

        return redirect('admin/keuangan/biaya')->with('delete', 'Data Berhasil Dihapus');;
    }

}
