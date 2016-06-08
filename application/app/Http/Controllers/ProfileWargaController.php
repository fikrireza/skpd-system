<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ProfileWargaRequest;
use App\User;
use DB;
use Carbon;
use Auth;
use Hash;
use Validator;

class ProfileWargaController extends Controller
{
  /**
   * Authentication controller.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('isWarga');
  }

  public function index()
  {
    $id = Auth::user()->id;
    $profiles = User::find($id);
    return view('front.profile')->with('profiles', $profiles);
  }

  public function store(ProfileWargaRequest $request)
  {
    $file = $request->file('url_photo');

    if ($file == null) {
      $profil = User::find($request->id);
      $profil->nama = $request->nama;
      $profil->noktp = $request->noktp;
      $profil->tgl_lahir = $request->tgl_lahir;
      $profil->notelp = $request->notelp;
      $profil->jeniskelamin = $request->jeniskelamin;
      $profil->alamat = $request->alamat;
      $profil->save();
    } else {
      $photo_name = time().'-'.$file->getClientOriginalName();
      $file->move(base_path().'\..\images', $photo_name);

      $profil = User::find($request->id);
      $profil->nama = $request->nama;
      $profil->noktp = $request->noktp;
      $profil->tgl_lahir = $request->tgl_lahir;
      $profil->notelp = $request->notelp;
      $profil->jeniskelamin = $request->jeniskelamin;
      $profil->alamat = $request->alamat;
      $profil->url_photo = $photo_name;
      $profil->save();
    }

    return redirect()->route('beranda')->with('ubahprofile', 'Berhasil mengubah profile.');
  }
}
