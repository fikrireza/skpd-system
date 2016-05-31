<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterSKPD extends Model
{
    protected $table = 'master_skpd';

    protected $fillable = [
        'kode_skpd', 'nama_skpd', 'flag_skpd'
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
