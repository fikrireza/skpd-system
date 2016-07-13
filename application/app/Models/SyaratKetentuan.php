<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SyaratKetentuan extends Model
{
  protected $table = 'syaratketentuan';

  protected $fillable = ['id_users','isi_tentang'];
}
