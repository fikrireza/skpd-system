<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterSKPD extends Model
{
    protected $table = 'master_skpd';

    protected $fillable = [
        'kode_skpd', 'nama_skpd', 'flag_skpd'
    ];
}
