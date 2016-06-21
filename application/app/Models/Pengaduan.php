<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';

    protected $fillable = [
        'judul_pengaduan', 'isi_pengaduan', 'slug', 'warga_id', 'topik_id', 'flag_anonim', 'flag_rahasia', 'flag_verifikasi', 'flag_mutasi', 'flag_tayang', 'flag_tanggap'
    ];

    public function topikpengaduan()
    {
      return $this->belongs_to('App\TopikAduan');
    }

    public function user()
    {
      return $this->hasMany('App\User', 'id');
    }

    public function tanggapan()
    {
      return $this->hasOne('App\Models\TanggapanModel', 'id');
    }
}
