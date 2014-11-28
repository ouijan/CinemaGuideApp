<?php namespace App\Http\Transformers;


class MoviesTransformer extends Transformer {
	
	/**
	 *  Transform an item
	 *  
	 *  @param  $item
	 *  @return array
	 */
	public function transform($movie)
	{
		return [
			'id'	=> $movie['id'],
			'title'	=> $movie['title'],
		];
	}
}