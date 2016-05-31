<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\MasterSKPD;
use App\TopikAduan;

class TopikAduanController extends Controller
{
    public function index()
    {
      $getskpd = MasterSKPD::where('flag_skpd', '1')->get();
      $gettopik = TopikAduan::paginate(10);

      return view('pages.topikpengaduan', compact('getskpd', 'gettopik'));
    }

    public function store(Request $request)
    {
      $set = new TopikAduan;
      $set->kode_topik = $request->kodepengaduan;
      $set->nama_topik = $request->namapengaduan;
      $set->id_skpd = $request->idskpd;
      $set->save();

      return redirect()->route('topikpengaduan.index')->with('message', "Berhasil menambahkan topik pengaduan baru.");
    }

    public function delete($id)
    {
      $set = TopikAduan::find($id);
      $set->delete();

      return redirect()->route('topikpengaduan.index')->with('message', "Berhasil menghapus topik pengaduan.");
    }
}
