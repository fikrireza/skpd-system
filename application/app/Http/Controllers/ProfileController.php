<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;

class ProfileController extends Controller
{
  public function index()
  {
    $id = Auth::user()->id;
    $getprofile = User::find($id);

    // return view('pages.userskpdprofile')->;
  }
}
