<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;
use Hash;
use Validator;

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

  public function changePassword(Request $request)
  {
    $get = User::find($request->id);

    $messages = [
      'oldpass.required' => "Mohon isi password lama anda.",
      'newpass.required' => "Mohon isi password baru anda.",
      'newpass.confirmed' => "Mohon isi konfirmasi password baru anda dengan benar.",
      'newpass_confirmation.required' => "Mohon isi konfirmasi password baru anda.",
    ];

    $validator = Validator::make($request->all(), [
      'oldpass' => 'required',
      'newpass' => 'required|confirmed',
      'newpass_confirmation' => 'required'
    ], $messages);

    if ($validator->fails()) {
      return redirect()->route('my.profile')->withErrors($validator)->withInput();
    }

    if(Hash::check($request->oldpass, $get->password))
    {
      $get->password = Hash::make($request->newpass);
      $get->save();

      return redirect()->route('my.profile')->with('message', "Berhasil mengganti password.");
    }
    else {
      return redirect()->route('my.profile')->with('erroroldpass', 'Mohon masukkan password lama anda dengan benar.');
    }
  }
}
