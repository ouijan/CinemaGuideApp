<?php namespace App\Http\Transformers;



abstract class Transformer {

	/**
	 *  Transform a Collection of items
	 *  
	 *  @param  $items
	 *  @return array
	 */

	public function transformCollection(array $items)
	{
		return array_map([$this, 'transform'], $items);
	}

	/**
	 *  Transform an item
	 *  
	 *  @param  $item
	 *  @return array
	 */
	public abstract function transform($item);



}