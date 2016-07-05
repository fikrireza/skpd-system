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
      $getmasterskpdtopik = DB::table('pengaduan')
                          ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                          ->join('users', 'pengaduan.warga_id', '=', 'users.id')
                          ->join('master_skpd', 'topik_pengaduan.id_skpd', '=', 'master_skpd.id')
                          ->select('*' , 'pengaduan.id as id_pengaduan')
                          ->where('topik_pengaduan.id_skpd', $id)
                          ->get();
                  //  dd($getmasterskpdtopik);

      return view('pages.pengaduanbytopik')->with('data', compact('getmasterskpdtopik'));
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
