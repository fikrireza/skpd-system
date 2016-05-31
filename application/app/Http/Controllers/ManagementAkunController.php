<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\MasterSKPD;
use App\User;
use Mail;

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

      $akses;
      if($request->level==0) {
        $akses = "Administrator";
        $user = new User;
        $user->email = $request->email;
        //0:admin, 1:warga, 2:skpd
        $user->level = $request->level;
        //0:tidak aktif, 1:aktif, 2:blocked
        $user->activated = 0;
        $user->activation_code = $activation_code;
        $user->save();
      }
      else if($request->level==2){
        $akses = "User SKPD";
        $user = new User;
        $user->email = $request->email;
        //0:admin, 1:warga, 2:skpd
        $user->level = $request->level;
        //0:tidak aktif, 1:aktif, 2:blocked
        $user->activated = 0;
        $user->id_skpd = $request->id_skpd;
        $user->activation_code = $activation_code;
        $user->save();
      }

      //KIRIM EMAIL CUUUUUI
      $data = array([
          'akses' => $akses,
          'activation_code' => $activation_code
        ]);

      Mail::send('verifypemda', ['data' => $data], function($message) {
        $message->to(Input::get('email'), Input::get('email'))->subject('Aktifasi Akun SIMPEDU');
      });

      return redirect()->route('managementakun.index')->with('message', 'Berhasil menambahkan akun baru. Akun baru harus diaktifasi terlebih dahulu oleh pengguna. Email aktifasi telah dikirimkan ke alamat email terkait.');
    }
}
