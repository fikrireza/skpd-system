<?php

namespace App\Http\Controllers;

use App\Http\Requests\PengaduanRequest;
use Carbon;
use Auth;
use DB;
use App\User;
use App\Models\Pengaduan;
use App\Models\DokumenPengaduan;
use App\Models\TanggapanModel;

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

    $pengaduanWid = Pengaduan::where('warga_id', '=', $id)->count();
    $tanggapWid  = Pengaduan::where('warga_id', '=', $id)->where('flag_tanggap', '=', 1)->count();

    $topiks = DB::table('topik_pengaduan')->orderBy('id_skpd', 'asc')->lists('nama_topik', 'id');

    return view('front.beranda', compact('profiles', 'topiks', 'pengaduanWid', 'tanggapWid'));//)->with('profiles', 'topik', $profiles, $topik);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {

  }

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

    //function for seo random in segment
    $slugtitle = str_slug($request->input('judul'), '-');
    // $slug = str_random(5).'/'.$slugtitle;

    if($request->hasFile('dokumen'))
    {
      DB::transaction(function() use($request, $anonim, $rahasia)
      {
        $pengaduan = Pengaduan::create([
                    'topik_id'          => $request->input('topik'),
                    'judul_pengaduan'   => $request->input('judul'),
                    'isi_pengaduan'     => $request->input('isi'),
                    'slug'              => $slugtitle,
                    'warga_id'          => $request->input('warga_id'),
                    'flag_rahasia'      => $rahasia,
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
                  'topik_id'          => $request->input('topik'),
                  'judul_pengaduan'   => $request->input('judul'),
                  'isi_pengaduan'      => $request->input('isi'),
                  'slug'              => $slugtitle,
                  'warga_id'          => $request->input('warga_id'),
                  'flag_rahasia'      => $rahasia,
                  'flag_anonim'       => $anonim,
      ]);
    }

    return redirect()->route('pengaduan')->with('pengaduan', 'Pengaduan Anda Berhasil Terkirim, dan Akan Segera Kami Proses');

  }

  public function pengaduansaya()
  {
    $id = Auth::user()->id;
    $profiles = User::find($id);

    $topiks = DB::table('topik_pengaduan')->orderBy('id_skpd', 'asc')->lists('nama_topik', 'id');

    $pengaduanWid = Pengaduan::where('warga_id', '=', $id)->count();
    $tanggapWid  = Pengaduan::where('warga_id', '=', $id)->where('flag_tanggap', '=', 1)->count();

    $pengaduans = Pengaduan::where('warga_id', '=', $id)->orderBy('created_at', 'desc')->get();

    return view('front.pengaduansaya', compact('profiles', 'topiks', 'pengaduans', 'pengaduanWid', 'tanggapWid'));
  }

  public function detailPengaduan($slug)
  {
    $id = Auth::user()->id;
    $profiles = User::find($id);

    $pengaduanWid = Pengaduan::where('warga_id', '=', $id)->count();
    $tanggapWid  = Pengaduan::where('warga_id', '=', $id)->where('flag_tanggap', '=', 1)->count();

    $detail = Pengaduan::where('slug', $slug)->first();

    $tanggapan = TanggapanModel::where('id_pengaduan', $detail->id)->get();

    $listPengaduan = Pengaduan::where('warga_id', $id)->orderBy('created_at', 'dsc')->get();

    return view('front.detaillaporan', compact('profiles', 'pengaduanWid', 'tanggapWid', 'detail', 'tanggapan', 'listPengaduan'));
  }
}
