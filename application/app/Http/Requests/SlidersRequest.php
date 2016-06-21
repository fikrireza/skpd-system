<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SlidersRequest extends Request
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
      return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'url_gambar' => 'required|mimes:jpeg,bmp,png',
      'url_gambar' => 'required',
    ];
  }

  public function messages()
  {
    return[
      'url_gambar.required' => 'Gambar Wajib di isi.',
      'url_gambar.mimes' => 'Tipe Gambar Yang Valid jpeg, bmp dan png.',
    ];
  }
}
