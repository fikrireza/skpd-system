<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;

class ProfileController extends Controller
{
  public function index()
  {
    $id = Auth::user()->id;
    $getprofile = User::find($id);
    // dd($getprofile);
    return view('pages.userskpdprofile')->with('getprofile', $getprofile);
  }

  public function store(Request $request)
  {
    $set = User::find($request->id);
    $set->nama = $request->nama;
    $set->noktp = $request->noktp;
    $set->notelp = $request->notelp;
    $set->jeniskelamin = $request->jk;
    $set->alamat = $request->alamat;
    $set->save();

    return redirect()->route('my.profile')->with('message', 'Berhasil mengubah profile.');
  }
}
