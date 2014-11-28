<?php namespace App\Http\Transformers;


class CinemasTransformer extends Transformer {
	
	/**
	 *  Transform an item
	 *  
	 *  @param  $item
	 *  @return array
	 */
	public function transform($cinema)
	{
		return [
			'id'	=> $cinema['id'],
			'name'	=> $cinema['name'],
			'address'	=> $cinema['address'],
			'geo' => [
				'latitude'	=> $cinema['geo_lat'],
				'longitude'	=> $cinema['geo_long'],
			],
		];
	}
}