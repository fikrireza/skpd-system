<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Session;

class CustomAuthController extends Controller
{
    public function logoutprocess()
    {
      session()->flush();
      Auth::logout();
      return redirect('/login');
    }

    public function loginprocess(Request $request)
    {
      if($request->email=="userskpd")
      {
        session()->put('akses', 'userskpd');
        return redirect('dashboard');
      }
      else if($request->email=="administrator")
      {
        session()->put('akses', 'administrator');
        return redirect('dashboard');
      }
      else if($request->email=="warga")
      {
        session()->put('akses', 'warga');
        return redirect('beranda');
      }
      // if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {
      //   session()->put('dudy', 'dudy nih');
      //   return redirect('dashboard');
      // }
      // else {
      //   return redirect('/');
      // }
    }
}
