<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LihatPengaduanModel extends Model  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pengaduan';

  protected $fillable = [
      'id', 'judul_pengaduan', 'isi_pengaduan',
			'warga_id', 'topik_id', 'userskpd_id', 'flag_verifikasi',
			'flag_mutasi', 'flag_tayang', 'flag_rahasia', 'flag_anonim',
			'created_at' , 'updated_at'
  ];
	/**
	 * Many to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\belongToMany
	 */
	public function master_topik()
	{
		return $this->belongsToMany('App\TopikAduan');
	}

}
