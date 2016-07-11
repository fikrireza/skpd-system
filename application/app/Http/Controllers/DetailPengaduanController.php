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

class DetailPengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

      $getdokumen = DB::table('dokumen_pengaduan')
                      ->where('pengaduan_id', $id)
                      ->get();
      return view('pages.detailpengaduan', compact('binddatapengaduan', 'binddatatanggapan', 'getdataskpd',
      'tanggapan', 'tanggapanall', 'gettopik', 'gettskpd', 'getdokumen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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

      $getdatapengaduan = DB::table('pengaduan')
                      ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                      ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                      ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                      ->select('*', 'pengaduan.id', 'users.id as iduser')
                      ->where('master_skpd.id', $userid->id_skpd)
                      ->where('flag_mutasi', '0')
                      ->orderby('pengaduan.created_at', 'desc')
                      ->get();
      return view('pages.lihatpengaduan')->with('data', compact('getdatapengaduan'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function bind($id)
    {

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
      // $message = true;
      // dd($message);
      return view('pages.detailpengaduan', compact('binddatapengaduan', 'binddatatanggapan', 'getdataskpd',
      'tanggapan', 'gettopik', 'gettskpd','getdokumen'))->with('message', "Berhasil Memverifikasikan data tersebut");
      // return view('pages/tanggapipengaduan')->with('data', compact('getdatapengaduan', 'getmutasi'));
    }

    public function mutasi(Request $request)
    {
      // dd($request);
      $getskpd = TopikAduan::where('id', $request->id_topik)->get();
      // dd($getskpd[0]->id_skpd);

      $pengaduan = LihatPengaduanModel::find($request->id);
      $pengaduan->flag_mutasi = 1;
      $pengaduan->topik_id = $request->id_topik;
      $pengaduan->save();

      $mutasi = new MutasiModel;
      $mutasi->id_pengaduan = $request->id;
      $mutasi->id_topik     = $request->id_topik;
      $mutasi->id_userskpd  = $getskpd[0]->id_skpd;
      $mutasi->pesan_mutasi = $request->pesan_mutasi;
      $mutasi->save();

      $idlogin = Auth::user()->id;
      $userid = User::find($idlogin);

      $getdatapengaduan = DB::table('pengaduan')
                    ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                    ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                    ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                    ->select('*', 'pengaduan.id', 'users.id as iduser')
                    ->where('master_skpd.id', $userid->id_skpd)
                    ->where('flag_mutasi', '0')
                    ->orderby('pengaduan.created_at', 'desc')
                    ->get();
      return view('pages.lihatpengaduan')->with('data', compact('getdatapengaduan'))->with('message', "Berhasil Memutasikan data tersebut");
    }
}
