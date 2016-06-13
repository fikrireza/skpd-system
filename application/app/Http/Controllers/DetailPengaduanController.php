<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use App\Http\Requests;
use App\Models\DataWargaModel;
use App\Models\LihatPengaduanModel;
use App\Models\TanggapanModel;
use App\TopikAduan;
use App\MasterSKPD;
use App\User;
use App\Http\Requests\TanggapanRequest;
use DB;
use Auth;

class DetailPengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TanggapanRequest $request)
    {
      dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      // dd($id);
      $binddatapengaduan = LihatPengaduanModel::find($id);
      $binddatatanggapan = TanggapanModel::where('id_pengaduan', $id)->get();
      $idlogin = Auth::user()->id;
      $userid = User::find($idlogin);

      $getdataskpd = MasterSKPD::where('id', $userid->id_skpd)->get();
      $tanggapan = TanggapanModel::where('id_userskpd', $userid->id)->get();
      // dd($binddatatanggapan[0]);
      return view('pages.detailpengaduan', compact('binddatapengaduan', 'binddatatanggapan', 'getdataskpd', 'tanggapan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

      $getdatapengaduan = DB::table('pengaduan')
                      ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                      ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                      ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                      ->select('*', 'pengaduan.id', 'users.id as iduser')
                      ->where('master_skpd.id', $userid->id_skpd)
                      ->where('flag_mutasi', '0')
                      ->orderby('pengaduan.created_at', 'desc')
                      ->paginate(10);
      return view('pages.lihatpengaduan')->with('data', compact('getdatapengaduan'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function bind($id)
    {

    }

    public function verifikasi($id)
    {
      $set = LihatPengaduanModel::find($id);
      $set->flag_verifikasi = 1;
      $set->save();

      $binddatapengaduan = LihatPengaduanModel::find($id);
      $binddatatanggapan = TanggapanModel::find($id);
      $idlogin = Auth::user()->id;
      $userid = User::find($idlogin);
      $getdataskpd = MasterSKPD::where('id', $userid->id_skpd)->get();
      $tanggapan = TanggapanModel::where('id_userskpd', $userid->id)->get();

      return view('pages.detailpengaduan', compact('binddatapengaduan', 'binddatatanggapan', 'getdataskpd', 'tanggapan'));
      // return view('pages/tanggapipengaduan')->with('data', compact('getdatapengaduan', 'getmutasi'));
    }
}
