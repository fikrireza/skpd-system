<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Session;
use App\User;
use Hash;

class CustomAuthController extends Controller
{
    public function getlogout()
    {
      session()->flush();
      Auth::logout();
      return redirect()->route('welcomepage');
    }

    public function loginprocess(Request $request)
    {
      if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password, 'activated'=>1, 'flag_user'=>1]))
      {
        $user = Auth::user();
        if($user->level==1)
        {
            $set = User::find(Auth::user()->id);
            $getcounter = $set->login_counter;
            $set->login_counter = $getcounter+1;
            $set->save();

            if($user->jeniskelamin == null || $user->noktp == null || $user->alamat == null){
                return redirect('profil')->with('messagefilled', "Harap Lengkapi Profil Anda Dengan Sebenarnya");
            }

            return redirect('/');
        }
        else
        {
          $set = User::find(Auth::user()->id);
          $getcounter = $set->login_counter;
          $set->login_counter = $getcounter+1;
          $set->save();

          if($getcounter=="0") {
            return redirect('dashboard')->with('firsttimelogin', "Anda telah berhasil melakukan aktifasi akun. Selanjutnya, anda bisa menggunakan akun ini untuk login ke dalam sistem dan dapat menggunakan fitur yang telah disediakan.");
          } else {
            return redirect('dashboard');
          }
        }
      }
      else
      {
        return redirect()->route('welcomepage')->with('messageloginfailed', "Periksa kembali email dan password anda.");
      }
    }
}
