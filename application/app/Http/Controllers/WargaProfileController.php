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

        $getdatawarga = DataWargaModel::where('id', $id)->get();
        $getdatajumlahpengaduan = LihatPengaduanModel::where('warga_id', $id)->count('warga_id');
        $getdatapengaduan = LihatPengaduanModel::where('warga_id', $id)->paginate(5);
        $idlogin = Auth::user()->id;
        $userid = User::find($idlogin);

        $getdataskpd = MasterSKPD::where('id', $userid->id_skpd)->get();
        $tanggapan = TanggapanModel::where('id_userskpd', $userid->id)->get();

        return view('pages.wargaprofile')->with('data', compact('getdatawarga', 'getdatajumlahpengaduan', 'getdatapengaduan', 'tanggapan', 'getdataskpd'));
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
