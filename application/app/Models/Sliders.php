<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sliders extends Model
{
    protected $table = 'sliders';

    protected $fillable = [
        'id_users','url_gambar','flag_slider'
    ];
}
