<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\SlidersRequest;
use App\Http\Controllers\Controller;
use App\Models\Sliders;
use App\User;


class SlidersController extends Controller
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
    $sliders = Sliders::join('users', 'users.id', '=', 'sliders.id_users')
                        ->select('users.nama', 'sliders.*')
                        ->orderby('sliders.updated_at', 'desc')
                        ->paginate(4);

    return view('admin.slider', compact('sliders'));
  }

  public function upload(SlidersRequest $request)
  {
    // dd($request);
    $imageName = $request->file('url_gambar')->getClientOriginalName();
	  $request->file('url_gambar')->move('images', $imageName );

    $Slider = Sliders::create([
              'id_users' => $request->input('id_users'),
              'url_gambar' => $imageName,
              'flag_slider' => 1
    ]);

    return redirect()->route('slider')->with('message', 'Berhasil mengupload data slider.');
  }

  public function update($id){
		$Slider = Sliders::findOrFail($id);

		if($Slider->flag_slider == 1){
			$Slider->flag_slider = 0;
			$Slider->save();
      return redirect('/admin/slider')->with('message', 'Berhasil menonaktifkan data slider');
		}elseif($Slider->flag_slider == 0){
			$Slider->flag_slider = 1;
			$Slider->save();
      return redirect('/admin/slider')->with('message', 'Berhasil mengaktifkan data slider.');
		}
	}

  public function hapus($id){
    $get = Sliders::find($id);
    $get->delete();

    return redirect('/admin/slider')->with('message', 'Berhasil menghapus data slider.');
  }

}
