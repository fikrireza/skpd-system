<?php

namespace App\Http\Controllers;

use App\Http\Requests\PengaduanRequest;
use Carbon;
use Auth;
use DB;
use App\User;
use App\Models\Pengaduan;
use App\Models\DokumenPengaduan;
use App\TopikAduan;
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

    $pengaduanWid = Pengaduan::where('warga_id', '=', $id)->count();
    $tanggapWid  = Pengaduan::where('warga_id', '=', $id)->where('flag_tanggap', '=', 1)->count();

    // $topiks = DB::table('topik_pengaduan')->orderBy('id_skpd', 'asc')->lists('nama_topik', 'id');

    $topiks  = DB::table('master_skpd')
                    ->join('topik_pengaduan', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                    ->select('topik_pengaduan.id','topik_pengaduan.nama_topik as nama_topik', 'master_skpd.nama_skpd as nama_skpd')
                    ->where('master_skpd.flag_skpd', 1)
                    ->get();

    return view('front.beranda', compact('topiks', 'pengaduanWid', 'tanggapWid'));
  }

  /**
   * Retrieve form FORM Pengaduan
   *
   * @return App\Http\Requests\PengaduanRequest
   */
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
    $campur = $request->input('judul').' '.str_random(3);
    $slugtitle = str_slug($campur);

    if($request->hasFile('dokumen'))
    {
      DB::transaction(function() use($request, $anonim, $rahasia, $slugtitle)
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

    // $topiks = DB::table('topik_pengaduan')->orderBy('id_skpd', 'asc')->lists('nama_topik', 'id');

    $topiks  = DB::table('master_skpd')
                    ->join('topik_pengaduan', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                    ->select('topik_pengaduan.id','topik_pengaduan.nama_topik as nama_topik', 'master_skpd.nama_skpd as nama_skpd')
                    ->where('master_skpd.flag_skpd', 1)
                    ->get();

    $pengaduanWid = Pengaduan::where('warga_id', '=', $id)->count();
    $tanggapWid  = Pengaduan::where('warga_id', '=', $id)->where('flag_tanggap', '=', 1)->count();

    $pengaduans = DB::table('pengaduan')
                    ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                    ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                    ->select('*', 'pengaduan.id')
                    ->where('pengaduan.warga_id', $id)
                    ->orderby('pengaduan.created_at', 'desc')
                    ->get();
    // dd($pengaduans);
    $dokumentall = DB::table('pengaduan')
                    ->join('dokumen_pengaduan', 'pengaduan.id' , '=', 'dokumen_pengaduan.pengaduan_id')
                    ->select('*')
                    ->where('pengaduan.warga_id', $id)
                    ->get();
    //dd($dokument);
    return view('front.pengaduansaya', compact('topiks', 'pengaduans', 'pengaduanWid', 'tanggapWid', 'dokumentall'));
  }

  /**
   * Retrieve slug from judul_pengaduan
   *
   */
  public function detailPengaduan($slug)
  {
    $id = Auth::user()->id;
    $profiles = User::find($id);

    $pengaduanWid = Pengaduan::where('warga_id', '=', $id)->count();
    $tanggapWid  = Pengaduan::where('warga_id', '=', $id)->where('flag_tanggap', '=', 1)->count();

    $detail = Pengaduan::where('slug', $slug)->where('warga_id', '=', $id)->first();

    $dokumentall = DB::table('pengaduan')
                    ->join('dokumen_pengaduan', 'pengaduan.id' , '=', 'dokumen_pengaduan.pengaduan_id')
                    ->select('*')
                    ->where('pengaduan.warga_id', $id)
                    ->get();

    $tanggapan = TanggapanModel::where('id_pengaduan', $detail->id)->get();

    $listPengaduan = Pengaduan::where('warga_id', $id)->orderBy('created_at', 'dsc')->get();

    return view('front.detaillaporan', compact('profiles', 'pengaduanWid', 'tanggapWid', 'detail', 'tanggapan', 'listPengaduan', 'dokumentall'));
  }

  /**
   * Function for Menu Semua Laporan
   */
  public function semuapengaduan()
  {
    return view('front.semualaporan');
  }
}
