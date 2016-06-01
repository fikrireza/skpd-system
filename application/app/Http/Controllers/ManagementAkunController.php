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
      $getakun = User::where('level', '<>', 1)->paginate(10);
      return view('pages.managementakun', compact('getskpd', 'getakun'));
    }

    public function create(Request $request)
    {
      // dd($request);
      $activation_code = str_random(30).time();

      $akses = "";
      if($request->level=="0") {
        $akses = "Administrator";
        $user = new User;
        $user->email = $request->email;
        //0:admin, 1:warga, 2:skpd
        $user->level = $request->level;
        //0:belum aktifasi, 1:sudah aktif
        $user->activated = 0;
        $user->activation_code = $activation_code;
        $user->flag_user = 1;
        $user->save();
      }
      else if($request->level=="2"){
        $akses = "User SKPD";
        $user = new User;
        $user->email = $request->email;
        //0:admin, 1:warga, 2:skpd
        $user->level = $request->level;
        //0:belum aktifasi, 1:sudah aktif
        $user->activated = 0;
        $user->id_skpd = $request->id_skpd;
        $user->activation_code = $activation_code;
        $user->flag_user = 1;
        $user->save();
      }

      // KIRIM EMAIL CUUUUUI
      if($akses!="")
      {
        $data = array([
          'akses' => $akses,
          'activation_code' => $activation_code
          ]);

          Mail::send('verifypemda', ['data' => $data], function($message) {
            $message->to(Input::get('email'), Input::get('email'))->subject('Aktifasi Akun SIMPEDU');
          });
      }

      return redirect()->route('managementakun.index')->with('message', 'Berhasil menambahkan akun baru. Akun baru harus diaktifasi terlebih dahulu oleh pengguna. Email aktifasi telah dikirimkan ke alamat email terkait.');
    }

    public function nonaktif($id)
    {
      $set = User::find($id);
      $set->flag_user = 0;
      $set->save();

      return redirect()->route('managementakun.index')->with('message', 'Berhasil me-nonaktifkan data akun.');
    }

    public function aktif($id)
    {
      $set = User::find($id);
      $set->flag_user = 1;
      $set->save();

      return redirect()->route('managementakun.index')->with('message', 'Berhasil mengaktifkan data akun.');
    }

    public function delete($id)
    {
      $set = User::find($id);
      $set->delete();

      return redirect()->route('managementakun.index')->with('message', 'Berhasil menghapus data akun.');
    }

    public function bind($id)
    {
      $get = User::find($id);
      return $get;
    }

    public function update(Request $request)
    {
      $set = User::find($request->id_user);
      $set->level = $request->level;
      $set->id_skpd = $request->id_skpd;
      $set->email = $request->email_skpd;
      $set->save();

      return redirect()->route('managementakun.index')->with('message', 'Berhasil mengubah data akun.');
    }
}
