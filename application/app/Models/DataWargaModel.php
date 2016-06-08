<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataWargaModel extends Model  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

  protected $fillable = [
      'id', 'nama', 'email',
			'password', 'level', 'activated', 'activated_code',
			'creator', 'id_skpd', 'noktp', 'notelp', 'jeniskelamin',
			'alamat', 'flag_user', 'login_counter', 'remember_token',
			'created_at', 'updated_at'
  ];
	/**
	 * Many to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\belongToMany
	 */
	public function masterskpd()
	{
		  return $this->belongsTo('App\MasterSKPD', 'id_skpd');
	}

}
