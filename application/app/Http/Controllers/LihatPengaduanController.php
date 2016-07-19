<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\LihatPengaduanModel;
use App\TopikAduan;
use App\User;
use Auth;
use DB;

class LihatPengaduanController extends Controller
{
    /**
    * Authentication controller.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
      $idlogin = Auth::user()->id;
      $userid = User::find($idlogin);

      $getdatapengaduan = DB::table('pengaduan')
                    ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                    ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                    ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                    ->select('*', 'pengaduan.id', 'users.id as iduser', 'pengaduan.created_at', 'pengaduan.updated_at')
                    ->where('master_skpd.id', $userid->id_skpd)
                    ->where('flag_mutasi', '0')
                    ->orderby('pengaduan.created_at', 'desc')
                    ->get();

      $getdatapengaduanall = DB::table('pengaduan')
                    ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                    ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                    ->where('flag_mutasi', '0')
                    ->select('*', 'pengaduan.id', 'users.id as iduser', 'pengaduan.created_at', 'pengaduan.updated_at')
                    ->orderby('pengaduan.created_at', 'desc')
                    ->get();

      return view('pages.lihatpengaduan')->with('data', compact('getdatapengaduan', 'getdatapengaduanall'));
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
