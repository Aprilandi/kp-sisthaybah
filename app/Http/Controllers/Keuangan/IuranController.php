<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\Keuangan\Biaya;
use App\Models\Keuangan\Iuran;
use App\Models\Santri\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use Carbon\Carbon;

class IuranController extends Controller
{

    public function index(Request $request)
    {
        // dd($request->all());
        if (!empty($request)) {
            $bb = Biaya::get();
            $ss = Santri::get();
            $ii = Iuran::filter($request->all())->get();
            return view('admin/keuangan/iuran/index', ['iuran' => $ii, 'biaya' => $bb, 'santri' => $ss]);
        } else {
            $bb = Biaya::get();
            $ss = Santri::get();
            $ii = Iuran::get();
            return view('admin/keuangan/iuran/index', ['iuran' => $ii, 'biaya' => $bb, 'santri' => $ss]);
        }
    }

    public function create()
    {
        $bb = Biaya::get();
        $ss = Santri::get();
        return view('admin/keuangan/iuran/form', ['biaya' => $bb, 'santri' => $ss]);
    }

    public function store(Request $request)
    {
        // return $request->all();

        if ($request->is_telat == "ya") {
            $stsTelat = TRUE;
        } elseif ($request->is_telat == "tidak") {
            $stsTelat = FALSE;
        } else {
            $stsTelat = null;
        }
        $bb = Biaya::find($request->txtJenisBiaya);
        $hutang = $bb->jumlah - $request->txtJumlahBayar;
        if($hutang==0){
            $stsLunas = TRUE;
        }
        else{
            $stsLunas = FALSE;
        }
        $tanggal = new Carbon($request->txtTanggalIuran);
        DB::table('iuran')->insert([
            'id_biaya' => $request->txtJenisBiaya,
            'id_santri' => $request->txtNamaSantri,
            'tahun_iuran' => $tanggal->year,
            'tahun_bulan' => $tanggal->month,
            'is_telat' => $stsTelat,
            'is_lunas' => $stsLunas,
            'jumlah_bayar' => $request->txtJumlahBayar,
            'jumlah_hutang' => $hutang
        ]);

        return redirect('admin/keuangan/iuran')->with('insert', 'Data Berhasil Ditambah');;
    }

    public function edit($id)
    {

        $ii = Iuran::find($id);
        $bb = Biaya::get();
        return view('admin/keuangan/iuran/form', ['iuran' => $ii, 'biaya' => $bb]);
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
