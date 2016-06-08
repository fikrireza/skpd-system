<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\LihatPengaduanModel;
use App\TopikAduan;

class LihatPengaduanController extends Controller
{
    public function index()
    {

      $getdatapengaduan = LihatPengaduanModel::select('*')->get();
      $gettopik = TopikAduan::select('*')->get();
      // dd($getdatapengaduan);
      return view('pages.lihatpengaduan', compact('getdatapengaduan', 'gettopik'));

      // return view('pages/lihatpengaduan')->with('data', $data);
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