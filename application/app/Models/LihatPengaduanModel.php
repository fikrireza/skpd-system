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
			'warga_id', 'topik_id', 'flag_verifikasi',
			'flag_mutasi', 'flag_tayang', 'flag_rahasia', 'flag_anonim', 'flag_tanggap',
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

	public function user()
	{
		return $this->belongsTo('App\User', 'warga_id');
	}

	public function topik()
	{
		return $this->belongsTo('App\TopikAduan', 'topik_id');
	}

	public function tanggapan()
	{
		return $this->belongsTo('App\Models\Tanggapan', 'id');
	}

}
