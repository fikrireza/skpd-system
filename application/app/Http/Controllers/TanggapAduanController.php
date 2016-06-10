<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use App\Http\Requests;
use App\Models\LihatPengaduanModel;
use App\Models\TanggapanModel;
use App\TopikAduan;
use App\User;
use DB;
use Auth;


class TanggapAduanController extends Controller
{
    public function index()
    {
      $getdatapengaduan = LihatPengaduanModel::where('flag_tanggap', '0')->paginate(10);
      $getdatasudahditanggapi = LihatPengaduanModel::where('flag_tanggap', '1')->paginate(10);
      // $data['getdatapengaduan'] = $getdatapengaduan;
      return view('pages/tanggapipengaduan')->with('data', compact('getdatapengaduan', 'getdatasudahditanggapi'));
    }

    public function store(Request $request)
    {

    }

    public function delete($id)
    {

    }

    public function bind($id)
    {

    }

    public function edit($id)
    {
        $getdatapengaduan = LihatPengaduanModel::where('flag_tanggap', '0')->paginate(10);
        $data['getdatapengaduan'] = $getdatapengaduan;
        $getdatasudahditanggapi = LihatPengaduanModel::where('flag_tanggap', '1')->paginate(10);
        $data['getdatasudahditanggapi'] = $getdatasudahditanggapi;
        $binddatapengaduan = LihatPengaduanModel::find($id);
        $data['binddatapengaduan'] = $binddatapengaduan;
        return view('pages/tanggapipengaduan')->with('data', $data);
    }

    public function update(Request $request)
    {

      $set = LihatPengaduanModel::find($request->id);
      $set->flag_tanggap = 1;
      $set->flag_verifikasi = 1;
      $set->save();

      $idlogin = Auth::user()->id;
      $userid = User::find($idlogin);

      $tanggap = new TanggapanModel;
      $tanggap->id_pengaduan = $set->id;
      $tanggap->id_userskpd  = $userid->id;
      $tanggap->tanggapan    = $request->tanggapan;
      $tanggap->save();

      return redirect()->route('tanggap.index')->with('message', "Berhasil Memberikan Tanggapan");
    }

    public function show($id)
  	{
      $getdatapengaduan = LihatPengaduanModel::where('flag_tanggap', '0')->paginate(10);
      $data['getdatapengaduan'] = $getdatapengaduan;
      $getdatasudahditanggapi = LihatPengaduanModel::where('flag_tanggap', '1')->paginate(10);
      $data['getdatasudahditanggapi'] = $getdatasudahditanggapi;
      $binddatapengaduan = LihatPengaduanModel::find($id);
      $data['binddatapengaduan'] = $binddatapengaduan;

      // $tanggapan = TanggapanModel::where('id_pengaduan', $id)->get();
      $tanggapan = DB::table('tanggapan')->where('id_pengaduan', $id)->get();
      $data['binddatatanggapan'] = $tanggapan[0];

      return view('pages/tanggapipengaduan')->with('data', $data);
  	}


}
