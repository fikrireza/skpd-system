<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\User;
use Hash;
use Mail;
use DB;

class RegisterController extends Controller
{
    public function wargaregisterprocess(Request $request)
    {
      // dd($request);
      $activation_code = str_random(30).time();
      $user = new User;
      $user->nama = $request->nama;
      $user->email = $request->email;
      $user->password = Hash::make($request->password);
      //0:superadmin, 1:warga, 2:skpd
      $user->level = 1;
      //0:tidak aktif, 1:aktif, 2:blocked
      $user->activated = 0;
      $user->activation_code = $activation_code;
      $user->save();

      Mail::send('verify', ['activation_code' => $activation_code], function($message){
        $message->from('no-reply@simpedu.tangerangkab.go.id', 'Administrator');
        $message->to(Input::get('email'), Input::get('name'))->subject('Aktifasi Akun SIMPEDU');
      });

      return redirect()->route('homepages')->with('message', "Silahkan lakukan aktivasi akun pada email anda.");
    }

    public function verify($code)
    {
      $user = User::where('activation_code', $code)->first();
      $user->activation_code = null;
      $user->activated = 1;
      $user->save();

      return redirect()->route('homepages')->with('message', "Akun anda telah aktif. Silahkan lakukan login.");
    }
}
