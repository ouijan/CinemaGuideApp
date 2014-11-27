<?php namespace App\Http\Transformers;


class MovieTransformer extends Transformer {
	
	/**
	 *  Transform an item
	 *  
	 *  @param  $item
	 *  @return array
	 */
	public function transform($movie)
	{
		return [
			'title'	=> $movie['title'],
		];
	}
}