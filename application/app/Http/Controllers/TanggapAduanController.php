<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use App\Http\Requests;
use App\Models\LihatPengaduanModel;
use App\Models\TanggapanModel;
use App\TopikAduan;
use App\MasterSKPD;
use App\Models\Pengaduan;
use App\Models\DataMutasiModel;
use App\User;
use App\Http\Requests\TanggapanRequest;
use DB;
use Auth;




class TanggapAduanController extends Controller
{
    public function index()
    {
      $idlogin = Auth::user()->id;
      $userid = User::find($idlogin);

      $getdatapengaduan = DB::table('pengaduan')
                      ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                      ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                      ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                      ->select('*', 'pengaduan.id')
                      ->where('master_skpd.id', $userid->id_skpd)
                      ->where('flag_tanggap', '0')
                      ->where('flag_verifikasi', '0')
                      ->where('flag_mutasi', '0')
                      ->orderby('pengaduan.created_at', 'desc')
                      ->paginate(10);
      $getmutasi = DB::table('mutasi')
                      ->join('pengaduan', 'mutasi.id_pengaduan', '=', 'pengaduan.id')
                      ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                      ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                      ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                      ->select('*', 'mutasi.id')
                      ->where('flag_mutasi', '1')
                      ->where('mutasi.id_userskpd', $userid->id_skpd)
                      ->orderby('mutasi.created_at', 'desc')
                      ->paginate(10);
                      // dd($getmutasi);
      return view('pages/tanggapipengaduan')->with('data', compact('getdatapengaduan', 'getmutasi'));
    }

    public function store(TanggapanRequest $request)
    {
      // dd($request);

      $set = LihatPengaduanModel::find($request->id);
      $set->flag_tanggap = 1;
      $set->flag_verifikasi = 1;
      $set->flag_mutasi = 0;
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

    public function delete($id)
    {

    }

    public function bind($id)
    {

    }

    public function edit($id)
    {
      $idlogin = Auth::user()->id;
      $userid = User::find($idlogin);

      $getdatapengaduan = DB::table('pengaduan')
                      ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                      ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                      ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                      ->select('*', 'pengaduan.id')
                      ->where('master_skpd.id', $userid->id_skpd)
                      ->where('flag_tanggap', '0')
                      ->where('flag_verifikasi', '0')
                      ->where('flag_mutasi', '0')
                      ->orderby('pengaduan.created_at', 'desc')
                      ->paginate(10);
        $data['getdatapengaduan'] = $getdatapengaduan;
        $getmutasi = DB::table('mutasi')
                        ->join('pengaduan', 'mutasi.id_pengaduan', '=', 'pengaduan.id')
                        ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                        ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                        ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                        ->select('*', 'mutasi.id')
                        ->where('flag_mutasi', '1')
                        ->where('mutasi.id_userskpd', $userid->id_skpd)
                        ->orderby('mutasi.created_at', 'desc')
                        ->paginate(10);
        $data['getmutasi'] = $getmutasi;
        $binddatapengaduan = LihatPengaduanModel::find($id);
        $data['binddatapengaduan'] = $binddatapengaduan;
        return view('pages/tanggapipengaduan')->with('data', $data);
    }

    public function update(TanggapanRequest $request)
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
      $idlogin = Auth::user()->id;
      $userid = User::find($idlogin);

      $getdatapengaduan = DB::table('pengaduan')
                      ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                      ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                      ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                      ->select('*', 'pengaduan.id')
                      ->where('master_skpd.id', $userid->id_skpd)
                      ->where('flag_tanggap', '0')
                      ->where('flag_verifikasi', '0')
                      ->where('flag_mutasi', '0')
                      ->orderby('pengaduan.created_at', 'desc')
                      ->paginate(10);
        $data['getdatapengaduan'] = $getdatapengaduan;
        $getmutasi = DB::table('mutasi')
                        ->join('pengaduan', 'mutasi.id_pengaduan', '=', 'pengaduan.id')
                        ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                        ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                        ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                        ->select('*', 'mutasi.id')
                        ->where('flag_mutasi', '1')
                        ->where('mutasi.id_userskpd', $userid->id_skpd)
                        ->orderby('mutasi.created_at', 'desc')
                        ->paginate(10);
      $data['getmutasi'] = $getmutasi;

      $binddatapengaduan = LihatPengaduanModel::find($id);
      $data['binddatapengaduanmutasi'] = $binddatapengaduan;

      $binddatamutasi = DataMutasiModel::find($id);
      $data['binddatamutasi'] = $binddatamutasi;

        // dd($data);

      return view('pages/tanggapipengaduan')->with('data', $data);
  	}


}
