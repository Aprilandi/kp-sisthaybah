<?php

namespace App\Http\Controllers\Administrasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Administrasi\DokumentasiKegiatan;
use App\Models\Administrasi\DetailDokumentasi;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class DokumentasiKegiatanController extends Controller
{

    public function index() {
        $dk = DokumentasiKegiatan::get();
        return view('admin/administrasi/dokumentasi-kegiatan/data', ['dokumentasi_kegiatan' => $dk, 'tgl' => date('Y-m-d')]);
    }

    public function store(Request $request) {
        // return $request->all();
        DB::table('dokumentasi_kegiatan')->insert([
            'nama_kegiatan' => $request->txtDokumentasiKegiatan,
            'tempat_kegiatan' => $request->txtTempatKegiatan,
            'tanggal_kegiatan' => $request->txtTanggalKegiatan,
            'keterangan' => $request->txtKeterangan,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('admin/administrasi/dokumen/kegiatan')->with('insert', 'Data Berhasil Ditambah');;
    }

    public function update(Request $request, $id){
        // return $request->all();
        DB::table('dokumentasi_kegiatan')->where('id_dokumentasi_kegiatan', $id)->update([
            'nama_kegiatan' => $request->txtedDokumentasiKegiatan,
            'tempat_kegiatan' => $request->txtedTempatKegiatan,
            'tanggal_kegiatan' => $request->txtedTanggalKegiatan,
            'keterangan' => $request->txtedKeterangan,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('admin/administrasi/dokumen/kegiatan')->with('update', 'Data Berhasil Diubah');;
    }

    public function destroy($id) {
        DB::table('dokumentasi_kegiatan')->where('id_dokumentasi_kegiatan', $id)->delete();

        return redirect('admin/administrasi/dokumen/kegiatan')->with('delete', 'Data Berhasil Dihapus');;
    }

}
