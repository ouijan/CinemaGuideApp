<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Transformers\MoviesTransformer;
use App\Http\Transformers\SessionTimesTransformer;
use App\Movies;

class MoviesController extends ApiController {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(MoviesTransformer $transformer)
	{
		$movies = Movies::all();

		return $this->respond([
			'data' => $transformer->transformCollection($movies->toArray())
		]);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(MoviesTransformer $transformer, $id)
	{
		$movie = Movies::findOrFail($id);

		if( !$movie )
		{
			return $this->respondNotFound('Movie does not exist.');
		}

		return $this->respond([
			'data' => $transformer->transform($movie),
		]);
	}

	/**
	 * Shows sessionTimes of a given movie
	 * 
	 * @param  SessionTimesTransformer - transforms data to the api json
	 * @param  $id - id of a movie
	 * @return JSON response
	 */
	public function sessions(SessionTimesTransformer $transformer, $id)
	{
		$sessions = Movies::findOrFail($id)->sessionTimes;

		return $this->respond([
			'data' => $transformer->transformCollection($sessions->toArray())
		]);
	}


}