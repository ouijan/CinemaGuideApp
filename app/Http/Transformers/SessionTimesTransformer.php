<?php namespace App\Http\Transformers;

use App\Movies;
use App\Cinemas;

class SessionTimesTransformer extends Transformer {
	
	/**
	 *  Transform an item
	 *  
	 *  @param  $item
	 *  @return array
	 */
	public function transform($session)
	{
		$cinema = Cinemas::find($session['cinema_id']);
		$movie = Movies::find($session['movie_id']);

		return [
			'id'		=> $session['id'],
			'cinema'	=> $cinema['name'],
			'movie'		=> $movie['title'],
			'time' 		=> $session['date_time'],
		];
	}
}