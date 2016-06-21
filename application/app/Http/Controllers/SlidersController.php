<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\SlidersRequest;
use App\Http\Controllers\Controller;
use App\Models\Sliders;
use App\User;


class SlidersController extends Controller
{
  public function index()
  {
    $sliders = Sliders::join('users', 'users.id', '=', 'sliders.id_users')
                        ->select('users.nama', 'sliders.*')
                        ->orderby('sliders.updated_at', 'desc')
                        ->get();
    
    return view('admin.slider', compact('sliders'));
  }

  public function upload(SlidersRequest $request)
  {
    $imageName = $request->file('url_gambar')->getClientOriginalName();
	  $request->file('url_gambar')->move( base_path() . '\..\images', $imageName );

    $Slider = Sliders::create([
              'id_users' => $request->input('id_users'),
              'url_gambar' => $imageName,
              'flag_slider' => 1
    ]);

    return redirect()->route('slider')->with('message', 'Slider Berhasil DiUpload');
  }

  public function update($id){
		$Slider = Sliders::findOrFail($id);

		if($Slider->flag_slider == 1){
			$Slider->flag_slider = 0;
			$Slider->save();
      return redirect('/admin/slider')->with('message', 'Slider Telah Di Non Aktifkan');
		}elseif($Slider->flag_slider == 0){
			$Slider->flag_slider = 1;
			$Slider->save();
      return redirect('/admin/slider')->with('message', 'Slider Telah DiAktifkan');
		}
	}

}
