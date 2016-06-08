<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password', 'noktp', 'level', 'status'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function masterskpd()
    {
      return $this->belongsTo('App\MasterSKPD', 'id_skpd');
    }

    public function pengaduan()
    {
      return $this->hasMany('App\Models\LihatPengaduanModel', 'id');
    }
}
