<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\Keuangan\KategoriKeuangan;
use App\Models\Keuangan\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class TransaksiKeuanganController extends Controller
{

    public function index() {
        $tt = Transaksi::get();
        $kk = KategoriKeuangan::get();
        return view('admin/keuangan/transaksi/index', ['transaksi' => $tt, 'kategori' => $kk]);
    }

    public function create() {
        $kk = KategoriKeuangan::get();
        return view('admin/keuangan/transaksi/form', ['kategori_keuangan' => $kk]);
    }

    public function store(Request $request) { 
        // return $request->all();
        if ($request->file('txtGambar')) {
            $uploadedFile = $request->file('txtGambar');
            $extension = '.' . $uploadedFile->getClientOriginalExtension();
            $filename  = $request->txtKategori . "_" . date("dmy-His") . $extension;
            $uploadedFile->move(base_path('public/dokumen/keuangan/transaksi/'), $filename);

            DB::table('transaksi')->insert([
                'id_kk' => $request->txtKategori,
                'tanggal' => $request->txtTanggal,
                'jumlah' => $request->txtJumlah,
                'keterangan' => $request->txtKeterangan,
                'gambar' => $filename,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
        return redirect()->route('transaksi.index')->with('insert', 'Data Berhasil Ditambah');;
    }

    public function edit($id){ 

        $tk = Transaksi::find($id);
        $kk = KategoriKeuangan::get();
        return view('admin/keuangan/transaksi/form', ['transaksi' => $tk, 'kategori_keuangan' => $kk]);
    }
    public function update(Request $request, $id){ 
        // return $request->all();
        if ($request->file('txtGambar')) {
            $uploadedFile = $request->file('txtGambar');
            $extension = '.' . $uploadedFile->getClientOriginalExtension();
            $filename  = $request->txtKategori . "_" . date("dmy-His") . $extension;
            $uploadedFile->move(base_path('public/dokumen/keuangan/transaksi/'), $filename);

            DB::table('transaksi')->where('id_transaksi', $id)->update([
                'id_kk' => $request->txtKategori,
                'tanggal' => $request->txtTanggal,
                'jumlah' => $request->txtJumlah,
                'keterangan' => $request->txtKeterangan,
                'gambar' => $filename,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
        else{
            DB::table('transaksi')->where('id_transaksi', $id)->update([
                'id_kk' => $request->txtKategori,
                'tanggal' => $request->txtTanggal,
                'jumlah' => $request->txtJumlah,
                'keterangan' => $request->txtKeterangan,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
        return redirect()->route('transaksi.index')->with('update', 'Data Berhasil Diubah');;
    }

    public function destroy($id) {
        DB::table('transaksi')->where('id_transaksi', $id)->delete();

        return redirect()->route('transaksi.index')->with('delete', 'Data Berhasil Dihapus');;
    }

}
