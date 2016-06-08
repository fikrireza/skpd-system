<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\MasterSKPD;
use DB;
use App\TopikAduan;

class MasterSKPDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $getskpd = MasterSKPD::paginate(10);

      return view('pages.dataskpd')->with('getskpd', $getskpd);
    }

    public function nonaktif($id)
    {
      $set = MasterSKPD::find($id);
      $set->flag_skpd = 0;
      $set->save();

      return redirect()->route('dataskpd.index')->with('message', "Berhasil mengubah status SKPD.");
    }

    public function aktif($id)
    {
      $set = MasterSKPD::find($id);
      $set->flag_skpd = 1;
      $set->save();

      return redirect()->route('dataskpd.index')->with('message', "Berhasil mengubah status SKPD.");
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
      $set = new MasterSKPD;
      $set->kode_skpd = $request->kodeskpd;
      $set->nama_skpd = $request->namaskpd;
      $set->flag_skpd = $request->flagskpd;
      $set->save();

      return redirect()->route('dataskpd.index')->with('message', "Berhasil menambahkan data SKPD baru.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $set = MasterSKPD::find($request->idskpd);
        $set->kode_skpd = $request->kodeskpd;
        $set->nama_skpd = $request->namaskpd;
        $set->flag_skpd = $request->flagskpd;
        $set->save();

        return redirect()->route('dataskpd.index')->with('message', "Berhasil mengubah data SKPD.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $set = MasterSKPD::find($id);
      $set->delete();

      return redirect()->route('dataskpd.index')->with('message', "Berhasil menghapus data SKPD.");
    }

    public function bind($id)
    {
      $get = MasterSKPD::find($id);
      return $get;
    }

    public function getDataSKPD()
    {
      $get = DB::table('master_skpd')
                  ->leftJoin('topik_pengaduan', 'master_skpd.id', '=', 'topik_pengaduan.id_skpd')
                  ->leftJoin('pengaduan', 'topik_pengaduan.id', '=', 'pengaduan.topik_id')
                  ->select('master_skpd.kode_skpd', 'master_skpd.nama_skpd', DB::raw('count(pengaduan.id) as jumlahpengaduan'), 'master_skpd.flag_skpd', 'master_skpd.id')
                  ->groupBy('master_skpd.id')
                  ->get();

      return view('pages.listdataskpdbytopik')->with('getskpd', $get);
    }

    public function detailSKPD($id)
    {
      $getskpd = MasterSKPD::where('id', $id)->get();
      $gettopik = DB::table('topik_pengaduan')
                    ->select('topik_pengaduan.id', 'topik_pengaduan.kode_topik', 'topik_pengaduan.nama_topik', DB::raw('count(pengaduan.id) as jumlahpengaduan'))
                    ->join('pengaduan', "topik_pengaduan.id", '=', 'pengaduan.topik_id')
                    ->where('topik_pengaduan.id_skpd', $id)
                    ->groupBy('topik_pengaduan.id')
                    ->paginate(5);
      return view('pages/topikbyskpd', compact('getskpd', 'gettopik'));
    }

}
