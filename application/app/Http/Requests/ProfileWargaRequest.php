<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProfileWargaRequest extends Request {

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
			'nama' => 'required',
			'noktp' => 'required',
			'url_photo' => 'mimes:jpeg,bmp,png',
			'tgl_lahir' => 'required',
			'notelp' => 'required',
      'jeniskelamin' => 'required',
			'alamat' => 'required',
		];
	}

	public function messages()
	{
		return [
			'nama.required' => 'Harap isi Nama',
			'noktp.required' => 'Harap isi No. KTP',
			'tgl_lahir.required' => 'Harap isi Tanggal Lahir',
			'url_photo.mimes' => 'Harap Input jpeg, bmp atau png.',
			'notelp.required' => 'Harap isi No. Telp',
      'jeniskelamin.required' => 'Harap isi Jenis Kelamin',
			'alamat.required' => 'Harap isi Alamat',
		];
	}

}
