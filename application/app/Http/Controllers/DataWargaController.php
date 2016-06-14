<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\DataWargaModel;
use App\Models\LihatPengaduanModel;
use DB;

class DataWargaController extends Controller
{
    public function index()
    {
      $getdatawarga = DB::table('users')
                      ->join('pengaduan', 'users.id', '=', 'pengaduan.warga_id')
                      ->where('level', '1')
                      ->where('flag_verifikasi', '0')
                      ->select('*', 'users.id')
                      ->get();
      return view('pages.datawarga')->with('data', compact('getdatawarga'));
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

    public function bind($id)
    {
      $get = TopikAduan::find($id);
      return $get;
    }

    public function update(Request $request)
    {
      $set = TopikAduan::find($request->id_topik);
      $set->kode_topik = $request->kode_topik;
      $set->nama_topik = $request->nama_topik;
      $set->id_skpd = $request->id_skpd;
      $set->save();

      return redirect()->route('topikpengaduan.index')->with('message', "Berhasil mengubah topik pengaduan.");
    }
}
