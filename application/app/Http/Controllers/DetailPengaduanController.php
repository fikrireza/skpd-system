<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use App\Http\Requests;
use App\Models\DataWargaModel;
use App\Models\LihatPengaduanModel;
use App\Models\TanggapanModel;
use App\Models\MutasiModel;
use App\TopikAduan;
use App\MasterSKPD;
use App\User;
use App\Http\Requests\TanggapanRequest;
use App\Http\Requests\MutasiRequest;
use DB;
use Auth;
use Mail;

class DetailPengaduanController extends Controller
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getpesanmutasi($id)
    {
      $get = MutasiModel::find($id);
      return $get;
    }

    public function show($id)
    {
      // dd($id);
      $idlogin = Auth::user()->id;
      $userid = User::find($idlogin);

      $binddatapengaduan = LihatPengaduanModel::find($id);
      $binddatatanggapan = TanggapanModel::where('id_pengaduan', $id)->get();
      // dd($binddatapengaduan);
      $getdataskpd = MasterSKPD::where('id', $userid->id_skpd)->get();
      $tanggapan = TanggapanModel::where('id_userskpd', $userid->id)->get();
      $tanggapanall = DB::table('tanggapan')
                      ->join('pengaduan', 'tanggapan.id_pengaduan', '=', 'pengaduan.id')
                      ->join('users', 'tanggapan.id_userskpd', '=', 'users.id')
                      ->join('master_skpd', 'users.id_skpd', '=', 'master_skpd.id')
                      ->where('id_pengaduan', $id)
                      ->select('*', 'tanggapan.created_at as created_tanggpan')
                      ->get();

      $getuser = DB::table('users')
                    ->where('id_skpd', $userid->id_skpd)
                    ->select('id_skpd')->get();
      $data = array();
      foreach ($getuser as $key) {
        $data[] = $key->id_skpd;
      }

      $gettopik = TopikAduan::whereNotIn('id_skpd', $data)->get();

      $gettskpd = MasterSKPD::whereNotIn('id', $data)->get();
      // dd($gettopik);

      $getdokumen = DB::table('dokumen_pengaduan')
                      ->where('pengaduan_id', $id)
                      ->get();
      return view('pages.detailpengaduan', compact('binddatapengaduan', 'binddatatanggapan', 'getdataskpd',
      'tanggapan', 'tanggapanall', 'gettopik', 'gettskpd', 'getdokumen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TanggapanRequest $request)
    {

      $set = LihatPengaduanModel::find($request->id);
      $set->flag_tanggap = 1;
      $set->flag_verifikasi = 1;
      $set->save();

      $idlogin = Auth::user()->id;
      $userid = User::find($idlogin);

      $tanggap = new TanggapanModel;
      $tanggap->id_pengaduan = $set->id;
      $tanggap->id_userskpd  = $userid->id;
      $tanggap->tanggapan    = $request->tanggapan;
      $tanggap->save();

      $wargaemail = User::find($set->warga_id);

      $data = array([
        'judul' => $set->judul_pengaduan,
        'slug' => $set->slug
      ]);

      Mail::send('emailtanggap', ['data' => $data], function($message) use($wargaemail) {
        $message->to($wargaemail->email, $wargaemail->email)->subject('Tanggapan Pengaduan SIMPEDU');
      });

      $getdatapengaduan = DB::table('pengaduan')
                      ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                      ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                      ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                      ->select('*', 'pengaduan.id', 'users.id as iduser', 'pengaduan.created_at', 'pengaduan.updated_at')
                      ->where('master_skpd.id', $userid->id_skpd)
                      ->where('flag_mutasi', '0')
                      ->orderby('pengaduan.created_at', 'desc')
                      ->get();

      return view('pages.lihatpengaduan')->with('data', compact('getdatapengaduan'));
    }

    public function verifikasi($id)
    {
      $set = LihatPengaduanModel::find($id);
      $set->flag_verifikasi = 1;
      $set->save();

      $binddatapengaduan = LihatPengaduanModel::find($id);
      $binddatatanggapan = TanggapanModel::find($id);
      $idlogin = Auth::user()->id;
      $userid = User::find($idlogin);
      $getdataskpd = MasterSKPD::where('id', $userid->id_skpd)->get();
      $tanggapan = TanggapanModel::where('id_userskpd', $userid->id)->get();

      $getuser = DB::table('users')
                    ->where('id_skpd', $userid->id_skpd)
                    ->select('id_skpd')->get();
      $data = array();
      foreach ($getuser as $key) {
        $data[] = $key->id_skpd;
      }

      $gettopik = TopikAduan::whereNotIn('id_skpd', $data)->get();

      $gettskpd = MasterSKPD::whereNotIn('id', $data)->get();

      $getdokumen = DB::table('pengaduan')
                      ->join('dokumen_pengaduan', 'pengaduan.id' , '=', 'dokumen_pengaduan.pengaduan_id')
                      ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                      ->select('*')
                      ->get();

      return view('pages.detailpengaduan', compact('binddatapengaduan', 'binddatatanggapan', 'getdataskpd',
      'tanggapan', 'gettopik', 'gettskpd','getdokumen'))->with('message', "Berhasil Memverifikasikan data tersebut");
    }

    public function mutasi(Request $request)
    {
      $getskpd = TopikAduan::where('id', $request->id_topik)->get();

      $pengaduan = LihatPengaduanModel::find($request->id);
      $pengaduan->flag_mutasi = 1;
      $pengaduan->topik_id = $request->id_topik;
      $pengaduan->save();

      $idlogin = Auth::user()->id;
      $userid = User::find($idlogin);

      $mutasi = new MutasiModel;
      $mutasi->id_pengaduan = $request->id;
      $mutasi->id_topik     = $request->id_topik;
      $mutasi->id_userskpd  = $getskpd[0]->id_skpd;
      $mutasi->id_skpd_pemutasi = $userid->id_skpd;
      $mutasi->pesan_mutasi = $request->pesan_mutasi;
      $mutasi->save();


      $getdatapengaduan = DB::table('pengaduan')
                    ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                    ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                    ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                    ->select('*', 'pengaduan.id', 'users.id as iduser', 'pengaduan.created_at', 'pengaduan.updated_at')
                    ->where('master_skpd.id', $userid->id_skpd)
                    ->where('flag_mutasi', '0')
                    ->orderby('pengaduan.created_at', 'desc')
                    ->get();
      return view('pages.lihatpengaduan')->with('data', compact('getdatapengaduan'))->with('message', "Berhasil Memutasikan data tersebut");
    }
}
