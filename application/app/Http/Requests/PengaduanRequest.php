<?php

namespace App\Http\Requests;

class PengaduanRequest extends Requests
{
  /**
   * Get the validation rules that apply to the request
   *
   * @return array
   *
  */
  public function rules()
  {
    return [
      'judul_pengaduan'  => 'required|max:150|min:3',
      'isi_pengaduan' => 'required',
      'topik_id' => 'required'
    ]
  }

  public function message()
  {
    'judul_pengaduan.required' => 'Wajib di Isi',
    'isi_pengaduan.required' => 'Wajib di Isi',
    'topik_id.required' => 'Wajib di Isi',
  }
}
