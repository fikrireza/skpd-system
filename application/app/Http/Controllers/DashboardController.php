<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\DataWargaModel;
use App\Models\LihatPengaduanModel;
use App\Models\TanggapanModel;
use App\Models\TopikAduan;
use App\MasterSKPD;
use App\User;
use DB;
use Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $getlihatpengaduan = LihatPengaduanModel::select('*')->orderby('created_at','desc')->limit(3)->get();
      $getcountpengaduan = LihatPengaduanModel::count('warga_id');

      $getcountpengaduantelahditanggapi = LihatPengaduanModel::where('flag_tanggap', '1')->count('flag_tanggap');

      $getuser = User::select('*')->where('level', '1')->limit(8)->get();
      $getcountuser = User::where('level', '1')->count('activated');
      // dd($getlihatpengaduan);

      $recordusers = DB::table('users')->select(DB::raw('*'))
                  ->whereRaw('Date(created_at) = CURDATE()')
                  ->where('level', '1')->count('activated');
      // dd($recordusers);
      return view('pages.dashboard', compact('getcountpengaduan','getcountpengaduantelahditanggapi','getcountuser','getlihatpengaduan', 'getuser','recordusers'));
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

    public function getDataSKPD()
    {

    }

    public function detailSKPD($id)
    {

    }

}
