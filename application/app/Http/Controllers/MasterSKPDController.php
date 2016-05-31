<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\MasterSKPD;

class MasterSKPDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $getskpd = MasterSKPD::all();

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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
