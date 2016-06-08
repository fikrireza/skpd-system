<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\LihatPengaduanModel;
use App\TopikAduan;

class TanggapAduanController extends Controller
{
    public function index()
    {

      $getdatapengaduan = LihatPengaduanModel::paginate(10);
      $data['getdatapengaduan'] = $getdatapengaduan;
      return view('pages/tanggapipengaduan')->with('data', $data);
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

    public function edit($id)
    {
        $getdatapengaduan = LihatPengaduanModel::paginate(10);
        $data['getdatapengaduan'] = $getdatapengaduan;
        $binddatapengaduan = LihatPengaduanModel::find($id);
        $data['binddatapengaduan'] = $binddatapengaduan;
        // dd($data);
        return view('pages/tanggapipengaduan')->with('data', $data);
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
