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
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        $idlogin = Auth::user()->id;
        $userid = User::find($idlogin);

        $getdatapengaduanbelumtanggap = DB::table('pengaduan')
                            ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                            ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                            ->join('users', 'master_skpd.id', '=', 'users.id_skpd')
                            ->where('master_skpd.id', $userid->id_skpd)
                            ->where('flag_mutasi', '0')
                            ->where('flag_tanggap', '0')
                            ->where('pengaduan.warga_id', $id)
                            ->orderby('pengaduan.created_at', 'desc')
                            ->paginate(5);

      $getdatapengaduansudahtanggap = DB::table('pengaduan')
                          ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                          ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                          ->join('users', 'master_skpd.id', '=', 'users.id_skpd')
                          ->join('tanggapan', 'pengaduan.id', '=', 'tanggapan.id_pengaduan')
                          ->where('master_skpd.id', $userid->id_skpd)
                          ->where('flag_mutasi', '0')
                          ->where('flag_tanggap', '1')
                          ->where('pengaduan.warga_id', $id)
                          ->orderby('pengaduan.created_at', 'desc')
                          ->select('*', 'tanggapan.created_at as created_tanggapan')
                          ->paginate(5);

        $getdatajumlahpengaduanall = LihatPengaduanModel::where('warga_id', $id)->count('warga_id');
        $getdatajumlahpengaduan = DB::table('pengaduan')
                            ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                            ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                            ->join('users', 'master_skpd.id', '=', 'users.id_skpd')
                            ->where('master_skpd.id', $userid->id_skpd)
                            ->where('flag_mutasi', '0')
                            ->where('pengaduan.warga_id', $id)
                            ->count('warga_id');

        $getdatawarga = DataWargaModel::where('id', $id)->get();
        $getdataskpd = MasterSKPD::where('id', $userid->id_skpd)->get();

        $getdatapengaduanbelumtanggapall = DB::table('pengaduan')
                            ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                            ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                            ->join('users', 'master_skpd.id', '=', 'users.id_skpd')
                            // ->where('master_skpd.id', $userid->id_skpd)
                            ->where('flag_mutasi', '0')
                            ->where('flag_tanggap', '0')
                            ->where('pengaduan.warga_id', $id)
                            ->orderby('pengaduan.created_at', 'desc')
                            ->paginate(5);
        $getdatapengaduansudahtanggapall = DB::table('pengaduan')
                            ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                            ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                            ->join('users', 'master_skpd.id', '=', 'users.id_skpd')
                            ->join('tanggapan', 'pengaduan.id', '=', 'tanggapan.id_pengaduan')
                            // ->where('master_skpd.id', $userid->id_skpd)
                            ->where('flag_mutasi', '0')
                            ->where('flag_tanggap', '1')
                            ->where('pengaduan.warga_id', $id)
                            ->orderby('pengaduan.created_at', 'desc')
                            ->select('*', 'tanggapan.created_at as created_tanggapan')
                            ->paginate(5);

        return view('pages.wargaprofile')->with('data', compact('getdatapengaduanbelumtanggap', 'getdatapengaduansudahtanggap',
        'getdatajumlahpengaduan', 'getdatajumlahpengaduanall',
        'getdatawarga','getdataskpd',
        'getdatapengaduanbelumtanggapall', 'getdatapengaduansudahtanggapall'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

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


}
