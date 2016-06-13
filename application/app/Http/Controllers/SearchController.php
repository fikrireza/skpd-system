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
    $profiles = User::find($id);

    $pengaduanWid = Pengaduan::where('warga_id', '=', $id)->count();
    $tanggapWid  = Pengaduan::where('warga_id', '=', $id)->where('flag_tanggap', '=', 1)->count();

    $search = $request->input('qr');

    $kalimat = explode(' ', $search);
    // dd($kalimat);
    $searchTermBits = array();
    foreach ($kalimat as $kata) {
      $kata = trim($kata);
      $kata = preg_replace('/[^A-Za-z0-9\-]/', '', $kata);
      if (!empty($kata)) {
          $searchTermBits[] = "judul_pengaduan LIKE '%$kata%'";
      }
    }

    $bantu = implode(' OR ',$searchTermBits);
    $searches = DB::select("select * FROM pengaduan WHERE ".$bantu." order by created_at DESC");

    return view('front.pencarian', compact('profiles','pengaduanWid', 'tanggapWid','searches'));

  }
}
