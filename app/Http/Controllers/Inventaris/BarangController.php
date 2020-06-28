<?php

namespace App\Http\Controllers\Inventaris;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventaris\InventarisBarang;
use App\Models\Inventaris\JenisBarang;
use App\Models\Inventaris\Lokasi;
use App\Models\Inventaris\SumberBarang;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class BarangController extends Controller
{
    public function index() {
        // dd($bb);
        $bb = InventarisBarang::get();
        $jb = JenisBarang::get();
        $lk = Lokasi::get();
        $sb = SumberBarang::get();
        return view('admin/inventaris/barang/index', ['barang' => $bb, 'jenis' => $jb, 'lokasi' => $lk, 'sumber' => $sb]);
    }

    public function create(){
        $jb = JenisBarang::get();
        $lk = Lokasi::get();
        $sb = SumberBarang::get();
        return view('admin/inventaris/barang/form', ['jenis' => $jb, 'lokasi' => $lk, 'sumber' => $sb]);
    }

    public function edit($id){
        $br = InventarisBarang::find($id);
        $jb = JenisBarang::get();
        $lk = Lokasi::get();
        $sb = SumberBarang::get();
        return view('admin/inventaris/barang/form', ['barang' => $br, 'jenis' => $jb, 'lokasi' => $lk, 'sumber' => $sb]);
    }

    public function store(Request $request) {
        // return $request->all();
        if($request->file('txtFotoBarang')) {
            $uploadedFile = $request->file('txtFotoBarang');
            $extension = '.'.$uploadedFile->getClientOriginalExtension();
            $filename  = $request->txtJenisBarang.$request->txtLokasi.$request->txtSumberBarang."_".date("dmy-His").$extension;
            $uploadedFile->move(base_path('public/dokumen/inventaris/barang/'), $filename);

            $inventarisBarang = InventarisBarang::create([
                'nama_barang' => $request->txtNamaBarang,
                'foto_barang' => $filename,
                'id_jenis_barang' => $request->txtJenisBarang,
                'id_lokasi' => $request->txtLokasi,
                'id_sumber_barang' => $request->txtSumberBarang,
                'kondisi' => $request->txtKondisi,
                'jumlah_barang' => $request->txtJumlah,
                'keterangan' => $request->txtKeterangan,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
        return redirect()->route('barang.index')->with('insert', 'Data Berhasil Ditambah');;
    }

    public function update(Request $request, $id){
        // dd($request->all());
        if($request->file('txtFotoBarang')) {
            $uploadedFile = $request->file('txtFotoBarang');
            $extension = '.'.$uploadedFile->getClientOriginalExtension();
            $filename  = $request->txtJenisBarang.$request->txtLokasi.$request->txtSumberBarang."_".date("dmy-His").$extension;
            $uploadedFile->move(base_path('public/dokumen/inventaris/barang/'), $filename);

            DB::table('inventaris_barang')->where('id_barang', $id)->update([
                'nama_barang' => $request->txtNamaBarang,
                'foto_barang' => $filename,
                'id_jenis_barang' => $request->txtJenisBarang,
                'id_lokasi' => $request->txtLokasi,
                'id_sumber_barang' => $request->txtSumberBarang,
                'kondisi' => $request->txtKondisi,
                'jumlah_barang' => $request->txtJumlah,
                'keterangan' => $request->txtKeterangan,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
        else{
            DB::table('inventaris_barang')->where('id_barang', $id)->update([
                'nama_barang' => $request->txtNamaBarang,
                'id_jenis_barang' => $request->txtJenisBarang,
                'id_lokasi' => $request->txtLokasi,
                'id_sumber_barang' => $request->txtSumberBarang,
                'kondisi' => $request->txtKondisi,
                'jumlah_barang' => $request->txtJumlah,
                'keterangan' => $request->txtKeterangan,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        return redirect('admin/inventaris/barang')->with('update', 'Data Berhasil Diubah');;
    }

    public function destroy($id) {
        DB::table('inventaris_barang')->where('id_barang', $id)->delete();

        return redirect('admin/inventaris/barang')->with('delete', 'Data Berhasil Dihapus');;
    }
}
