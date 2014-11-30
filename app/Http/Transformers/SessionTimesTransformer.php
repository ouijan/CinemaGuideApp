<?php namespace App\Http\Transformers;

use App\Http\Transformers\MoviesTransformer;
use App\Http\Transformers\CinemasTransformer;

class SessionTimesTransformer extends Transformer {
	
	/**
	 *  Transform an item
	 *  
	 *  @param  $item
	 *  @return array
	 */
	public function transform($session)
	{
		return [
			'id'		=> $session['id'],
			'cinema'	=> $session['cinema_id'],
			'movie'		=> $session['movie_id'],
			'time' 		=> $session['date_time'],
		];
	}

}