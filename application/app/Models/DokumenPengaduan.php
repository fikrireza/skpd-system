<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DokumenPengaduan extends Model
{
    protected $table = 'dokumen_pengaduan';

    protected $fillable = [
        'url_dokumen', 'pengaduan_id'
    ];

    public function pengaduan()
    {
      return $this->hasMany('App\Models\Pengaduan', 'id');
    }
}
