<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopikAduan extends Model
{
    protected $table = 'topik_pengaduan';

    protected $fillable = [
        'kode_topik', 'nama_topik', 'id_skpd'
    ];

    public function masterskpd()
    {
      return $this->belongsTo('App\MasterSKPD', 'id_skpd');
    }
}
