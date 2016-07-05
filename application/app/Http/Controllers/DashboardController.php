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

      $getlihatpengaduanall = DB::table('pengaduan')
                          ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                          ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                          ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                          ->select('users.nama', 'users.url_photo', 'pengaduan.id', 'pengaduan.isi_pengaduan','users.id as iduser', 'pengaduan.flag_anonim', 'pengaduan.created_at', 'pengaduan.flag_tanggap')
                          ->where('flag_mutasi', '0')
                          ->orderby('pengaduan.created_at', 'desc')
                          ->limit(3)->get();
      // dd($getlihatpengaduanall);
      $getlihatpengaduan = DB::table('pengaduan')
                          ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                          ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                          ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                          ->select('users.nama', 'users.url_photo', 'pengaduan.id', 'pengaduan.isi_pengaduan','users.id as iduser', 'pengaduan.flag_anonim', 'pengaduan.created_at', 'pengaduan.flag_tanggap')
                          ->where('master_skpd.id', $userid->id_skpd)
                          ->where('flag_mutasi', '0')
                          ->orderby('pengaduan.created_at', 'desc')
                          ->limit(3)->get();
      // dd($getlihatpengaduan);

      $getdokumen = DB::table('pengaduan')
                      ->join('dokumen_pengaduan', 'pengaduan.id' , '=', 'dokumen_pengaduan.pengaduan_id')
                      ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                      ->select('*')
                      // ->where('pengaduan.warga_id', 'users.id')
                      ->get();
                      // dd($getdokumen);
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

      $getcountpengaduanbelumditanggapiall = LihatPengaduanModel::where('flag_tanggap', '0')->count('flag_tanggap');
      $getcountpengaduanbelumditanggapi = DB::table('pengaduan')
                      ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                      ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                      ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                      ->select('*', 'pengaduan.id')
                      ->where('master_skpd.id', $userid->id_skpd)
                      ->where('flag_tanggap', '0')
                      ->where('flag_verifikasi', '0')
                      ->orderby('pengaduan.created_at', 'desc')
                      ->count('nama');

      $getuser = User::select('*')->where('level', '1')->orderby('created_at','desc')->limit(8)->get();
      $getcountuser = User::where('level', '1')->count('activated');

      $recordusers = DB::table('users')->select(DB::raw('*'))
                  ->whereRaw('Date(created_at) = CURDATE()')
                  ->where('level', '1')->count('activated');
      // dd($recordusers);
      // $getmasterskpd = MasterSKPD::select('*')->paginate(10);
      $getmasterskpd = DB::table('master_skpd')
                   ->leftJoin('topik_pengaduan', 'master_skpd.id', '=', 'topik_pengaduan.id_skpd')
                   ->leftJoin('pengaduan', 'topik_pengaduan.id', '=', 'pengaduan.topik_id')
                   ->select('master_skpd.kode_skpd', 'master_skpd.nama_skpd',
                   DB::raw('count(pengaduan.id) as jumlahpengaduan'), 'master_skpd.flag_skpd', 'master_skpd.id', 'topik_id')
                   ->groupBy('master_skpd.id')
                   ->paginate(7);
  // dd($getmasterskpd);

      $getitemforpiechart = DB::table('pengaduan')
              ->join('topik_pengaduan', 'topik_pengaduan.id' , '=', 'pengaduan.topik_id')
              ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
              ->select(DB::raw('count(*) as jumlahpengaduan'),'master_skpd.nama_skpd')
              ->groupBy('master_skpd.nama_skpd')
              ->limit(5)
              ->get();
      // dd($getitemforpiechart);
      return view('pages.dashboard', compact('getcountpengaduan','getcountpengaduanall',
      'getcountpengaduantelahditanggapiall', 'getcountpengaduantelahditanggapi',
      'getcountpengaduanbelumditanggapiall', 'getcountpengaduanbelumditanggapi',
      'getcountuser','getlihatpengaduan','getlihatpengaduanall', 'getuser','recordusers', 'getmasterskpd', 'getdokumen','getitemforpiechart'));
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

    public function adminpiechart()
    {
      $get = DB::table('pengaduan')
              ->join('topik_pengaduan', 'topik_pengaduan.id' , '=', 'pengaduan.topik_id')
              ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
              ->select(DB::raw('count(*) as jumlahpengaduan'),'master_skpd.nama_skpd')
              ->groupBy('master_skpd.nama_skpd')
              ->limit(5)
              ->get();

      $color = ['#f56954','#00a65a','#f39c12','#00c0ef','#3c8dbc','#d2d6de'];
      $data = array();
      $i = 0;
      foreach ($get as $key) {
          $data[$i] = [
            "value" => $key->jumlahpengaduan,
            "color" => $color[$i],
            "highlight" => $color[$i],
            "label" => $key->nama_skpd
          ];
          $i++;
      }
      return $data;
    }
}
