<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use Carbon;
use Auth;
use DB;
use App\User;
use App\Models\Pengaduan;
use App\Models\DokumenPengaduan;
use App\TopikAduan;
use App\MasterSKPD;
use App\Models\Sliders;

class WelcomePageController extends Controller
{

  /**
   * Create a new authentication controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    //$this->middleware('isWarga');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $CountPengaduan   = Pengaduan::count();
    $UsersWarga       = User::where('level', 1)->count();
    $PengaduanProses  = Pengaduan::where('flag_verifikasi', 1)->count();

    $Persen = ($PengaduanProses/$CountPengaduan)*100;
    $Persen = round($Persen,2);

    $AllTopikQuery  = DB::table('master_skpd')
                      ->join('topik_pengaduan', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                      ->join('pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                      ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                      ->select('master_skpd.nama_skpd as nama_skpd', 'topik_pengaduan.nama_topik as nama_topik', 'pengaduan.judul_pengaduan as judul_pengaduan', 'users.url_photo as url_photo', 'users.nama as nama', 'pengaduan.*')
                      ->where('master_skpd.flag_skpd', 1)
                      ->where('pengaduan.flag_rahasia', 0)
                      ->where('pengaduan.flag_verifikasi', 1)
                      ->orderby('pengaduan.created_at', 'desc')
                      ->take(24)
                      ->get();
    $grouping = collect($AllTopikQuery);

    $AllTopiks = $grouping->groupBy('nama_skpd')->toArray();

    $skpdonly  = DB::table('master_skpd')
                      ->join('topik_pengaduan', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                      ->join('pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                      ->select('master_skpd.nama_skpd as nama_skpd', 'master_skpd.slug as slug')
                      ->where('master_skpd.flag_skpd', 1)
                      ->where('pengaduan.flag_rahasia', 0)
                      ->groupBy('nama_skpd')
                      ->get();

    $sliders = Sliders::orderby('updated_at', 'desc')->get();

    return view('index', compact('pengaduanWid', 'tanggapWid', 'CountPengaduan','UsersWarga', 'Persen', 'skpdonly', 'AllTopiks', 'sliders'));
  }

  public function semuatopik($slug)
  {
    $CountPengaduan   = Pengaduan::count();
    $UsersWarga       = User::where('level', 1)->count();
    $PengaduanProses  = Pengaduan::where('flag_verifikasi', 1)->count();

    $Persen = ($PengaduanProses/$CountPengaduan)*100;
    $Persen = round($Persen,2);

    $cekSlug = MasterSKPD::where('slug', $slug)->first();

    if($cekSlug == null){
      // Jika url slug tidak ditemukan
      abort(404);
    }else{
      $allpengaduan  = MasterSKPD::join('topik_pengaduan', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                            ->join('pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                            ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                            ->select('master_skpd.nama_skpd as nama_skpd', 'topik_pengaduan.nama_topik as nama_topik', 'pengaduan.judul_pengaduan as judul_pengaduan', 'users.url_photo as url_photo', 'users.nama as nama', 'pengaduan.*')
                            ->where('master_skpd.flag_skpd', 1)
                            ->where('pengaduan.flag_rahasia', 0)
                            ->where('pengaduan.flag_verifikasi', 1)
                            ->where('master_skpd.slug', $slug)
                            ->orderby('pengaduan.created_at', 'desc')
                            ->paginate(10);
    }

    return view('front.lihatsemuabyskpd', compact('CountPengaduan','UsersWarga', 'Persen', 'cekSlug', 'allpengaduan'));
  }

  public function detailpengaduan($slug)
  {
    return 'Break Megrib';
  }

}
