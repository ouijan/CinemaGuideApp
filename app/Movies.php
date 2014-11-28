<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SessionTimes;

class Movies extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'movies';

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
	protected $fillable = ['title'];

	/**
	 * One Movie to Many Session Times
	 * @return Table relationship
	 */
	public function sessionTimes()
	{
		return $this->hasMany('App\SessionTimes', 'movie_id');
	}

}
