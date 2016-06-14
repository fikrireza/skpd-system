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

    return view('index', compact('pengaduanWid', 'tanggapWid', 'CountPengaduan','UsersWarga', 'Persen'));
    
  }
}
