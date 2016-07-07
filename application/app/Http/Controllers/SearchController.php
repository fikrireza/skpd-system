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

    return view('front.pencarian', compact('pengaduanWid', 'tanggapWid','searches', 'kalimat'));

  }
}
