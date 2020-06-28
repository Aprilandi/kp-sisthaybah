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
        $kk = KategoriKeuangan::get();
        return view('admin/keuangan/transaksi/index', ['kategori_keuangan' => $kk]);
    }

    public function create() { 
        $kk = KategoriKeuangan::get();
        return view('admin/keuangan/transaksi/create', ['kategori_keuangan' => $kk]);
    }

    public function store(Request $request) { 
    }

    public function edit($id){ 

        // $tk = TransaksiKeuangan::find($id);
        $kk = KategoriKeuangan::get();
        return view('admin/keuangan/transaksi/edit', ['kategori_keuangan' => $kk]);
    }
    public function update(Request $request, $id){ 

    }

    public function destroy($id) {

    }

}
