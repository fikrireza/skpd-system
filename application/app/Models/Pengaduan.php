<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';

    protected $fillable = [
        'judul_pengaduan', 'isi_pengaduan', 'warga_id', 'topik_id'
    ];

    public function topikpengaduan()
    {
      return $this->hasMany('App\TopikAduan', 'id');
    }

    public function user()
    {
      return $this->hasMany('App\User', 'id');
    }
}
