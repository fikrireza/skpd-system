<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataMutasiModel extends Model  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'mutasi';

  protected $fillable = [
      'id', 'id_pengaduan', 'id_topik',
			'id_userskpd', 'pesan_mutasi',
			'created_at', 'updated_at'
  ];
	/**
	 * Many to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\belongToMany
	 */
	public function pengaduan()
	{
		  return $this->belongsTo('App\Models\LihatPengaduanModel', 'id_pengaduan');
	}

	public function topik()
	{
			return $this->belongsTo('App\TopikAduan', 'id_topik');
	}

	public function user()
	{
			return $this->belongsTo('App\User', 'id_userskpd');
	}

}
