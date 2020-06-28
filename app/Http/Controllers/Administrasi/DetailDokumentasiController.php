<?php

namespace App\Http\Controllers\Administrasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Administrasi\DokumentasiKegiatan;
use App\Models\Administrasi\DetailDokumentasi;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class DetailDokumentasiController extends Controller
{
    public function index($id)
    {
        // dd($id);
        $dk = DokumentasiKegiatan::find($id);
        $dd = DetailDokumentasi::where('id_dokumentasi_kegiatan', $id)->get();
        return view('admin/administrasi/dokumentasi-kegiatan/detail', ['dokumentasi_kegiatan' => $dk, 'detail_dokumentasi' => $dd]);
    }

    public function store(Request $request, $id)
    {
        // return $request->all();

        if($request->file('txtFotoKegiatan')) {
            $uploadedFile = $request->file('txtFotoKegiatan');
            $extension = '.'.$uploadedFile->getClientOriginalExtension();
            $filename  =$id."_".date("dmy-His").$extension;
            $uploadedFile->move(base_path('public/dokumen/administrasi/kegiatan/'), $filename);   

            $detailDokumentasi = DetailDokumentasi::create([
                'id_dokumentasi_kegiatan' => $id,
                'foto_kegiatan' => $filename
            ]);
        }
        

        return redirect()->route('detail.index', $id)->with('insert', 'Data Berhasil Ditambah');
    }

    public function destroy($id, $idg)
    {
        DB::table('detail_dokumentasi')->where('id_detail_dokumentasi', $idg)->delete();

        return redirect()->route('detail.index', $id)->with('delete', 'Data Berhasil Dihapus');;
    }
}
