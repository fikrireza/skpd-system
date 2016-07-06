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

    $topiks  = DB::table('master_skpd')
                    ->select('nama_skpd')
                    ->where('master_skpd.flag_skpd', 1)
                    ->get();
    // dd($topiks);
    $topikgroup = DB::table('master_skpd')
                    ->join('topik_pengaduan', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                    ->select('topik_pengaduan.id','topik_pengaduan.nama_topik as nama_topik', 'master_skpd.nama_skpd as nama_skpd')
                    ->where('master_skpd.flag_skpd', 1)
                    ->get();
    // dd($topikgroup);
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

    $skpdonly  = DB::table('master_skpd')
                      ->join('topik_pengaduan', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                      ->join('pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                      ->select('master_skpd.nama_skpd as nama_skpd', 'master_skpd.slug as slug_skpd')
                      ->where('master_skpd.flag_skpd', 1)
                      ->where('pengaduan.flag_rahasia', 0)
                      ->groupBy('nama_skpd')
                      ->limit(6)
                      ->get();
    // dd($skpdonly);

    return view('front.beranda', compact('topiks', 'topikgroup', 'skpdonly', 'AllTopiks', 'pengaduanWid', 'tanggapWid'));
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
          $file->move('documents', $photo_name);
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

    return redirect()->route('pengaduansaya')->with('pengaduan', 'Pengaduan Anda Berhasil Terkirim, dan Akan Segera Kami Proses');

  }

  /**
   * Lihat pengaduan bagi warga yg terdaftar
   *
   * List berdasarkan warga yg login
   */
  public function pengaduansaya()
  {
    $id = Auth::user()->id;
    $profiles = User::find($id);

    $topiks  = DB::table('master_skpd')
                    ->select('nama_skpd')
                    ->where('master_skpd.flag_skpd', 1)
                    ->get();

    $topikgroup = DB::table('master_skpd')
                    ->join('topik_pengaduan', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                    ->select('topik_pengaduan.id','topik_pengaduan.nama_topik as nama_topik', 'master_skpd.nama_skpd as nama_skpd')
                    ->where('master_skpd.flag_skpd', 1)
                    ->get();

    $pengaduanWid = Pengaduan::where('warga_id', '=', $id)->count();
    $tanggapWid  = Pengaduan::where('warga_id', '=', $id)->where('flag_tanggap', '=', 1)->count();

    $pengaduans = DB::table('pengaduan')
                    ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                    ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                    ->select('*', 'pengaduan.id', 'pengaduan.slug as slug')
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
    return view('front.pengaduansaya', compact('topiks', 'topikgroup', 'pengaduans', 'pengaduanWid', 'tanggapWid', 'dokumentall'));
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

    $detail = Pengaduan::join('topik_pengaduan', 'topik_pengaduan.id', '=', 'pengaduan.topik_id')->where('pengaduan.slug', $slug)->where('warga_id', '=', $id)->first();

    $dokumentall = DB::table('pengaduan')
                    ->join('dokumen_pengaduan', 'pengaduan.id' , '=', 'dokumen_pengaduan.pengaduan_id')
                    ->select('*')
                    ->where('pengaduan.warga_id', $id)
                    ->get();

    // Jika url slug tidak ditemukan
    if($detail == null){
      abort(404);
    }

    $tanggapan = TanggapanModel::where('id_pengaduan', $detail->id)->get();

    $listPengaduan = DB::table('pengaduan')
                      ->join('topik_pengaduan', 'topik_pengaduan.id', '=', 'pengaduan.topik_id')
                      ->select('*')
                      ->where('pengaduan.warga_id', $id)
                      ->orderby('pengaduan.created_at', 'desc')
                      ->get();
    // Pengaduan::where('warga_id', $id)->orderBy('created_at', 'dsc')->get();

    return view('front.detailpengaduan', compact('profiles', 'pengaduanWid', 'tanggapWid', 'detail', 'tanggapan', 'listPengaduan', 'dokumentall'));
  }

  /**
   * Function for Menu Semua Laporan
   */
  public function semuapengaduan()
  {
    $id = Auth::user()->id;

    $pengaduanWid = Pengaduan::where('warga_id', '=', $id)->count();
    $tanggapWid  = Pengaduan::where('warga_id', '=', $id)->where('flag_tanggap', '=', 1)->count();

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

    $skpdonly  = DB::table('master_skpd')
                      ->join('topik_pengaduan', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                      ->join('pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                      ->select('master_skpd.nama_skpd as nama_skpd', 'master_skpd.slug as slug_skpd')
                      ->where('master_skpd.flag_skpd', 1)
                      ->where('pengaduan.flag_rahasia', 0)
                      ->groupBy('nama_skpd')
                      ->limit(6)
                      ->get();

    return view('front.semuapengaduan', compact('skpdonly', 'AllTopiks', 'pengaduanWid', 'tanggapWid'));

  }

  /**
   * Retrieve slug from judul_pengaduan
   *
   */
  public function detailsemuapengaduan($slug)
  {
      $id = Auth::user()->id;
      $profiles = User::find($id);

      $pengaduanWid = Pengaduan::where('warga_id', '=', $id)->count();
      $tanggapWid  = Pengaduan::where('warga_id', '=', $id)->where('flag_tanggap', '=', 1)->count();

      $detail = Pengaduan::join('topik_pengaduan', 'topik_pengaduan.id', '=', 'pengaduan.topik_id')
                          ->join('master_skpd', 'master_skpd.id', '=', 'topik_pengaduan.id_skpd')
                          ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                          ->select('master_skpd.nama_skpd', 'topik_pengaduan.nama_topik', 'pengaduan.*', 'users.nama', 'users.url_photo')
                          ->where('pengaduan.slug', $slug)->first();
      // dd($detail);
      $dokumentall = DB::table('pengaduan')
                      ->join('dokumen_pengaduan', 'pengaduan.id' , '=', 'dokumen_pengaduan.pengaduan_id')
                      ->select('*')
                      ->where('pengaduan.warga_id', $id)
                      ->get();

      // Jika url slug tidak ditemukan
      if($detail == null){
        abort(404);
      }

      $tanggapan = TanggapanModel::join('users', 'users.id', '=', 'tanggapan.id_userskpd')
                                ->select('tanggapan.*', 'users.url_photo', 'users.nama')
                                ->where('id_pengaduan', $detail->id)->get();

      $listPengaduan = DB::table('pengaduan')
                          ->join('topik_pengaduan', 'topik_pengaduan.id', '=', 'pengaduan.topik_id')
                          ->join('master_skpd', 'master_skpd.id', '=', 'topik_pengaduan.id_skpd')
                          ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                          ->select('*', 'pengaduan.slug')
                          ->where('master_skpd.nama_skpd', $detail->nama_skpd)
                          ->where('pengaduan.flag_rahasia', 0)
                          ->paginate(10);
      // dd($listPengaduan);
      return view('front.detailsemuapengaduan', compact('pengaduanWid', 'tanggapWid', 'detail', 'tanggapan', 'listPengaduan'));

  }
}
