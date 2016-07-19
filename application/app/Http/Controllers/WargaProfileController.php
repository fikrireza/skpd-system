<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\DataWargaModel;
use App\Models\LihatPengaduanModel;
use App\Models\TanggapanModel;
use App\TopikAduan;
use App\MasterSKPD;
use App\User;
use DB;
use Auth;

class WargaProfileController extends Controller
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
    public function show($id)
    {
      $idlogin = Auth::user()->id;
      $userid = User::find($idlogin);

      $getdatapengaduansudahtanggap = DB::table('pengaduan')
                          ->leftJoin('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                          ->leftJoin('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                          ->leftJoin('tanggapan', 'pengaduan.id', '=', 'tanggapan.id_pengaduan')
                          ->leftJoin('users', 'tanggapan.id_userskpd', '=', 'users.id')
                          ->where('master_skpd.id', $userid->id_skpd)
                          ->where('pengaduan.warga_id', $id)
                          ->orderby('pengaduan.created_at', 'desc')
                          ->select('*', 'tanggapan.created_at as created_tanggapan', 'pengaduan.created_at as created_pengaduan')
                          ->paginate(5);

        $getdatajumlahpengaduanall = LihatPengaduanModel::where('warga_id', $id)->count('warga_id');

        $getdatajumlahpengaduan = DB::table('pengaduan')
                            ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                            ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                            ->join('users', 'master_skpd.id', '=', 'users.id_skpd')
                            ->where('master_skpd.id', $userid->id_skpd)
                            ->where('users.id', $userid->id)
                            ->where('pengaduan.warga_id', $id)
                            ->count('warga_id');

        $getdatawarga = DataWargaModel::where('id', $id)->get();
        $getdataskpd = MasterSKPD::where('id', $userid->id_skpd)->get();


        $getdatapengaduansudahtanggapall = DB::table('pengaduan')
                            ->leftJoin('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                            ->leftJoin('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                            ->leftJoin('tanggapan', 'pengaduan.id', '=', 'tanggapan.id_pengaduan')
                            ->leftJoin('users', 'tanggapan.id_userskpd', '=', 'users.id')
                            ->where('pengaduan.warga_id', $id)
                            ->orderby('pengaduan.created_at', 'desc')
                            ->select('*', 'tanggapan.created_at as created_tanggapan', 'pengaduan.created_at as created_pengaduan')
                            ->paginate(5);

        return view('pages.wargaprofile')->with('data', compact('getdatapengaduanbelumtanggap', 'getdatapengaduansudahtanggap',
        'getdatajumlahpengaduan', 'getdatajumlahpengaduanall',
        'getdatawarga','getdataskpd',
        'getdatapengaduanbelumtanggapall', 'getdatapengaduansudahtanggapall'));
    }

}
