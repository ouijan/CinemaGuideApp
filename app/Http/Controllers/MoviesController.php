<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Transformers\MovieTransformer;
use App\Movies;

class MoviesController extends ApiController {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(MovieTransformer $movieTransformer)
	{
		$movies = Movies::all();

		return $this->respond([
			'data' => $movieTransformer->transformCollection($movies->toArray())
		]);

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		dd('store');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(MovieTransformer $movieTransformer, $id)
	{
		$movie = Movies::find($id);

		if( !$movie )
		{
			return $this->respondNotFound('Movie does not exist.');
		}

		return $this->respond([
			'data' => $movieTransformer->transform($movie),
		]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}




}
