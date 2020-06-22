<?php

namespace App\Http\Controllers\Administrasi;

use App\Http\Controllers\Controller;
use App\Models\Administrasi\JenisDokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class JenisDokumenController extends Controller
{

    public function index() {
        $jd = JenisDokumen::get();
        return view('admin/administrasi/jenis-dokumen/index', ['jenis_dokumen' => $jd]);
    }

    public function store(Request $request) {
        // return $request->all();
        DB::table('jenis_dokumen')->insert([
            'jenis_dokumen' => $request->txtJenisDokumen,
            'keterangan' => $request->txtKeterangan
        ]);

        return redirect('admin/administrasi/jenisdokumen')->with('insert', 'Data Berhasil Ditambah');;
    }

    public function update(Request $request, $id){
        // return $request->all();
        DB::table('jenis_dokumen')->where('id_jenis_dokumen', $id)->update([
            'jenis_dokumen' => $request->txtedJenisDokumen,
            'keterangan' => $request->txtedKeterangan
        ]);

        return redirect('admin/administrasi/jenisdokumen')->with('update', 'Data Berhasil Diubah');;
    }

    public function destroy($id) {
        DB::table('jenis_dokumen')->where('id_jenis_dokumen', $id)->delete();

        return redirect('admin/administrasi/jenisdokumen')->with('delete', 'Data Berhasil Dihapus');;
    }

}
