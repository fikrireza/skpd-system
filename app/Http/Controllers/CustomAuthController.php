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

    public function doRegister(Request $request)
    {
      dd($request);
    }

    public function loginprocess(Request $request)
    {
      if($request->email=="dudy@gmail.com")
      {
        session()->put('namalogin', 'Dudy');
        session()->put('akses', 'kesehatan');
        return redirect('dashboard');
      }
      else if($request->email=="bayu@gmail.com")
      {
        session()->put('namalogin', 'Bayu');
        session()->put('akses', 'pendidikan');
        return redirect('dashboard');
      }
      else if($request->email=="fikri@gmail.com")
      {
        session()->put('namalogin', 'Fikri');
        session()->put('akses', 'administrator');
        return redirect('dashboard');
      }
      else if($request->email=="dika@gmail.com")
      {
        session()->put('namalogin', 'Dika');
        session()->put('akses', 'warga');
        return redirect('beranda');
      }
    }
}
