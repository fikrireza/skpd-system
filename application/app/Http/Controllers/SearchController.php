<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\SearchRequest;
use Carbon;
use Auth;
use DB;
use App\User;
use App\Models\Pengaduan;
use App\Models\DokumenPengaduan;


class SearchController extends Controller
{

  /**
   * Create a new authentication controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('isWarga');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function getSearchWarga(SearchRequest $request)
  {
    $id = Auth::user()->id;

    $pengaduanWid = Pengaduan::where('warga_id', '=', $id)->count();
    $tanggapWid  = Pengaduan::where('warga_id', '=', $id)->where('flag_tanggap', '=', 1)->count();

    $search = $request->input('qr');

    $kalimat = explode(' ', $search);
    $searchTermBits = array();
    foreach ($kalimat as $kata) {
      $kata = trim($kata);
      $kata = preg_replace('/[^A-Za-z0-9\-]/', '', $kata);
      if (!empty($kata)) {
          $searchTermBits[] = "judul_pengaduan LIKE '%$kata%'";
      }
    }

    $bantu = implode(' OR ',$searchTermBits);
    $searches = DB::select("select pengaduan.*, topik_pengaduan.nama_topik, users.nama, users.url_photo FROM pengaduan, topik_pengaduan, users WHERE pengaduan.flag_rahasia = 0 AND ".$bantu." AND topik_pengaduan.id = pengaduan.topik_id AND pengaduan.warga_id = users.id GROUP BY judul_pengaduan ORDER BY pengaduan.created_at DESC");

    $skpdonly  = DB::table('master_skpd')
                      ->join('topik_pengaduan', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                      ->join('pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                      ->select('master_skpd.nama_skpd as nama_skpd', 'master_skpd.slug as slug_skpd')
                      ->where('master_skpd.flag_skpd', 1)
                      ->where('pengaduan.flag_rahasia', 0)
                      ->groupBy('nama_skpd')
                      ->limit(6)
                      ->get();

    $AllTopikQuery  = DB::table('master_skpd')
                      ->join('topik_pengaduan', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                      ->join('pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                      ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                      ->select('master_skpd.nama_skpd as nama_skpd', 'master_skpd.slug as slug_skpd', 'topik_pengaduan.nama_topik as nama_topik', 'pengaduan.judul_pengaduan as judul_pengaduan', 'users.url_photo as url_photo', 'users.nama as nama', 'pengaduan.*')
                      ->where('master_skpd.flag_skpd', 1)
                      ->where('pengaduan.flag_rahasia', 0)
                      ->orderby('pengaduan.created_at', 'desc')
                      ->take(60)
                      ->get();
    $grouping = collect($AllTopikQuery);
    $AllTopiks = $grouping->groupBy('nama_skpd')->toArray();

    return view('front.pencarian', compact('pengaduanWid', 'tanggapWid','searches', 'kalimat', 'skpdonly', 'AllTopiks'));
  }
}
