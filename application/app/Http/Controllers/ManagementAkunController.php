<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

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
      $activation_code = str_random(30).time();

      $message = [
        'level.required' => 'Level harus diisi.',
        'level.not_in' => 'Level harus dipilih.',
        'id_skpd.required' => 'SKPD harus diisi.',
        'id_skpd.not_in' => 'SKPD harus dipilih.',
        'email.required' => 'Email harus diisi.',
        'email.email' => 'Format email tidak valid.',
        'email.unique' => 'Email telah terdaftar.',
      ];

      $akses = "";
      if($request->level=="0") {
        $validator = Validator::make($request->all(), [
          'level' => 'required|not_in:-- Pilih --',
          'email' => 'required|email|unique:users,email',
        ], $message);

        if($validator->fails()) {
          return redirect()->route('managementakun.index')->withErrors($validator)->withInput();
        }

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
      else if($request->level=="2") {
        $validator = Validator::make($request->all(), [
          'level' => 'required|not_in:-- Pilih --',
          'id_skpd' => 'required|not_in:-- Pilih --',
          'email' => 'required|email|unique:users,email',
        ], $message);

        if($validator->fails()) {
          return redirect()->route('managementakun.index')->withErrors($validator)->withInput();
        }

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
      } else {
        $validator = Validator::make($request->all(), [
          'level' => 'required|not_in:-- Pilih --',
          'id_skpd' => 'required|not_in:-- Pilih --',
          'email' => 'required|email|unique:users,email',
        ], $message);

        if($validator->fails()) {
          return redirect()->route('managementakun.index')->withErrors($validator)->withInput();
        }
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
      $set->save();

      return redirect()->route('managementakun.index')->with('message', 'Berhasil mengubah data akun.');
    }
}
