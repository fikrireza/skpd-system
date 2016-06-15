<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\DataWargaModel;
use App\Models\LihatPengaduanModel;
use App\Models\TanggapanModel;
use App\Models\TopikAduan;
use App\MasterSKPD;
use App\User;
use DB;
use Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $idlogin = Auth::user()->id;
      $userid = User::find($idlogin);

      $getlihatpengaduanall = LihatPengaduanModel::select('*')->orderby('created_at','desc')->limit(3)->get();
      $getlihatpengaduan = DB::table('pengaduan')
                          ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                          ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                          ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                          ->select('*', 'pengaduan.id','users.id as iduser')
                          ->where('master_skpd.id', $userid->id_skpd)
                          ->where('flag_mutasi', '0')
                          ->orderby('pengaduan.created_at', 'desc')
                          ->limit(3)->get();
      // dd($getlihatpengaduan);
      $getcountpengaduanall = LihatPengaduanModel::where('flag_mutasi', '0')->count('warga_id');
      $getcountpengaduan = DB::table('pengaduan')
                      ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                      ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                      ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                      ->select('*', 'pengaduan.id')
                      ->where('master_skpd.id', $userid->id_skpd)
                      ->where('flag_mutasi', '0')
                      // ->where('flag_tanggap', '1')
                      // ->where('flag_verifikasi', '1')
                      ->orderby('pengaduan.created_at', 'desc')
                      ->count('nama');

      $getcountpengaduantelahditanggapiall = LihatPengaduanModel::where('flag_tanggap', '1')->count('flag_tanggap');
      $getcountpengaduantelahditanggapi = DB::table('pengaduan')
                      ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                      ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                      ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                      ->select('*', 'pengaduan.id')
                      ->where('master_skpd.id', $userid->id_skpd)
                      ->where('flag_tanggap', '1')
                      ->where('flag_verifikasi', '1')
                      ->orderby('pengaduan.created_at', 'desc')
                      ->count('nama');

      $getuser = User::select('*')->where('level', '1')->orderby('created_at','desc')->limit(8)->get();
      $getcountuser = User::where('level', '1')->count('activated');

      $recordusers = DB::table('users')->select(DB::raw('*'))
                  ->whereRaw('Date(created_at) = CURDATE()')
                  ->where('level', '1')->count('activated');
      // dd($recordusers);
      return view('pages.dashboard', compact('getcountpengaduan','getcountpengaduanall','getcountpengaduantelahditanggapiall', 'getcountpengaduantelahditanggapi',
      'getcountuser','getlihatpengaduan','getlihatpengaduanall', 'getuser','recordusers'));
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
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

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

    public function getDataSKPD()
    {

    }

    public function detailSKPD($id)
    {

    }

}
