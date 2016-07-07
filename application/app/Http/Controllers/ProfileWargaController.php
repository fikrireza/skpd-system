<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ProfileWargaRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests;
use App\Models\Pengaduan;
use App\User;
use DB;
use Carbon;
use Auth;
use Hash;
use Validator;
use Image;

class ProfileWargaController extends Controller
{
  protected $indexBeranda;
  /**
   * Authentication controller.
   *
   * @return void
   */
  public function __construct(WargaController $indexBeranda)
  {
    $this->middleware('isWarga');
    $this->indexBeranda = $indexBeranda;
  }

  public function index()
  {
    $id = Auth::user()->id;
    $profiles = User::find($id);

    $pengaduanWid = Pengaduan::where('warga_id', '=', $id)->count();
    $tanggapWid  = Pengaduan::where('warga_id', '=', $id)->where('flag_tanggap', '=', 1)->count();

    $skpdonly = $this->indexBeranda->index()->skpdonly;
    $AllTopiks = $this->indexBeranda->index()->AllTopiks;

    return view('front.profile', compact('profiles', 'pengaduanWid', 'tanggapWid', 'skpdonly', 'AllTopiks' ));
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
      $photo_name = time(). '.' . $file->getClientOriginalExtension();
      Image::make($file)->resize(200,200)->save('images/'. $photo_name);

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

  public function changePassword(ChangePasswordRequest $request)
  {
    $user = User::find($request->id);

    if(Hash::check($request->oldpass, $user->password))
    {
      $get->password = Hash::make($request->newpass);
      $get->save();

      return redirect()->route('profilwarga')->with('message', "Berhasil mengganti password.");
    }
    else {
      return redirect()->route('profilwarga')->with('erroroldpass', 'Mohon masukkan password lama anda dengan benar.');
    }
  }

}
