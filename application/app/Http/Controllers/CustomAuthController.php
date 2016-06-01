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
    public function logoutprocess()
    {
      session()->flush();
      Auth::logout();
      return redirect()->route('homepages');
    }

    public function loginprocess(Request $request)
    {
      if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password, 'activated'=>1]))
      {
        $user = Auth::user();
        if($user->level==1)
        {
          return redirect('beranda');
        }
        else if($user->level==2)
        {
          return redirect('dashboard');
        }
        else if($user->level==0)
        {
          return redirect('dashboard');
        }
      }
      else
      {
        return redirect()->route('homepages')->with('messageloginfailed', "Periksa kembali email dan password anda.");
      }
      // if(!$user)
      // {
      //   Session::flash('message','Email belum diaktifasi');
      //   return redirect('/login');
      // }

      // return redirect('/home');

      // if($request->email=="dudy@gmail.com")
      // {
      //   session()->put('namalogin', 'Dudy');
      //   session()->put('akses', 'kesehatan');
      //   return redirect('dashboard');
      // }
      // else if($request->email=="bayu@gmail.com")
      // {
      //   session()->put('namalogin', 'Bayu');
      //   session()->put('akses', 'pendidikan');
      //   return redirect('dashboard');
      // }
      // else if($request->email=="fikri@gmail.com")
      // {
      //   session()->put('namalogin', 'Fikri');
      //   session()->put('akses', 'administrator');
      //   return redirect('dashboard');
      // }
      // else if($request->email=="dika@gmail.com")
      // {
      //   session()->put('namalogin', 'Dika');
      //   session()->put('akses', 'warga');
      //   return redirect('beranda');
      // }
    }
}
