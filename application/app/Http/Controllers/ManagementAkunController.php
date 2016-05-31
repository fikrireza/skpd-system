<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\MasterSKPD;
use App\User;

class ManagementAkunController extends Controller
{
    public function index()
    {
      $getskpd = MasterSKPD::all();
      return view('pages.managementakun', compact('getskpd'));
    }

    public function create(Request $request)
    {
      $activation_code = str_random(30).time();
      $user = new User;
      $user->email = $request->email;
      //0:admin, 1:warga, 2:skpd
      $user->level = $request->level;
      //0:tidak aktif, 1:aktif, 2:blocked
      $user->activated = 0;
      $user->activation_code = $activation_code;
      $user->save();

      //KIRIM EMAIL CUUUUUI

      return redirect()->route('managementakun.index')->with('message', 'Berhasil menambahkan akun baru. Akun baru harus diaktifasi terlebih dahulu oleh pengguna. Email aktifasi telah dikirimkan ke alamat email terkait.');
    }
}
