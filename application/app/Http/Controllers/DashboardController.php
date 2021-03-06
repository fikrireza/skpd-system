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
    * Authentication controller.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

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

      $getlihatpengaduan = DB::table('pengaduan')
                          ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                          ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                          ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                          ->select('users.nama', 'users.url_photo', 'pengaduan.id', 'pengaduan.isi_pengaduan','users.id as iduser', 'pengaduan.flag_anonim', 'pengaduan.created_at', 'pengaduan.flag_tanggap')
                          ->where('master_skpd.id', $userid->id_skpd)
                          ->where('flag_mutasi', '0')
                          ->orderby('pengaduan.created_at', 'desc')
                          ->limit(3)->get();


      $getdokumen = DB::table('pengaduan')
                      ->join('dokumen_pengaduan', 'pengaduan.id' , '=', 'dokumen_pengaduan.pengaduan_id')
                      ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                      ->select('*')
                      ->get();

      $getcountpengaduanall = LihatPengaduanModel::where('flag_mutasi', '0')->count('warga_id');
      $getcountpengaduan = DB::table('pengaduan')
                      ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                      ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                      ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                      ->select('*', 'pengaduan.id')
                      ->where('master_skpd.id', $userid->id_skpd)
                      ->orderby('pengaduan.created_at', 'desc')
                      ->count('pengaduan.id');

      $getcountmutasiall = LihatPengaduanModel::where('flag_mutasi', '1')->count('warga_id');
      $getcountmutasi = DB::table('pengaduan')
                      ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                      ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                      ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                      ->select('*', 'pengaduan.id')
                      ->where('master_skpd.id', $userid->id_skpd)
                      ->where('flag_mutasi', '1')
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

      $getmasterskpd = DB::table('master_skpd')
                   ->leftJoin('topik_pengaduan', 'master_skpd.id', '=', 'topik_pengaduan.id_skpd')
                   ->leftJoin('pengaduan', 'topik_pengaduan.id', '=', 'pengaduan.topik_id')
                   ->select('master_skpd.kode_skpd', 'master_skpd.nama_skpd',
                   DB::raw('count(pengaduan.id) as jumlahpengaduan'), 'master_skpd.flag_skpd', 'master_skpd.id', 'topik_id')
                   ->groupBy('master_skpd.id')
                   ->orderby('jumlahpengaduan', 'desc')
                   ->orderby('jumlahpengaduan', 'desc')
                   ->paginate(7);


     $getmasterskpdtopik = DB::table('topik_pengaduan')
                   ->select('topik_pengaduan.id', 'topik_pengaduan.kode_topik', 'topik_pengaduan.nama_topik', 'topik_pengaduan.id_skpd',
                    DB::raw('count(pengaduan.id) as jumlahpengaduan'))
                   ->join('pengaduan', "topik_pengaduan.id", '=', 'pengaduan.topik_id')
                   ->where('topik_pengaduan.id_skpd', $userid->id_skpd)
                   ->groupBy('topik_pengaduan.id')
                   ->orderby('jumlahpengaduan', 'desc')
                   ->paginate(7);

      $getitemforpiechart = DB::table('pengaduan')
              ->join('topik_pengaduan', 'topik_pengaduan.id' , '=', 'pengaduan.topik_id')
              ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
              ->select(DB::raw('count(*) as jumlahpengaduan'),'master_skpd.nama_skpd')
              ->groupBy('master_skpd.nama_skpd')
              ->orderby('jumlahpengaduan', 'desc')
              ->limit(5)
              ->get();
      $getitemforpiechartskpd = DB::table('topik_pengaduan')
                ->select('topik_pengaduan.id', 'topik_pengaduan.kode_topik', 'topik_pengaduan.nama_topik', 'topik_pengaduan.id_skpd',
                 DB::raw('count(pengaduan.id) as jumlahpengaduan'))
                ->join('pengaduan', "topik_pengaduan.id", '=', 'pengaduan.topik_id')
                ->where('topik_pengaduan.id_skpd', $userid->id_skpd)
                ->groupBy('topik_pengaduan.id')
                ->orderby('jumlahpengaduan', 'desc')
                ->limit(5)
                ->get();

      return view('pages.dashboard', compact('getcountpengaduan','getcountpengaduanall',
      'getcountpengaduantelahditanggapiall', 'getcountpengaduantelahditanggapi',
      'getcountpengaduanbelumditanggapiall', 'getcountpengaduanbelumditanggapi',
      'getcountmutasi', 'getcountmutasiall',
      'getcountuser','getlihatpengaduan','getlihatpengaduanall', 'getuser','recordusers', 'getmasterskpd', 'getmasterskpdtopik',
       'getdokumen','getitemforpiechart', 'getitemforpiechartskpd'));
    }


    public function adminpiechart()
    {
      $get = DB::table('pengaduan')
              ->join('topik_pengaduan', 'topik_pengaduan.id' , '=', 'pengaduan.topik_id')
              ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
              ->select(DB::raw('count(*) as jumlahpengaduan'),'master_skpd.nama_skpd')
              ->groupBy('master_skpd.nama_skpd')
              ->orderby('jumlahpengaduan', 'desc')
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

    public function adminpiechartSKPD()
    {
      $idlogin = Auth::user()->id;
      $userid = User::find($idlogin);

      $get = DB::table('topik_pengaduan')
              ->select('topik_pengaduan.id', 'topik_pengaduan.kode_topik', 'topik_pengaduan.nama_topik', 'topik_pengaduan.id_skpd',
               DB::raw('count(pengaduan.id) as jumlahpengaduan'))
              ->join('pengaduan', "topik_pengaduan.id", '=', 'pengaduan.topik_id')
              ->where('topik_pengaduan.id_skpd', $userid->id_skpd)
              ->groupBy('topik_pengaduan.id')
              ->orderby('jumlahpengaduan', 'desc')
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
            "label" => $key->nama_topik
          ];
          $i++;
      }
      return $data;
    }

    public function adminareachart()
    {
      $getbignumber = DB::table('master_skpd')
                        ->leftJoin('topik_pengaduan', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                        ->leftJoin('pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                        ->select(DB::raw('count(pengaduan.id) as jumlahpengaduan'), 'master_skpd.nama_skpd')
                        ->groupBy('master_skpd.nama_skpd')
                        ->orderby('jumlahpengaduan', 'desc')
                        ->limit(5)->get();

      $getnamaskpd = array();
      $i = 0;
      foreach ($getbignumber as $key) {
        $getnamaskpd[$i] = $key->nama_skpd;
        $i++;
      }
      $getdataforareachart = array();
      if (count($getnamaskpd) == 1) {
        $getdataforareachart = DB::table('pengaduan')
                                ->select(DB::raw('substr(pengaduan.created_at, 1, 7) as y'),
                                    DB::raw("sum(master_skpd.nama_skpd='$getnamaskpd[0]') as 'a'"))
                                ->join('topik_pengaduan', 'topik_pengaduan.id', '=', 'pengaduan.topik_id')
                                ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                                ->groupBy(DB::raw('extract(month from pengaduan.created_at)'))
                                ->orderby('pengaduan.created_at', 'asc')
                                ->get();

      } elseif (count($getnamaskpd) == 2) {
        $getdataforareachart = DB::table('pengaduan')
                                ->select(DB::raw('substr(pengaduan.created_at, 1, 7) as y'),
                                    DB::raw("sum(master_skpd.nama_skpd='$getnamaskpd[0]') as 'a'"),
                                    DB::raw("sum(master_skpd.nama_skpd='$getnamaskpd[1]') as 'b'"))
                                ->join('topik_pengaduan', 'topik_pengaduan.id', '=', 'pengaduan.topik_id')
                                ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                                ->groupBy(DB::raw('extract(month from pengaduan.created_at)'))
                                ->orderby('pengaduan.created_at', 'asc')
                                ->get();
      } elseif (count($getnamaskpd) == 3) {
        $getdataforareachart = DB::table('pengaduan')
                                ->select(DB::raw('substr(pengaduan.created_at, 1, 7) as y'),
                                    DB::raw("sum(master_skpd.nama_skpd='$getnamaskpd[0]') as 'a'"),
                                    DB::raw("sum(master_skpd.nama_skpd='$getnamaskpd[1]') as 'b'"),
                                    DB::raw("sum(master_skpd.nama_skpd='$getnamaskpd[2]') as 'c'"))
                                ->join('topik_pengaduan', 'topik_pengaduan.id', '=', 'pengaduan.topik_id')
                                ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                                ->groupBy(DB::raw('extract(month from pengaduan.created_at)'))
                                ->orderby('pengaduan.created_at', 'asc')
                                ->get();
      } elseif (count($getnamaskpd) == 4) {
        $getdataforareachart = DB::table('pengaduan')
                                ->select(DB::raw('substr(pengaduan.created_at, 1, 7) as y'),
                                    DB::raw("sum(master_skpd.nama_skpd='$getnamaskpd[0]') as 'a'"),
                                    DB::raw("sum(master_skpd.nama_skpd='$getnamaskpd[1]') as 'b'"),
                                    DB::raw("sum(master_skpd.nama_skpd='$getnamaskpd[2]') as 'c'"),
                                    DB::raw("sum(master_skpd.nama_skpd='$getnamaskpd[3]') as 'd'"))
                                ->join('topik_pengaduan', 'topik_pengaduan.id', '=', 'pengaduan.topik_id')
                                ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                                ->groupBy(DB::raw('extract(month from pengaduan.created_at)'))
                                ->orderby('pengaduan.created_at', 'asc')
                                ->get();
      } elseif (count($getnamaskpd) == 5) {
        $getdataforareachart = DB::table('pengaduan')
                                ->select(DB::raw('substr(pengaduan.created_at, 1, 7) as y'),
                                    DB::raw("sum(master_skpd.nama_skpd='$getnamaskpd[0]') as 'a'"),
                                    DB::raw("sum(master_skpd.nama_skpd='$getnamaskpd[1]') as 'b'"),
                                    DB::raw("sum(master_skpd.nama_skpd='$getnamaskpd[2]') as 'c'"),
                                    DB::raw("sum(master_skpd.nama_skpd='$getnamaskpd[3]') as 'd'"),
                                    DB::raw("sum(master_skpd.nama_skpd='$getnamaskpd[4]') as 'e'"))
                                ->join('topik_pengaduan', 'topik_pengaduan.id', '=', 'pengaduan.topik_id')
                                ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                                ->groupBy(DB::raw('extract(month from pengaduan.created_at)'))
                                ->orderby('pengaduan.created_at', 'asc')
                                ->get();
      }

      return $getdataforareachart;
    }

    public function adminareachartSKPD()
    {

      $idlogin = Auth::user()->id;
      $userid = User::find($idlogin);

      $getbignumber = DB::table('topik_pengaduan')
              ->select('topik_pengaduan.id', 'topik_pengaduan.kode_topik', 'topik_pengaduan.nama_topik', 'topik_pengaduan.id_skpd',
               DB::raw('count(pengaduan.id) as jumlahpengaduan'))
              ->join('pengaduan', "topik_pengaduan.id", '=', 'pengaduan.topik_id')
              ->where('topik_pengaduan.id_skpd', $userid->id_skpd)
              ->groupBy('topik_pengaduan.id')
              ->orderby('jumlahpengaduan', 'desc')
              ->limit(5)
              ->get();

      $getidtopik = array();
      $i = 0;
      foreach ($getbignumber as $key) {
        $getidtopik[$i] = $key->id;
        $i++;
      }

      $getdataforareachart = array();
      if (count($getidtopik) == 1) {
      $getdataforareachart = DB::table('pengaduan')
                              ->select(DB::raw('substr(pengaduan.created_at, 1, 7) as y'),
                               DB::raw("sum(topik_pengaduan.id='$getidtopik[0]') as 'a'"))
                              ->join('topik_pengaduan', 'topik_pengaduan.id', '=', 'pengaduan.topik_id')
                              ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                              ->groupBy(DB::raw('extract(month from pengaduan.created_at)'))
                              ->orderby('pengaduan.created_at', 'asc')
                              ->get();
      } elseif (count($getidtopik) == 2) {
        $getdataforareachart = DB::table('pengaduan')
                                ->select(DB::raw('substr(pengaduan.created_at, 1, 7) as y'),
                                 DB::raw("sum(topik_pengaduan.id='$getidtopik[0]') as 'a'"),
                                 DB::raw("sum(topik_pengaduan.id='$getidtopik[1]') as 'b'"))
                                ->join('topik_pengaduan', 'topik_pengaduan.id', '=', 'pengaduan.topik_id')
                                ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                                ->groupBy(DB::raw('extract(month from pengaduan.created_at)'))
                                ->orderby('pengaduan.created_at', 'asc')
                                ->get();
      } elseif (count($getidtopik) == 3) {
        $getdataforareachart = DB::table('pengaduan')
                                ->select(DB::raw('substr(pengaduan.created_at, 1, 7) as y'),
                                 DB::raw("sum(topik_pengaduan.id='$getidtopik[0]') as 'a'"),
                                 DB::raw("sum(topik_pengaduan.id='$getidtopik[1]') as 'b'"),
                                 DB::raw("sum(topik_pengaduan.id='$getidtopik[2]') as 'c'"))
                                ->join('topik_pengaduan', 'topik_pengaduan.id', '=', 'pengaduan.topik_id')
                                ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                                ->groupBy(DB::raw('extract(month from pengaduan.created_at)'))
                                ->orderby('pengaduan.created_at', 'asc')
                                ->get();
      } elseif (count($getidtopik) == 4) {
        $getdataforareachart = DB::table('pengaduan')
                                ->select(DB::raw('substr(pengaduan.created_at, 1, 7) as y'),
                                 DB::raw("sum(topik_pengaduan.id='$getidtopik[0]') as 'a'"),
                                 DB::raw("sum(topik_pengaduan.id='$getidtopik[1]') as 'b'"),
                                 DB::raw("sum(topik_pengaduan.id='$getidtopik[2]') as 'c'"),
                                 DB::raw("sum(topik_pengaduan.id='$getidtopik[3]') as 'd'"))
                                ->join('topik_pengaduan', 'topik_pengaduan.id', '=', 'pengaduan.topik_id')
                                ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                                ->groupBy(DB::raw('extract(month from pengaduan.created_at)'))
                                ->orderby('pengaduan.created_at', 'asc')
                                ->get();
      } elseif (count($getidtopik) == 5) {
        $getdataforareachart = DB::table('pengaduan')
                                ->select(DB::raw('substr(pengaduan.created_at, 1, 7) as y'),
                                 DB::raw("sum(topik_pengaduan.id='$getidtopik[0]') as 'a'"),
                                 DB::raw("sum(topik_pengaduan.id='$getidtopik[1]') as 'b'"),
                                 DB::raw("sum(topik_pengaduan.id='$getidtopik[2]') as 'c'"),
                                 DB::raw("sum(topik_pengaduan.id='$getidtopik[3]') as 'd'"),
                                 DB::raw("sum(topik_pengaduan.id='$getidtopik[4]') as 'e'"))
                                ->join('topik_pengaduan', 'topik_pengaduan.id', '=', 'pengaduan.topik_id')
                                ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                                ->groupBy(DB::raw('extract(month from pengaduan.created_at)'))
                                ->orderby('pengaduan.created_at', 'asc')
                                ->get();
      }

      return $getdataforareachart;
    }

    public function countpengaduanbyskpd()
    {
      $getbignumber = DB::table('master_skpd')
                        ->leftJoin('topik_pengaduan', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                        ->leftJoin('pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                        ->select(DB::raw('count(pengaduan.id) as jumlahpengaduan'), 'master_skpd.nama_skpd')
                        ->groupBy('master_skpd.nama_skpd')
                        ->orderby('jumlahpengaduan', 'desc')
                        ->limit(5)->get();

      $getnamaskpd = array();
      $i = 0;
      foreach ($getbignumber as $key) {
        $getnamaskpd[$i] = $key->nama_skpd;
        $i++;
      }
      return $getnamaskpd;
    }

    public function countpengaduanbytopik()
    {
      $idlogin = Auth::user()->id;
      $userid = User::find($idlogin);

      $getbignumber = DB::table('topik_pengaduan')
              ->select('topik_pengaduan.id', 'topik_pengaduan.kode_topik', 'topik_pengaduan.nama_topik', 'topik_pengaduan.id_skpd',
               DB::raw('count(pengaduan.id) as jumlahpengaduan'))
              ->join('pengaduan', "topik_pengaduan.id", '=', 'pengaduan.topik_id')
              ->where('topik_pengaduan.id_skpd', $userid->id_skpd)
              ->groupBy('topik_pengaduan.id')
              ->orderby('jumlahpengaduan', 'desc')
              ->limit(5)
              ->get();

      $getnamatopik = array();
      $i = 0;
      foreach ($getbignumber as $key) {
        $getnamatopik[$i] = $key->nama_topik;
        $i++;
      }
      return $getnamatopik;
    }
}
