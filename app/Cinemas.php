<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cinemas extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'cinemas';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];

	/**
	 * The attributes that can be mass assigned.
	 *
	 * @var array
	 */
	protected $fillable = ['name','address','get_lat','geo_long'];


	/**
	 * One Cinema to many SessionTimes
	 * @return [type] [description]
	 */
	public function sessionTimes()
	{
		return $this->hasMany('App\SessionTimes', 'cinema_id');
	}

}
