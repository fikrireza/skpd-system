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

class PengaduanByTopikController extends Controller
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

      $getmasterskpd = DB::table('pengaduan')
                          ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                          ->join('users', 'pengaduan.warga_id', '=', 'users.id')
                          ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                          ->select('*' , 'pengaduan.id as id_pengaduan', 'pengaduan.created_at', 'pengaduan.updated_at')
                          ->where('topik_pengaduan.id_skpd', $id)
                          ->get();

    $getmasterskpdtopik = DB::table('topik_pengaduan')
                  ->join('pengaduan', "topik_pengaduan.id", '=', 'pengaduan.topik_id')
                  ->join('users', 'pengaduan.warga_id', '=', 'users.id')
                  ->where('pengaduan.topik_id', $id)
                  ->select('*' , 'pengaduan.id as id_pengaduan', 'pengaduan.created_at', 'pengaduan.updated_at')
                  ->get();

      return view('pages.pengaduanbytopik')->with('data', compact('getmasterskpd','getmasterskpdtopik'));
    }
}
