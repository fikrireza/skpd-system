<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TanggapanModel extends Model  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tanggapan';

  protected $fillable = [
      'id', 'id_pengaduan', 'id_userskpd',
			'tanggapan', 'created_at' , 'updated_at'
  ];
	/**
	 * Many to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\belongToMany
	 */
	 public function user()
	 	{
	 		  return $this->belongsTo('App\User', 'id_userskpd');
	 	}

	public function pengaduan()
	{
	 return $this->belongsTo('App\Models\Pengaduan', 'id_pengaduan');
	}

	}
