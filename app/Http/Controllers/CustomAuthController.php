<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class CustomAuthController extends Controller
{
    public function logoutprocess()
    {
      Auth::logout();
      return redirect('/');
    }

    public function loginprocess(Request $request)
    {
      if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {
        return redirect('dashboard');
      }
      else {
        return redirect('/');
      }
    }
}
