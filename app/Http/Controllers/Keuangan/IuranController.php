<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\Keuangan\Biaya;
use App\Models\Keuangan\Iuran;
use App\Models\Santri\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class IuranController extends Controller
{

    public function index() {
        $bb = Biaya::get();
        $ss = Santri::get();
        $ii = Iuran::get();
        return view('admin/keuangan/iuran/index', ['iuran' => $ii, 'biaya' => $bb, 'santri' => $ss]);
    }

    public function show($id){
        $bb = Biaya::get();
        $ss = Santri::get();
        $ii = Iuran::find($id);
        return view('admin/keuangan/iuran/index', ['iuran' => $ii, 'biaya' => $bb, 'santri' => $ss]);
    }

    public function create() { 
        $bb = Biaya::get();
        $ss = Santri::get();
        return view('admin/keuangan/iuran/form', ['biaya' => $bb, 'santri' => $ss]);
    }

    public function store(Request $request) { 
        // return $request->all();

        if($request->is_telat == "ya"){
            $stsTelat = "TRUE";
        }
        elseif($request->is_telat == "tidak"){
            $stsTelat = "FALSE";
        }
        else{
            $stsTelat = "null";
        }
        DB::table('iuran')->insert([
            'id_biaya' => $request->txtJenisBiaya,
            'id_santri' => $request->txtNamaSantri,
            'tahun_iuran' => $request->txtTanggalIuran->year,
            'tahun_bulan' => $request->txtTanggalIuran->month,
            'is_telat' => $stsTelat,
            'jumlah_bayar' => $request->txtKeterangan,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('admin/keuangan/iuran')->with('insert', 'Data Berhasil Ditambah');;
    }

    public function edit($id){ 

        $ii = Iuran::find($id);
        $bb = Biaya::get();
        return view('admin/keuangan/iuran/form', ['iuran' => $ii, 'biaya' => $bb]);
    }
    
    public function update(Request $request, $id){ 

    }

    public function destroy($id) {

    }

}
