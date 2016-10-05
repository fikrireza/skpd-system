<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use App\Http\Requests;
use App\Models\LihatPengaduanModel;
use App\Models\TanggapanModel;
use App\TopikAduan;
use App\MasterSKPD;
use App\Models\Pengaduan;
use App\Models\DataMutasiModel;
use App\User;
use App\Http\Requests\TanggapanRequest;
use DB;
use Auth;

class TanggapAduanController extends Controller
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

    public function index()
    {
      $idlogin = Auth::user()->id;
      $userid = User::find($idlogin);

      $getdatapengaduan = DB::table('pengaduan')
                      ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                      ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                      ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                      ->select('*', 'pengaduan.id', 'pengaduan.created_at', 'pengaduan.updated_at')
                      ->where('master_skpd.id', $userid->id_skpd)
                      ->where('flag_tanggap', '0')
                      ->where('flag_mutasi', '0')
                      ->orderby('pengaduan.created_at', 'desc')
                      ->paginate(10);

      $getmutasi = DB::table('mutasi')
                      ->select('mutasi.id as id', 'master_skpd.nama_skpd', 'mutasi.pesan_mutasi', 'topik_pengaduan.nama_topik', 'mutasi.created_at', 'mutasi.id_pengaduan as id_pengaduan', 'flag_tanggap')
                      ->join('topik_pengaduan', 'mutasi.id_topik', '=', 'topik_pengaduan.id')
                      ->join('master_skpd', 'mutasi.id_skpd_pemutasi', '=', 'master_skpd.id')
                      ->join('pengaduan', 'mutasi.id_pengaduan', '=', 'pengaduan.id')
                      ->where('flag_mutasi', '1')
                      ->where('flag_tanggap', '0')
                      ->where('topik_pengaduan.id_skpd', $userid->id_skpd)
                      ->orderby('mutasi.created_at', 'desc')
                      ->paginate(10);


      $getdokumen = DB::table('pengaduan')
                      ->join('dokumen_pengaduan', 'pengaduan.id' , '=', 'dokumen_pengaduan.pengaduan_id')
                      ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                      ->select('*', 'pengaduan.created_at', 'pengaduan.updated_at')
                      ->get();
      return view('pages/tanggapipengaduan')->with('data', compact('getdatapengaduan', 'getmutasi' , 'getdokumen'));
    }

    public function store(TanggapanRequest $request)
    {
      $set = LihatPengaduanModel::find($request->id);
      $set->flag_tanggap = 1;
      $set->flag_verifikasi = 1;
      $set->flag_mutasi = 0;
      $set->save();

      $idlogin = Auth::user()->id;
      $userid = User::find($idlogin);

      $tanggap = new TanggapanModel;
      $tanggap->id_pengaduan = $set->id;
      $tanggap->id_userskpd  = $userid->id;
      $tanggap->tanggapan    = $request->tanggapan;
      $tanggap->save();

      return redirect()->route('tanggap.index')->with('message', "Berhasil Memberikan Tanggapan");
    }

    public function edit($id)
    {
      $idlogin = Auth::user()->id;
      $userid = User::find($idlogin);

      $getdatapengaduan = DB::table('pengaduan')
                      ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                      ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                      ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                      ->select('*', 'pengaduan.id', 'pengaduan.created_at', 'pengaduan.updated_at')
                      ->where('master_skpd.id', $userid->id_skpd)
                      ->where('flag_tanggap', '0')
                      ->where('flag_mutasi', '0')
                      ->orderby('pengaduan.created_at', 'desc')
                      ->paginate(10);
        $data['getdatapengaduan'] = $getdatapengaduan;
        $getmutasi = DB::table('mutasi')
                        ->join('pengaduan', 'mutasi.id_pengaduan', '=', 'pengaduan.id')
                        ->join('topik_pengaduan', 'mutasi.id_topik', '=', 'topik_pengaduan.id')
                        ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                        ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                        ->select('*', 'mutasi.id', 'mutasi.created_at', 'mutasi.updated_at')
                        ->where('flag_mutasi', '1')
                        ->where('mutasi.id_userskpd', $userid->id_skpd)
                        ->orderby('mutasi.created_at', 'desc')
                        ->paginate(10);

        $getdokumen = DB::table('pengaduan')
                        ->join('dokumen_pengaduan', 'pengaduan.id' , '=', 'dokumen_pengaduan.pengaduan_id')
                        ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                        ->select('*', 'pengaduan.created_at', 'pengaduan.updated_at')
                        ->where('dokumen_pengaduan.pengaduan_id', $id)
                        ->get();
        $data['getmutasi'] = $getmutasi;
        $binddatapengaduan = LihatPengaduanModel::find($id);
        $data['binddatapengaduan'] = $binddatapengaduan;
        $data['getdokumen'] = $getdokumen;

        return view('pages/tanggapipengaduan')->with('data', $data);
    }

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

      return redirect()->route('tanggap.index')->with('message', "Berhasil Memberikan Tanggapan");
    }

    public function show($id)
  	{
      $idlogin = Auth::user()->id;
      $userid = User::find($idlogin);

      $getdatapengaduan = DB::table('pengaduan')
                      ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                      ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                      ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                      ->select('*', 'pengaduan.id', 'pengaduan.created_at', 'pengaduan.updated_at')
                      ->where('master_skpd.id', $userid->id_skpd)
                      ->where('flag_tanggap', '0')
                      ->where('flag_mutasi', '0')
                      ->orderby('pengaduan.created_at', 'desc')
                      ->paginate(10);
        $data['getdatapengaduan'] = $getdatapengaduan;
        $getmutasi = DB::table('mutasi')
                        ->join('pengaduan', 'mutasi.id_pengaduan', '=', 'pengaduan.id')
                        ->join('topik_pengaduan', 'mutasi.id_topik', '=', 'topik_pengaduan.id')
                        ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                        ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                        ->select('*', 'mutasi.id', 'mutasi.created_at', 'mutasi.updated_at')
                        ->where('flag_mutasi', '1')
                        ->where('mutasi.id_userskpd', $userid->id_skpd)
                        ->orderby('mutasi.created_at', 'desc')
                        ->paginate(10);


      $data['getmutasi'] = $getmutasi;


      $getdatamutasi = DB::table('mutasi')
                      ->join('pengaduan', 'mutasi.id_pengaduan', '=', 'pengaduan.id')
                      ->join('topik_pengaduan', 'mutasi.id_topik', '=', 'topik_pengaduan.id')
                      ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                      ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                      ->select('*', 'mutasi.id', 'mutasi.created_at', 'mutasi.updated_at')
                      ->where('flag_mutasi', '1')
                      ->where('mutasi.id_userskpd', $userid->id_skpd)
                      ->where('mutasi.id', $id)
                      ->orderby('mutasi.created_at', 'desc')
                      ->paginate(10);

                      // dd($getdatamutasi);

      $data['getdatamutasi'] = $getdatamutasi;

      $getdokumen = DB::table('pengaduan')
                      ->join('dokumen_pengaduan', 'pengaduan.id' , '=', 'dokumen_pengaduan.pengaduan_id')
                      ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                      ->select('*', 'pengaduan.created_at', 'pengaduan.updated_at')
                      ->get();

      $binddatapengaduan = LihatPengaduanModel::find($id);
      $data['binddatapengaduanmutasi'] = $binddatapengaduan;

      $binddatamutasi = DataMutasiModel::find($id);
      $data['binddatamutasi'] = $binddatamutasi;

      $data['getdokumen'] = $getdokumen;

      return view('pages/tanggapipengaduan')->with('data', $data);
  }

  public function tanggapmutasi(Request $request)
  {
    $update = Pengaduan::find($request->id);
    $update->flag_tanggap = 1;
    $update->flag_verifikasi = 1;
    $update->save();

    $set = new TanggapanModel;
    $set->id_pengaduan = $request->id;
    $set->id_userskpd = Auth::user()->id;
    $set->tanggapan = $request->tanggapan;
    $set->save();

    return redirect()->route('tanggap.index')->with('message', 'Berhasil menanggapi pengaduan.');
  }

}
