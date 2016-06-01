<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\User;
use Hash;
use Mail;
use DB;
use Auth;

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
      //0:admin, 1:warga, 2:skpd
      $user->level = 1;
      //0:belum aktifasi, 1:sudah aktif
      $user->activated = 0;
      $user->activation_code = $activation_code;
      $user->save();

      $data = array([
          'nama' => $request->nama,
          'activation_code' => $activation_code
        ]);

      Mail::send('verify', ['data' => $data], function($message) {
        // $message->from('no-reply@simpedu.tangerangkab.go.id', 'Administrator');
        $message->to(Input::get('email'), Input::get('name'))->subject('Aktifasi Akun SIMPEDU');
      });

      return redirect()->route('homepages')->with('message', "Silahkan lakukan aktivasi akun pada email anda.");
    }

    public function verify($code)
    {
      $user = User::where('activation_code', $code)->first();
      if($user->level=="1") //warga
      {
        $user->activation_code = null;
        $user->activated = 1;
        $user->save();

        return redirect()->route('homepages')->with('message', "Akun anda telah aktif. Silahkan lakukan login.");
      }
      else // selain warga: administrator / user skpd
      {
        return view('pages.login')->with('email', $user->email);
      }
    }

    public function setpassword(Request $request)
    {
      $user = User::where('email', $request->email)->first();
      $user->password = Hash::make($request->password);
      $user->activation_code = null;
      $user->activated = 1;
      $user->save();

      if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password, 'activated'=>1]))
      {
        $set = User::find(Auth::user()->id);
        $getcounter = $set->login_counter;
        $set->login_counter = $getcounter+1;
        $set->save();

        return redirect()->route('dashboard')->with('firsttimelogin', "Anda telah berhasil melakukan aktifasi akun. Selanjutnya, anda bisa menggunakan akun ini untuk login ke dalam sistem dan dapat menggunakan fitur yang telah disediakan.");
      }
      else {
        return redirect()->route('homepages')->with('message', "Silahkan lakukan login.");
      }
    }
}
