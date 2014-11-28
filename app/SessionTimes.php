<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SessionTimes extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'session_times';

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
	protected $fillable = ['movie_id','cinema_id','date_time'];

	/**
	 * Many SessionTimes to One Movie
	 * @return Table Relationship
	 */
	public function movies()
	{
		return $this->belongsToOne('App\Movies');
	}

	/**
	 * Many SessionTimes to One Cinema
	 * @return Table Relationship
	 */
	public function cinemas()
	{
		return $this->belongsToOne('App\Cinemas');
	}

}
