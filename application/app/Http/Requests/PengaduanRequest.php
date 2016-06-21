<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PengaduanRequest extends Request
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
   * Get the validation rules that apply to the request
   *
   * @return array
   *
  */
  public function rules()
  {
    return [
      'topik' => 'required',
      'judul'  => 'required|max:150|min:3',
      'isi' => 'required',
      'dokumen.*' => 'mimes:jpg,bmp,docx,xlsc,png,pdf'
    ];
  }

  public function messages()
  {
    return[
      'topik.required' => 'Wajib di Isi',
      'judul.required' => 'Wajib di Isi',
      'isi.required' => 'Wajib di Isi',
    ];
  }
}
