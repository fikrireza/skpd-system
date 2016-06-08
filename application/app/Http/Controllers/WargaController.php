<?php

namespace App\Http\Controllers;

use App\Http\Requests\PengaduanRequest;
use Carbon;
use Auth;
use DB;
use App\User;
use App\Models\Pengaduan;
use App\Models\DokumenPengaduan;

class WargaController extends Controller
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
  public function index()
  {
    // Retrieve User From Auth
    $id = Auth::user()->id;
    $profiles = User::find($id);

    $topiks = DB::table('topik_pengaduan')->orderBy('id_skpd', 'asc')->lists('nama_topik', 'id');

    return view('front.beranda', compact('profiles', 'topiks'));//)->with('profiles', 'topik', $profiles, $topik);
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
  // public function store(Request $request)
  // {
  //     //
  // }

  public function postPengaduan(PengaduanRequest $request)
  {
    if($request->input('anonim') == null){
      $anonim = 0;
    }else{
      $anonim = 1;
    }
    if($request->input('rahasia') == null){
      $rahasia = 0;
    }else{
      $rahasia = 1;
    }

    if($request->hasFile('dokumen'))
    {
      DB::transaction(function() use($request, $anonim, $rahasia)
      {
        $pengaduan = Pengaduan::create([
                    'topik_id'  => $request->input('topik'),
                    'judul_pengaduan'   => $request->input('judul'),
                    'isi_pengaduan'  => $request->input('isi'),
                    'warga_id'    => $request->input('warga_id'),
                    'flag_rahasia'   => $rahasia,
                    'flag_anonim'       => $anonim,
        ]);

        foreach ($request->file('dokumen') as $file)
        {
          $photo_name = time().'-'.$file->getClientOriginalName();
          $file->move(base_path().'\..\documents', $photo_name);
          $dokPengaduan = DokumenPengaduan::create([
                      'url_dokumen'   => $photo_name,
                      'pengaduan_id'  => $pengaduan->id,
          ]);
        }
      });
    }
    else
    {
      $pengaduan = Pengaduan::create([
                  'topik_id'  => $request->input('topik'),
                  'judul_pengaduan'   => $request->input('judul'),
                  'isi_pengaduan'  => $request->input('isi'),
                  'warga_id'    => $request->input('warga_id'),
                  'flag_rahasia'   => $rahasia,
                  'flag_anonim'       => $anonim,
      ]);
    }

    return redirect()->route('beranda')->with('pengaduan', 'Pengaduan Anda Berhasil Terkirim, dan Akan Segera Kami Proses');

  }
}
