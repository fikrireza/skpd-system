<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\SyaratKetentuanRequest;
use App\Http\Controllers\Controller;
use App\Models\SyaratKetentuan;
use App\User;

class SyaratKetentuanController extends Controller
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
    $syarat = syaratketentuan::join('users', 'users.id', '=', 'syaratketentuan.id_users')
                              ->select('users.nama', 'syaratketentuan.*')
                              ->first();

    return view('admin.syaratketentuan', compact('syarat'));
  }

  public function store(SyaratKetentuanRequest $request)
  {
    $syarat = new SyaratKetentuan;
    $syarat->isi_syarat = $request->isi_syarat;
    $syarat->id_users  = $request->id_users;
    $syarat->save();

    return redirect()->route('syaratketentuan')->with('simpan', "Berhasil Membuat Syarat & Ketentuan SIMPEDU.");
  }

  public function update(SyaratKetentuanRequest $request)
  {
    $syarat = SyaratKetentuan::find($request->id);
    $syarat->isi_syarat = $request->isi_syarat;
    $syarat->id_users  = $request->id_users;
    $syarat->update();

    return redirect()->route('syaratketentuan')->with('simpan', "Berhasil Merubah Syarat & Ketentuan SIMPEDU.");
  }
}
