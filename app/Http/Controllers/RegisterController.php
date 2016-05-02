<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Hash;

class RegisterController extends Controller
{
    public function registerprocess(Request $request)
    {
      $user = new User;
      $user->nama = $request->nama;
      $user->email = $request->email;
      $user->password = Hash::make($request->password);
      $user->save();

      return redirect('dashboard');
    }
}
