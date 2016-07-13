<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\TentangRequest;
use App\Http\Controllers\Controller;
use App\Models\Tentang;
use App\User;

class TentangController extends Controller
{
  /**
   * Authentication controller.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('isAdmin');
  }

  public function index()
  {
    $tentang = Tentang::join('users', 'users.id', '=', 'tentang.id_users')
                        ->select('users.nama', 'tentang.*')
                        ->first();
                        // dd($tentang);
    return view('admin.tentang', compact('tentang'));
  }

  public function store(TentangRequest $request)
  {
    //dd($request->only('isi_tentang'));
    $tentang = new Tentang;
    $tentang->isi_tentang = $request->isi_tentang;
    $tentang->id_users  = $request->id_users;
    $tentang->save();

    return redirect()->route('tentang')->with('simpan', "Berhasil Membuat Tentang SIMPEDU.");
  }

  public function update(TentangRequest $request)
  {
    $tentang = Tentang::find($request->id);
    $tentang->isi_tentang = $request->isi_tentang;
    $tentang->id_users  = $request->id_users;
    $tentang->update();

    return redirect()->route('tentang')->with('simpan', "Berhasil Merubah Tentang SIMPEDU.");
  }

}
